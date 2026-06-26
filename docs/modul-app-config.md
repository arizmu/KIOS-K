# Modul App Config — Pengaturan Aplikasi

## Deskripsi

Konfigurasi aplikasi untuk branding dan informasi instansi. Data ini ditampilkan di halaman display, welcome, dan header.

## Route

| Method | URI | Controller Method |
|--------|-----|-------------------|
| GET | `/app-config` | `AppConfigController@index` |
| GET | `/app-config/data` | `AppConfigController@getConfigs` |
| POST | `/app-config/update` | `AppConfigController@update` |
| POST | `/app-config/upload-logo` | `AppConfigController@uploadLogo` |
| DELETE | `/app-config/logo` | `AppConfigController@deleteLogo` |

## Controller

`app/Http/Controllers/AppConfigController.php`

| Method | Fungsi |
|--------|--------|
| `index()` | Return view pengaturan |
| `getConfigs()` | Ambil config (create default jika kosong) |
| `update(Request)` | Update config |
| `uploadLogo(Request)` | Upload logo (max 2MB) |
| `deleteLogo()` | Hapus logo |

## Model

`app/Models/AppConfig.php`

| Field | Type | Default |
|-------|------|---------|
| `instansi_name` | string | 'Kiosk Antrian' |
| `instansi_address` | text (nullable) | null |
| `instansi_phone` | string (nullable) | null |
| `instansi_email` | string (nullable) | null |
| `logo` | string (nullable) | null |
| `active_theme` | string | 'default' |
| `footer_text` | text (nullable) | null |
| `social_media_facebook` | string (nullable) | null |
| `social_media_instagram` | string (nullable) | null |
| `social_media_twitter` | string (nullable) | null |

## Fitur View

`resources/views/pages/app-config.blade.php`

- Alpine.js (`AppConfig()`)
- **Logo** — Upload, preview, hapus
- **Tema** — Pilihan: Default, Dark, Light, Corporate, Modern, Classic
- **Profil Instansi** — Nama, telepon, email, alamat
- **Running Text** — Teks untuk footer di display
- **Media Sosial** — Facebook, Instagram, Twitter
- **Validasi** — Nama instansi wajib diisi
- **Auto-simpan** — Logo langsung diupload saat dipilih

## Caching

Cache key `app_config` di-flush setiap kali update atau upload/hapus logo.
