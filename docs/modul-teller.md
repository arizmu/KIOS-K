# Modul Teller — Manajemen Loket

## Deskripsi

CRUD untuk mengelola loket/layanan. Admin dapat menambah, mengedit, menghapus, dan mencari loket.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/teller` | `TellerController@TellerLayouts` |
| GET | `/teller/loket` | `TellerController@getLokets` |
| POST | `/teller/loket` | `TellerController@store` |
| PUT | `/teller/loket/{id}` | `TellerController@update` |
| DELETE | `/teller/loket/{id}` | `TellerController@destroy` |

## Controller

`app/Http/Controllers/TellerController.php`

| Method | Fungsi |
|--------|--------|
| `TellerLayouts()` | Return view teller |
| `getLokets(Request)` | List loket, filter by search |
| `store(Request)` | Create loket baru |
| `update(Request, $id)` | Update loket |
| `destroy($id)` | Hapus loket |

## Model

`app/Models/Loket.php`

| Field | Type | Keterangan |
|-------|------|------------|
| `id` | UUID (primary) | Auto-generated |
| `loket` | string | Nama loket |
| `keterangan` | text (nullable) | Deskripsi |
| `is_active` | boolean | Status aktif (default: false) |

Menggunakan trait `HasUuids` untuk primary key.

## View

`resources/views/pages/tellers/teller-index.blade.php`

- Alpine.js (`Tellers()`)
- Form tambah/edit loket
- Tabel daftar loket dengan fitur search
- Tombol Edit / Delete per baris
- Status badge (Active / Inactive)

## Fitur

- Search loket by name atau keterangan
- Toggle form Add/Edit
- Validasi dasar (required fields)
- Soft delete (hard delete via destroy)
