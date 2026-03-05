# AGENTS.md - Disposisi Management MVP

## Peran & Konteks
Anda adalah Senior Backend Developer dan Fullstack Engineer yang ahli dalam **Laravel 12**, **Tailwind CSS**, dan **MySQL**. Fokus utama Anda adalah membangun sistem manajemen disposisi yang handal, aman secara role-based access control (RBAC), dan memiliki interface yang bersih serta intuitif (clean UI) dengan performa tinggi.

## Business Requirements

* **Role Management:**
    * **Admin:** Manajemen user dan tim.
    * **Sekretaris:** Melakukan input data disposisi (Creator).
    * **Pimpinan:** Monitoring status disposisi dari seluruh tim secara real-time.
    * **Ketua Tim:** Melihat dan menindaklanjuti disposisi yang ditujukan khusus untuk timnya.
* **Workflow:** Sekretaris menginput surat -> Memilih tim tujuan (multiple via checkbox) -> Ketua Tim menerima notifikasi/list -> Pimpinan memantau progres global.
* **Data Anatomy (Disposisi):**
    * **Identitas:** No Agenda, Tanggal Agenda, Jenis Agenda, Sifat (String), Nomor Surat, Tanggal Surat, Asal Surat, Tujuan Surat, Perihal.
    * **Detail:** Lampiran/Keterangan (Text), Jumlah Lembar, Klasifikasi, Retensi, Attachment (File Upload).
    * **Distribusi:** Diteruskan Kepada (List Tim via Checkbox), Lembar Disposisi (Checkbox: Diketahui, Ditindaklanjuti, Jadwalkan Saya Hadir).
    * **Log:** Catatan & Tanggal Disposisi.
* **UI/UX:** * Tipografi menggunakan **Poppins**.
    * Mendukung Dark Mode dan Light Mode dengan toggle switch yang persisten.
    * Layout bersih, profesional, dan mewah menggunakan Tailwind CSS.

## Technical Details

* **Framework:** Laravel 12 (App Router/Controller Structure).
* **Database:** MySQL (Relational Mapping).
* **Authentication:** Laravel Breeze (Session-based).
* **Authorization:** Custom Middleware sesuai Role (Admin, Sekretaris, Pimpinan, Ketua tim).
* **Storage:** Local Disk/Public Storage untuk manajemen file attachment.
* **Frontend:** Blade Templating + Alpine.js (untuk interaksi ringan) + Tailwind CSS.

## Strategy & Roadmap

### Fase 1: Project Scaffolding
- Inisialisasi Laravel 12 dan setup environment `.env`.
- Konfigurasi Tailwind CSS dengan font Poppins dan custom color palette.
- Instalasi starter kit autentikasi.

### Fase 2: Database Architecture
- Migration `disposisis`: Semua field surat dan metadata.
- Migration `teams`: Master data tim (IT, Keuangan, dsb).
- Migration `disposisi_team`: Pivot table untuk relasi Many-to-Many (Diteruskan Kepada).
- Seeder: Membuat user default untuk tiap role dan daftar tim awal.

### Fase 3: Core Logic & Middleware
- Implementasi Middleware `RoleManager` untuk proteksi route.
- Logic `store` disposisi: Upload file, simpan data utama, dan `sync()` ke tabel pivot tim.
- Logic `index` (Ketua Tim): Query `whereHas` untuk memfilter disposisi berdasarkan tim user yang login.

### Fase 4: Frontend & Dark Mode
- Pembuatan Layout Dashboard yang elegan.
- Implementasi Dark Mode toggle menggunakan script yang menyimpan state di `localStorage`.
- Form Disposisi dengan interaksi checkbox yang responsif.

## Coding Standards

* **Simplicity:** Jangan melakukan over-engineering. Gunakan fitur native Laravel semaksimal mungkin.
* **Clean Code:** Penamaan variabel deskriptif, pemisahan logika di Service atau Form Request jika kompleks.
* **No Emojis:** Dilarang menggunakan emoji di dalam kode maupun dokumentasi teknis.
* **README:** Jaga agar README tetap minimalis, fokus pada instruksi instalasi `composer install` dan `php artisan migrate --seed`.
* **Security:** Pastikan semua input melewati filtrasi `validate()` dan proteksi CSRF.