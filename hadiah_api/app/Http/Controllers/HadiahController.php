<?php

namespace App\Http\Controllers;

use App\Models\Hadiah;
use Illuminate\Http\Request;

class HadiahController extends Controller
{
    public function index()
    {
        return Hadiah::all();
    }

    public function update(Request $request, $id)
    {
        $hadiah = Hadiah::findOrFail($id);
        $hadiah->received = $request->received;
        $hadiah->failedReason = $request->failedReason;
        $hadiah->save();

        return response()->json($hadiah, 200);
    }
}
