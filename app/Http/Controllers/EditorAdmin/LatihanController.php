<?php

namespace App\Http\Controllers\EditorAdmin;

use App\Http\Controllers\Controller;
use App\Bahasa;
use App\LandingPage;
use App\Level;
use App\Mapel;
use App\Materi;
use App\Pertanyaan;
use App\Tes;
use App\StatusTes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahasa = Bahasa::all();
        $latihan = Tes::where('tipe', '=', 'latihan')->get();
        $lp_logo = LandingPage::first();

        return view('editor.latihan.latihan', compact('latihan', 'bahasa', 'lp_logo'));
    }

    
    public function create()
    {
        $bahasa = Bahasa::all();
        $mapel = Mapel::all();
        $level = Level::all();
        $materi = Materi::all();
        $status = StatusTes::all();
        $lp_logo = LandingPage::first();

        return view('editor.latihan.tambah_latihan', compact('materi', 'level', 'mapel', 'bahasa', 'status', 'lp_logo'));
    }

    public function store()
    {
        $data = request()->validate([
            'id_bahasa' => 'required',
            'id_mapel' => 'required',
            'id_level' => 'required',
            'id_materi' => 'required',
            'tes' => 'required',
            'status' => 'required'
        ]);

        $materi = Materi::where('id', request()->id_materi)->first();
        
        if (request()->status == 2) {
            Tes::where([
                'id_bahasa' => request()->id_bahasa,
                'id_mapel' => request()->id_mapel,
                'id_level' => request()->id_level,
                'kode_materi' => $materi->kode_materi,
                'tipe' => 'latihan'
            ])->update(['status' => 1]);
        }

        $data['tipe'] = 'latihan';
        $data['slug'] = Str::slug(request('tes'));
        $data['kode_materi'] = $materi->kode_materi;
        Tes::create($data);
        return redirect()->route('latihan.index')->with('success', 'Latihan berhasil ditambahkan');

    }

    
    public function show()
    {
        //
    }

    
    public function edit($id)
    {
        $bahasa = Bahasa::all();
        $mapel = Mapel::all();
        $level = Level::all();
        $materi = Materi::all();
        $latihan = Tes::where('id', '=', $id)->get();
        $status = StatusTes::all();
        $lp_logo = LandingPage::first();

        return view('editor.latihan.edit_latihan', compact('latihan', 'materi', 'level', 'mapel', 'bahasa', 'status', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function update(Tes $latihan)
    {
        $data = request()->validate([
            'id_bahasa' => 'required',
            'id_mapel' => 'required',
            'id_level' => 'required',
            'id_materi' => 'required',
            'tes' => 'required',
            'status' => 'required'
        ]);

        $materi = Materi::where('id', request()->id_materi)->first();
        
        if (request()->status == 2) {
            Tes::where([
                'id_bahasa' => request()->id_bahasa,
                'id_mapel' => request()->id_mapel,
                'id_level' => request()->id_level,
                'kode_materi' => $materi->kode_materi,
                'tipe' => 'latihan'
            ])->update(['status' => 1]);
        }

        $data['kode_materi'] = $materi->kode_materi;
        
        $latihan->update($data);
        return redirect()->route('latihan.index')->with('success', 'Latihan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanyaan::where('id_tes', '=', $id)->delete();
        Tes::find($id)->delete();

        return redirect()->back()->with('success', 'Latihan berhasil dihapus');
    }
}
