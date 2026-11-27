{{--
    ============================================================
    HALAMAN ADMIN: KELOLA PESANAN
    ------------------------------------------------------------
    File   : resources/views/admin/pesanan.blade.php
    Route  : GET /admin?page=pesanan
             (nama route: nesatech.admin)
    Layout : layouts.admin  (sidebar + navbar admin)
    ------------------------------------------------------------
    CARA ISI:
    - Tabel di bawah masih kerangka. Tim tinggal isi
      dengan loop data dari database (tabel pesanan/orders),
      misal: @foreach ($pesanan as $item)
    - Kolom status bisa: Menunggu, Diproses, Selesai,
      Dibatalkan — sesuaikan dengan kebutuhan tim.
    ============================================================
--}}

@extends('layouts.admin')

@section('title', 'Kelola Pesanan - NESATECH')

@section('content')

<h1 class="h4 mb-3">Kelola Pesanan</h1>

{{--
    TODO (tim): ganti baris contoh di bawah dengan
    loop @foreach ($pesanan as $item).
--}}
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pembeli</th>
                    <th>Template</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris contoh (hapus / ganti dengan loop) --}}
                <tr>
                    <td>INV-0001</td>
                    <td>Nama Pembeli</td>
                    <td>Template Contoh</td>
                    <td>Rp149.000</td>
                    <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
