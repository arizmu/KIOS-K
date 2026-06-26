# Modul Dashboard — Halaman Utama Admin

## Deskripsi

Dashboard admin setelah login. Menampilkan statistik antrian, profil pengguna, kontrol teller, dan antrian terbaru.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/dashboard` | `HomeController@DashboardLayout` |

## Controller

`app/Http/Controllers/HomeController.php`

Hanya return view `pages.dashboard`.

## View

`resources/views/pages/dashboard.blade.php`

### Statistik Cards
- **Antrian Hari Ini** — total pengunjung
- **Sudah Dilayani** — antrian selesai
- **Belum Dilayani** — antrian menunggu
- **Rata-rata Waktu Layanan** — estimasi

### Profil Pengguna
- Avatar, nama, role
- Email, login terakhir
- Link kelola akun

### Kontrol Teller
- Status teller (Aktif/Tutup) — toggle button
- Panggil antrian berikutnya — link ke `/teller`

### Antrian Terbaru
- Tabel: No Antrian, Tipe Layanan, Waktu Ambil, Status, Aksi

### Statistik Minggu Ini
- Total antrian, terlayani, tidak hadir, tingkat layanan

## Catatan

- Data statistik saat ini **static** (belum terhubung ke database real)
- Perlu implementasi query count untuk data real-time
