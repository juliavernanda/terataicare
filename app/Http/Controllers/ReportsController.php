<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index(){
    $bookings = DB::table('bookings')
    ->join('users as u','u.id_user','=','bookings.id_user')
    ->join('dokters','dokters.id_dokter','=','bookings.id_dokter')
    ->join('users as d', 'd.id_user', '=', 'dokters.id_user')
    ->select('bookings.*', 'u.name as username', 'd.name as doctor_name', 'bookings.tanggal_booking')
    ->get();
        return view('admin.reports.index',['bookings'=>$bookings]);
    }

    public function delete($id){
        DB::table('bookings')->where('id_booking', $id)->delete();
        return redirect()->route('reports.index')->with('success', 'Bookings deleted successfully');

    }
}
