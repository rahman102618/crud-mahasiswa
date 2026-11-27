<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| NESATECH - ADMIN ROUTES
|--------------------------------------------------------------------------
| Route sementara untuk tampilan dashboard.
| Data masih demo dan belum terhubung MySQL.
*/

Route::get('/admin', function (Request $request) {

    // Dashboard demo hanya dapat diakses
    // ketika Laravel berjalan di environment local.
    abort_unless(app()->environment('local'), 404);

    // Daftar halaman Admin
    $pages = [
        'dashboard' => 'dashboard',
        'crud-template' => 'crud-template',
        'pesanan' => 'pesanan',
        'pengguna' => 'pengguna',
        'laporan' => 'laporan'
    ];

    // Halaman yang sedang dibuka
    $page = $request->query('page', 'dashboard');

    // Pastikan nama halaman valid
    abort_unless(
        is_string($page) && array_key_exists($page, $pages),
        404
    );

    // Tentukan Blade berdasarkan menu
    $view = 'admin.' . $pages[$page];

    // Periksa apakah file Blade sudah dibuat
    abort_unless(view()->exists($view), 404);

    return view($view, [
        'activePage' => $page
    ]);

})->name('nesatech.admin');
