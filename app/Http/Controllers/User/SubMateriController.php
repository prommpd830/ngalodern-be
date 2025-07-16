<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubMateri;
use App\Bahasa;
use App\LandingPage;

class SubMateriController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($materi, $submateri, Request $request)
    {
        $lp_logo = LandingPage::first();
        // Get session Bahasa
        $idBahasa = $request->session()->get('id_bahasa');

        // Get all data Bahasa
        $bahasa = Bahasa::all();

        $sub_materi = SubMateri::where(['id' => $submateri, 'kode_materi' => $materi, 'id_bahasa' => $idBahasa])->get();

        // Get previous submateri id
        $previous = SubMateri::where([
            ['id', '<', $submateri],
            ['kode_materi', '=', $materi],
            ['id_bahasa', '=', $idBahasa]
        ])->max('id');

        // Get next submateri id
        $next = SubMateri::where([
            ['id', '>', $submateri],
            ['kode_materi', '=', $materi],
            ['id_bahasa', '=', $idBahasa]
        ])->min('id');

        return view('user/submateri', compact('bahasa', 'sub_materi', 'previous', 'next', 'lp_logo'));
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
