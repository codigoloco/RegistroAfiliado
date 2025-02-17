<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 

class ExcelController extends Controller
{
    public function cargaMasiva(Request $request)
    {
        // echo $request->all();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        // Obtener el archivo
        $file = $request->file('file');
        echo $file;
        // // Leer el archivo Excel
        $data = Excel::toArray([], $file);
        $data_sin_cabecera = array_slice($data[0], 1);
        return response()->json([
            'message' => 'Contenido del Excel',
            'data' => $data_sin_cabecera
        ], 200);
        // Aquí procesarías los datos y los insertarías en la base de datos
        foreach ($data[0] as $row) {
            // Suponiendo que tienes un modelo llamado 'MiModelo'
            Clientes::create([
                'cedula' => $row[0],
                'rif' => $row[1],
                'primer_nombre' => $row[2],
                'segundo_nombre' => $row[3],
                'primer_apellido' => $row[4],
                'segundo_apellido' => $row[5],
                'fecha_nacimiento' => $row[6],   
                'telefono' => $row[7],
                'correo' => $row[8],
                'empresa' => $row[9],                
                'direccion' => $row[10],
                'Nacionalidad' => $row[11],
            ]);

                    

            
        }

        // return response()->json([
        //     'message' => 'Archivo procesado correctamente',
        //     'data' => $data
        // ], 200);
    }

}
