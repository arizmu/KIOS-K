# Tech Stack — KiosK Maros

## Backend

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| **PHP** | ^8.3 | Bahasa pemrograman |
| **Laravel** | ^13.8 | Framework PHP |
| **Laravel Reverb** | ^1.0 | WebSocket server real-time |
| **Database** | SQLite (dev), Redis (prod) | Penyimpanan data |
| **Laravel Queue** | bawaan Laravel | Antrian job background |

## Frontend

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| **Vite** | ^8.0.0 | Build tool |
| **Tailwind CSS** | ^4.0.0 | Utility-first CSS framework |
| **FlyonUI** | ^2.4.1 | UI component library (plugin Tailwind) |
| **Alpine.js** | ^3.15.12 | JavaScript reaktivitas ringan |
| **Laravel Echo** | ^2.3.7 | Real-time event listening |
| **Pusher.js** | ^8.5.0 | WebSocket client adapter |
| **Axios** | ^1.18.0 | HTTP client |
| **Font** | Instrument Sans | via Laravel Vite Fonts |

## Struktur Routes

Semua route didefinisikan di `routes/web.php`:

| Method | URI | Controller | Middleware |
|--------|-----|-----------|------------|
| GET | `/` | Welcome view | public |
| GET | `/display` | Display view | public |
| GET | `/antrian` | Tiket view | public |
| GET | `/login` | Login view | guest |
| POST | `/login-action` | `LoginController@login` | guest |
| POST | `/logout` | `LoginController@logout` | auth |
| GET | `/dashboard` | `HomeController@DashboardLayout` | auth |
| GET/POST/PUT/DELETE | `/teller/*` | `TellerController` | auth |
| GET/POST/PUT/DELETE | `/pengguna/*` | `PenggunaController` | auth |
| GET/POST | `/pemanggil/*` | `PemanggilController` | auth |
| GET/POST/DELETE | `/app-config/*` | `AppConfigController` | auth |
| POST | `/create-ticket` | `TicketController@createTiket` | auth |

## Struktur Database

### Users
- `id`, `name`, `username` (unique), `email` (unique), `password`, `role` (enum: teller, administrator), `remember_token`

### Tickets
- `id`, `nama` (nullable), `no_antrian`, `catatan` (nullable), `tanggal` (date), `status` (enum: open, pending, called, done, cancel, close)

### Lokets
- `id` (UUID), `loket`, `keterangan` (nullable), `is_active` (boolean)

### App Configs
- `id`, `instansi_name`, `instansi_address`, `instansi_phone`, `instansi_email`, `logo`, `active_theme`, `footer_text`, `social_media_facebook`, `social_media_instagram`, `social_media_twitter`

## Broadcasting & Real-time

- **Event**: `App\Events\PanggilAntrian` — `ShouldBroadcast`
- **Channel**: `private-panggil-antrian`
- **Event name**: `antrian`
- **Payload**: `id`, `no_antrian`, `nama`, `catatan`, `created_at`, `loket`
- **Broadcaster**: Laravel Reverb (via Puser protocol)
- **Frontend listener**: Laravel Echo + Pusher.js

## Cara Menjalankan

```bash
# Setup awal
composer run setup

# Development (server + queue + vite)
composer run dev

# Testing
composer run test
```
