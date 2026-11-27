
@extends('layouts.public')

@section('title', 'NESATECH - Undangan Digital')

@section('content')

<!-- HERO PUBLIC -->
<section class="lux-hero">
    <div class="lux-hero__inner">

        <div class="lux-hero__copy">

            <p class="lux-eyebrow hero-enter enter-1">
                Undangan Digital
            </p>

            <h1 class="hero-enter enter-2">
                Setiap momen<br>
                punya <em>cerita.</em>
            </h1>

            <p class="lux-hero__description hero-enter enter-3">
                Undangan digital yang elegan,
                personal, dan mudah dibagikan.
            </p>

            <div class="lux-hero__actions hero-enter enter-4">
                <a href="{{ route('template.index') }}"
                   class="hero-primary">
                    Lihat Katalog →
                </a>

                <a href="{{ route('register') }}"
                   class="hero-secondary">
                    Pesan Sekarang
                </a>
            </div>

        </div>

        <!-- MOCKUP DUA HP -->
        <div class="lux-visual"
             aria-label="Contoh tampilan undangan digital">

            <div class="visual-circle"></div>

            <!-- HP BELAKANG -->
            <div class="phone phone--rear">
                <div class="phone__island"></div>

                <div class="phone__screen phone__screen--photo">

                    <div class="phone-photo">
                        <div class="phone-photo__text">
                            <small>THE WEDDING OF</small>
                            <h3>Our Special Day</h3>
                            <span>20 . 12 . 2026</span>
                        </div>
                    </div>

                    <div class="phone-details">
                        <small>THE CELEBRATION</small>
                        <strong>Made with love</strong>
                        <p>A beautiful beginning</p>
                    </div>

                </div>
            </div>

            <!-- HP DEPAN -->
            <div class="phone phone--front">
                <div class="phone__island"></div>

                <div class="phone__screen phone__screen--paper">

                    <div class="paper-heading">
                        <small>WEDDING INVITATION</small>
                        <h3>Our Story</h3>
                        <p>A celebration of love</p>
                    </div>

                    <div class="paper-photo"></div>

                    <div class="paper-bottom">
                        <span>20 DESEMBER 2026</span>
                        <span class="paper-button">
                            Buka Undangan
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- GELOMBANG -->
    <svg class="lux-wave"
         viewBox="0 0 1440 110"
         preserveAspectRatio="none"
         aria-hidden="true">

        <path
            d="M0,40 C300,125 540,95 810,45 C1070,0 1260,5 1440,55 L1440,110 L0,110 Z"
            fill="#f8f3ed">
        </path>

    </svg>
</section>


<!-- KEUNGGULAN -->
<section class="lux-features" id="fitur">
    <div class="lux-container benefits-layout">

        <div class="benefits-intro" data-reveal>

            <span class="section-kicker">
                KENAPA NESATECH?
            </span>

            <h2>
                Lebih dari sekadar<br>
                <em>undangan.</em>
            </h2>

            <p>
                Satu tempat untuk menyiapkan undangan
                digital yang praktis dan berkesan.
            </p>

            <div class="portrait-row">
                <img
                    src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?w=150&q=75"
                    alt=""
                    loading="lazy">

                <img
                    src="https://images.unsplash.com/photo-1519741497674-611481863552?w=150&q=75"
                    alt=""
                    loading="lazy">

                <img
                    src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=150&q=75"
                    alt=""
                    loading="lazy">

                <img
                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=150&q=75"
                    alt=""
                    loading="lazy">

                <img
                    src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=150&q=75"
                    alt=""
                    loading="lazy">
            </div>

        </div>

        <div class="benefits-panel" data-reveal>

            <h3>Yang Anda Dapatkan</h3>

            <ul class="benefits-list">
                <li><span>✓</span> Pilihan desain undangan modern</li>
                <li><span>✓</span> Personalisasi informasi acara</li>
                <li><span>✓</span> Konfirmasi kehadiran melalui RSVP</li>
                <li><span>✓</span> Galeri foto dan lokasi acara</li>
                <li><span>✓</span> Buku ucapan digital</li>
                <li><span>✓</span> Undangan mudah dibagikan</li>
            </ul>

        </div>

    </div>
</section>


<!-- PILIHAN TEMA -->
<section class="lux-catalog" id="harga">
    <div class="lux-container">

        <header class="catalog-heading" data-reveal>
            <span class="section-kicker">
                KOLEKSI NESATECH
            </span>

            <h2>Pilihan Tema</h2>

            <p>
                Temukan desain yang sesuai dengan momen Anda.
            </p>
        </header>

        <!-- FILTER -->
        <div class="catalog-filters" data-reveal>
            <button type="button"
                    class="filter-chip is-active"
                    data-filter="semua"
                    aria-pressed="true">
                Semua
            </button>

            <button type="button"
                    class="filter-chip"
                    data-filter="modern"
                    aria-pressed="false">
                Modern
            </button>

            <button type="button"
                    class="filter-chip"
                    data-filter="elegan"
                    aria-pressed="false">
                Elegan
            </button>

            <button type="button"
                    class="filter-chip"
                    data-filter="romantis"
                    aria-pressed="false">
                Romantis
            </button>
        </div>

        @php
            $themes = [
                [
                    'name' => 'Modern Sage',
                    'type' => 'modern',
                    'tone' => 'sage',
                    'price' => 'Rp149.000',
                    'photo' => 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?w=600&q=80'
                ],
                [
                    'name' => 'Royal Navy',
                    'type' => 'elegan',
                    'tone' => 'navy',
                    'price' => 'Rp199.000',
                    'photo' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80'
                ],
                [
                    'name' => 'Blush Romance',
                    'type' => 'romantis',
                    'tone' => 'blush',
                    'price' => 'Rp149.000',
                    'photo' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=600&q=80'
                ],
                [
                    'name' => 'Classic Beige',
                    'type' => 'elegan',
                    'tone' => 'beige',
                    'price' => 'Rp179.000',
                    'photo' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&q=80'
                ]
            ];
        @endphp

        <div class="theme-grid">

            @foreach ($themes as $theme)

                <article class="theme-card"
                         data-category="{{ $theme['type'] }}"
                         data-reveal>

                    <div class="theme-art tone-{{ $theme['tone'] }}">

                        <!-- HP BELAKANG -->
                        <div class="theme-phone theme-phone--back">
                            <div class="theme-phone__notch"></div>

                            <div class="theme-phone__paper">
                                <span>WEDDING INVITATION</span>

                                <strong>Our Story</strong>

                                <div class="theme-phone__arch">
                                    <img
                                        src="{{ $theme['photo'] }}"
                                        alt=""
                                        loading="lazy">
                                </div>

                                <small>20.12.2026</small>
                            </div>
                        </div>

                        <!-- HP DEPAN -->
                        <div class="theme-phone theme-phone--front">
                            <div class="theme-phone__notch"></div>

                            <div class="theme-phone__photo">
                                <img
                                    src="{{ $theme['photo'] }}"
                                    alt=""
                                    loading="lazy">

                                <div class="theme-phone__overlay">
                                    <span>THE WEDDING OF</span>
                                    <strong>Our Special Day</strong>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="theme-info">
                        <div>
                            <h3>{{ $theme['name'] }}</h3>
                            <p>{{ ucfirst($theme['type']) }}</p>
                        </div>

                        <strong>{{ $theme['price'] }}</strong>
                    </div>

                    <a href="{{ route('template.index') }}"
                       class="theme-link">
                        Lihat Katalog <span>→</span>
                    </a>

                </article>

            @endforeach

        </div>

        <div class="catalog-bottom" data-reveal>
            <a href="{{ route('template.index') }}"
               class="catalog-all">
                Lihat Semua Tema →
            </a>
        </div>

    </div>
</section>


<!-- CARA KERJA -->
<section class="lux-steps" id="cara-kerja">
    <div class="lux-container">

        <header class="catalog-heading" data-reveal>
            <span class="section-kicker">
                CARA KERJA
            </span>

            <h2>Mudah dalam 3 Langkah</h2>
        </header>

        <div class="steps-grid">

            <article data-reveal>
                <span class="step-number">01</span>
                <h3>Pilih Tema</h3>
                <p>Pilih desain undangan favorit.</p>
            </article>

            <article data-reveal>
                <span class="step-number">02</span>
                <h3>Isi Detail</h3>
                <p>Lengkapi informasi acara.</p>
            </article>

            <article data-reveal>
                <span class="step-number">03</span>
                <h3>Bagikan</h3>
                <p>Kirim tautan kepada tamu.</p>
            </article>

        </div>

    </div>
</section>


<!-- KONTAK -->
<section class="lux-contact" id="kontak">
    <div class="lux-container">

        <header class="catalog-heading" data-reveal>
            <span class="section-kicker">LOKASI</span>
            <h2>Temukan Kami</h2>
            <p>Area Ketintang, Surabaya</p>
        </header>

        <div class="lux-contact__map" data-reveal>
            <iframe
                title="Peta UNESA Kampus Ketintang Surabaya"
                src="https://www.google.com/maps?q=UNESA%20Kampus%20Ketintang%20Surabaya&output=embed"
                width="100%"
                height="360"
                style="border:0"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen>
            </iframe>
        </div>

        <div class="lux-contact__details" data-reveal>

            <div>
                <h3>Ketintang, Surabaya</h3>

                <p>
                    Jl. Ketintang, Ketintang,<br>
                    Kec. Gayungan, Kota Surabaya,<br>
                    Jawa Timur 60231.
                </p>

                <small>
                    Referensi lokasi: UNESA Kampus Ketintang.
                </small>
            </div>

            <a
                href="https://www.google.com/maps/search/?api=1&query=UNESA+Kampus+Ketintang+Surabaya"
                target="_blank"
                rel="noopener noreferrer"
                class="hero-primary">
                Buka Google Maps →
            </a>

        </div>

    </div>
</section>

@endsection
