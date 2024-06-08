<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function login_post(Request $request){
       $validated= $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8',
        ]);


        if(Auth::attempt($validated)){
            $dokters = DB::table('dokters')->where('id_user',auth()->user()->id_user)->first();
            $request->session()->regenerate();
            if($dokters){
                return redirect()->route('homeAdmin')->with('success','Login successful');
            }
            if(auth()->user()->role == 0){
                return redirect()->route('homeUser')->with('success','Login successful');
            }
            if(auth()->user()->role == 1){
                return redirect()->route('homeAdmin')->with('success','Login successful');
            }


        }
        else{
            return redirect()->route('login')->with('error','Login failed');
        }
    }
    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_telp' => 'required|numeric',
            'password' => 'required|min:8|confirmed',

        ]);

        $users = DB::table('users')->get();

        if (count($users) < 1) {
            $role = 1;
        } else {
            $role = 0;
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $role,
            'no_telp' => $request->input('no_telp'),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } else {
            return redirect()->route('register')->with('error', 'Registrasi Gagal');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function profile($id){
        $users = DB::table('users')->where('id_user','=',$id)->first();
        return view('profile',['users' => $users]);
    }

    public function profileUpdate(Request $request, $id){
    $validatedData  = $request->validate([
        'email'=> 'required|email',
        'password'=> 'required|min:6',
        'name'=> 'required',
        'no_telp'=> 'required',
    ]);

    $user = DB::table('users')->where('id_user', $id)->update([
        'email'=> $validatedData['email'],
        'password'=>  bcrypt($validatedData['password']),
        'name'=> $validatedData['name'],
        'no_telp'=> $validatedData['no_telp'],
    ]);

    if($user){
        return redirect()->route('profile',$id)->with('success','Profile Updated');
    } else {
        return redirect()->back()->with('error','Failed to update profile.');
    }
}


    public function  profileAdmin(){
        //$users = DB::table('users')->where('id_user','=',$id)->first();
        return view('admin.profile.index');
    }

    public function profileUpdateAdmin(Request $request, $id){
    $validatedData  = $request->validate([
        'email'=> 'required|email',
        'password'=> 'required|min:6',
        'name'=> 'required',
        'no_telp'=> 'required',
    ]);

    $user = DB::table('users')->where('id_user', $id)->update([
        'email'=> $validatedData['email'],
        'password'=>  bcrypt($validatedData['password']),
        'name'=> $validatedData['name'],
        'no_telp'=> $validatedData['no_telp'],
    ]);

    if($user){
        return redirect()->route('profileAdmin')->with('success','Profile Updated');
    } else {
        return redirect()->back()->with('error','Failed to update profile.');
    }
}

}
