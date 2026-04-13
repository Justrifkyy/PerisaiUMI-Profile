<?php

use Illuminate\Support\Facades\Route;

// --- AUTH CONTROLLER ---
use App\Http\Controllers\Auth\AuthController;

// --- FRONTEND CONTROLLERS ---
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;

// --- ADMIN CONTROLLERS ---
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DepartmentMemberController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\WorkProgramController;
use App\Http\Controllers\Admin\CompetitionController as AdminCompetitionController;
use App\Http\Controllers\Admin\InboxMessageController;

// --- FRONTEND CONTROLLERS (Additional) ---
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\CompetitionController;

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
Route::prefix('about')
    ->name('about.')
    ->group(function () {
        Route::get('/sejarah', [AboutController::class, 'sejarah'])->name('sejarah');
        Route::get('/visi-misi', [AboutController::class, 'visiMisi'])->name('visi-misi');
        Route::get('/struktur', [AboutController::class, 'struktur'])->name('struktur');
        Route::get('/bagan', [AboutController::class, 'bagan'])->name('bagan');
        Route::get('/sumberdaya', [AboutController::class, 'sumberDaya'])->name('sumberdaya');
        Route::get('/departemen/{slug}', [AboutController::class, 'departemenDetail'])->name('departemen.detail');
    });

// Activity Routes
Route::prefix('activity')
    ->name('activity.')
    ->group(function () {
        Route::get('/', [ActivityController::class, 'index'])->name('index');
        Route::get('/proker', [ActivityController::class, 'proker'])->name('proker');
        Route::get('/proker/{slug}', [ActivityController::class, 'detailProker'])->name('proker.detail');
        Route::get('/news/{slug}', [ActivityController::class, 'detailNews'])->name('news.detail');
    });

// Competition Routes
Route::prefix('competition')
    ->name('competition.')
    ->group(function () {
        Route::get('/', [CompetitionController::class, 'index'])->name('index');
        Route::get('/{slug}', [CompetitionController::class, 'detail'])->name('detail');
    });

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

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

        // Web Settings Management (only 1 row)
        Route::get('/web-settings', [WebSettingController::class, 'index'])->name('web-settings.index');
        Route::put('/web-settings', [WebSettingController::class, 'update'])->name('web-settings.update');

        // Members Management (Standalone)
        Route::resource('members', MemberController::class);

        // Work Programs Management
        Route::resource('work-programs', WorkProgramController::class);

        // Competitions Management
        Route::resource('competitions', AdminCompetitionController::class);

        // Inbox Messages Management
        Route::get('/inbox', [InboxMessageController::class, 'index'])->name('inbox.index');
        Route::get('/inbox/{message}', [InboxMessageController::class, 'show'])->name('inbox.show');
        Route::put('/inbox/{message}/mark-as-read', [InboxMessageController::class, 'markAsRead'])->name('inbox.mark-as-read');
        Route::put('/inbox/{message}/mark-as-unread', [InboxMessageController::class, 'markAsUnread'])->name('inbox.mark-as-unread');
        Route::delete('/inbox/{message}', [InboxMessageController::class, 'destroy'])->name('inbox.destroy');
        Route::post('/inbox/destroy-multiple', [InboxMessageController::class, 'destroyMultiple'])->name('inbox.destroy-multiple');

        // Gallery Management
        Route::resource('gallery', GalleryController::class)->except(['create', 'edit', 'update']);
    });
