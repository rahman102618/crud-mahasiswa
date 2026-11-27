<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'NESATECH')</title>

    <link rel="stylesheet" href="{{ asset('css/rrrj.css') }}">
    <script src="{{ asset('js/rrrj.js') }}" defer></script>
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <a href="{{ route('home') }}" class="logo">
            NESATECH
        </a>

        <nav class="menu">
            <a href="{{ route('template.index') }}">Katalog</a>
            <a href="{{ route('home') }}#cara-kerja">Cara Kerja</a>
        </nav>

        <nav class="akun">
            <a href="{{ route('login') }}">Masuk</a>
            <a href="{{ route('register') }}" class="btn-primary">
                Pesan Sekarang
            </a>
        </nav>
    </header>

    <!-- KONTEN -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">

        <section>
            <h3>NESATECH</h3>
            <p>
                Undangan digital yang elegan,
                sederhana, dan berkesan.
            </p>
        </section>

        <section>
            <h4>Jelajahi</h4>
            <p>
                <a href="{{ route('template.index') }}">
                    Katalog Undangan
                </a>
            </p>
            <p>
                <a href="{{ route('home') }}#cara-kerja">
                    Cara Kerja
                </a>
            </p>
        </section>

        <section>
            <h4>Akun</h4>
            <p>
                <a href="{{ route('login') }}">
                    Masuk
                </a>
            </p>
            <p>
                <a href="{{ route('register') }}">
                    Daftar
                </a>
            </p>
        </section>

    </footer>

</body>
</html>
