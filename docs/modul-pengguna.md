# Modul Pengguna — Manajemen User

## Deskripsi

CRUD untuk mengelola pengguna (admin & teller). Admin bisa menambah, mengedit, menghapus, dan mencari pengguna. Ada dua role: `administrator` dan `teller`.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/pengguna` | `PenggunaController@PenggunaLayouts` |
| GET | `/pengguna/users` | `PenggunaController@getPenggunas` |
| POST | `/pengguna/users` | `PenggunaController@store` |
| PUT | `/pengguna/users/{id}` | `PenggunaController@update` |
| DELETE | `/pengguna/users/{id}` | `PenggunaController@destroy` |

## Controller

`app/Http/Controllers/PenggunaController.php`

| Method | Fungsi |
|--------|--------|
| `PenggunaLayouts()` | Return view pengguna |
| `getPenggunas(Request)` | List users, filter by search & role |
| `store(Request)` | Create user baru (validasi) |
| `update(Request, $id)` | Update user (password opsional) |
| `destroy($id)` | Hapus user |

## Model

`app/Models/User.php` (extends `Authenticatable`)

| Field | Type | Keterangan |
|-------|------|------------|
| `id` | bigint (PK) | Auto-increment |
| `name` | string | Nama lengkap |
| `username` | string (unique) | Username login |
| `email` | string (unique) | Email |
| `password` | string | Hashed (bcrypt) |
| `role` | enum | `teller` or `administrator` |

## Validasi

- **Store**: name, email (unique), password (min 6), role (in: administrator, teller)
- **Update**: name, email (unique kecuali sendiri), password (nullable), role
- **Password update**: jika kosong, password tidak diubah

## View

`resources/views/pages/pengguna/pengguna-index.blade.php`

- Alpine.js (`Users()`)
- Form tambah/edit user
- Filter by search & role
- Avatar initials
- Role badge (Administrator / Teller)
- Tombol Edit / Delete per baris

## Role & Akses

| Role | Hak Akses |
|------|-----------|
| `administrator` | Full akses (dashboard, teller, pengguna, app-config, pemanggil) |
| `teller` | Terbatas (dashboard, pemanggil) |
