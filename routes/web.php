<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyusutanController;
use App\Http\Controllers\PemeliharaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', function () {
    return view('layouts.index');
});

Route::get('/tambah', function () {
    return view('layouts.tambah');
});

Route::get('/daftar',[AsetController::class,'index'])->name('daftar');

Route::post('/insert',[AsetController::class,'insert'])->name('insert');

Route::get('/delete/{nama}',[AsetController::class,'delete'])->name('delete');

Route::get('/tampil/{nama_aset}',[AsetController::class,'tampil'])->name('layouts.tampil');

Route::get('/detail/{nama_aset}',[AsetController::class,'detail'])->name('layouts.detail');

Route::post('/edit/{nama_aset}',[AsetController::class,'edit'])->name('edit');

Route::get('/back',[AsetController::class,'back'])->name('back');

Route::get('/export',[AsetController::class,'export'])->name('export');

Route::get('/info',[AsetController::class,'info'])->name('info');


Route::get('/tambahpeny',[PenyusutanController::class,'tambah'])->name('tambah');

Route::get('/daftarpeny',[PenyusutanController::class,'index'])->name('daftarpeny');

Route::post('/insertpeny',[PenyusutanController::class,'insert'])->name('insert');

Route::get('/deletepeny/{id_penyusutan}',[PenyusutanController::class,'delete'])->name('delete');

Route::get('/tampilpeny/{id_penyusutan}',[PenyusutanController::class,'tampil'])->name('tampil');

Route::post('/editpeny/{id_penyusutan}',[PenyusutanController::class,'edit'])->name('edit');

Route::get('/backpeny',[PenyusutanController::class,'back'])->name('back');

Route::get('/exportpeny',[PenyusutanController::class,'export'])->name('export');


Route::get('/tambahpem',[PemeliharaanController::class,'tambah'])->name('tambah');

Route::get('/daftarpem',[PemeliharaanController::class,'index'])->name('daftarpem');

Route::post('/insertpem',[PemeliharaanController::class,'insert'])->name('insert');

Route::get('/deletepem/{id_Pemeliharaan}',[PemeliharaanController::class,'delete'])->name('delete');

Route::get('/tampilpem/{id_Pemeliharaan}',[PemeliharaanController::class,'tampil'])->name('tampil');

Route::post('/editpem/{id_Pemeliharaan}',[PemeliharaanController::class,'edit'])->name('edit');

Route::get('/backpem',[PemeliharaanController::class,'back'])->name('back');

Route::get('/exportpem',[PemeliharaanController::class,'export'])->name('export');


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginaction',[LoginController::class,'loginaction'])->name('loginaction');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

