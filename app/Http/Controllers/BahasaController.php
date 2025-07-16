<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bahasa;

class BahasaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');

        $bahasa = Bahasa::where('id', $id)->first();

        // Check if Bahasa is exists
        if ($bahasa === null) {
        	return response()->json([
                'status' => false,
                'text' => 'Bahasa tidak ditemukan!'
            ]);
        }

        // Check if session Bahasa is exists
        if ($request->session()->exists('bahasa')) {
        	$request->session()->forget(['bahasa', 'id_bahasa']);
        }

        $request->session()->put(['bahasa' => $bahasa->bahasa, 'id_bahasa' => $bahasa->id]);


        // Check if session has Bahasa
        if ($request->session()->has('bahasa')) {

            return response()->json([
                'status' => true,
                'text' => 'Bahasa berhasil diubah!'
            ]);

        } else {

            return response()->json([
                'status' => false,
                'text' => 'Bahasa gagal diubah!'
            ]);

        }  
    }
}
