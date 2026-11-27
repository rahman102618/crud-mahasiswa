@php
    $activePage = $activePage ?? 'dashboard';

    $pageTitles = [
        'dashboard' => 'Dashboard Statistik',
        'crud-template' => 'CRUD Template',
        'pesanan' => 'Kelola Pesanan',
        'pengguna' => 'Kelola Pengguna',
        'laporan' => 'Laporan',
    ];
@endphp


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', $pageTitles[$activePage] ?? 'Dashboard') - NESATECH
    </title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- BOOTSTRAP ICONS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- CSS ADMIN -->
    <link
        rel="stylesheet"
        href="{{ asset('admin/css/style.css') }}">
</head>

<body data-page="{{ $activePage }}">

    <div class="app-wrapper">

        <!-- SIDEBAR -->
        @include('admin.partials.sidebar')

        <!-- KONTEN -->
        <main class="main-content">

            <!-- NAVBAR -->
            @include('admin.partials.navbar')

            <!-- ISI HALAMAN -->
            <div class="content-body">

                <div class="nesatech-demo-note" role="status">
                    Pratinjau Admin - Data contoh,
                    belum terhubung MySQL
                </div>

                @yield('content')

            </div>

            <!-- FOOTER -->
            <footer class="site-footer text-center">
                Hak Cipta &copy; {{ date('Y') }} NESATECH.
                Seluruh hak dilindungi.
            </footer>

        </main>

    </div>

    <!-- BOOTSTRAP JAVASCRIPT -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- CHART JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js">
    </script>

    <!-- JAVASCRIPT ADMIN -->
    <script src="{{ asset('admin/js/script.js') }}"></script>

</body>
</html>
