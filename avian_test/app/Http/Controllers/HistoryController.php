<?php

namespace App\Http\Controllers;

use App\Exports\HistoryExport;
use App\Imports\HistoryImport;
use App\Models\HistoryKodeToko;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = HistoryKodeToko::all();
        return view('history.index', compact('histories'));
    }

    public function create()
    {
        return view('history.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new HistoryImport, $request->file('file'));
        } else {
            HistoryKodeToko::create($request->all());
        }

        return redirect()->route('history.index');
    }

    public function destroy($id)
    {
        $history = HistoryKodeToko::findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Data history berhasil dihapus!');
    }

    public function getEditForm(Request $request)
    {
        $history = HistoryKodeToko::find($request->id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('history.modal', compact('history'))->render()
        ), 200);
    }

    public function exportExcel()
    {
        return Excel::download(new HistoryExport, 'history.xlsx');
    }

    public function exportPDF()
    {
        $tableA = HistoryKodeToko::all();
        $pdf = PDF::loadView('history.pdf', compact('tableA'));
        return $pdf->download('history.pdf');
    }
}
