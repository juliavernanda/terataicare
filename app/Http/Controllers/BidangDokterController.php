<?php

namespace App\Http\Controllers;

use App\Models\bidangDokter;
use App\Http\Requests\StorebidangDokterRequest;
use App\Http\Requests\UpdatebidangDokterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangs = DB::table('bidang_dokters')->get();
        return view('admin.bidang.index', ['bidangs' => $bidangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bidang' => 'required'
        ]);

        $bidang = DB::table('bidang_dokters')->insert($validatedData);
        if ($bidang) {
            return redirect()->route('bidang.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bidangDokter $bidangDokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bidangs = DB::table('bidang_dokters')->where('id_bidang', $id)->first();
        return view('admin.bidang.edit', ['bidangs' => $bidangs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_bidang' => 'required'
        ]);

        $bidang = DB::table('bidang_dokters')->where('id_bidang', $id)->update($validatedData);

        if ($bidang) {
            return redirect()->route('bidang.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bidang = DB::table('bidang_dokters')->where('id_bidang', $id)->delete();
        if ($bidang) {
            return redirect()->route('bidang.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
    }
}
