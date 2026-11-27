{{--
    ============================================================
    HALAMAN KATALOG TEMPLATE (Public)
    ------------------------------------------------------------
    File   : resources/views/public/katalog.blade.php
    Route  : GET /template  (nama route: template.index)
    Layout : layouts.public  (navbar + footer NESATECH)
    ------------------------------------------------------------
    CARA ISI:
    - Bagian "daftar template" di bawah masih kerangka.
      Tim tinggal ganti kartu contoh dengan loop data
      dari database (tabel templates), misal:
        @foreach ($templates as $template)
            ... kartu template ...
        @endforeach
    - Tiap kartu: gambar, nama template, harga, tombol
      "Lihat" / "Pesan". Link pesan mengarah ke register
      atau ke halaman detail template (kalau sudah dibuat).
    ============================================================
--}}

@extends('layouts.public')

@section('title', 'Katalog Template - NESATECH')

@section('content')

<section class="katalog-section py-5">
    <div class="container">

        <h1 class="h3 text-center mb-1">Katalog Template</h1>
        <p class="text-muted text-center mb-4">
            Pilih template undangan digital favoritmu.
        </p>

        {{--
            TODO (tim): ganti grid contoh di bawah dengan
            loop @foreach ($templates as $template).
            Data $templates dikirim dari controller/route.
        --}}
        <div class="row g-4">

            {{-- Kartu contoh 1 (hapus / ganti dengan loop) --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Template Contoh 1</h2>
                        <p class="card-text text-muted">
                            Deskripsi singkat template.
                        </p>
                        <p class="fw-bold mb-2">Rp149.000</p>
                        <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Pesan</a>
                    </div>
                </div>
            </div>

            {{-- Kartu contoh 2 (hapus / ganti dengan loop) --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Template Contoh 2</h2>
                        <p class="card-text text-muted">
                            Deskripsi singkat template.
                        </p>
                        <p class="fw-bold mb-2">Rp149.000</p>
                        <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Pesan</a>
                    </div>
                </div>
            </div>

            {{-- Kartu contoh 3 (hapus / ganti dengan loop) --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 card-title">Template Contoh 3</h2>
                        <p class="card-text text-muted">
                            Deskripsi singkat template.
                        </p>
                        <p class="fw-bold mb-2">Rp149.000</p>
                        <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Pesan</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
