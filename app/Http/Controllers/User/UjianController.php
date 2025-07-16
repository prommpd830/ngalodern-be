<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bahasa;
use App\Tes;
use App\Level;
use App\Materi;
use App\MateriProgress;
use App\Hasil;
use App\LandingPage;
use App\Pertanyaan;
use App\MapelProgress;
use App\Leaderboard;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mapel, $level, Request $request)
    {
        // Get session Bahasa
        $idBahasa = $request->session()->get('id_bahasa');
        $lp_logo = LandingPage::first();

        $materi = Materi::where(['id_bahasa' => $idBahasa, 'id_mapel' => $mapel, 'id_level' => $level])->get();
        $materiProgress = MateriProgress::where(['id_mapel' => $mapel, 'id_level' => $level, 'id_user' => Auth::user()->id])->get();
        // $checkUjian = Tes::where(['id_bahasa' => $idBahasa, 'id_mapel' => $mapel, 'id_level' => $level, 'tipe' => 'ujian', 'status' => 2])->first();

        // Check if Ujian is Exist
        // if ($checkUjian) {
        //     $hasilUjian = Hasil::where([
        //         'id_user' => Auth::user()->id,
        //         'id_mapel' => $checkUjian->id_mapel,
        //         'id_level' => $checkUjian->id_level
        //     ])->get();
        // } else {
        //     return abort(404);
        // }
        
        $hasilUjian = Hasil::where([
                'id_user' => Auth::user()->id,
                'id_mapel' => $mapel,
                'id_level' => $level
        ])->get();

        // Check if Hasil Ujian result >= 3
        if (count($hasilUjian) >= 3) {
            return redirect('dashboard')->with('danger', 'Maaf anda tidak bisa melakukan ujian lagi!');
        }

        
        if (count($materi) == 0) {
            // return abort(404);
            
            // Get all data Bahasa
            $bahasa = Bahasa::all();

            $ujian = [];
            $text = 'Maaf anda belum bisa melakukan ujian. Karena materi di Bahasa '. $request->session()->get('bahasa') .' untuk sesi ujian ini belum tersedia';
            return view('user.ujian', compact('bahasa', 'ujian', 'lp_logo', 'text'));
        }

        // Check if All Materi has been complete
        if (count($materi) == count($materiProgress)) {
            
            // Get all data Bahasa
            $bahasa = Bahasa::all();

            $ujian = Tes::where(['id_bahasa' => $idBahasa, 'id_mapel' => $mapel, 'id_level' => $level, 'tipe' => 'ujian', 'status' => 2])->get();
            $text = 'Ujian tidak ditemukan untuk Bahasa '.$request->session()->get('bahasa');
            return view('user.ujian', compact('bahasa', 'ujian', 'lp_logo', 'text'));

            // if ($ujian) {
            //     return view('user.ujian', compact('bahasa', 'ujian', 'lp_logo'));
            // } else {
            //     return abort(404);
            // }

        } else {
            
            // return abort(404);
            
            // Get all data Bahasa
            $bahasa = Bahasa::all();

            $ujian = [];
            $text = 'Maaf anda belum menyelesaikan semua progress materi di Bahasa '. $request->session()->get('bahasa') .' untuk sesi ujian ini. Silahkan selesaikan terlebh dahulu';
            return view('user.ujian', compact('bahasa', 'ujian', 'lp_logo', 'text'));
        }

    }

    public function hasil(Request $request)
    {
        $id = $request->input('id');

        $ujian = Pertanyaan::where('id_tes', $id)->get();
        $jumlahNilai = Pertanyaan::where('id_tes', $id)->sum('nilai');
        $ujianRow = Tes::where('id', $id)->first();
        $getLevel = Level::all();
        $salah = 0;
        $benar = 0;
        $nilai = 0;
        $skor = 0;
        

        foreach ($ujian as $data) {

            $pertanyaan = Pertanyaan::where(['id' => $data->id, 'jawaban' => $request->input($data->id)])->get();
            $pertanyaanSkor = Pertanyaan::find($data->id);

            if (count($pertanyaan) == 0) {
                $salah += 1;
            } else {
                $benar += 1;
                $nilai += $pertanyaanSkor->nilai;
            }
            
        }
        
        $levelMapel = MapelProgress::where(['id_user' => Auth::id(), 'id_mapel' => $ujianRow->id_mapel])->first();

        if ($ujianRow->id_level < count($getLevel)) {
            if ($nilai > $jumlahNilai*70/100) {
                $mapel = MapelProgress::where([
                    'id_user' => Auth::user()->id,
                    'id_mapel' => $ujianRow->id_mapel
                ])->update([
                    'id_level' => $ujianRow->id_level+1
                ]);
                
                $kelulusan = 'lulus';
            } else {
                $mapel = MapelProgress::where([
                    'id_user' => Auth::user()->id,
                    'id_mapel' => $ujianRow->id_mapel
                ])->update([
                    'id_level' => $levelMapel->id_level
                ]);
                $kelulusan = 'remedial';
            }
        } else {
            if ($nilai > $jumlahNilai*70/100) {
                $mapel = MapelProgress::where([
                    'id_user' => Auth::user()->id,
                    'id_mapel' => $ujianRow->id_mapel
                ])->update([
                    'id_level' => $ujianRow->id_level
                ]);
                
                $kelulusan = 'lulus';
            } else {
                $mapel = MapelProgress::where([
                    'id_user' => Auth::user()->id,
                    'id_mapel' => $ujianRow->id_mapel
                ])->update([
                    'id_level' => $levelMapel->id_level
                ]);
                $kelulusan = 'remedial';
            }
        }

        Hasil::create([
            'id_user' => Auth::user()->id,
            'id_mapel' => $ujianRow->id_mapel,
            'id_level' => $ujianRow->id_level,
            'id_ujian' => $id,
            'kelulusan' => $kelulusan,
            'salah' => $salah,
            'benar' => $benar,
            'skor' => $nilai
        ]);

        $level = Level::where('id', $ujianRow->id_level)->first();

        $checkLeaderboard1 = Leaderboard::where([
            'id_user' => Auth::user()->id,
            'id_mapel' => $ujianRow->id_mapel
        ])->first();
        $checkLeaderboard2 = Leaderboard::where([
            'id_user' => Auth::user()->id,
            'id_mapel' => $ujianRow->id_mapel,
            'id_level' => $level->id
        ])->first();

        $getUjian = Tes::where([
            ['id_mapel', '=', $ujianRow->id_mapel],
            ['id_level', '<', count($getLevel)],
            ['tipe', '=', 'ujian'],
            ['status', '=', 2]
        ])->get();

        if ($checkLeaderboard1 === null) {

            foreach ($getUjian as $data) {
                if ($data->skor == null) {
                    $skor += 0;
                } else {
                    $skor += $data->skor->skor;
                }
            }

            Leaderboard::create([
                'id_user' => Auth::user()->id,
                'user' => Auth::user()->name,
                'id_mapel' => $ujianRow->id_mapel,
                'id_level' => $level->id,
                'level' => $level->level,
                'skor' => $skor
            ]);

            $skor = 0;

        } elseif ($checkLeaderboard2 === null) {

            foreach ($getUjian as $data) {
                if ($data->skor == null) {
                    $skor += 0;
                } else {
                    $skor += $data->skor->skor;
                }
            }

            Leaderboard::where([
                'id_user' => Auth::user()->id,
                'id_mapel' => $ujianRow->id_mapel,
            ])->update([
                'id_level' => $level->id,
                'level' => $level->level,
                'skor' => $skor
            ]);

            $skor = 0;

        }


        $getHasil = Hasil::where(['id_user' => Auth::user()->id, 'id_ujian' => $id])->orderBy('skor')->first();

        if (!empty($getHasil)) {
            if ($nilai > $getHasil->skor) {

                foreach ($getUjian as $data) {
                    if ($data->skor == null) {
                        $skor += 0;
                    } else {
                        $skor += $data->skor->skor;
                    }
                }

                Leaderboard::where([
                    'id_user' => Auth::user()->id,
                    'id_mapel' => $ujianRow->id_mapel,
                    'id_level' => $level->id
                ])->update([
                    'skor' => $skor
                ]);
            }
        }
        
        $hasilRemed = Hasil::where([
            'id_user' => Auth::user()->id,
            'id_mapel' => $ujianRow->id_mapel,
            'id_level' => $ujianRow->id_level,
            'kelulusan' => 'remedial'
        ])->get();
        
        if (count($hasilRemed) == 3) {
            Hasil::where([
                'id_user' => Auth::id(),
                'id_mapel' => $ujianRow->id_mapel,
                'id_level' => $ujianRow->id_level
            ])->delete();
            
            MateriProgress::where([
                'id_user' => Auth::id(),
                'id_mapel' => $ujianRow->id_mapel,
                'id_level' => $ujianRow->id_level
            ])->delete();
        }
        

        $sisa = Hasil::where(['id_user' => Auth::user()->id, 'id_ujian' => $id])->get();
        $lp_logo = LandingPage::first();

        if ($mapel) {
            return view('user.hasil_ujian', compact('salah', 'benar', 'nilai', 'sisa', 'lp_logo', 'ujianRow', 'kelulusan'));
        }
    }

}
