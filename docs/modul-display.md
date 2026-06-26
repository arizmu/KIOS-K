# Modul Display — Layar Antrian

## Deskripsi

Modul display menampilkan nomor antrian yang sedang dipanggil secara real-time di layar besar. Idealnya diletakkan di TV/monitor di ruang tunggu. Ada beberapa versi display (eksperimental dengan TTS).

## Route

| Method | URI | View |
|--------|-----|------|
| GET | `/display` | `display.blade.php` (public) |

## Versi Display

| File | Keterangan |
|------|------------|
| `display.blade.php` (**utama**) | Display utama dengan glassmorphism, marquee, clock |
| `display2.blade.php` | Eksperimen TTS dengan Puter.js (AWS Polly, OpenAI, Gemini) |
| `display3.blade.php` | Display alternatif dengan Gemini TTS + antrian manual |
| `display4.blade.php` | Display TTS sederhana pakai Windows Speech API |
| `tts.blade.php` | Halaman test TTS Gemini standalone |

## Fitur Display Utama

- **Nomor antrian besar** dengan animasi pulse
- **Informasi loket** tujuan
- ** Running text (marquee)** footer untuk informasi/iklan
- **Jam & tanggal** real-time
- **Daftar nomor yang sedang dilayani** (static sample)
- **Area promosi video** (placeholder)

## Real-time

Menggunakan Echo + Pusher.js untuk mendengarkan event `PanggilAntrian`:

```js
Echo.private('panggil-antrian')
    .listen('antrian', (data) => {
        // Update nomor antrian
        // Update loket
    });
```

## Auto-fetch App Config

Data dari `AppConfig` (nama instansi, footer text, logo) di-passing dari controller ke view:

```php
// routes/web.php
Route::get('/display', fn () => view('display', [
    'appConfig' => AppConfig::first() ?? new AppConfig()
]))->name('display');
```

## Catatan

- Display bersifat **public** (tanpa login)
- Semua versi display eksperimental (TTS) tidak terhubung ke database
- Display utama satu-satunya yang terintegrasi dengan WebSocket Reverb
