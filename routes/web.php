<?php

use App\Models\Dashboard;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;

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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// CMS

Route::get('cms', function () {
    return view('admin.dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::resource('cms/dashboard', DashboardController::class)->middleware('auth');

Route::resource('cms/kelas', KelasController::class)->middleware('auth');

Route::resource('cms/mahasiswa', MahasiswaController::class)->middleware('auth');
Route::post('cms/mahasiswa/addmahasiswa', [MahasiswaController::class, 'store']);
Route::post('cms/mahasiswa/editmahasiswa', [MahasiswaController::class, 'update']);
Route::post('cms/mahasiswa/deletemahasiswa', [MahasiswaController::class, 'destroy']);

Route::resource('cms/dosen', DosenController::class)->middleware('auth');
Route::post('cms/dosen/adddosen', [DosenController::class, 'store']);
Route::post('cms/dosen/editdosen', [DosenController::class, 'update']);
Route::post('cms/dosen/deletedosen', [DosenController::class, 'destroy']);

Route::resource('cms/matakuliah', MataKuliahController::class)->middleware('auth');

// front end

    // login
Route::get('/loginmahasiswa', function () {
    return view('frontend.login.loginmahasiswa');
})->name('login')->middleware('guest');

Route::get('/logindosen', function () {
    return view('frontend.login.logindosen');
})->middleware('guest');
Route::post('/logindosen', [LoginController::class, 'logindosen']);


Route::get('/loginadmin', function () {
    return view('frontend.login.loginadmin');
})->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

    // mainview
Route::get('/', function () {
    return view('frontend.homepage', [
        'title' => 'Homepage'
    ]);
}) -> middleware('auth');

Route::get('/daftarkelas', function () {
    return view('frontend.daftarkelas', [
        'title' => 'Daftar Kelas'
    ]);
})->middleware('auth');

Route::get('/kelasku', function () {
    return view('frontend.kelasku', [
        'title' => 'Kelasku'
    ]);
})->middleware('auth');

Route::get('/tugas', function () {
    return view('frontend.tugas', [
        'title' => 'Tugas'
    ]);
})->middleware('auth');
