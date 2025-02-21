<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;

class GetController extends Controller
{
    public function importarExcel()
    {
        $style = [
            'font' => [
                'color' => ['rgb' => 'FFFFFF'], // Texto blanco
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '3987e6'] // Fondo azul
            ],'borders' => [
            'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['rgb' => 'FFFFFF'] // Color negro
        ]
    ]
        ];
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //ENCABEZADOSSSS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        $sheet->fromArray([
            ['CEDULA',
            'PRIMER_NOMBRE',
            'SEGUNDO_NOMBRE',
            'PRIMER_APELLIDO',
            'SEGUNDO_APELLIDO',
            'NACIONALIDAD',
            'DIRECCION',
            'TELEFONO',
            'FECHA_NACIMIENTO'], 
            
        ])->getStyle('A1:I1')->applyFromArray($style);
        
        $letras_columnas = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H','F','G','H','I'];

        foreach ($letras_columnas as $letra) {
        
            $sheet->getColumnDimension($letra)->setAutoSize(true);
        }
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="importar-Excel.csv"',
        ];

        $writer = new WriterXlsx($spreadsheet);
        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });
        
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="afiliados.xlsx"');
        
        return $response;
    }
}
