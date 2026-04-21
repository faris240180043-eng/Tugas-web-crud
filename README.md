# Manajemen Perpustakaan App

Aplikasi web sederhana berbasis Laravel untuk manajemen data buku dengan fitur CRUD (Create, Read, Update, Delete).

## Fitur Utama

- Menampilkan daftar buku
- Menambah data buku
- Mengubah data buku
- Menghapus data buku
- Validasi input pada proses simpan dan update
- Seeder dan factory untuk data contoh
- Feature test CRUD menggunakan Pest

## Tech Stack

- PHP 8.5
- Laravel 13
- MySQL
- Tailwind CSS 4 (tersedia di proyek)
- Pest 4 + PHPUnit 12

## Arsitektur Singkat (Web dan Database)

Aplikasi ini memakai pola standar web app:

- Laravel (web/app) berjalan sebagai proses aplikasi PHP.
- MySQL berjalan sebagai service database terpisah.
- Keduanya saling terhubung lewat konfigurasi `.env` (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

"Terpisah" di sini artinya service-nya berbeda, bukan harus beda mesin.
Jadi bisa:

- 1 mesin yang sama (contoh: Laragon/XAMPP, host `127.0.0.1`)
- beda container (contoh: Laravel container + MySQL container)
- beda server (contoh: web server A, DB server B)

## Struktur Data Buku

Tabel books memiliki kolom:

- id
- title
- author
- published_year (nullable)
- stock
- created_at
- updated_at

## Quick Start

1. Clone repository

```bash
git clone https://github.com/USERNAME/Manajemen-Perpustakaan-app.git
cd Manajemen-Perpustakaan-app
```

2. Install dependency backend

```bash
composer install
```

3. Siapkan file environment

```bash
# Linux/macOS
cp .env.example .env

# Windows (Command Prompt)
copy .env.example .env

php artisan key:generate
```

4. Atur koneksi database di file .env

Pastikan value berikut sesuai environment lokal:

- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

Contoh paling umum (MySQL lokal di mesin yang sama):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_perpustakaan_app
DB_USERNAME=root
DB_PASSWORD=
```

Jika MySQL ada di server/container lain, ganti `DB_HOST` sesuai host/IP MySQL tersebut.

5. Buat database (jika belum ada)

```sql
CREATE DATABASE manajemen_perpustakaan_app;
```

6. Jalankan migrasi dan seeder

```bash
php artisan migrate --seed
```

7. Install dependency frontend (opsional untuk development asset)

```bash
npm install
npm run dev
```

8. Jalankan aplikasi

```bash
php artisan serve
```

Buka aplikasi di browser:

http://127.0.0.1:8000

## Troubleshooting Koneksi MySQL

- Error "Connection refused": cek MySQL service sudah running dan `DB_HOST`/`DB_PORT` benar.
- Error "Access denied": cek `DB_USERNAME` dan `DB_PASSWORD`.
- Error "Unknown database": buat dulu databasenya, lalu jalankan `php artisan migrate --seed`.
- Setelah ubah `.env`, restart server lokal atau jalankan `php artisan optimize:clear`.

## Routing CRUD

Root / akan redirect ke /books.

Resource route yang tersedia:

- GET /books
- GET /books/create
- POST /books
- GET /books/{book}/edit
- PUT/PATCH /books/{book}
- DELETE /books/{book}

## Testing

Jalankan semua test:

```bash
php artisan test --compact
```

## Perintah Berguna

Format kode PHP dengan Pint:

```bash
vendor/bin/pint --dirty --format agent
```

Lihat route books:

```bash
php artisan route:list --name=books
```

## Catatan

- Proyek ini dibuat sederhana dengan fokus utama pada fungsionalitas CRUD.
- Jika perubahan frontend tidak terlihat, jalankan npm run dev atau npm run build.

## License

Proyek ini menggunakan lisensi MIT.