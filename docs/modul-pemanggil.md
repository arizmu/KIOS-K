# Modul Pemanggil — Panggil Antrian

## Deskripsi

Modul untuk teller/staf memanggil nomor antrian. Teller harus membuka loket terlebih dahulu (**BUKA LOKET LAYANAN**) sebelum bisa memanggil antrian. Setelah dipanggil, nomor antrian akan muncul di layar display secara real-time.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/pemanggil` | `PemanggilController@PemanggilLayouts` |
| GET | `/pemanggil/antrian` | `PemanggilController@getAntrian` |
| POST | `/pemanggil/panggil-antrian/{key}` | `PemanggilController@panggilAntrian` |

## Alur Bisnis

1. Teller login dan masuk ke halaman `/pemanggil`
2. Teller harus **BUKA LOKET LAYANAN** (klik tombol, status loket berubah jadi aktif)
3. Setelah loket terbuka, teller bisa melihat daftar antrian yang menunggu
4. Teller klik "Panggil" pada antrian tertentu
5. Sistem broadcast event `PanggilAntrian` via WebSocket
6. Layar display langsung memperbarui nomor antrian yang dipanggil

> **Aturan**: `BUKA LOKET` harus dilakukan sebelum `PANGGIL`. Teller yang membuka loket akan ditandai sebagai loket aktif di session.

## Controller

`app/Http/Controllers/PemanggilController.php`

```php
getAntrian() {
    // Ambil tiket hari ini dengan status: open, called, pending
    // Urut berdasarkan created_at ASC
}

panggilAntrian($id) {
    // Dispatch event PanggilAntrian
    // Broadcast via WebSocket
    // Return response JSON
}
```

## Event Broadcast

`app/Events/PanggilAntrian.php`

- **Channel**: `private-panggil-antrian`
- **Event name**: `antrian`
- **Data**: `id`, `no_antrian`, `nama`, `catatan`, `created_at`, `loket`

## View

`resources/views/pages/pemanggil.blade.php`

- Alpine.js (`pemanggilAntrian()`)
- Mendengarkan Echo (`Echo.private('panggil-antrian').listen('antrian', ...)`)
- Tabel antrian dengan tombol Panggil & Selesai
- Panel "Waktu & Tanggal"
- Panel "Loket Layanan" dengan tombol BUKA LOKET
- Panel "Nomor Antrian Sedang Dipanggil"

## Real-time Listener (Frontend)

```js
Echo.private('panggil-antrian')
    .listen('antrian', (data) => {
        // Update nomor antrian di panel
        // Update loket
    });
```

## Catatan Penting

- Channel bersifat **private**, perlu autentikasi
- Sesi login diperlukan untuk akses `/pemanggil`
- Validasi buka loket dilakukan di frontend (saat ini masih static, perlu implementasi lebih lanjut)
