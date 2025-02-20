<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentescos;
use App\Models\Afiliados;
use App\Models\Ejecutivos;
use App\Models\Beneficiarios;
use App\Models\Servicios;
use App\Models\Clientes;
use App\Models\detalles_afiliado;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Afiliado;
use Symfony\Component\HttpFoundation\StreamedResponse;

use function Laravel\Prompts\error;

class AfiliadosController extends Controller
{

    public function index()
    {
        $Afiliados = Afiliados::select(
            'afiliados.*',
            'servicios.nombre as nombre_servicio',
            'clientes.primer_nombre as primer_nombre',
            'clientes.segundo_nombre as segundo_nombre',
            'clientes.primer_apellido as primer_apellido',
            'clientes.segundo_apellido as segundo_apellido',
            'clientes.cedula as cedula'
        )
            ->join('servicios', 'afiliados.servicio_id', '=', 'servicios.id')
            ->join('clientes', 'afiliados.servicio_id', '=', 'clientes.id')

            ->get();
        return view('afiliados.buscarAfiliados', compact('Afiliados'));
    }
    public function afiliados()
    {
        $afiliados = Afiliados::all();
        $ejecutivos = Ejecutivos::all();
        $parentescos = Parentescos::all();
        $servicios = Servicios::all();
        return view('afiliados.afiliado', compact("servicios", "parentescos", "ejecutivos"));
    }
    public function storeAFiliados(Request $request)
    {
        DB::beginTransaction();
        try {
            // Obtener todos los datos del formulario en formato JSON
            $formData = $request->all();

            $afiliado = new afiliados;
            $cliente = Clientes::where('cedula', '=', $request->CedulaTitular)->first();
            if ($cliente) {
                $afiliado->cliente_id = $cliente->id;
            } else {
                return  redirect()->route('afiliados')->with('Error', 'Cliente no encontrado');
            }
            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear();
            $fechaRenovacion = $fechaRenovacion->format('Y-m-d');

            $afiliado->cliente_id = $cliente->id;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->tipoServicio . "-" . $request->CedulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;

            $afiliado->ejecutivo_id  = $request->ejecutivo;
            $afiliado->status = 1;

            $savedAfiliado = $afiliado->save();
            if(!$savedAfiliado) {
                DB::rollBack();
                return redirect()->back()->with('Error', 'Falló al guardar el afiliado');
            }
            dd($savedAfiliado);
            // Crear o encontrar beneficiario
            $beneficiario = Beneficiarios::firstOrCreate(
                ['cedula' => $request->CedulaBeneficiario],
                [
                    'primer_nombre' => $request->primer_nombre,
                    'segundo_nombre' => $request->segundo_nombre,
                    'primer_apellido' => $request->primer_apellido,
                    'segundo_apellido' => $request->segundo_apellido,
                    'nacionalidad' => $request->Nacionalidad,
                    'cedula' => $request->CedulaBeneficiario,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'telefono' => $request->Telefono,
                    'parentesco_id' => $request->Parentesco,
                    'status' => 'ACTIVO',
                    'convenio' => 'INACTIVO',
                ]
            );
            
            if(!$beneficiario->exists) {
                DB::rollBack();
                return redirect()->back()->with('Error', 'Falló al crear beneficiario');
            }
            
            // Crear detalle de afiliación
            $detalles_afiliado = new detalles_afiliado();
            $detalles_afiliado->afiliado_id = $afiliado->id;
            $detalles_afiliado->beneficiario_id = $beneficiario->id;
            $detalles_afiliado->servicio_id = $afiliado->servicio_id;
            
            $savedDetalle = $detalles_afiliado->save();
            if(!$savedDetalle) {
                DB::rollBack();
                return redirect()->back()->with('Error', 'Falló al guardar detalle de afiliación');
            }
            
            DB::commit();
            
            $mensaje = "Afiliación completa: ";
            $mensaje .= $savedAfiliado ? "✓ Afiliado guardado | " : "✗ Falló afiliado | ";
            $mensaje .= $beneficiario->wasRecentlyCreated ? "✓ Beneficiario nuevo | " : "✓ Beneficiario existente | ";
            $mensaje .= $savedDetalle ? "✓ Detalle guardado" : "✗ Falló detalle";

            return redirect()->route('afiliados')
                ->with('Procesado', $mensaje);

        } catch (\Throwable $th) {
            DB::rollBack();            
            return redirect()->back()
                ->with('Error', 'Error al crear el afiliado: ' . $th->getMessage())
                ->withInput();
        }
    }

    public function exportar()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="afiliados.csv"',
        ];

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            
            // Encabezados
            fputcsv($handle, ['Cédula', 'Nombre', 'Teléfono']);
            
            // Datos de prueba
            fputcsv($handle, ['V-123456', 'Juan Pérez', '04121234567']);
            fputcsv($handle, ['V-654321', 'María Gómez', '04241234567']);
            
            fclose($handle);
        }, 'afiliados.csv', $headers);
    }
}
