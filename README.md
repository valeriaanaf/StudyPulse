# 📚 StudyPulse - Student Task Manager

> Manajer Tugas Mahasiswa berbasis REST API Asinkron yang dibangun menggunakan Laravel 12 dan PostgreSQL untuk Ujian Praktikum Rekayasa Web.

![Laravel 12](https://img.shields.io/badge/Laravel%2012-FF2D20?logo=laravel&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-4169E1?logo=postgresql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-06B6D4?logo=tailwindcss&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)

---

# 📌 Project Overview

StudyPulse adalah aplikasi *Student Task Manager* (Manajemen Tugas Kuliah) yang dikembangkan untuk memenuhi kriteria nilai maksimal pada evaluasi akhir praktikum. Aplikasi ini memisahkan tanggung jawab secara modern menggunakan arsitektur **Hybrid Monolith**: *Backend* bertindak sebagai REST API engine berbasis Laravel 12 yang mengolah basis data PostgreSQL dan mengembalikan respon berformat JSON. Sementara *Frontend* dirancang menyerupai dasbor SaaS minimalis menggunakan Tailwind CSS dan dikendalikan oleh JavaScript Fetch API secara *asynchronous* untuk memanipulasi data tanpa perlu memuat ulang (*reload*) halaman browser.

---

# 🎯 Project Goals

- Memenuhi kriteria pencapaian tingkat tertinggi (Nilai A + Poin Bonus) Ujian Responsi Praktikum Rekayasa Web.
- Mengimplementasikan sistem basis data relasional web menggunakan PostgreSQL.
- Membangun arsitektur backend berbasis MVC dengan Framework Laravel 12.
- Menyediakan endpoint REST API yang bersih dan berfungsi penuh untuk operasi CRUD (Create, Read, Update, Delete).
- Merancang antarmuka front-end interaktif yang responsif dan hemat sumber daya (Client-Side Rendering via Fetch API).

---

# ✨ Features

- ✅ **Full REST API Integration**: Operasi data dikelola penuh melalui JSON endpoint.
- ✅ **Real-Time Dashboard Stats**: Widget angka statistik (Total, Selesai, Belum Selesai) yang diperbarui otomatis tanpa interupsi reload browser.
- ✅ **Sleek SaaS UI Dashboard**: Antarmuka modern menggunakan font Plus Jakarta Sans dan utility-first Tailwind CSS.
- ✅ **Asynchronous CRUD Operation**: Menambah, mengubah status penandaan, dan menghapus tugas berjalan secara instan.
- ✅ **Database Automated Seeder**: Integrasi data bawaan (dummy) langsung dari sistem command line Laravel.
- ✅ **Strict Server-Side Validation**: Mengamankan input dari client sebelum masuk ke basis data PostgreSQL.

---

# 🛠 Tech Stack

| Category | Technology |
|----------|------------|
| Backend Framework | Laravel 12.x |
| Web Database | PostgreSQL |
| Styling CSS | Tailwind CSS v4 (Play CDN) |
| Programming | PHP 8.3 & Asynchronous JavaScript (Fetch API) |
| Architecture | RESTful API (JSON Response) |
| Version Control | Git & GitHub |
| Code Editor | Visual Studio Code |

---

# 🏛️ Project Architecture

```text
       Browser (Client-Side Layout)
                    │ ▲
       JSON Request │ │ JSON Response
     (Fetch Engine) ▼ │ (Content-Type: application/json)
                    
     Laravel 12 Backend (Router ➔ Controller)
                    │ ▲
       Eloquent ORM │ │ Data Hydration
                    ▼ │
          PostgreSQL Database Web
```

---

# 📚 What I Learned

- Desain arsitektur RESTful API dengan standardisasi JSON status code yang tepat.
- Manajemen siklus database relasional melalui Laravel Migration dan Automation Seeder.
- Mengatasi isu pluralisasi otomatis Eloquent terhadap model entitas berbahasa Indonesia (`protected $table = 'tugas'`).
- Konsumsi data API secara internal menggunakan metode JavaScript `async/await` dan Fetch API.
- Optimalisasi UI/UX modern berbasis komponen card dengan efek *state desaturation* (coret warna hijau) pada tugas yang selesai.

---

# 🚀 Challenges

- Sinkronisasi widget kalkulasi statistik di bagian atas agar melacak perubahan data array lokal secara *real-time* setelah Fetch mutasi (`POST`/`PUT`/`DELETE`) berhasil dijalankan.
- Menghindari render halaman error HTML bawaan Laravel dengan memaksa *header request* menerima `Accept: application/json` pada ekosistem pengujian API.
- Mempertahankan portabilitas kode konfigurasi lingkungan kerja lokal antara laptop pribadi developer dengan laptop penguji.

---

# 💡 Solutions

- Mengintegrasikan fungsi interuptor `muatTugas()` untuk dipanggil kembali secara otomatis di akhir setiap blok eksekusi penambahan, perubahan status, maupun penghapusan data.
- Menambahkan parameter validasi `headers: { 'Accept': 'application/json' }` di setiap skrip mesin Fetch API front-end.
- Menyusun struktur berkas `.env.example` yang rapi dan terdokumentasi dengan pengaturan basis data PostgreSQL standar industri.

---

# 📂 Project Structure

```text
StudyTaskManager/
├── app/
│   ├── Http/Controllers/TugasController.php   # Logika Inti REST API Engine
│   └── Models/Tugas.php                       # Model & Binding Tabel Bahasa Indonesia
├── database/
│   ├── migrations/                            # Cetak Biru Skema Tabel Basis Data
│   └── seeders/TugasSeeder.php                # Penyedia Data Instan Uji Coba (Dummy)
├── routes/
│   ├── api.php                                # Deklarasi URL Endpoint API (CRUD)
│   └── web.php                                # Routing Halaman Utama Dashboard
└── resources/
    └── views/welcome.blade.php                # Single Page UI (Tailwind & Fetch API)
```

---

# ⚙️ Getting Started

### 1. Clone Repository
```bash
git clone [https://github.com/valeriaanaf/nama-repo-baru.git](https://github.com/valeriaanaf/nama-repo-baru.git)
cd nama-repo-baru
```

### 2. Install Dependency
```bash
composer install
```

### 3. Environment Configuration
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan kredensial username serta password basis data PostgreSQL lokal Anda:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database_anda
DB_USERNAME=postgres
DB_PASSWORD=password_postgres_anda
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Migration & Automated Seeder
*Pastikan Anda telah membuat database kosong di PostgreSQL sesuai nama di `.env` sebelum menjalankan perintah ini:*
```bash
php artisan migrate --seed
```

### 6. Boot Up Server Local
```bash
php artisan serve
```
Akses aplikasi melalui peramban web di alamat: `http://127.0.0.1:8000`

---

# 🔗 Live Demo & Testing

- **Local Host URL**: `http://127.0.0.1:8000`
- **REST API Endpoint Target (Nilai A)**: `http://127.0.0.1:8000/api/tugas`

*(Pengujian fungsionalitas REST API dapat disimulasikan secara rapi langsung melalui ekstensi Client Postman di Visual Studio Code).*

---

# 📸 Screenshots

*Preview Tampilan Dasbor Modern Student Task Manager:*
```text
resources/assets/preview/dashboard_v2.png
```

---

# 👨‍💻 Author

**Valerian Ahmad**

LinkedIn *[(coming soon)](https://www.instagram.com/valeriaanaf/)*
Instagram *[(coming soon)](https://www.instagram.com/valeriaanaf/)*

---

# 📄 License

Proyek ini dibangun secara mandiri untuk tujuan akademik, portofolio, dan pemenuhan syarat kelulusan Responsi Ujian Akhir Praktikum Rekayasa Web 2026.
```