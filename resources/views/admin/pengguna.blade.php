{{--
    ============================================================
    HALAMAN ADMIN: KELOLA PENGGUNA
    ------------------------------------------------------------
    File   : resources/views/admin/pengguna.blade.php
    Route  : GET /admin?page=pengguna
             (nama route: nesatech.admin)
    Layout : layouts.admin  (sidebar + navbar admin)
    ------------------------------------------------------------
    CARA ISI:
    - Tabel di bawah masih kerangka. Tim tinggal isi
      dengan loop data dari database (tabel users),
      misal: @foreach ($pengguna as $user)
    - Kolom "Peran" berisi: admin / customer.
      (Tabel users perlu kolom role — lihat catatan tim.)
    ============================================================
--}}

@extends('layouts.admin')

@section('title', 'Kelola Pengguna - NESATECH')

@section('content')

<h1 class="h4 mb-3">Kelola Pengguna</h1>

{{--
    TODO (tim): ganti baris contoh di bawah dengan
    loop @foreach ($pengguna as $user).
--}}
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris contoh (hapus / ganti dengan loop) --}}
                <tr>
                    <td>1</td>
                    <td>Nama Pengguna</td>
                    <td>nama@email.com</td>
                    <td><span class="badge bg-secondary">customer</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ubah</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
