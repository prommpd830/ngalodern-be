<?php

namespace App\Http\Controllers\Admin;

use App\Bahasa;
use App\Leaderboard;
use App\Http\Controllers\Controller;
use App\LandingPage;
use App\Hasil;
use App\MapelProgress;
use App\MateriProgress;
use App\Level;
use App\Mapel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id_role', 3)->get();
        $lp_logo = LandingPage::first();
        $mapel = Mapel::all();
        return view('admin.user.users', compact('users', 'lp_logo', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $lp_logo = LandingPage::first();
        return view('admin.tambah_user', compact('lp_logo', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        $data = request()->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'nullable',
            'id_role' => 'required',
            'npm' => 'nullable|min:15',
            'nisn' => 'nullable|min:10',
            'name' => 'required',
            'no_telp' => 'required|max:13',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // hashing password
        $data['password'] = Hash::make(request('password')); 

        // image upload
        if(request()->hasfile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/profile/', $filename);
            $data['image'] = $filename;
        }

        // save to db
        $user_id = $user->create($data);

        $mapel = Mapel::all();

        foreach ($mapel as $m) {
            MapelProgress::create([
                'id_user' => $user_id->id,
                'id_mapel' => $m->id,
                'id_level' => 1
            ]);
        }
        
        if(request('id_role') == 2){
            return redirect('/editor')->with('success', 'User berhasil ditambahkan');
        }

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $leader = Leaderboard::where('id_user', $id)->orderBy('skor', 'DESC')->get();
      $mapelProgress = MapelProgress::where('id_user', $id)->get();
      $level = Level::all();
      $mapel = Mapel::all();
      $bahasa = Bahasa::all();
      $lp_logo = LandingPage::first();
      $data = User::where('id', $id)->first();
      $hasil = Hasil::where('id_user', $id)->orderBy('skor', 'DESC')->get();
      return view('admin.detail_user', compact('data', 'level', 'mapel', 'bahasa', 'lp_logo', 'leader', 'hasil', 'mapelProgress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $lp_logo = LandingPage::first();
        return view('admin.edit_user', compact('data', 'lp_logo'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'no_telp' => 'required|max:13',
        ]);

        // image upload
        if(request()->hasfile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/profile/', $filename);
            $data['image'] = $filename;
        }

        // save to db
        $user->update($data);
        
        return redirect()->back()->with('success', 'User berhasil diedit');
    }

    public function changeEmail(Request $request, $id)
    {
        $user = User::find($id);
        if(Hash::check($request->password, $user->password)) {

            $data = request()->validate(['email' => 'required|string|email|max:255|unique:users']);
            $user->update($data);

            return redirect()->back()->with('success', 'Email berhasil di ubah');

        } else {

            return redirect()->back()->with('error', 'Password tidak sama, email gagal diubah, Lupa Password?');

        }
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        if(Hash::check($request->current_password, $user->password)) {

            $data = request()->validate(['password' => 'required','string','min:8','confirmed']);

            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->back()->with('success', 'Password berhasil di ubah');

        } else {

            return redirect()->back()->with('error', 'Password terakhir salah');

        }
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        MapelProgress::where('id_user', $id)->delete();
        MateriProgress::where('id_user', $id)->delete();
        Hasil::where('id_user', $id)->delete();
        Leaderboard::where('id_user', $id)->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }


    public function createPDF() {
        // retreive all records from db
        $data = User::where('id_role', 3)->get();
  
        // share data to view
        view()->share('user',$data);
        $pdf = PDF::loadView('editor.export', compact('data'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
        
        return view('editor.export', compact('data'));
      }

    public function editProfile($id)
    {
        $data = User::find($id);
        $lp_logo = LandingPage::first();
        return view('edit_profile', compact('data', 'lp_logo'));
    }
}
