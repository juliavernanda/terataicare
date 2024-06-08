<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = DB::table('users')->where('role', '=', 0)->get();

        return view('admin.patients.index', ['patients' => $patients]);
    }

    public function edit($id)
    {
        $patients = DB::table('users')->where('id_user', '=', $id)->first();
        return view('admin.patients.edit', ['patients' => $patients]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no_telp' => 'required',
        ]);

        $patient = DB::table('users')->where('id_user', $id);

        $TesUpdate =  $patient->update($validatedData);

        if ($TesUpdate) {
            return redirect()->route('patient.index')->with('success', 'Data Berhasil Di Update');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil di Update');
        }
    }

    public function delete($id){
        $patient = DB::table('users')->where('id_user', $id);

        $TesDelete =  $patient->delete();

        if ($TesDelete) {
            return redirect()->route('patient.index')->with('success', 'Data Berhasil Di Hapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak berhasil di Hapus');
        }
    }
}
