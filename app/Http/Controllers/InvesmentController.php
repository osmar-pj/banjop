<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invesment;

class InvesmentController extends Controller
{
    public function invesment(Request $request) {
        $data = new Invesment($request->all());
        $data->save();

        return response()->json([
            'registered' => true
        ]);
    }
}
