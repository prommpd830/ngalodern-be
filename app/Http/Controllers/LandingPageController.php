<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\LandingPage;
use App\About;
use App\Panduan;
use App\FooterSection;
use App\FooterLogo;
use App\FooterKontak;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        $landing = LandingPage::first();
        $about = About::first();
        $panduan = Panduan::first();
        $footerS = FooterSection::all();
        $footerL = FooterLogo::all();
        $footerK = FooterKontak::first();
        return view('index', compact('mapel', 'landing', 'about', 'panduan', 'footerS', 'footerL', 'footerK'));
    }

    public function edit()
    {
        $landing = LandingPage::first();
        $about = About::first();
        $footerS = FooterSection::all();
        $footerL = FooterLogo::all();
        $footerK = FooterKontak::first();
        $lp_logo = LandingPage::first();
        return view('admin.lp_edit',  compact('landing', 'about', 'footerS', 'footerL', 'footerK', 'lp_logo'));
    }

    public function update(LandingPage $lp)
    {

        // Landing Page Update
        $lp_data = [
            'id' => request('id_landing'),
            'title' => request('title_landing'),
            'header' => request('header_landing'),
        ];

		if(request()->hasfile('logo')) {
            $file = request()->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/media/logos/', $filename);
            $lp_data['logo'] = $filename;
        }

        LandingPage::where('id', request('id_landing'))->update($lp_data);


        // About Section Update
        $about_data = [
            'id' => request('id_about'),
            'title' => request('title_about'),
            'deskripsi' => request('deskripsi_about'),
        ];

		if(request()->hasfile('img_about')) {
            $file = request()->file('img_about');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/media/illustrations/', $filename);
            $about_data['image'] = $filename;
        }

        About::where('id', request('id_about'))->update($about_data);

        // Video Section Update
        $video_data = [
            'video_1' => request('video_1'),
            'video_2' => request('video_2'),
        ];

        LandingPage::where('id', request('id_about'))->update($video_data);

        // Footer Section 2 Update
        $footer_data_2 = [
            'title' => request('title_footer_2'),
            'deskripsi_1' => request('deskripsi_footer_1_2'),
            'telepon' => request('telepon_2'),
            'fax' => request('fax_2'),
            'email' => request('email_2'),
        ];

        FooterSection::where('id', 2)->update($footer_data_2);

        // Footer Logo Update
        $footer_logo = [
            'title' => "Universitas Padjadjaran",
        ];

        if(request()->hasfile('footer_logo')) {
            $file = request()->file('footer_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/media/logos/', $filename);
            $footer_logo['logo'] = $filename;
        }

        FooterLogo::where('id', 1)->update($footer_logo);


        // Kontak Section Update
        $kontak_data = [
            'facebook' => request('facebook'),
            'twitter' => request('twitter'),
            'instagram' => request('instagram'),
            'youtube' => request('youtube'),
            'linkedin' => request('linkedin'),
        ];

        FooterKontak::where('id', 1)->update($kontak_data);
        
        return back()->with('success', 'Landing page berhasil diubah');
    }
}
