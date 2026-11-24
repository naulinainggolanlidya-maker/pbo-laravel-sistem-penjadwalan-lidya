# SISTEM INFORMASI PENJADWALAN LATIHAN UKM PADUAN SUARA

## Deskripsi Proyek

Aplikasi Sistem Informasi Penjadwalan Latihan UKM Paduan Suara merupakan aplikasi berbasis web yang digunakan untuk mengelola jadwal kegiatan latihan UKM Paduan Suara.

Aplikasi ini dikembangkan menggunakan Laravel 13 dan PHP dengan pola arsitektur Route, Controller, dan Blade.

Penyimpanan data jadwal menggunakan session Laravel dengan driver file tanpa menggunakan database.

## Teknologi yang Digunakan

- Laravel 13
- PHP
- Blade Template
- HTML dan CSS
- Session Driver File
- Composer

## Fitur Aplikasi

1. Menampilkan daftar jadwal latihan.
2. Menambahkan jadwal latihan.
3. Melihat detail jadwal latihan.
4. Mengubah jadwal latihan.
5. Menghapus jadwal latihan.
6. Validasi input data.
7. Menampilkan notifikasi keberhasilan operasi.

## Struktur Data Jadwal

Data jadwal terdiri dari:

- Kode jadwal
- Nama kegiatan
- Kategori
- Tanggal
- Waktu
- Lokasi
- Materi lagu
- Pelatih
- Jumlah peserta
- Kondisi jadwal
- Keterangan

## Persyaratan Sistem

- PHP yang kompatibel dengan Laravel 13 (minimal PHP 8.3).
- Composer.
- Web browser.
- Git.

## Langkah Menjalankan Proyek

### 1. Clone Repository

```bash
git clone URL_REPOSITORY_GITHUB
```

### 2. Masuk ke Folder Proyek

```bash
cd penjadwalan-paduan-suara
```

### 3. Install Dependensi

```bash
composer install
```

### 4. Salin File Environment

Windows:

```bash
copy .env.example .env
```

Linux/macOS:

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Atur Session Driver

Buka file `.env`, kemudian atur:

```env
SESSION_DRIVER=file
```

Pastikan folder penyimpanan session dapat ditulisi:

```text
storage/framework/sessions
```

### 7. Bersihkan Cache Konfigurasi

```bash
php artisan optimize:clear
```

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

### 9. Buka Aplikasi

Akses alamat berikut melalui browser:

http://127.0.0.1:8000

## Routing Aplikasi

| Method | URI | Fungsi |
|---|---|---|
| GET | /jadwal-latihan | Daftar jadwal |
| GET | /jadwal-latihan/create | Form tambah |
| POST | /jadwal-latihan | Simpan jadwal |
| GET | /jadwal-latihan/{kode} | Detail jadwal |
| GET | /jadwal-latihan/{kode}/edit | Form edit |
| PUT | /jadwal-latihan/{kode} | Perbarui jadwal |
| DELETE | /jadwal-latihan/{kode} | Hapus jadwal |

## Catatan

Aplikasi menggunakan session dengan driver file sebagai penyimpanan data sementara. Data tidak disimpan secara permanen dalam database dan dapat hilang ketika session berakhir atau dibersihkan.

## Pengembang

Nama: [Lidya Nauli Nainggolan]

Program Studi: [Teknik Informatika]

Mata Kuliah: [Pemograman Berorientasi Objek]

Tahun: 2026
