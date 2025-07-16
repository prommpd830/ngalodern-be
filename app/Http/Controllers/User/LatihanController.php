<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bahasa;
use App\LandingPage;
use App\Tes;
use App\Pertanyaan;
use App\MateriProgress;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($materi, Request $request)
    {
        
        $lp_logo = LandingPage::first();
        // Get session Bahasa
        $idBahasa = $request->session()->get('id_bahasa');

        // Get all data Bahasa
        $bahasa = Bahasa::all();

        $latihan = Tes::where(['id_bahasa' => $idBahasa, 'kode_materi' => $materi, 'tipe' => 'latihan', 'status' => 2])->get();

        return view('user/latihan', compact('bahasa', 'latihan', 'lp_logo'));
    }

    public function check(Request $request)
    {
        $id = $request->input('id');
        $value = $request->input('value');

        $pertanyaan = Pertanyaan::where(['id' => $id, 'jawaban' => $value])->get();

        if (count($pertanyaan) == 1) {

            return response()->json([
                'status' => true
            ]);

        } else {

            return response()->json([
                'status' => false
            ]);

        }  
    }

    public function hasil(Request $request)
    {
        $id = $request->input('id');

        $latihan = Tes::find($id);

        if ($latihan == null) {
            return abort(404);
        }

        $progress = MateriProgress::updateOrCreate([
            'id_mapel' => $latihan->id_mapel,
            'kode_materi' => $latihan->kode_materi,
            'id_user' => Auth::user()->id,
            'id_level' => $latihan->id_level
        ]);

        if ($progress) {
            return redirect('dashboard')->with('success', 'Selamat!. Anda telah menyelesaikan Latihan <b>'. $latihan->latihan . '</b> dari Mata Pelajaran <b>'. $latihan->mapel->mapel .'</b>, Level <b>'. $latihan->level->level .'</b>, Materi <b>'. $latihan->materi->materi .'</b>');
        } else {
            return abort(404);
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
