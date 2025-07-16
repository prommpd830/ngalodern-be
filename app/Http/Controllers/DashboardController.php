<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\MapelProgress;
use App\Level;
use App\Mapel;
use App\Bahasa;
use App\LandingPage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Check if session Bahasa is exists
        if (!$request->session()->exists('bahasa')) {
	        $request->session()->put(['bahasa' => 'Indonesia', 'id_bahasa' => 1]);
        }
        
    	$level = Level::all();
    	$mapel = Mapel::all();
    	$bahasa = Bahasa::all();
        $lp_logo = LandingPage::first();
    	
        return view('user.dashboard', compact('level', 'mapel', 'bahasa', 'lp_logo'));
    }

}
