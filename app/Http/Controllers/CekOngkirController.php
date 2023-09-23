<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CekOngkir;

class CekOngkirController extends Controller
{
    public function cekCost(Request $request){
        $request->validate([
            'origin' => 'required|integer',
            'destination' => 'required|integer',
            'weight' => 'required|integer',
        ]);

        $cekOngkir = CekOngkir::getInstance();
        $result = $cekOngkir->getRajaOngkirCost($request->origin, $request->destination, $request->weight);

        return response()->json([
            'success' => 1,
            'data' => $result,
        ]);
    }
}
