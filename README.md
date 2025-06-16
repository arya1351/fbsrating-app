<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

## 🚀 Instalasi Project Laravel

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek ini di mesin lokal Anda:

### 1. Clone Repositori

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
2. Install Dependency Backend (PHP)
bash
Copy
Edit
composer install
3. Install Dependency Frontend (JavaScript & CSS)
bash
Copy
Edit
npm install
4. Salin File Environment dan Generate APP Key
bash
Copy
Edit
cp .env.example .env
php artisan key:generate
5. Setup Database
Pastikan database sudah dibuat di MySQL.

Atur konfigurasi database di file .env.

Contoh:

makefile
Copy
Edit
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
6. Jalankan Migrasi
bash
Copy
Edit
php artisan migrate
7. Jalankan Server dan Vite (Frontend)
Jalankan Laravel:
bash
Copy
Edit
php artisan serve
Jalankan Vite (Tailwind, JS, dll):
bash
Copy
Edit
npm run dev
```
