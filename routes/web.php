<?php

use Illuminate\Support\Facades\Route;

// Halaman pertama yang dibuka adalah Splash Screen
Route::get('/', function () {
    return view('pages.splash');
});

// Halaman Dashboard utama dialihkan ke rute /dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/skp', function () {
    return view('pages.skp');
});

Route::get('/tambah-skp', function () {
    return view('pages.tambah-skp');
});

Route::get('/detail-skp', function () {
    return view('pages.detail-skp');
});

Route::get('/event', function () {
    return view('pages.event');
});

Route::get('/leaderboard', function () {
    return view('pages.leaderboard');
});

Route::get('/panduan', function () {
    return view('pages.panduan');
});