<?php

namespace App\Http\Controllers\EditorAdmin;

use App\Http\Controllers\Controller;
use App\Bahasa;
use App\LandingPage;
use App\Materi;
use App\SubMateri;
use DOMDocument;
use Illuminate\Http\Request;

class SubmateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bahasa = Bahasa::all();
        $materi = Materi::where('id', $id)->first();
        $submateri = SubMateri::where('id_materi', $id)->get();
        $lp_logo = LandingPage::first();

        return view('editor.submateri.submateri', compact('submateri', 'materi', 'id', 'bahasa', 'lp_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bahasa = Bahasa::all();
        $materi = Materi::where('id', '=', $id)->first();
        $lp_logo = LandingPage::first();

        return view('editor.submateri.tambah_submateri', compact('materi', 'bahasa', 'lp_logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubMateri $submateri)
    {
        $data = request()->validate([
            'id_materi' => 'required',
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $konten = request('konten');

        $dom = new DomDocument();
        
        libxml_use_internal_errors(true);
        
        $dom->loadHtml(mb_convert_encoding($konten, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
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

        $materi = Materi::where('id', request()->id_materi)->first();
        $konten = $dom->saveHTML();
 
        $summernote = new SubMateri;
        $summernote->kode_materi = $materi->kode_materi;
        $summernote->id_materi = $materi->id;
        $summernote->id_bahasa = $materi->id_bahasa;
        $summernote->judul = request('judul');
        $summernote->konten = $konten;
        $summernote->save();

        return redirect('submateri/' .request('id_materi'))->with('success', 'Submateri berhasil ditambahkan');
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
        $submateri = SubMateri::where('id', '=', $id)->first();
        $lp_logo = LandingPage::first();

        return view('editor.submateri.edit_submateri', compact('submateri', 'bahasa', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubMateri $submateri)
    {
        $result = request()->validate([
            'id_materi' => 'required',
            'judul' => 'required',
            'konten' => 'required',
        ]);
        
        $konten = request('konten');

        $dom = new DomDocument();
        
        libxml_use_internal_errors(true);
        
        $dom->loadHtml(mb_convert_encoding($konten, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
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
        
        $konten = $dom->saveHTML();
        
        $result['konten'] = $konten;
        
        $submateri->update($result);

        return redirect('submateri/' .request('id_materi'))->with('success', 'Submateri berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubMateri::find($id)->delete();

        return redirect()->back()->with('success', 'Submateri berhasil dihapus');
    }
}
