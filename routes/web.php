<?php

use App\Http\Controllers\AppConfigController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemanggilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TellerController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/display', fn () => view('display'))->name('display');
Route::get('display-data', [DisplayController::class, 'displayData']);
Route::get('/antrian', fn () => view('antrian-tiket'))->name('antrian');
Route::post('/create-tiket-new', [TicketController::class, 'newTiket']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', fn () => view('login'))->name('login');
    Route::post('/login-action', [LoginController::class, 'login'])->name('login.action');
    Route::controller(TicketController::class)->group(function () {
        Route::post('/create-ticket', 'createTiket')->name('create-ticket');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [HomeController::class, 'DashboardLayout'])->name('dashboard');
    Route::get('/statistik-hello', [HomeController::class, 'statistikHello']);
    Route::get('/statistik-teller', [HomeController::class, 'statistikTeller']);
    Route::get('/statistik-mingguan', [HomeController::class, 'statistikMingguan']);

    Route::group([
        'prefix' => 'teller',
        'controller' => TellerController::class,
    ], function () {
        Route::middleware('admin')->group(function () {
            Route::get('/', 'TellerLayouts')->name('teller');
            Route::get('/loket', 'getLokets')->name('teller.lokets');
            Route::post('/loket', 'store')->name('teller.lokets.store');
            Route::put('/loket/{id}', 'update')->name('teller.lokets.update');
            Route::delete('/loket/{id}', 'destroy')->name('teller.lokets.destroy');
        });
        Route::post('/buka-loket', 'bukaLoket')->name('teller.buka-loket');
        Route::post('/tutup-loket', 'tutupLoket')->name('teller.tutup-loket');
        Route::get('/my-loket-active', 'getMyLoketActive')->name('teller.my-loket-active');
    });

    Route::group([
        'prefix' => 'pengguna',
        'controller' => PenggunaController::class,
        'middleware' => ['admin'],
    ], function () {
        Route::get('/', 'PenggunaLayouts')->name('pengguna');
        Route::get('/users', 'getPenggunas')->name('pengguna.users');
        Route::post('/user-store', 'store')->name('pengguna.users.store');
        Route::put('/users/{id}', 'update')->name('pengguna.users.update');
        Route::delete('/users/{id}', 'destroy')->name('pengguna.users.destroy');
    });

    Route::group([
        'prefix' => 'pemanggil',
        'controller' => PemanggilController::class,
    ], function () {
        Route::get('/', 'PemanggilLayouts')->name('pemanggil');
        Route::get('/antrian', 'getAntrian')->name('pemanggil.antrian');
        Route::post('/panggil-antrian/{key}', 'panggilAntrian');
        Route::get('/selesai-layanan/{key}', 'selesaiLayanan');
    });

    Route::group([
        'prefix' => 'app-config',
        'controller' => AppConfigController::class,
        'middleware' => ['admin'],
    ], function () {
        Route::get('/', 'index')->name('app-config');
        Route::get('/data', 'getConfigs')->name('app-config.data');
        Route::post('/update', 'update')->name('app-config.update');
        Route::post('/upload-logo', 'uploadLogo')->name('app-config.upload-logo');
        Route::delete('/logo', 'deleteLogo')->name('app-config.delete-logo');
    });
});
