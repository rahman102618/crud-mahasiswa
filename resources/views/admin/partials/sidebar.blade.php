
@php
    // Menu navigasi Admin NESATECH
    $navItems = [
        [
            'page' => 'dashboard',
            'icon' => 'bi-grid-fill',
            'label' => 'Dashboard Statistik'
        ],
        [
            'page' => 'crud-template',
            'icon' => 'bi-check2-square',
            'label' => 'CRUD Template'
        ],
        [
            'page' => 'pesanan',
            'icon' => 'bi-receipt',
            'label' => 'Kelola Pesanan'
        ],
        [
            'page' => 'pengguna',
            'icon' => 'bi-people',
            'label' => 'Kelola Pengguna'
        ],
        [
            'page' => 'laporan',
            'icon' => 'bi-bar-chart',
            'label' => 'Laporan'
        ]
    ];

    // Menu aktif berdasarkan halaman yang dibuka
    $activePage = request()->query(
        'page',
        $activePage ?? 'dashboard'
    );
@endphp


<!-- SIDEBAR DESKTOP -->
<aside class="sidebar d-none d-lg-flex">

    <!-- BRAND -->
    <div class="sidebar-header">

        <div class="brand-title">
            NESATECH
        </div>

        <span class="brand-subtitle">
            Admin Workspace
        </span>

    </div>


    <!-- MENU -->
    <nav class="sidebar-nav" aria-label="Navigasi Admin">

        @foreach ($navItems as $item)

            <a
                href="{{ url('/admin') }}?page={{ $item['page'] }}"
                class="nav-link-custom {{ $activePage === $item['page'] ? 'active' : '' }}"
                data-page="{{ $item['page'] }}"
                @if ($activePage === $item['page'])
                    aria-current="page"
                @endif
            >

                <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>

                <span>
                    {{ $item['label'] }}
                </span>

            </a>

        @endforeach

    </nav>


    <!-- FOOTER SIDEBAR -->
    <div class="sidebar-footer">

        <div class="support-title">
            NESATECH
        </div>

        <div class="support-subtitle">
            Sistem Pemesanan Undangan Digital
        </div>

        <a href="{{ url('/') }}" class="btn-support">

            <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>

            Lihat Website

        </a>

    </div>

</aside>



<!-- SIDEBAR MOBILE -->
<div
    class="offcanvas offcanvas-start offcanvas-sidebar d-lg-none"
    tabindex="-1"
    id="mobileSidebar"
    aria-labelledby="mobileSidebarTitle"
>

    <!-- HEADER MOBILE -->
    <div class="offcanvas-header border-bottom border-secondary border-opacity-25 pb-3">

        <div>

            <div class="brand-title" id="mobileSidebarTitle">
                NESATECH
            </div>

            <span class="brand-subtitle">
                Admin Workspace
            </span>

        </div>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Tutup menu"
        ></button>

    </div>


    <!-- MENU MOBILE -->
    <div class="offcanvas-body d-flex flex-column justify-content-between pt-3">

        <nav class="sidebar-nav" aria-label="Navigasi Admin Mobile">

            @foreach ($navItems as $item)

                <a
                    href="{{ url('/admin') }}?page={{ $item['page'] }}"
                    class="nav-link-custom {{ $activePage === $item['page'] ? 'active' : '' }}"
                    data-page="{{ $item['page'] }}"
                    @if ($activePage === $item['page'])
                        aria-current="page"
                    @endif
                >

                    <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>

                    <span>
                        {{ $item['label'] }}
                    </span>

                </a>

            @endforeach

        </nav>


        <!-- FOOTER MOBILE -->
        <div class="sidebar-footer">

            <div class="support-title">
                NESATECH
            </div>

            <div class="support-subtitle">
                Sistem Pemesanan Undangan Digital
            </div>

            <a href="{{ url('/') }}" class="btn-support">

                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>

                Lihat Website

            </a>

        </div>

    </div>

</div>
