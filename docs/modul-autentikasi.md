# Modul Autentikasi — Login & Logout

## Deskripsi

Sistem login menggunakan username atau email + password. Menggunakan session-based authentication Laravel.

## Route

| Method | URI | Controller Method | Middleware |
|--------|-----|-------------------|------------|
| GET | `/login` | View: `login` | guest |
| POST | `/login-action` | `LoginController@login` | guest |
| POST | `/logout` | `LoginController@logout` | auth |

## Controller

`app/Http/Controllers/LoginController.php`

### Login Flow
1. Validasi input: `username` (required), `password` (required), `_remember_me` (boolean)
2. Attempt login via `Auth::attempt()` dengan field `username` terlebih dahulu
3. Jika gagal, attempt via field `email`
4. Jika sukses, return JSON `{ status: 'success' }`
5. Jika gagal, return JSON `{ status: 'error' }` (401)

### Logout Flow
1. `Auth::logout()`
2. `session()->invalidate()`
3. `session()->regenerateToken()`
4. Return JSON success

## View

`resources/views/login.blade.php`

- Alpine.js (`loginIndex()`)
- Form login dengan username/email + password
- Checkbox "Remember me"
- Gradient UI
- Redirect ke `/dashboard` setelah sukses login

## Proteksi Route

Semua route admin (dashboard, teller, pengguna, pemanggil, app-config) dilindungi middleware `auth`.

## Catatan

- Password di-hash menggunakan bcrypt (default Laravel)
- Session driver: database (file-based default)
- CSRF protection aktif di semua form POST/PUT/DELETE
