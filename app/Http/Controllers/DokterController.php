<?php

namespace App\Http\Controllers;

use App\Models\dokter;
use App\Http\Requests\StoredokterRequest;
use App\Http\Requests\UpdatedokterRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /* USER PAGE */
    public function index()
    {
        $dokters = DB::table('dokters as d')
                    ->select('d.*','u.name','u.gambar_profile','bd.nama_bidang','u.no_telp')
                    ->join('users as u','u.id_user','=','d.id_user')
                    ->join('bidang_dokters as bd','bd.id_bidang','=','d.id_bidang')
                    ->get();
        return view('doctors',['dokters'=>$dokters]);
    }

     /* Admin PAGE */

     public function indexAdmin(){
        $dokters = DB::table('dokters as d')
                    ->select('d.*','u.name','u.gambar_profile','bd.nama_bidang','u.no_telp')
                    ->join('users as u','u.id_user','=','d.id_user')
                    ->join('bidang_dokters as bd','bd.id_bidang','=','d.id_bidang')
                    ->get();
        return view('admin.doctors.index',['dokters' => $dokters]);
     }
    /* */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // $users = DB::table('users')
         //   ->where('role', '=', '0')
           // ->whereNotIn('id_user', function($query) {
             //   $query->select('id_user')->from('dokters');
            //})->get();

        $users = DB::table('users')->where('role','=',0)->get();
        $bidangs = DB::table('bidang_dokters')->get();
        return view('admin.doctors.create',['users' => $users, 'bidangs' => $bidangs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user'=>'required',
            'id_bidang'=> 'required',
            'gambar_profile'=>'required',
            'status' => 'required'
            ]);


        if($request->hasFile('gambar_profile')){
            $gambar = $request->file('gambar_profile')->getClientOriginalName();
            $request->file('gambar_profile')->move(public_path('profile'),$gambar);
            $validatedData['gambar_profile'] = $gambar;
        }

        $tesUpdate = DB::table('users')
                    ->where('id_user', $validatedData['id_user'])
                    ->update(['gambar_profile' => $validatedData['gambar_profile']]);

    if(!$tesUpdate){
        return redirect()->back()->with('error', 'Data gagal diperbarui');
    }

        $validDokter = DB::table('dokters')->insert([
                'id_user'=> $validatedData['id_user'],
                'id_bidang'=> $validatedData['id_bidang'],
                'status'=> $validatedData['status'],
                'created_at' => now(),
            ]);

        if($validDokter){
            return redirect()->route('doctors.data.index')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctors = DB::table('dokters')->where('id_dokter',$id)->first();
        $users = DB::table('users')->where('role','=',0)->get();
        $bidangs = DB::table('bidang_dokters')->get();
        return view('admin.doctors.edit',['doctors'=>$doctors,'users'=>$users,'bidangs'=>$bidangs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_user'=>'required',
            'id_bidang'=> 'required',
            'gambar_profile'=>'required',
           'status' =>'required'
            ]);

        if($request->hasFile('gambar_profile')){
            $cekGambar = DB::table('users')->where('id_user','=', $validatedData['id_user'])->first();
            if($cekGambar->gambar_profile!= null){
                File::delete(public_path('profile').'/'.$cekGambar->gambar_profile);
            }
            $gambar = $request->file('gambar_profile')->getClientOriginalName();
            $request->file('gambar_profile')->move(public_path('profile'),$gambar);
            $validatedData['gambar_profile'] = $gambar;
        }

        $tesUpdate = DB::table('users')
                    ->where('id_user', $validatedData['id_user'])
                    ->update(['gambar_profile' => $validatedData['gambar_profile']]);

        if(!$tesUpdate){
            return redirect()->back()->with('error', 'Data gagal diperbarui');
        }
        $validDokter = DB::table('dokters')->where('id_dokter',$id)->update([
                'id_user'=> $validatedData['id_user'],
                'id_bidang'=> $validatedData['id_bidang'],
               'status'=> $validatedData['status'],
                'updated_at' => now()

                ]);

        if($validDokter){
            return redirect()->route('doctors.data.index')->with('success', 'Data berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokters = DB::table('dokters')->where('id_dokter','=',$id)->delete();

        if($dokters){
            return redirect()->route('doctors.data.index')->with('success', 'Data berhasil dihapus');
        }
        else{
            return redirect()->route('doctors.data.index')->with('error', 'Data gagal dihapus');
        }
    }
}
