<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('about')->name('about.')->group(function () {
    
    Route::get('/sejarah', function () {
        return view('about');
    })->name('sejarah');
    
    Route::get('/visi-misi', function () {
        return view('about-visi-misi');
    })->name('visi-misi');
    
    Route::get('/struktur', function () {
        return view('about-struktur');
    })->name('struktur');
    
    Route::get('/departemen', function () {
        return view('about-departemen');
    })->name('departemen');
});

