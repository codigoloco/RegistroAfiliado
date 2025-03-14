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
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            ->join('clientes', 'afiliados.cliente_id', '=', 'clientes.id')

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

            $afiliado = new Afiliados;
            $cliente = Clientes::where('cedula', '=', $request->CedulaTitular)->first();
            if ($cliente) {
                $afiliado->cliente_id = $cliente->id;
            } else {
                return redirect()->route('afiliados')->with('Error', 'Cliente no encontrado');
            }
            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear()->format('Y-m-d');

            $afiliado->cliente_id = $cliente->id;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->tipoServicio . "-" . $request->CedulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;
            $afiliado->ejecutivo_id  = $request->ejecutivo;
            $afiliado->status = 1;

            // Guardar el archivo subido en la carpeta 'archivos' en la raíz del proyecto
            if ($request->hasFile('formFile')) {
                $documento = $request->file('formFile');
                $nombreArchivo = time() . '_' . $documento->getClientOriginalName();
                $documento->move(public_path('archivos'), $nombreArchivo);
            }

            $savedAfiliado = $afiliado->save();
            if (!$savedAfiliado) {
                DB::rollBack();
                return redirect()->back()->with('Error', 'Falló al guardar el afiliado');
            }

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

            if (!$beneficiario->exists) {
                DB::rollBack();
                return redirect()->back()->with('Error', 'Falló al crear beneficiario');
            }

            // Crear detalle de afiliación
            $detalles_afiliado = new detalles_afiliado();
            $detalles_afiliado->afiliado_id = $afiliado->id;
            $detalles_afiliado->beneficiario_id = $beneficiario->id;
            $detalles_afiliado->servicio_id = $afiliado->servicio_id;

            $savedDetalle = $detalles_afiliado->save();
            if (!$savedDetalle) {
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
    public function abrirEdicion($id)
    {
        $afiliado = Afiliados::select(
            'afiliados.id',
            'clientes.primer_nombre',
            'clientes.segundo_nombre',
            'clientes.primer_apellido',
            'clientes.segundo_apellido',
            'clientes.cedula',
            'afiliados.created_at',
            'ejecutivos.nombre as Nombre_Ejecutivo',
            'ejecutivos.apellido as Apellido_Ejecutivo'
        )
            ->join('clientes', 'afiliados.cliente_id', '=', 'clientes.id')
            ->join('servicios', 'afiliados.servicio_id', '=', 'servicios.id')
            ->join('ejecutivos', 'afiliados.ejecutivo_id', '=', 'ejecutivos.id')
            ->get();

        $afiliado_detalles = Afiliados::select(

            // 'nro_afiliado',
            // 'primer_nombre',
            // 'segundo_nombre',
            // 'primer_apellido',
            // 'segundo_apellido',
            // 'fecha_nacimiento',
            // 'nacionalidad',
            // 'telefono'

        )
            ->join("detalles_afiliado", "detalles_Afiliado.id", "=", "afiliados.id")
            ->join("beneficiarios", "beneficiarios.id", "=", "detalles_afiliado.id")
            ->get();

        $parentescos = Parentescos::all();
        $servicios = Servicios::all();
        return view('afiliados.editarAfiliados', compact('afiliado', 'parentescos', 'afiliado_detalles'));
    }

    public function update($id, Request $request)
    {
        $afiliado = Afiliados::findOrFail($id);
        dd($request->all());
        $afiliado->save();
    }
}
