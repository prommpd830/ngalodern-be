<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Materi;
use App\Bahasa;
use App\LandingPage;
use App\MateriProgress;
use App\MapelProgress;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mapel, $level, Request $request)
    {
        $lp_logo = LandingPage::first();
        // Get session Bahasa
        $idBahasa = $request->session()->get('id_bahasa');

        // Get all data Bahasa
        $bahasa = Bahasa::all();

        $mapelProgress = MapelProgress::where(['id_user' => Auth::user()->id, 'id_mapel' => $mapel])->first();

        if ($mapelProgress->id_level < $level) {
            return abort(404);
        }
        
        $materi = Materi::where(['id_mapel' => $mapel, 'id_level' => $level, 'id_bahasa' => $idBahasa])->get();
        $countMateri = Materi::where(['id_mapel' => $mapel, 'id_level' => $level, 'id_bahasa' => $idBahasa])->count();
        $countProgress = MateriProgress::where(['id_user' => Auth::id(), 'id_mapel' => $mapel, 'id_level' => $level])->count();

        return view('user.materi', compact('bahasa', 'materi', 'countMateri', 'countProgress', 'mapel', 'level', 'lp_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        //
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
