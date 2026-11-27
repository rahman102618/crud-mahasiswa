
@php
    $currentAdminPage = $activePage ?? 'dashboard';

    $adminPageTitles = [
        'dashboard' => 'Dashboard Statistik',
        'crud-template' => 'CRUD Template',
        'pesanan' => 'Kelola Pesanan',
        'pengguna' => 'Kelola Pengguna',
        'laporan' => 'Laporan',
    ];
@endphp

<!-- NAVBAR ADMIN NESATECH -->
<header class="top-navbar d-flex align-items-center justify-content-between gap-3">

    <!-- BAGIAN KIRI -->
    <div class="d-flex align-items-center gap-2 flex-grow-1">

        <!-- TOMBOL SIDEBAR MOBILE -->
        <button
            type="button"
            class="mobile-toggle d-lg-none"
            data-bs-toggle="offcanvas"
            data-bs-target="#mobileSidebar"
            aria-controls="mobileSidebar"
            aria-label="Buka menu navigasi">

            <i class="bi bi-list" aria-hidden="true"></i>

        </button>

        <!-- PENCARIAN DASHBOARD -->
        @if ($currentAdminPage === 'dashboard')

            <div class="search-wrap">

                <i class="bi bi-search" aria-hidden="true"></i>

                <input
                    type="search"
                    id="searchInput"
                    placeholder="Cari pesanan terbaru..."
                    aria-label="Cari pesanan terbaru"
                    autocomplete="off">

            </div>

        @else

            <div class="d-flex align-items-center">

                <span class="fw-semibold text-dark">
                    {{ $adminPageTitles[$currentAdminPage] ?? 'Admin NESATECH' }}
                </span>

            </div>

        @endif

    </div>


    <!-- BAGIAN KANAN -->
    <div class="d-flex align-items-center gap-3">

        <!-- IKON NOTIFIKASI (TAMPILAN SAJA) -->
        <span
            class="top-nav-icon"
            title="Notifikasi belum tersedia"
            aria-label="Notifikasi belum tersedia">

            <i class="bi bi-bell" aria-hidden="true"></i>

        </span>


        <!-- PROFIL ADMIN -->
        <div class="user-profile-btn">

            <div class="user-icon-wrap">

                <i
                    class="bi bi-person-circle"
                    aria-hidden="true">
                </i>

            </div>

            <div class="d-none d-sm-block">

                <div class="user-name">
                    Administrator
                </div>

                <div class="user-role">
                    Admin NESATECH
                </div>

            </div>

        </div>

    </div>

</header>
