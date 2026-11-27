{{--
    ============================================================
    HALAMAN LOGIN (Public)
    ------------------------------------------------------------
    File   : resources/views/public/login.blade.php
    Route  : GET /login  (nama route: login)
    Layout : layouts.public  (navbar + footer NESATECH)
    ------------------------------------------------------------
    CARA ISI:
    - Form di bawah ini masih kerangka. Tim tinggal isi
      action, validasi, dan pesan error sesuai kebutuhan.
    - Semua input memakai class Bootstrap (form-control).
    - Kalau mau ganti desain, ubah class di sini saja,
      jangan ubah layouts/public.blade.php.
    ============================================================
--}}

@extends('layouts.public')

@section('title', 'Masuk - NESATECH')

@section('content')

<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <h1 class="h4 text-center mb-1">Masuk</h1>
                        <p class="text-muted text-center mb-4">
                            Masuk ke akun NESATECH kamu.
                        </p>

                        {{--
                            TODO (tim): isi action form ke route login
                            yang memproses autentikasi, misal:
                            action="{{ route('login.post') }}" method="POST"
                            + tambahkan @csrf
                        --}}
                        <form method="POST" action="#">

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control"
                                       placeholder="nama@email.com" required>
                                {{-- TODO: tampilkan error validasi email di sini --}}
                            </div>

                            {{-- Kata sandi --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" id="password" name="password"
                                       class="form-control"
                                       placeholder="Kata sandi" required>
                                {{-- TODO: tampilkan error validasi password di sini --}}
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Masuk
                            </button>

                        </form>

                        <p class="text-center mt-3 mb-0">
                            Belum punya akun?
                            <a href="{{ route('register') }}">Daftar di sini</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
