<?php

namespace App\Http\Controllers\EditorAdmin;

use App\Http\Controllers\Controller;
use App\Bahasa;
use App\LandingPage;
use App\Level;
use App\Mapel;
use App\Pertanyaan;
use App\Tes;
use App\StatusTes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahasa = Bahasa::all();
        $ujian = Tes::where('tipe', '=', 'ujian')->get();
        $lp_logo = LandingPage::first();

        return view('editor.ujian.ujian', compact('ujian', 'bahasa', 'lp_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahasa = Bahasa::all();
        $mapel = Mapel::all();
        $level = Level::all();
        $status = StatusTes::all();
        $lp_logo = LandingPage::first();

        return view('editor.ujian.tambah_ujian', compact('level', 'mapel', 'bahasa', 'lp_logo', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'id_bahasa' => 'required',
            'id_mapel' => 'required',
            'id_level' => 'required',
            'tes' => 'required',
            'status' => 'required'
        ]);
        
        if (request()->status == 2) {
            Tes::where([
                'id_bahasa' => request()->id_bahasa,
                'id_mapel' => request()->id_mapel,
                'id_level' => request()->id_level,
                'tipe' => 'ujian'
            ])->update(['status' => 1]);
        }

        $data['slug'] = Str::slug(request('tes'));
        $data['tipe'] = 'ujian';
        
        Tes::create($data);
        return redirect()->route('ujian.index')->with('success', 'Ujian berhasil ditambahkan');
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
        $bahasa = Bahasa::all();
        $mapel = Mapel::all();
        $level = Level::all();
        $ujian = Tes::where('id', '=', $id)->get();
        $lp_logo = LandingPage::first();
        $status = StatusTes::all();

        return view('editor.ujian.edit_ujian', compact('ujian', 'level', 'mapel', 'bahasa', 'lp_logo', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tes $ujian)
    {
        $data = request()->validate([
            'tes' => 'required',
            'id_bahasa' => 'required',
            'id_mapel' => 'required',
            'id_level' => 'required',
            'status' => 'required'
        ]);
        
        if (request()->status == 2) {
            Tes::where([
                'id_bahasa' => request()->id_bahasa,
                'id_mapel' => request()->id_mapel,
                'id_level' => request()->id_level,
                'tipe' => 'ujian'
            ])->update(['status' => 1]);
        }
        

        $data['slug'] = Str::slug(request('tes'));
        
        Tes::where('id', $ujian->id)->update($data);

        return redirect()->route('ujian.index')->with('success', 'Ujian berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanyaan::where('id_tes', '=', $id)->delete();
        Tes::find($id)->delete();

        return redirect()->back()->with('success', 'Ujian berhasil dihapus');
    }
}
