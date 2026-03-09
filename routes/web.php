<?php

use Illuminate\Support\Facades\Route;

// --- AUTH CONTROLLER ---
use App\Http\Controllers\Auth\AuthController;

// --- FRONTEND CONTROLLERS ---
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\CompetitionController;
use App\Http\Controllers\Frontend\ContactController;

// --- ADMIN CONTROLLERS ---
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DepartmentMemberController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// PUBLIC ROUTES (FRONTEND)
// ==========================================

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Routes
// CONTOH ROUTES WEB.PHP
Route::prefix('about')
    ->name('about.')
    ->group(function () {
        Route::get('/sejarah', function () {
            return view('pages.about.sejarah');
        })->name('sejarah');
        Route::get('/visi-misi', function () {
            return view('pages.about.visi-misi');
        })->name('visi-misi');

        // Rute Baru
        Route::get('/bagan', function () {
            return view('pages.about.bagan');
        })->name('bagan');
        Route::get('/sumberdaya', function () {
            return view('pages.about.sumberdaya.index');
        })->name('sumberdaya');
    });

// Activity Route
Route::prefix('activity')
    ->name('activity.')
    ->group(function () {
        Route::get('/', function () {
            return view('pages.activity.index');
        })->name('index');
        Route::get('/proker', function () {
            return view('pages.activity.proker');
        })->name('proker');
        Route::get('/news', function () {
            return view('pages.activity.news');
        })->name('news');
        Route::get('/proker/detail', function () {
            return view('pages.activity.detailproker');
        })->name('detailproker');
        Route::get('/news/detail', function () {
            return view('pages.activity.detailnews');
        })->name('detailnews');
    });
// Competition Route
Route::prefix('competition')
    ->name('competition.')
    ->group(function () {
        Route::get('/', function () {
            return view('pages.competition.index');
        })->name('index');

        // Rute menuju halaman show/detail
        Route::get('/detail', function () {
            return view('pages.competition.show');
        })->name('show');
    });
// Contact Route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send'); // Rute untuk menangani form kontak

// ==========================================
// AUTHENTICATION ROUTES
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// ADMIN PANEL ROUTES
// ==========================================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // News Management
        Route::resource('news', NewsController::class);

        // Department Management
        Route::resource('departments', DepartmentController::class);

        // Department Members Management (Nested Routes)
        Route::prefix('departments/{department}')
            ->name('departments.')
            ->group(function () {
                Route::get('/members', [DepartmentMemberController::class, 'index'])->name('members.index');
                Route::get('/members/create', [DepartmentMemberController::class, 'create'])->name('members.create');
                Route::post('/members', [DepartmentMemberController::class, 'store'])->name('members.store');
                Route::get('/members/{member}/edit', [DepartmentMemberController::class, 'edit'])->name('members.edit');
                Route::put('/members/{member}', [DepartmentMemberController::class, 'update'])->name('members.update');
                Route::delete('/members/{member}', [DepartmentMemberController::class, 'destroy'])->name('members.destroy');
            });

        // Statistics Management
        Route::resource('statistics', StatisticController::class);

        // Gallery Management
        Route::resource('gallery', GalleryController::class)->except(['create', 'edit', 'update']);
    });