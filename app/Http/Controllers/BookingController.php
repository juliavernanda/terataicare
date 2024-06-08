<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Http\Requests\StorebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $dokters = DB::table('dokters')
        ->join('users','users.id_user','=','dokters.id_user')
        ->where('id_dokter', '=', $id)->first();

        return view('booking',['dokters' => $dokters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_dokter' =>'required',
            'tanggal_booking' =>'required',
            'catatan' =>'required',
            ]);

        $booking = DB::table('bookings')->insert($validatedData);

        if($booking){
            return redirect()->route('homeUser')->with('success','Berhasil Booking');
        }
        else{
            return redirect()->back()->with('error','Gagal Booking');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookingRequest $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(booking $booking)
    {
        //
    }
}
