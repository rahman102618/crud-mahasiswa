{{--
    ============================================================
    HALAMAN ADMIN: LAPORAN
    ------------------------------------------------------------
    File   : resources/views/admin/laporan.blade.php
    Route  : GET /admin?page=laporan
             (nama route: nesatech.admin)
    Layout : layouts.admin  (sidebar + navbar admin)
    ------------------------------------------------------------
    CARA ISI:
    - Kartu ringkasan di bawah masih contoh.
      Tim tinggal ganti angka dengan data dari database
      (hitung dari tabel pesanan/templates/users).
    - Kalau mau tambah grafik, pakai Chart.js (sudah
      dimuat di layouts/admin.blade.php). Contoh grafik
      ada di admin/dashboard.blade.php — bisa dicontoh.
    ============================================================
--}}

@extends('layouts.admin')

@section('title', 'Laporan - NESATECH')

@section('content')

<h1 class="h4 mb-3">Laporan</h1>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Total Pesanan</p>
                {{-- TODO (tim): ganti dengan hitungan dari database --}}
                <h2 class="h4 mb-0">0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Total Pendapatan</p>
                {{-- TODO (tim): ganti dengan hitungan dari database --}}
                <h2 class="h4 mb-0">Rp0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Total Pengguna</p>
                {{-- TODO (tim): ganti dengan hitungan dari database --}}
                <h2 class="h4 mb-0">0</h2>
            </div>
        </div>
    </div>
</div>

{{--
    TODO (tim): tambah tabel / grafik laporan di sini.
    Contoh grafik Chart.js ada di admin/dashboard.blade.php.
--}}

@endsection
