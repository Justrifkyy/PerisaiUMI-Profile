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

// Contact Route
Route::get('/contact', function () {
    return view('pages.contact.index');
})->name('contact');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // News Management
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);

    // Department Management
    Route::resource('departments', \App\Http\Controllers\Admin\DepartmentController::class);

    // Department Members Management (nested)
    Route::prefix('departments/{department}')->name('departments.')->group(function () {
        Route::get('/members', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'index'])->name('members.index');
        Route::get('/members/create', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'create'])->name('members.create');
        Route::post('/members', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'store'])->name('members.store');
        Route::get('/members/{member}/edit', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'edit'])->name('members.edit');
        Route::put('/members/{member}', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'update'])->name('members.update');
        Route::delete('/members/{member}', [\App\Http\Controllers\Admin\DepartmentMemberController::class, 'destroy'])->name('members.destroy');
    });

    // Statistics Management
    Route::resource('statistics', \App\Http\Controllers\Admin\StatisticController::class);

    // Gallery Management
    Route::resource('gallery', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'edit', 'update']);
});
