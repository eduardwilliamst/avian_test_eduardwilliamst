<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        return Toko::all();
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->received = $request->received;
        $toko->failedReason = $request->failedReason;
        $toko->save();

        return response()->json($toko, 200);
    }
}
