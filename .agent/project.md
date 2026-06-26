# KiosK Antrian

## Tujuan

Project ini adalah sistem **kiosk antrian** untuk instansi/pelayanan publik. 
Alur utama: pengunjung **ambil tiket antrian** → **menunggu dipanggil** → **dilayani**

## Fitur Utama

1. **Ambil tiket** — pengunjung mengambil tiket antrian via kiosk
2. **Panggil antrian** — petugas memanggil antrian via dashboard
3. **Loket** — pengaturan loket pelayanan [**Buka tutup loket**]
4. **Viewer Antrian** — display antrian untuk pengunjung di ruang tunggu dengan mekanisme menggunakan **Laravel Reverb** untuk real-time panggilan antrian dengan popup yang menampilkan nomor antrian dan loket yang dipanggil dengan suara / voice memanggil nomor antrian yang dipanggil oleh petugas.

Target pengguna: kantor pelayanan publik


## Tech Stack

**Backend** => Laravel ^13.8
**Database** => SQLite (dev)
**Frontend** => Blade + Alpine.js ^3.15 -> Template & reaktivitas 
**CSS** => Tailwind CSS ^4.0 + FlyonUI ^2.4
**Icons** => Iconify
**HTTP Client** =? Axios ^1.18 
**Build** => Vite 
**Real-time** => Laravel Reverb ^1.0 + Echo ^2.3 + Pusher.js ^8.5

## Konvensi Penting

- Semua blade view di `resources/views/`
- gunakan Alpine.js reaktivitas
- gunakan Axios untuk HTTP request
- gunakan Tailwind CSS untuk styling
- gunakan FlyonUI untuk komponen UI
- gunakan Iconify untuk ikon
- Tidak ada SPA routing — setiap halaman adalah full page load Blade

## Batasan Scope

**Tidak** menggunakan Laravel Livewire atau Inertia.js
**Tidak** menggunakan Vue.js atau React.js
**Tidak** menggunakan Laravel Breeze atau Jetstream
**Tidak** ada fitur pembayaran
**Tidak** ada fitur reservasi/booking jadwal
**Tidak** ada multi-cabang / multi-instansi (single tenant)

