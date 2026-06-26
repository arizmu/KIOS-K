# Modul Tiket — Pengambilan Nomor Antrian

## Deskripsi

Modul untuk pengunjung mengambil nomor antrian (tiket). Pengunjung bisa memasukkan nama (opsional) dan catatan (opsional), lalu sistem akan mencetak tiket berisi nomor antrian.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/antrian` | View: `antrian-tiket` (no auth) |
| POST | `/create-ticket` | `TicketController@createTiket` (auth) |

## Flow

1. Pengunjung membuka `/antrian`
2. Mengisi form nama (opsional) dan catatan (opsional)
3. Klik "Cetak Tiket"
4. Sistem membuat tiket dengan nomor antrian sekuensial (format `001`, `002`, dst)
5. Status awal tiket: `open`
6. Tiket tercetak via browser `window.print()`

## Controller

`app/Http/Controllers/TicketController.php`

```php
createTiket(Request $request) {
    // Generate nomor antrian berdasarkan tanggal
    // Format: 3 digit angka (001, 002, ...)
    // Status default: 'open'
}
```

## Model

`app/Models/Ticket.php`

| Field | Type | Keterangan |
|-------|------|------------|
| `nama` | string (nullable) | Nama pengunjung |
| `no_antrian` | string | Nomor antrian |
| `catatan` | string (nullable) | Keterangan |
| `tanggal` | date | Tanggal ambil tiket |
| `status` | enum | open, pending, called, done, cancel, close |

## View

`resources/views/antrian-tiket.blade.php`

- Menggunakan Alpine.js (`antrianTiket()`)
- Form input nama & catatan
- Print preview tiket
- Auto-print setelah tiket dibuat

## Status Tiket Lifecycle

```
open -> called -> done
  |        |
  v        v
pending   cancel
  |
  v
close
```

## Dependensi

- Alpine.js (reaktivitas form)
- Axios (opsional, pakai fetch API)
