<?php

namespace App\Http\Controllers;

use App\Models\MasterSales;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class SalesController extends Controller
{
    public function index()
    {
        $saless = MasterSales::all();
        
        return view('sales.index', compact('saless'));
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $this->importExcel($request->file('file'));
        } else {
            MasterSales::create($request->all());
        }

        return redirect()->route('sales.index');
    }

    public function destroy($id)
    {
        $sales = MasterSales::findOrFail($id);
        $sales->delete();

        return redirect()->back()->with('success', 'Data sales berhasil dihapus!');
    }

    public function getEditForm(Request $request)
    {
        $sales = MasterSales::find($request->id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('sales.modal', compact('sales'))->render()
        ), 200);
    }

    private function importExcel($file)
    {
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheetData as $row) {
            MasterSales::create([
                'kode_sales' => $row[0],
                'nama_sales' => $row[1],
            ]);
        }
    }

    public function exportExcel()
    {
        $saless = MasterSales::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Sales');
        $sheet->setCellValue('B1', 'Nama Sales');

        $rowNumber = 2;
        foreach ($saless as $sales) {
            $sheet->setCellValue('A' . $rowNumber, $sales->kode_sales);
            $sheet->setCellValue('B' . $rowNumber, $sales->nama_sales);
            $rowNumber++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'master_sales.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    public function exportPDF()
    {
        $saless = MasterSales::all();
        $pdf = PDF::loadView('sales.pdf', compact('saless'));
        return $pdf->download('sales.pdf');
    }
}
