# Database Setup Guide - PERISAI UMI Admin Panel

## 📋 Ringkasan

Sistem ini menggunakan **8 modules lengkap** dengan database yang sudah siap untuk di-migrate. Setiap module memiliki:

- ✅ Migration (Schema database)
- ✅ Model (Eloquent ORM)
- ✅ Controller (Admin CRUD)
- ✅ Routes (Web & API)
- ✅ Seeder (Test data)

---

## 🎯 8 Database Modules

### 1. **Web Settings** ⚙️

**Tabel:** `web_settings` (Single row)

- `video_url` - Link YouTube untuk Home
- `email` - Email kontak
- `phone` - No. WhatsApp
- `address` - Alamat kesekretariatan

**Model:** `App\Models\WebSetting`
**Controller:** `App\Http\Controllers\Admin\WebSettingController`
**Routes:**

```
GET    /admin/web-settings       → index (tampil form)
PUT    /admin/web-settings       → update (simpan perubahan)
```

---

### 2. **Statistik** 📊

**Tabel:** `statistics` (Multiple rows)

- `label` - Nama (contoh: "Alumni Tersebar")
- `value` - Angka (contoh: "150+")
- `description` - Teks kecil (contoh: "2014-2024")
- `order` - Urutan tampilan
- `is_active` - Status aktif/nonaktif

**Model:** `App\Models\Statistic` (dengan scopes: `active()`, `ordered()`)
**Controller:** `App\Http\Controllers\Admin\StatisticController`
**Routes:**

```
GET    /admin/statistics              → index (daftar semua)
GET    /admin/statistics/create       → create (form buat baru)
POST   /admin/statistics              → store (simpan data baru)
GET    /admin/statistics/{id}/edit    → edit (form edit)
PUT    /admin/statistics/{id}         → update (simpan perubahan)
DELETE /admin/statistics/{id}         → destroy (hapus)
```

---

### 3. **Departemen** 🏢

**Tabel:** `departments` (Max 6 departemen)

- `name` - Nama departemen (contoh: "RISTEK")
- `slug` - URL friendly (contoh: "ristek")
- `description` - Penjelasan lengkap
- `vision` - Teks visi departemen
- `mission` - Teks misi (format HTML/List)
- `group_photo` - Foto grup landscape
- `order` - Urutan tampilan
- `is_active` - Status aktif/nonaktif

**Relations:**

- `hasMany('members')` - Relasi ke Members
- `hasMany('workPrograms')` - Relasi ke Work Programs

**Model:** `App\Models\Department` (dengan scopes: `active()`, `ordered()`)
**Controller:** `App\Http\Controllers\Admin\DepartmentController`
**Routes:**

```
GET    /admin/departments              → index
GET    /admin/departments/create       → create
POST   /admin/departments              → store
GET    /admin/departments/{id}/edit    → edit
PUT    /admin/departments/{id}         → update
DELETE /admin/departments/{id}         → destroy
```

---

### 4. **Members** 👥

**Tabel:** `members` (Unlimited rows)

- `department_id` - FK ke departments (nullable)
- `name` - Nama lengkap
- `position` - Jabatan (contoh: "Ketua Umum", "Kadep RISTEK")
- `hierarchy` - Enum: `pembina`, `inti`, `kadep`, `staf`
- `linkedin_url` - Link profil LinkedIn (nullable)
- `photo` - Foto profil (rasio 3:4)
- `order` - Urutan tampilan
- `is_active` - Status aktif/nonaktif

**Relations:**

- `belongsTo('department')` - Relasi ke Department

**Model:** `App\Models\Member`
**Controller:** `App\Http\Controllers\Admin\MemberController`
**Routes:**

```
GET    /admin/members              → index
GET    /admin/members/create       → create
POST   /admin/members              → store
GET    /admin/members/{id}/edit    → edit
PUT    /admin/members/{id}         → update
DELETE /admin/members/{id}         → destroy
```

---

### 5. **Program Kerja** 🎯

**Tabel:** `work_programs` (Unlimited rows)

- `department_id` - FK ke departments (required)
- `name` - Nama proker
- `slug` - URL friendly (auto-generated)
- `short_description` - Teks singkat (maks 250 karakter)
- `content` - Teks lengkap (format HTML/WYSIWYG)
- `cover_image` - Foto utama (rasio 1:1)
- `gallery_images` - JSON array dengan path gambar-gambar dokumentasi
- `order` - Urutan tampilan
- `is_active` - Status aktif/nonaktif

**Relations:**

- `belongsTo('department')` - Relasi ke Department

**Model:** `App\Models\WorkProgram` (cast: `gallery_images` → array)
**Controller:** `App\Http\Controllers\Admin\WorkProgramController`
**Routes:**

```
GET    /admin/work-programs              → index
GET    /admin/work-programs/create       → create
POST   /admin/work-programs              → store
GET    /admin/work-programs/{id}/edit    → edit
PUT    /admin/work-programs/{id}         → update
DELETE /admin/work-programs/{id}         → destroy
```

---

### 6. **Berita & Kegiatan** 📰

**Tabel:** `news` (Unlimited rows)

- `title` - Judul berita
- `slug` - URL friendly (auto-generated)
- `category` - Kategori (contoh: "Prestasi", "Kegiatan", "Informasi")
- `content` - Isi berita lengkap (format HTML/WYSIWYG)
- `published_at` - Tanggal publikasi
- `cover_image` - Foto utama (rasio 1:1)
- `gallery_images` - JSON array dengan dokumentasi tambahan
- `is_published` - Status publish
- `order` - Urutan tampilan

**Model:** `App\Models\News` (dengan scopes: `published()`, `ordered()`, cast: `gallery_images` → array)
**Controller:** `App\Http\Controllers\Admin\NewsController`
**Routes:**

```
GET    /admin/news              → index
GET    /admin/news/create       → create
POST   /admin/news              → store
GET    /admin/news/{id}/edit    → edit
PUT    /admin/news/{id}         → update
DELETE /admin/news/{id}         → destroy
```

---

### 7. **Kompetisi** 🏆

**Tabel:** `competitions` (Unlimited rows)

- `title` - Judul lomba
- `slug` - URL friendly (auto-generated)
- `category` - Enum: `internasional`, `nasional`, `dikti`, `kti_essay`, `poster`, `debat`, `business_plan`, `video_editing`
- `deadline` - Tanggal batas pendaftaran
- `description` - Penjelasan lengkap
- `registration_link` - URL form pendaftaran eksternal
- `poster_images` - JSON array dengan foto poster (carousel)
- `order` - Urutan tampilan
- `is_active` - Status aktif/nonaktif

**Model:** `App\Models\Competition` (cast: `poster_images` → array, `deadline` → date)
**Controller:** `App\Http\Controllers\Admin\CompetitionController`
**Routes:**

```
GET    /admin/competitions              → index
GET    /admin/competitions/create       → create
POST   /admin/competitions              → store
GET    /admin/competitions/{id}/edit    → edit
PUT    /admin/competitions/{id}         → update
DELETE /admin/competitions/{id}         → destroy
```

---

### 8. **Inbox/Kontak** 📩

**Tabel:** `inbox_messages` (Auto-populate dari contact form)

- `name` - Nama pengirim
- `email` - Email pengirim
- `phone` - No. WhatsApp (nullable)
- `subject` - Subjek pesan
- `message` - Isi pesan
- `is_read` - Status: Belum dibaca (0) / Sudah dibaca (1)
- `timestamps` - created_at, updated_at

**Model:** `App\Models\InboxMessage` (cast: `is_read` → boolean)
**Controller:** `App\Http\Controllers\Admin\InboxMessageController`
**Routes (Admin Panel):**

```
GET    /admin/inbox                               → index (daftar pesan)
GET    /admin/inbox/{id}                          → show (detail pesan)
PUT    /admin/inbox/{id}/mark-as-read             → markAsRead
PUT    /admin/inbox/{id}/mark-as-unread           → markAsUnread
DELETE /admin/inbox/{id}                          → destroy (hapus 1 pesan)
POST   /admin/inbox/destroy-multiple              → destroyMultiple (hapus banyak)
```

**Routes (API):**

```
POST   /api/contact/send                          → store (from contact form)
```

---

## 🚀 Setup Langkah-demi-Langkah

### Opsi 1: Menggunakan MySQL

#### Prasyarat:

- MySQL Server sudah running
- Database `db_perisai` sudah dibuat

#### Langkah Setup:

1. **Verifikasi Konfigurasi Database (.env)**

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_perisai
    DB_USERNAME=root
    DB_PASSWORD=
    ```

2. **Start MySQL Service**

    ```powershell
    # Windows (menggunakan XAMPP/MAMP)
    # Buka XAMPP Control Panel → Start MySQL

    # Atau jika menggunakan WSL
    wsl sudo service mysql start
    ```

3. **Jalankan Migration Fresh + Seeder**

    ```bash
    php artisan migrate:fresh --seed
    ```

4. **Verifikasi Tabels**

    ```bash
    php artisan tinker
    > DB::select('show tables')
    > exit
    ```

5. **Run Development Server**
    ```bash
    php artisan serve
    ```

---

### Opsi 2: Menggunakan SQLite (Development)

#### Keuntungan:

- ✅ Tidak perlu install MySQL
- ✅ Tidak perlu start service
- ✅ File-based database
- ✅ Cocok untuk development

#### Langkah Setup:

1. **Update .env**

    ```
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=db_perisai
    # DB_USERNAME=root
    # DB_PASSWORD=

    # Atau biarkan ada tapi tidak dipakai
    ```

2. **Buat File Database**

    ```bash
    touch database/database.sqlite
    ```

3. **Jalankan Migration Fresh + Seeder**

    ```bash
    php artisan migrate:fresh --seed
    ```

4. **Verifikasi**

    ```bash
    # File database/database.sqlite harus exist dan ada size > 0
    ls -la database/database.sqlite
    ```

5. **Run Development Server**
    ```bash
    php artisan serve
    ```

---

## 🔐 Login Credential (dari Seeder)

**Email:** `admin@perisaiumi.ac.id`
**Password:** `password`

---

## 📁 File Structure

```
database/
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_cache_table.php
│   ├── 0001_01_01_000002_create_jobs_table.php
│   ├── 2025_01_01_000001_create_web_settings_table.php
│   ├── 2025_01_01_000002_update_statistics_table.php
│   ├── 2025_01_01_000003_update_departments_table.php
│   ├── 2025_01_01_000004_create_members_table.php
│   ├── 2025_01_01_000005_create_work_programs_table.php
│   ├── 2025_01_01_000006_update_news_table.php
│   ├── 2025_01_01_000007_create_competitions_table.php
│   └── 2025_01_01_000008_create_inbox_messages_table.php
├── seeders/
│   ├── DatabaseSeeder.php
│   ├── WebSettingSeeder.php
│   ├── StatisticSeeder.php
│   ├── DepartmentSeeder.php
│   ├── MemberSeeder.php
│   ├── WorkProgramSeeder.php
│   ├── NewsSeeder.php
│   └── CompetitionSeeder.php

app/
├── Models/
│   ├── WebSetting.php
│   ├── Statistic.php
│   ├── Department.php
│   ├── Member.php
│   ├── WorkProgram.php
│   ├── News.php
│   ├── Competition.php
│   └── InboxMessage.php
├── Http/Controllers/Admin/
│   ├── WebSettingController.php
│   ├── StatisticController.php
│   ├── DepartmentController.php
│   ├── MemberController.php
│   ├── WorkProgramController.php
│   ├── NewsController.php
│   ├── CompetitionController.php
│   └── InboxMessageController.php

routes/
├── web.php (All admin panel routes + web routes)
└── api.php (Public API + Auth routes)
```

---

## 🛠️ Useful Commands

```bash
# 1. Fresh migration with seeder
php artisan migrate:fresh --seed

# 2. Only rollback (delete all tables)
php artisan migrate:rollback

# 3. Only migrate (create tables)
php artisan migrate

# 4. Only seed
php artisan db:seed

# 5. Seed specific seeder
php artisan db:seed --class=StatisticSeeder

# 6. Check database
php artisan tinker
> DB::select('select * from statistics limit 1')
> exit

# 7. Clear cache
php artisan cache:clear

# 8. Generate app key (jika belum ada)
php artisan key:generate
```

---

## 📡 API Endpoints

### Public Endpoints

```
GET    /api/statistics
GET    /api/departments
GET    /api/departments/{id}
GET    /api/news
GET    /api/news/{id}
POST   /api/contact/send
```

### Protected Endpoints (Require Auth)

```
POST   /api/login
POST   /api/logout
GET    /api/user
```

---

## ⚠️ Troubleshooting

### Error: "SQLSTATE[HY000] [2002] No connection could be made"

**Solusi:**

- Pastikan MySQL service sudah running
- Atau switch ke SQLite (Opsi 2 di atas)

### Error: "Base table or view already exists"

**Solusi:**

```bash
php artisan migrate:fresh --seed
# Ini akan drop semua table dan buat ulang
```

### Migration pending tidak berjalan

**Solusi:**

```bash
php artisan migrate --step
# atau
php artisan migrate
```

### Seeder tidak berjalan

**Solusi:**

```bash
php artisan db:seed
# atau specific seeder
php artisan db:seed --class=DepartmentSeeder
```

---

## 📝 Notes

1. **Slug Generation**: Semua model yang perlu URL-friendly name sudah auto-generate slug menggunakan `Str::slug()`

2. **JSON Columns**:
    - `gallery_images` di work_programs & news → disimpan sebagai JSON array
    - `poster_images` di competitions → disimpan sebagai JSON array
    - Semua sudah di-cast sebagai array di Model

3. **File Upload Paths**:
    - Members photos: `storage/app/public/members/`
    - Departments group photos: `storage/app/public/departments/`
    - Work programs: `storage/app/public/work-programs/`
    - News: `storage/app/public/news/`
    - Competitions: `storage/app/public/competitions/`

4. **Timestamps**: Semua tabel otomatis punya `created_at` dan `updated_at` dari `$table->timestamps()`

5. **Status Fields**:
    - `is_active` → untuk soft-deactivate tanpa delete
    - `is_published` → untuk schedule/draft news
    - `is_read` → untuk track pesan yang sudah dibaca

---

## ✅ Checklist Selesai

- ✅ 8 Migrations (Database schema)
- ✅ 8 Models (dengan relationships & casts)
- ✅ 8 Controllers (Full CRUD)
- ✅ Routes (Web + API)
- ✅ Seeders (Test data untuk setiap module)
- ✅ Dashboard Controller (Updated untuk struktur baru)
- ✅ Old models deleted (VisionMission, OrganizationalStructure)
- ✅ Old migrations deleted (Duplicate & unused)

**Status**: 🟢 **READY TO LAUNCH**

Sekarang tinggal menjalankan `php artisan migrate:fresh --seed` dan sistem siap!
