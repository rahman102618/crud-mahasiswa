
@extends('layouts.admin')

@section('title', 'Dashboard Statistik')

@section('content')

<!-- JUDUL HALAMAN -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">

    <div>
        <h3 class="page-title">
            Dashboard Statistik
        </h3>

        <p class="page-subtitle">
            Kelola bisnis undangan digital NESATECH
            dalam satu workspace.
        </p>
    </div>

    <span class="btn-date-filter mt-1">
        <i class="bi bi-calendar3"></i>
        1 – 30 November 2026
    </span>

</div>


<!-- KARTU STATISTIK -->
<div class="row g-3 mb-4">

    <!-- TOTAL PENDAPATAN -->
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-card-blue h-100">

            <div class="stat-label">
                Total pendapatan
            </div>

            <div class="stat-value">
                Rp24,85 jt
            </div>

            <span class="stat-trend">
                ↗ 18,6% dibanding bulan lalu
            </span>

        </div>

    </div>


    <!-- TOTAL PESANAN -->
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-card-emerald h-100">

            <div class="stat-label">
                Total pesanan
            </div>

            <div class="stat-value">
                326
            </div>

            <span class="stat-trend">
                ↗ 12,4% dibanding bulan lalu
            </span>

        </div>

    </div>


    <!-- TEMPLATE AKTIF -->
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-card-purple h-100">

            <div class="stat-label">
                Template aktif
            </div>

            <div class="stat-value">
                42
            </div>

            <span class="stat-trend">
                6 template baru bulan ini
            </span>

        </div>

    </div>


    <!-- TOTAL PENGGUNA -->
    <div class="col-xl-3 col-md-6">

        <div class="stat-card stat-card-pink h-100">

            <div class="stat-label">
                Total pengguna
            </div>

            <div class="stat-value">
                1.248
            </div>

            <span class="stat-trend">
                ↗ 8,2% dibanding bulan lalu
            </span>

        </div>

    </div>

</div>


<!-- GRAFIK DAN STATUS PESANAN -->
<div class="row g-3 mb-4">

    <!-- GRAFIK PENDAPATAN -->
    <div class="col-lg-8">

        <section class="dashboard-card h-100">

            <div>
                <h4 class="card-title">
                    Tren pendapatan
                </h4>

                <p class="card-subtitle">
                    Total Rp24.850.000
                    &nbsp;•&nbsp;
                    +18,6% dari bulan lalu
                </p>
            </div>

            <!-- Chart.js -->
            <div class="chart-wrap">

                <canvas
                    id="revenueChart"
                    aria-label="Grafik contoh tren pendapatan November 2026"
                    role="img">
                </canvas>

            </div>

            <div class="chart-footer-note">
                Tanggal November 2026
                &nbsp;•&nbsp;
                Pendapatan pesanan lunas
            </div>

        </section>

    </div>


    <!-- STATUS PESANAN -->
    <div class="col-lg-4">

        <section class="dashboard-card h-100">

            <h4 class="card-title">
                Status pesanan
            </h4>

            <div class="status-big-num">
                326
            </div>

            <div class="status-big-label">
                pesanan bulan ini
            </div>

            <div class="status-list">

                <div class="status-row">

                    <span class="status-label">
                        Lunas
                    </span>

                    <span class="status-val val-blue">
                        268
                    </span>

                </div>

                <div class="status-row">

                    <span class="status-label">
                        Pending
                    </span>

                    <span class="status-val val-amber">
                        42
                    </span>

                </div>

                <div class="status-row">

                    <span class="status-label">
                        Dibatalkan
                    </span>

                    <span class="status-val val-red">
                        16
                    </span>

                </div>

            </div>

            <a
                href="{{ route('nesatech.admin', ['page' => 'pesanan']) }}"
                class="btn-manage-orders">

                Lihat kelola pesanan →

            </a>

        </section>

    </div>

</div>


<!-- TABEL PESANAN TERBARU -->
<div class="row g-3">

    <div class="col-12">

        <section class="dashboard-card p-0">

            <!-- HEADER TABEL -->
            <div class="d-flex align-items-center justify-content-between px-4 pt-4 pb-3 gap-3">

                <h4 class="card-title mb-0">
                    Pesanan terbaru
                </h4>

                <a
                    href="{{ route('nesatech.admin', ['page' => 'pesanan']) }}"
                    class="text-primary text-decoration-none"
                    style="font-size: .82rem; font-weight: 600;">

                    Lihat semua →

                </a>

            </div>


            <!-- TABEL -->
            <div class="tbl-wrap">

                <table class="tbl" id="recentOrdersTable">

                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Template</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- PESANAN 1 -->
                        <tr>

                            <td>
                                <span class="link-id">
                                    #INV-0326
                                </span>
                            </td>

                            <td>
                                <span class="txt-name">
                                    Ardi Pratama
                                </span>
                            </td>

                            <td>
                                Modern Sage
                            </td>

                            <td>
                                <span class="txt-price">
                                    Rp149.000
                                </span>
                            </td>

                            <td>
                                <span class="badge-st badge-paid">
                                    Lunas
                                </span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('nesatech.admin', ['page' => 'pesanan']) }}"
                                    class="link-action">

                                    Lihat pesanan →

                                </a>
                            </td>

                        </tr>


                        <!-- PESANAN 2 -->
                        <tr>

                            <td>
                                <span class="link-id">
                                    #INV-0325
                                </span>
                            </td>

                            <td>
                                <span class="txt-name">
                                    Nadia Putri
                                </span>
                            </td>

                            <td>
                                Royal Navy
                            </td>

                            <td>
                                <span class="txt-price">
                                    Rp199.000
                                </span>
                            </td>

                            <td>
                                <span class="badge-st badge-pending">
                                    Pending
                                </span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('nesatech.admin', ['page' => 'pesanan']) }}"
                                    class="link-action">

                                    Lihat pesanan →

                                </a>
                            </td>

                        </tr>


                        <!-- PESANAN 3 -->
                        <tr>

                            <td>
                                <span class="link-id">
                                    #INV-0324
                                </span>
                            </td>

                            <td>
                                <span class="txt-name">
                                    Rizky Aditya
                                </span>
                            </td>

                            <td>
                                Blush Minimal
                            </td>

                            <td>
                                <span class="txt-price">
                                    Rp149.000
                                </span>
                            </td>

                            <td>
                                <span class="badge-st badge-paid">
                                    Lunas
                                </span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('nesatech.admin', ['page' => 'pesanan']) }}"
                                    class="link-action">

                                    Lihat pesanan →

                                </a>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- FOOTER TABEL -->
            <div class="tbl-footer">

                <span class="tbl-info">
                    Menampilkan 3 contoh dari 326 pesanan demo
                </span>

            </div>

        </section>

    </div>

</div>

@endsection
