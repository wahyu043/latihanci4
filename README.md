# CodeIgniter 4 CRUD Siswa - CAMP404

[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4-blue)]()
[![Status](https://img.shields.io/badge/Status-Completed-brightgreen)]()

Sebuah proyek latihan CRUD (Create, Read, Update, Delete) menggunakan **CodeIgniter 4**,  
berdasarkan tutorial dari [Camp404.com](https://camp404.com/).  
Proyek ini cocok untuk pemula yang ingin memahami konsep dasar MVC dan fitur umum dalam web development menggunakan CI4.

## 🔧 Tech Stack

- CodeIgniter 4.x
- PHP 7.4+
- MySQL / MariaDB
- Bootstrap 4
- CI4 Auth (manual login sederhana)

## ✨ Fitur

- Login dan autentikasi sederhana
- Role-based access:
    - **Admin**: kelola data siswa (tambah, edit, hapus, lihat)
    - **Siswa**: hanya melihat data sendiri
- Validasi form di sisi server
- Redirect dinamis berdasarkan role
- UI sederhana menggunakan Bootstrap 4

## 🚀 Cara Menjalankan

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
composer install

cp .env.example .env
php spark key:generate
php spark migrate --seed

php spark serve
```

Akses via browser: http://localhost:8080

| Role  | Email                                         | Password    |
| ----- | --------------------------------------------- | ----------- |
| Admin | [admin@camp404.com](mailto:admin@camp404.com) | password123 |
| Siswa | [andi@camp404.com](mailto:andi@camp404.com)   | password123 |

## 📄 Lisensi

Proyek ini dibuat untuk pembelajaran berdasarkan materi dari [Camp404.com](https://camp404.com/), dan tidak memiliki lisensi komersial.
