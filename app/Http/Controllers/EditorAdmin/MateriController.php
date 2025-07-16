<?php

namespace App\Http\Controllers\EditorAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Bahasa;
use App\LandingPage;
use App\Level;
use App\Mapel;
use App\Materi;
use App\SubMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lp_logo = LandingPage::first();
        $bahasa = Bahasa::all();
        $materi = Materi::all();
        $lp_logo = LandingPage::first();
        return view('editor.materi.materi', compact('materi', 'bahasa', 'lp_logo'));
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
        $materi = Materi::all();
        $lp_logo = LandingPage::first();

        return view('editor.materi.tambah_materi', compact('mapel', 'level', 'bahasa', 'materi', 'lp_logo'));
    }


    public function listMateri(Request $request)
    {
        $bahasa = $request->input('bahasa');
        $mapel = $request->input('mapel');
        $level = $request->input('level');
        $tipe = $request->input('tipe');
        $data = [];

        if ($mapel) {
            $data['id_mapel'] = $mapel;
        }

        if ($level) {
            $data['id_level'] = $level;
        }

        $materi = Materi::with('bahasa')->where($data)->whereNotIn('id_bahasa', [$bahasa])->get();

        if ($tipe == 'latihan') {
            $data['id_bahasa'] = $bahasa;
            $materi = Materi::with('bahasa')->where($data)->get();
        }

        if (count($materi) == 0) {

            return response()->json([
                'status' => false,
                'materi' => $materi,
                'text' => 'Data materi tidak ditemukan'
            ]);

        } else {

            return response()->json([
                'status' => true,
                'materi' => $materi,
                'text' => 'Data materi ditemukan'
            ]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    { 
        if (!empty(request()->kode_materi)) {
            $data = request()->validate([
                'kode_materi' => 'required',
                'id_bahasa' => 'required',
                'id_mapel' => 'required',
                'id_level' => 'required',
                'materi' => 'required'
            ]);


            $countMateri = Materi::where('kode_materi', request()->kode_materi)->count();

            if ($countMateri == 2) {
                return Redirect::route('materi.create')->with('error', 'Materi yang terkait untuk bahasa ini sudah ada');
            }

        } else {
            $data = request()->validate([
                'id_bahasa' => 'required',
                'id_mapel' => 'required',
                'id_level' => 'required',
                'materi' => 'required'
            ]);

            $data['kode_materi'] = Str::random(20);
        }

        Materi::create($data);
        return Redirect::route('materi.index')->with('success', 'Materi berhasil ditambahkan');
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
        $materi = Materi::find($id);
        $mapel = Mapel::all();
        $level = Level::all();
        $lp_logo = LandingPage::first();

        return view('editor.materi.edit_materi', compact('materi', 'mapel', 'level', 'bahasa', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Materi $materi)
    {
        if (!empty(request()->kode_materi)) {
            $data = request()->validate([
                'kode_materi' => 'required',
                'id_bahasa' => 'required',
                'id_mapel' => 'required',
                'id_level' => 'required',
                'materi' => 'required'
            ]);

            // Update Materi if kode_materi has not change
            if ($materi->kode_materi == request()->kode_materi && $materi->id_bahasa == request()->id_bahasa) {
                $materi->update($data);
                return Redirect::route('materi.index')->with('success', 'Materi berhasil diedit');
            }

            $countMateri = Materi::where('kode_materi', request()->kode_materi)->count();

            if ($countMateri == 2) {
                return Redirect::route('materi.edit', request('id_materi'))->with('error', 'Materi yang terkait untuk bahasa ini sudah ada');
            }

        } else {
            $data = request()->validate([
                'id_bahasa' => 'required',
                'id_mapel' => 'required',
                'id_level' => 'required',
                'materi' => 'required'
            ]);
        }

        $materi->update($data);
        return Redirect::route('materi.index')->with('success', 'Materi berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubMateri::where('id_materi', '=', $id)->delete();
        Materi::find($id)->delete();
        
        return Redirect::back()->with('success', 'Materi berhasil dihapus');
    }
}
