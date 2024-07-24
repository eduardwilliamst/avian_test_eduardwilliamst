<?php

namespace App\Http\Controllers;

use App\Models\AreaSales;
use Illuminate\Http\Request;

class AreaSalesController extends Controller
{
    public function index()
    {
        $areaSales = AreaSales::all();
        return view('area.index', compact('areaSales'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new HistoryImport, $request->file('file'));
        } else {
            AreaSales::create($request->all());
        }

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $areaSales = AreaSales::findOrFail($id);
        $areaSales->delete();

        return redirect()->back()->with('success', 'Data area-sales berhasil dihapus!');
    }

    public function getEditForm(Request $request)
    {
        dd($request);
        // $areaSales = AreaSales::find($request->id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('area.modal', compact('areaSales'))->render()
        ), 200);
    }

    public function exportExcel()
    {
        return Excel::download(new HistoryExport, 'area.xlsx');
    }

    public function exportPDF()
    {
        $tableA = AreaSales::all();
        $pdf = PDF::loadView('area.pdf', compact('tableA'));
        return $pdf->download('area.pdf');
    }
}
