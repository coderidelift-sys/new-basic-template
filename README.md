
# Laravel 10 Admin Panel Boilerplate

Ini adalah sebuah boilerplate atau starter template yang dirancang untuk mempercepat pengembangan aplikasi web dengan Laravel 10. Proyek ini menyediakan fondasi yang kuat dengan fitur-fitur esensial yang sudah terkonfigurasi, memungkinkan developer untuk fokus langsung pada logika bisnis inti aplikasi mereka.

## Abstrak

Tujuan utama dari boilerplate ini adalah untuk menghilangkan pekerjaan berulang dalam menyiapkan proyek baru. Dengan menggunakan template ini, Anda mendapatkan:

- Sistem Autentikasi yang lengkap.
- Manajemen Hak Akses berbasis Peran (RBAC).
- Contoh modul CRUD (Manajemen Pengguna) yang siap pakai.
- Tabel data server-side yang interaktif dan efisien.

## Fitur Utama

- **Autentikasi Lengkap**: Dibangun menggunakan **Laravel Breeze**, menyediakan fungsionalitas registrasi, login, reset password, dan verifikasi email.
- **Manajemen Hak Akses (RBAC)**: Diimplementasikan dengan paket `spatie/laravel-permission`, memungkinkan pengelolaan peran dan izin yang fleksibel. Contoh peran `Super Admin` sudah disertakan.
- **Modul Manajemen Pengguna**: Fitur CRUD (Create, Read, Update, Delete) untuk pengguna sebagai contoh implementasi dan titik awal.
- **Tabel Data Server-Side**: Menggunakan `yajra/laravel-datatables` untuk menampilkan data dengan paginasi, pencarian, dan sorting yang diproses di sisi server, ideal untuk data dalam jumlah besar.
- **Struktur Admin Panel**: Area khusus (`/console`) yang dilindungi oleh middleware untuk menempatkan semua menu administrasi.
- **Enum untuk Peran**: Menggunakan `bensampo/laravel-enum` untuk manajemen peran yang lebih bersih dan terstruktur.

## Teknologi & Paket Utama

- **Framework**: Laravel 10
- **PHP**: Versi 8.1+
- **Frontend**: Vite, Tailwind CSS, Bootstrap
- **Paket Backend**:
  - `laravel/breeze`: Scaffolding autentikasi.
  - `spatie/laravel-permission`: Manajemen peran dan izin.
  - `yajra/laravel-datatables-oracle`: Tabel data server-side.
  - `bensampo/laravel-enum`: Untuk pengelolaan Enum.

## Instalasi & Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal.

1.  **Clone repository:**
    ```bash
    git clone https://github.com/username/repository-name.git
    cd repository-name
    ```

2.  **Install dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Buat file `.env`:**
    Salin dari contoh yang ada.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database:**
    Buka file `.env` dan atur koneksi database Anda (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

6.  **Jalankan Migrasi & Seeder:**
    Perintah ini akan membuat struktur tabel dan mengisi data awal yang diperlukan.
    ```bash
    php artisan migrate --seed
    ```
    *Catatan: Anda mungkin perlu membuat seeder untuk user Super Admin pertama kali.*

7.  **Install Dependensi Node.js:**
    ```bash
    npm install
    ```

8.  **Compile Aset Frontend:**
    Untuk pengembangan, jalankan:
    ```bash
    npm run dev
    ```
    Untuk produksi, jalankan:
    ```bash
    npm run build
    ```

9.  **Jalankan Server Lokal:**
    ```bash
    php artisan serve
    ```
    Aplikasi akan tersedia di `http://127.0.0.1:8000`.

## Memulai

Setelah instalasi, Anda dapat mendaftar sebagai pengguna baru. Untuk mengakses panel admin, Anda perlu memberikan peran 'Super Admin' kepada pengguna Anda. Anda dapat melakukan ini melalui `php artisan tinker` atau dengan membuat seeder khusus.

**Contoh membuat Super Admin via Tinker:**
```bash
php artisan tinker

// Cari user Anda
$user = App\Models\User::where('email', 'emailanda@example.com')->first();

// Berikan peran Super Admin
$user->assignRole('Super Admin');

// Keluar dari tinker
exit
```

Setelah itu, login dan akses panel manajemen pengguna di `/console/users`.
