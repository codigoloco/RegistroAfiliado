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

        return response()->json([
            'message' => 'Contenido del Excel',
            'data' => $data
        ], 200);
        // Aquí procesarías los datos y los insertarías en la base de datos
        // foreach ($data[0] as $row) {
        //     // Suponiendo que tienes un modelo llamado 'MiModelo'
        //     echo $row[0];
        //     echo $row[1];
        //     echo $row[2];
        //     echo $row[3];
        //     echo $row[4];
        //     echo $row[5];
        //     echo $row[6];
        //     echo $row[7];
        //     echo $row[8];
            // Clientes::create([
            //     'campo1' => $row[0],
            //     'campo2' => $row[1],
            //     // ... mapear los campos del Excel a la base de datos
            // ]);
        // }

        // return response()->json([
        //     'message' => 'Archivo procesado correctamente',
        //     'data' => $data
        // ], 200);
    }

}
