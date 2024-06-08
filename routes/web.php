<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangDokterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function(){
    Route::get('/',[HomeController::class, 'homeGuest'])->name('homeGuest');

/*===================== AUTENTIFIKASI ========================  */
Route::get('/register',[AuthController::class, 'register']);

Route::post('/registerpost',[AuthController::class, 'register_post'])->name('register');

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::post('/login',[AuthController::class, 'login_post'])->name('login');

});




/*===================== USER  ========================  */
Route::middleware('auth')->group(function(){
    Route::get('/homeUser',[HomeController::class, 'homeUser'])->name('homeUser');

    Route::get('/doctors',[DokterController::class,'index'])->name('doctors.index');

    Route::get('/profileUser/{id}',[AuthController::class, 'profile'])->name('profile');
    Route::patch('/profileUser/update/{id}',[AuthController::class,'profileUpdate'])->name('profile.update');


/*===================== BOOKING  ========================  */

Route::get('/booking/{id}', [BookingController::class,'index'])->name('booking.index');
Route::post('/booking/create', [BookingController::class,'store'])->name('booking.store');

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');





/*===================== Fitur USER  ========================  */


/*===================== ADMIN  ========================  */
Route::get('/adminHome',[HomeController::class,'homeAdmin'])->name('homeAdmin');

/* ====================== Patients ================= */
Route::get('/patients',[PatientsController::class,'index'])->name('patient.index');
Route::get('/patients/edit/{id}',[PatientsController::class,'edit'])->name('patient.edit');
Route::put('/patients/update/{id}',[PatientsController::class,'update'])->name('patient.update');
Route::delete('patients/delete/{id}',[PatientsController::class,'delete'])->name('patient.delete');

/* ====================== Bidang Doctors ================= */
Route::get('/bidang/doctors',[BidangDokterController::class,'index'])->name('bidang.index');
Route::get('/bidang/create',[BidangDokterController::class,'create'])->name('bidang.create');
Route::post('/bidang/store',[BidangDokterController::class,'store'])->name('bidang.store');
Route::get('/bidang/edit/{id}',[BidangDokterController::class,'edit'])->name('bidang.edit');
Route::put('/bidang/update/{id}',[BidangDokterController::class,'update'])->name('bidang.update');
Route::delete('/bidang/delete/{id}',[BidangDokterController::class,'destroy'])->name('bidang.delete');

/* ====================== Doctors ================= */
Route::get('/doctors/data',[DokterController::class,'indexAdmin'])->name('doctors.data.index');
Route::get('/doctors/create',[DokterController::class,'create'])->name('doctors.create');
Route::post('/doctors/store',[DokterController::class,'store'])->name('doctors.store');
Route::get('/doctors/edit/{id}',[DokterController::class,'edit'])->name('doctors.edit');
Route::put('/doctors/update/{id}',[DokterController::class,'update'])->name('doctors.update');
Route::delete('/doctors/delete/{id}',[DokterController::class,'destroy'])->name('doctors.delete');

/* ====================== Reports ================= */
Route::get('/reports',[ReportsController::class,'index'])->name('reports.index');
Route::delete('reports/delete/{id}',[ReportsController::class,'delete'])->name('reports.delete');

/* ====================== Profile Admin ================= */
    Route::get('/profileAdmin',[AuthController::class,'profileAdmin'])->name('profileAdmin');
    Route::patch('/profileAdmin/update/{id}',[AuthController::class,"profileUpdateAdmin"])->name('profileUpdateAdmin');
/*===================== ADMIN  ========================  */
});
