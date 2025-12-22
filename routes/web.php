<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// Homepage
Route::get('/', function () {
    return view('pages.home.index');
});

// About Routes
Route::prefix('about')->name('about.')->group(function () {

    Route::get('/sejarah', function () {
        return view('pages.about.sejarah');
    })->name('sejarah');

    Route::get('/visi-misi', function () {
        return view('pages.about.visi-misi');
    })->name('visi-misi');

    Route::get('/struktur', function () {
        return view('pages.about.struktur'); // TODO: Create struktur page
    })->name('struktur');

    Route::get('/departemen', function () {
        return view('pages.about.departemen'); // TODO: Move to pages structure
    })->name('departemen');

    Route::get('/activity', function () {
        return view('pages.about.activity');
    })->name('activity');

});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
