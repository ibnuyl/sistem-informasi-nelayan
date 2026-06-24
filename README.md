# Sistem Informasi Pencatatan Data Nelayan (Web CRUD)

Aplikasi berbasis web sederhana yang dirancang untuk mengelola, mencatat, dan mendokumentasikan data nelayan beserta kapal tangkapnya. Proyek ini dibuat menggunakan PHP Native dan MySQL, serta dilengkapi dengan tampilan antarmuka yang modern menggunakan Bootstrap 5.

Cocok digunakan sebagai referensi pembelajaran pemrograman web standar (CRUD) atau sebagai bagian dari portofolio pengembangan aplikasi web.

---

## 🚀 Fitur Utama

* **Dasbor Ringkas (Dashboard Widgets):** Menampilkan statistik total nelayan terdaftar dan total kapal secara otomatis (real-time).
* **Manajemen Data (CRUD):** * **Create:** Menambahkan data nelayan baru (NIK, Nama, Alamat, Nama Kapal, Alat Tangkap).
    * **Read:** Menampilkan daftar nelayan dalam bentuk tabel yang rapi.
    * **Update:** Mengubah informasi data nelayan jika terjadi kesalahan input.
    * **Delete:** Menghapus data nelayan dari sistem dengan konfirmasi keamanan.
* **Fitur Pencarian Aktif:** Memudahkan pencarian data nelayan berdasarkan Nama, NIK, atau Nama Kapal secara instan.
* **Desain Responsif:** Antarmuka modern menggunakan Bootstrap 5 dan ikon dari Font Awesome yang nyaman dilihat di perangkat komputer maupun HP.

---

## 🛠️ Teknologi yang Digunakan

* **Bahasa Pemrograman:** PHP (Native)
* **Database:** MySQL / MariaDB
* **Desain & UI:** Bootstrap 5 (via CDN)
* **Ikon:** Font Awesome 6 (via CDN)
* **Server Lokal:** Laragon / XAMPP

---

## 💻 Cara Instalasi di Lokal (Localhost)

Jika Anda ingin menjalankan proyek ini di komputer Anda sendiri, ikuti langkah-langkah berikut:

### 1. Persiapan File
1. Unduh (*download*) atau klon *repository* ini.
2. Ekstrak folder proyek dan pindahkan ke dalam direktori server lokal Anda:
   * Jika menggunakan **Laragon**: `C:\laragon\www\nama-folder-proyek\`
   * Jika menggunakan **XAMPP**: `C:\xampp\htdocs\nama-folder-proyek\`

### 2. Import Database
1. Buka aplikasi manajemen database Anda (HeidiSQL / phpMyAdmin).
2. Buat database baru dengan nama `dkp_pekalongan` (atau sesuaikan dengan file `koneksi.php` Anda).
3. Klik kanan/pilih database tersebut, lalu lakukan **Import** menggunakan file database **`dkp_pekalongan.sql`** yang sudah disediakan di dalam proyek ini.

### 3. Jalankan Aplikasi
1. Jalankan server lokal Anda (klik *Start All* pada Laragon atau aktifkan Apache & MySQL pada XAMPP).
2. Buka browser (Google Chrome/Edge) lalu akses alamat berikut:
   * Jika menggunakan Laragon: `http://localhost/nama-folder-proyek/` atau `http://nama-folder-proyek.test`
   * Jika menggunakan XAMPP: `http://localhost/nama-folder-proyek/`

---

## 📂 Struktur File

```text
├── dkp_pekalongan.sql    # File backup/dump database MySQL
├── koneksi.php           # File konfigurasi koneksi database PHP
├── index.php             # Halaman utama (Dasbor, Fitur Pencarian, & Tabel Data)
├── tambah.php            # Halaman form tambah data nelayan
├── edit.php              # Halaman form ubah/edit data nelayan
├── hapus.php             # Proses logika penghapusan data
└── README.md             # Dokumentasi proyek (file ini)
