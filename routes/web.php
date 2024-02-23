<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/loginSubmit', [AuthController::class, 'login'])->middleware('guest')->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register/post', [AuthController::class, 'register'])->middleware('guest')->name('register.post');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('home');
    })->middleware('auth')->name('dashboard');

    // Pemandu
    Route::get('/pemandu', [WisataController::class, 'pemanduIndex'])->name('pemandu.index');
    Route::get('/pemandu/create', [WisataController::class, 'pemanduCreate'])->name('pemandu.create');
    Route::post('/pemandu/store', [WisataController::class, 'pemanduStore'])->name('pemandu.store');
    Route::delete('/pemandu/destroy/{id}', [WisataController::class, 'pemanduDestroy'])->name('pemandu.destroy');
    Route::get('/pemandu/edit/{id}', [WisataController::class, 'pemanduEdit'])->name('pemandu.edit');
    Route::put('/pemandu/update/{id}', [WisataController::class, 'pemanduUpdate'])->name('pemandu.update');

    // Tempat Wisata
    Route::get('/tempatWisata', [WisataController::class, 'wisataIndex'])->name('tempatWisata.index');
    Route::get('/tempatWisata/create', [WisataController::class, 'wisataCreate'])->name('tempatWisata.create');
    Route::post('/tempatWisata/store', [WisataController::class, 'wisataStore'])->name('tempatWisata.store');
    Route::delete('/tempatWisata/destroy/{id}', [WisataController::class, 'wisataDestroy'])->name('tempatWisata.destroy');
    Route::get('/tempatWisata/edit/{id}', [WisataController::class, 'wisataEdit'])->name('tempatWisata.edit');
    Route::put('/tempatWisata/update/{id}', [WisataController::class, 'wisataUpdate'])->name('tempatWisata.update');

    // Rumah Makan
    Route::get('/rumahMakan', [WisataController::class, 'rumahMakanIndex'])->name('rumahMakan.index');
    Route::get('/rumahMakan/create', [WisataController::class, 'rumahMakanCreate'])->name('rumahMakan.create');
    Route::post('/rumahMakan/store', [WisataController::class, 'rumahMakanStore'])->name('rumahMakan.store');
    Route::delete('/rumahMakan/destroy/{id}', [WisataController::class, 'rumahMakanDestroy'])->name('rumahMakan.destroy');
    Route::get('/rumahMakan/edit/{id}', [WisataController::class, 'rumahMakanEdit'])->name('rumahMakan.edit');
    Route::put('/rumahMakan/update/{id}', [WisataController::class, 'rumahMakanUpdate'])->name('rumahMakan.update');

    // Toko
    Route::get('/toko', [WisataController::class, 'tokoOlehOlehIndex'])->name('toko.index');
    Route::get('/toko/create', [WisataController::class, 'tokoOlehOlehCreate'])->name('toko.create');
    Route::post('/toko/store', [WisataController::class, 'tokoOlehOlehStore'])->name('toko.store');
    Route::delete('/toko/destroy/{id}', [WisataController::class, 'tokoOlehOlehDestroy'])->name('toko.destroy');
    Route::get('/toko/edit/{id}', [WisataController::class, 'tokoOlehOlehEdit'])->name('toko.edit');
    Route::put('/toko/update/{id}', [WisataController::class, 'tokoOlehOlehUpdate'])->name('toko.update');
});

// halaman pemesanan 
Route::get('/admin_pemesanan', [PemesananController::class, 'admin_pemesanan'])->name('admin.pemesanan');
Route::get('/pemesanan_show/{id}', [PemesananController::class, 'pemesananShow'])->name('pemesanan.show');

Route::get('/', [PemesananController::class, 'pemesananIndex'])->name('pemesanan.index');
Route::get('/pemesanan/tambah/{id}', [PemesananController::class, 'pemesananCreate'])->name('pemesanan.create');
Route::get('/pemesanan', [PemesananController::class, 'pemesananOrder'])->name('pemesanan.order');
Route::post('/proses-pemesanan/{id}', [PemesananController::class, 'pemesananWisata'])->name('pemesanan.wisata');
Route::delete('/pesananWisata/destroy/{id}', [PemesananController::class, 'pesananWisataDestroy'])->name('pesananWisata.destroy');

Route::get('/checkout/{id}', [PembayaranController::class, 'checkoutIndex'])->name('checkout');
Route::post('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
Route::get('/riwayat_bayar', [PembayaranController::class, 'riwayatBayar'])->name('riwayat_pembayaran');
