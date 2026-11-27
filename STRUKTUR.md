# STRUKTUR PROYEK — NESATECH (crud-mahasiswa)

Panduan singkat buat tim: file mana untuk apa, dan di mana isi
coding-nya. Struktur ini yang dipakai sekarang. Kalau mau nambah
halaman baru, ikuti pola yang sama.

## Peta folder penting

```
crud-mahasiswa/
├── routes/
│   ├── web.php               → Route public (/, /login, /register, /template)
│   └── nesatech-admin.php    → Route admin (GET /admin?page=...)
├── resources/views/
│   ├── layouts/
│   │   ├── public.blade.php  → Kerangka HALAMAN PUBLIC (navbar + footer)
│   │   └── admin.blade.php   → Kerangka HALAMAN ADMIN (sidebar + navbar)
│   ├── home.blade.php        → Beranda public (GET /)
│   ├── public/               → Halaman PUBLIC (pengunjung)
│   │   ├── login.blade.php       → Form masuk (GET /login)
│   │   ├── register.blade.php    → Form daftar (GET /register)
│   │   └── katalog.blade.php     → Daftar template (GET /template)
│   ├── admin/                → Halaman ADMIN (GET /admin?page=...)
│   │   ├── dashboard.blade.php       → ?page=dashboard
│   │   ├── crud-template.blade.php   → ?page=crud-template
│   │   ├── pesanan.blade.php         → ?page=pesanan
│   │   ├── pengguna.blade.php        → ?page=pengguna
│   │   └── laporan.blade.php         → ?page=laporan
│   └── welcome.blade.php     → Halaman bawaan Laravel (tidak dipakai)
├── public/
│   ├── css/rrrj.css          → CSS halaman public
│   ├── js/rrrj.js            → JS halaman public
│   ├── admin-assets/css/style.css → CSS halaman admin
│   └── admin-assets/js/script.js  → JS halaman admin (butuh Bootstrap + Chart.js via CDN)
├── app/
│   ├── Models/User.php       → Model User (bawaan Laravel)
│   └── Http/Controllers/     → Controller (MASIH KOSONG — tim yang isi)
└── database/migrations/      → Migrasi (baru 3 file bawaan Laravel)
```

## Aturan main

1. **Halaman public** (login, register, katalog, beranda)
   pakai layout `layouts.public`. Di tiap file cukup isi
   `@section('title', ...)` dan `@section('content')`.
   Jangan ubah `layouts/public.blade.php` kecuali mau ganti
   navbar/footer untuk semua halaman public sekaligus.

2. **Halaman admin** (dashboard, crud-template, pesanan,
   pengguna, laporan) pakai layout `layouts.admin`.
   Route-nya satu pintu: `GET /admin?page=NAMA_HALAMAN`.
   Daftar halaman yang dikenali ada di `routes/nesatech-admin.php`
   (array `$pages`). Kalau nambah halaman admin baru:
   - buat file `resources/views/admin/NAMA.blade.php`,
   - tambahkan `'nama' => 'nama'` ke array `$pages` itu.

3. **Isi coding tetap tim yang isi.** File-file di atas
   baru kerangka + komentar `TODO (tim)`. Ganti bagian
   contoh dengan data asli dari database / controller.

4. **CSS/JS:**
   - Public: `public/css/rrrj.css` + `public/js/rrrj.js`
   - Admin: `public/admin-assets/css/style.css` +
     `public/admin-assets/js/script.js`
   - Admin memakai Bootstrap 5 + Chart.js via CDN
     (sudah dimuat di `layouts/admin.blade.php`).

5. **Database (MySQL `crud_mahasiswa`):** baru ada 9 tabel
   bawaan Laravel. Tabel bisnis (templates, pesanan,
   undangan, tamu, rsvp, ucapan) + kolom `role` di users
   BELUM dibuat — itu langkah berikut, setelah struktur
   view ini beres.

## Cek cepat (dari Mini PC)

```
curl -s -o /dev/null -w '%{http_code}\n' http://127.0.0.1:8000/
curl -s -o /dev/null -w '%{http_code}\n' http://127.0.0.1:8000/login
curl -s -o /dev/null -w '%{http_code}\n' http://127.0.0.1:8000/register
curl -s -o /dev/null -w '%{http_code}\n' http://127.0.0.1:8000/template
curl -s -o /dev/null -w '%{http_code}\n' 'http://127.0.0.1:8000/admin'
curl -s -o /dev/null -w '%{http_code}\n' 'http://127.0.0.1:8000/admin?page=crud-template'
```

Semua harus 200. Kalau ada yang 500/404, lihat
`storage/logs/laravel.log`.
