
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| NESATECH - PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

// Landing Page Public
Route::get('/', function () {
    return view('home');
})->name('home');

// Login
Route::get('/login', function () {
    return view('public.login');
})->name('login');

// Register
Route::get('/register', function () {
    return view('public.register');
})->name('register');

// Katalog Template
Route::get('/template', function () {
    return view('public.katalog');
})->name('template.index');


/*
|--------------------------------------------------------------------------
| NESATECH - ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

require __DIR__ . '/nesatech-admin.php';


/*
|--------------------------------------------------------------------------
| TES SERVER SEMENTARA
|--------------------------------------------------------------------------
*/

Route::get('/cek-nesatech', function () {
    return 'BERHASIL - SERVER MEMBACA PROJECT NESATECH';
});
