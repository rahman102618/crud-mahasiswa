{{--
    ============================================================
    HALAMAN ADMIN: CRUD TEMPLATE
    ------------------------------------------------------------
    File   : resources/views/admin/crud-template.blade.php
    Route  : GET /admin?page=crud-template
             (nama route: nesatech.admin)
    Layout : layouts.admin  (sidebar + navbar admin)
    ------------------------------------------------------------
    CARA ISI:
    - Tabel di bawah masih kerangka. Tim tinggal isi
      dengan loop data dari database (tabel templates),
      misal: @foreach ($templates as $template)
    - Tombol "Tambah Template" mengarah ke form tambah
      (buat route + view form-nya kalau belum ada).
    - Tombol Ubah/Hapus di tiap baris: arahkan ke route
      edit/hapus template masing-masing.
    ============================================================
--}}

@extends('layouts.admin')

@section('title', 'CRUD Template - NESATECH')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">CRUD Template</h1>
    {{-- TODO (tim): arahkan ke form tambah template --}}
    <a href="#" class="btn btn-primary btn-sm">+ Tambah Template</a>
</div>

{{--
    TODO (tim): ganti baris contoh di bawah dengan
    loop @foreach ($templates as $template).
--}}
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Template</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris contoh (hapus / ganti dengan loop) --}}
                <tr>
                    <td>1</td>
                    <td>Template Contoh</td>
                    <td>Rp149.000</td>
                    <td><span class="badge bg-success">Aktif</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">Ubah</a>
                        <a href="#" class="btn btn-sm btn-outline-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
