<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;

class ExchangeController extends Controller
{
    public function lastexchange() {
        $data = Exchange::latest('created_at')->first();

        $compra = $data->compra;
        $venta = $data->venta;

        return response()->json([
            'compra' => $compra,
            'venta' => $venta
        ]);
    }
}
