<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new HistoryImport, $request->file('file'));
        } else {
            Penjualan::create($request->all());
        }

        return redirect()->route('penjualan.index');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus!');
    }

    public function getEditForm(Request $request)
    {
        $penjualan = Penjualan::find($request->id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('penjualan.modal', compact('penjualan'))->render()
        ), 200);
    }

    public function exportExcel()
    {
        return Excel::download(new HistoryExport, 'penjualan.xlsx');
    }

    public function exportPDF()
    {
        $tableA = Penjualan::all();
        $pdf = PDF::loadView('penjualan.pdf', compact('tableA'));
        return $pdf->download('penjualan.pdf');
    }
}
