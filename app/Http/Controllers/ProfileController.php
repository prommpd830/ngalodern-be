<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Bahasa;
use App\Hasil;
use App\LandingPage;
use App\Leaderboard;
use App\Mapel;
use App\MapelProgress;
use App\Level;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all data Bahasa
        $bahasa = Bahasa::all();
        $mapel = Mapel::all();
        $mapelProgress = MapelProgress::where('id_user', Auth::user()->id)->get();
        $level = Level::all();
        $hasil = Hasil::where('id_user', Auth::user()->id)->orderBy('skor', 'DESC')->get();
        $lp_logo = LandingPage::first();

        return view('profile', compact('bahasa', 'mapel', 'mapelProgress', 'level', 'hasil', 'lp_logo'));
    }

    public function uploadCropImage(Request $request)
    {
        $id = $request->id;
        $folderPath = public_path('upload/profile/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = 'upload/profile/'.$imageName;
        
        file_put_contents($imageFullPath, $image_base64);
 
         $data = [
            'image' => $imageName
         ];

         User::where('id', $id)->update($data);
    
        return response()->json([
            'status'=> true,
            'text' => 'Foto Berhasil di upload!'
        ]);
    }
    
    public function edit()
    {
        $lp_logo = LandingPage::first();
        $bahasa = Bahasa::all();
        $data = User::find(Auth::user()->id);
        return view('edit_profile', compact('bahasa','data', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'no_telp' => 'required|max:13',
        ]);

        // image upload
        // if(request()->hasfile('image')) {
        //     $file = request()->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('upload/profile/', $filename);
        //     $data['image'] = $filename;
        // }
        
        // save to db
        User::where('id', Auth::user()->id)->update($data);
        
        return redirect()->back()->with('success', 'User berhasil diedit');
    }

    public function changeEmail(Request $request, User $user)
    {
        if(Hash::check($request->password, Auth::user()->password)) {

            $data = request()->validate(['email' => 'required|string|email|max:255|unique:users']);
            User::where('id', Auth::user()->id)->update($data);

            return redirect()->back()->with('success', 'Email berhasil di ubah');

        } else {

            return redirect()->back()->with('error', 'Password tidak sama, email gagal diubah, Lupa Password?');

        }
    }
    

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->current_password, Auth::user()->password)) {

            $data = request()->validate(['password' => 'required','string','min:8','confirmed']);

            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->back()->with('success', 'Password berhasil di ubah');

        } else {

            return redirect()->back()->with('error', 'Password terakhir salah');

        }
    }
    
    
    public function hasilDestroy($id){
        Hasil::where('id', $id)->delete();
        return back()->with('success', 'Riwayat ujian berhasil dihapus');
    }
}