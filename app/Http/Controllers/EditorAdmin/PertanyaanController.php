<?php

namespace App\Http\Controllers\EditorAdmin;

use App\Http\Controllers\Controller;
use App\Bahasa;
use App\LandingPage;
use App\Pertanyaan;
use App\Tes;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bahasa = Bahasa::all();
        $tes = Tes::where('id', $id)->get()->first();
        $pertanyaan = Pertanyaan::where('id_tes', $id)->orderBy('nomer')->get();
        $lp_logo = LandingPage::first();
        
        return view('editor.pertanyaan.pertanyaan', compact('tes','pertanyaan', 'id', 'bahasa', 'lp_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bahasa = Bahasa::all();
        $latihan = Tes::where('id', '=', $id)->get()->first();
        $lp_logo = LandingPage::first();
        return view('editor.pertanyaan.tambah_pertanyaan', compact('latihan', 'id', 'bahasa', 'lp_logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pertanyaan $pertanyaan2)
    {
        $validate = request()->validate([
            'id_tes' => 'required',
            'nomer'  => 'required',
            'pertanyaan'   => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban'=> 'required',
            'nilai'=> 'required',
        ]);

        $pertanyaan = request('pertanyaan');

        $dom = new DomDocument();
        
        libxml_use_internal_errors(true);
        
        $dom->loadHtml(mb_convert_encoding($pertanyaan, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
        libxml_clear_errors();
 
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
 
            list($type, $data) = explode(';', $data);
 
            list($type, $data) = explode(',', $data);
 
            $data = base64_decode($data);
 
            $image_name= "upload/" . time().$k.'.png';
 
            $path = $image_name;
 
            file_put_contents($path, $data);
 
            $img->removeAttribute('src');
 
            $img->setAttribute('src', $image_name);
        }
        
        $audio = $dom->getElementsByTagName('audio');
 
        foreach($audio as $k => $aud){
            $data = $aud->getAttribute('src');
 
            list($type, $data) = explode(';', $data);
 
            list($type, $data) = explode(',', $data);
 
            $data = base64_decode($data);
 
            $audio_name= "upload/" . time().$k.'.mp3';
 
            $path =  $audio_name;
 
            file_put_contents($path, $data);
 
            $aud->removeAttribute('src');
 
            $aud->setAttribute('src', $audio_name);
        }

        $pertanyaan = $dom->saveHTML();
        $validate['pertanyaan'] = $pertanyaan;

        Pertanyaan::create($validate);
        
        return Redirect::to('pertanyaan/' .request('id_tes'))->with('success', 'Pertanyaan berhasil ditambahkan');
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
        $jawaban = Pertanyaan::all();
        $pertanyaan = Pertanyaan::where('id', '=', $id)->get()->first();
        $lp_logo = LandingPage::first();

        return view('editor.pertanyaan.edit_pertanyaan', compact('pertanyaan', 'jawaban', 'id', 'bahasa', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pertanyaan $pertanyaan)
    {
        $result = request()->validate([
            'id_tes' => 'required',
            'nomer'  => 'required',
            'pertanyaan'   => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban'=> 'required',
            'nilai'=> 'required',
        ]);
        
        $soal = request('pertanyaan');

        $dom = new DomDocument();
        
        libxml_use_internal_errors(true);
        
        $dom->loadHtml(mb_convert_encoding($soal, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
        libxml_clear_errors();
        
        $images = $dom->getElementsByTagName('img');
 
        foreach($images as $k => $img){
            
            $data = $img->getAttribute('src');
            
            if (!file_exists($data)) {
 
                list($type, $data) = explode(';', $data);
     
                list($type, $data) = explode(',', $data);
     
                $data = base64_decode($data);
     
                $image_name= "upload/" . time().$k.'.png';
     
                $path = $image_name;
     
                file_put_contents($path, $data);
     
                $img->removeAttribute('src');
     
                $img->setAttribute('src', $image_name);
            }
            
        }
        
        $audio = $dom->getElementsByTagName('audio');
 
        foreach($audio as $k => $aud){
            $data = $aud->getAttribute('src');
            
            if (!file_exists($data)) {
                
                list($type, $data) = explode(';', $data);
 
                list($type, $data) = explode(',', $data);
     
                $data = base64_decode($data);
                
                $audio_name= "upload/" . time().$k.'.mp3';
 
                $path =  $audio_name;
     
                file_put_contents($path, $data);
     
                $aud->removeAttribute('src');
     
                $aud->setAttribute('src', $audio_name);
                
            }
        }
        
        $soal = $dom->saveHTML();
        
        $result['pertanyaan'] = $soal;
        
        $pertanyaan->update($result);
        return redirect('pertanyaan/'.$pertanyaan->id_tes)->with('success', 'Pertanyaan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanyaan::find($id)->delete();

        return redirect()->back()->with('success', 'Pertanyaan berhasil dihapus');
    }
}
