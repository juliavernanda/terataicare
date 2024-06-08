<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homeGuest(){
        return view('index');
    }
    public function homeUser(){
        $bookings = DB::table('bookings')
    ->join('users as u','u.id_user','=','bookings.id_user') 
    ->join('dokters','dokters.id_dokter','=','bookings.id_dokter')
    ->join('bidang_dokters','bidang_dokters.id_bidang','=','dokters.id_bidang')
    ->join('users as d', 'd.id_user', '=', 'dokters.id_user')
    ->select('bookings.*', 'u.name as user_name', 'd.name as doctor_name', 'nama_bidang','d.no_telp')
    ->where('bookings.id_user','=',auth()->user()->id_user)
    ->orderByDesc('bookings.id_booking')
    ->get();

        $dokters = DB::table('dokters')
                    ->join('users','users.id_user','=','dokters.id_user')
                    ->join('bidang_dokters','bidang_dokters.id_bidang','=','dokters.id_bidang')
                    ->limit(3)
                    ->get();
        return view('homeUser',['bookings' => $bookings, 'dokters'=>$dokters]);

    }

    public function homeAdmin(){

        $bookings = DB::table('bookings')
                    ->join('users','users.id_user','=','bookings.id_user')
                    ->join('dokters','dokters.id_dokter','=','bookings.id_dokter')
                    ->join('bidang_dokters','bidang_dokters.id_bidang','=','dokters.id_bidang')
                   ->orderByDesc('bookings.id_booking')->limit(1)->get();

        return view('admin.homeAdmin',['bookings' => $bookings]);
    }
}
