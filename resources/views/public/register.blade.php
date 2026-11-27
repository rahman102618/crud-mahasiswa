{{--
    ============================================================
    HALAMAN REGISTER (Public)
    ------------------------------------------------------------
    File   : resources/views/public/register.blade.php
    Route  : GET /register  (nama route: register)
    Layout : layouts.public  (navbar + footer NESATECH)
    ------------------------------------------------------------
    CARA ISI:
    - Form di bawah ini masih kerangka. Tim tinggal isi
      action, validasi, dan pesan error sesuai kebutuhan.
    - Field yang disiapkan: nama lengkap, email,
      kata sandi, konfirmasi kata sandi.
    - Kalau mau tambah field (misal no. HP), tambah
      satu blok <div class="mb-3"> baru di dalam form.
    ============================================================
--}}

@extends('layouts.public')

@section('title', 'Daftar - NESATECH')

@section('content')

<section class="auth-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <h1 class="h4 text-center mb-1">Buat Akun</h1>
                        <p class="text-muted text-center mb-4">
                            Daftar untuk memesan undangan digital.
                        </p>

                        {{--
                            TODO (tim): isi action form ke route register
                            yang memproses pendaftaran, misal:
                            action="{{ route('register.post') }}" method="POST"
                            + tambahkan @csrf
                        --}}
                        <form method="POST" action="#">

                            {{-- Nama lengkap --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" id="name" name="name"
                                       class="form-control"
                                       placeholder="Nama lengkap" required>
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                       class="form-control"
                                       placeholder="nama@email.com" required>
                            </div>

                            {{-- Kata sandi --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" id="password" name="password"
                                       class="form-control"
                                       placeholder="Minimal 8 karakter" required>
                            </div>

                            {{-- Konfirmasi kata sandi --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" id="password_confirmation"
                                       name="password_confirmation"
                                       class="form-control"
                                       placeholder="Ulangi kata sandi" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Daftar
                            </button>

                        </form>

                        <p class="text-center mt-3 mb-0">
                            Sudah punya akun?
                            <a href="{{ route('login') }}">Masuk di sini</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
