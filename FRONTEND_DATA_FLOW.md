# Frontend Data Flow Guide - PERISAI UMI

## 📊 Alur Data: Admin Input → Database → Frontend Display

Semua data di halaman frontend sekarang diambil **langsung dari database** (hasil input admin), bukan hardcoded di kode.

---

## 🏠 1. HOME PAGE (`/`)

### Controller: `HomeController@index`

```php
$latestNews = News::published()->ordered()->take(2)->get();
$statistics = Statistic::active()->ordered()->get();
```

**Data yang ditampilkan:**

- **Statistics** (Angka-angka berputar) → dari tabel `statistics`
- **Latest News** (2 berita terbaru) → dari tabel `news`

### Router Entry Points:

```
GET /   → HomeController@index
```

**Admin Input:**

- Via `/admin/statistics` - Input statistik
- Via `/admin/news` - Input berita

---

## 📖 2. ABOUT / SUMBER DAYA

### Halaman 1: Visi Misi (`/about/visi-misi`)

**Controller:** `AboutController@visiMisi`

```php
$departments = Department::active()->ordered()->get();
```

**Data yang ditampilkan:**

- Semua departemen dengan visi & misi mereka → dari tabel `departments`

### Halaman 2: Struktur Pengurus (`/about/struktur`)

**Controller:** `AboutController@struktur`

```php
$pembina = Member::where('hierarchy', 'pembina')->active()->ordered()->get();
$inti = Member::where('hierarchy', 'inti')->active()->ordered()->get();
$kadep = Member::where('hierarchy', 'kadep')->active()->ordered()->with('department')->get();
$staf = Member::where('hierarchy', 'staf')->active()->ordered()->with('department')->get();
```

**Data ditampilkan:**

- Pembina
- BPH Inti
- Kepala Departemen per departemen
- Staf per departemen

Semua dari tabel `members` berdasarkan column `hierarchy`.

### Halaman 3: Sumber Daya (`/about/sumberdaya`)

**Controller:** `AboutController@sumberDaya`

Sama seperti halaman Struktur, menampilkan semua members dikelompokkan per kategori.

### Halaman 4: Detail Departemen (`/about/departemen/{slug}`)

**Controller:** `AboutController@departemenDetail`

```php
$department = Department::where('slug', $slug)->active()->firstOrFail();
$members = $department->members()->active()->ordered()->get();
$workPrograms = $department->workPrograms()->active()->ordered()->get();
```

**Data yang ditampilkan:**

- Detail departemen (nama, visi, misi, foto grup)
- Members yang tergabung di departemen ini
- Work programs yang dijalankan departemen

### Router Entry Points:

```
GET /about/visi-misi
GET /about/struktur
GET /about/sumberdaya
GET /about/departemen/{slug}
```

**Admin Input:**

- Via `/admin/departments` - Input departemen (visi, misi, foto)
- Via `/admin/members` - Input staff/pengurus

---

## 🎯 3. ACTIVITY

### Halaman 1: Activity Index (`/activity`)

**Controller:** `ActivityController@index`

```php
$news = News::published()->ordered()->paginate(9);
```

**Data yang ditampilkan:**

- Daftar semua berita & kegiatan dengan pagination (9 per halaman)
- Dari tabel `news`

### Halaman 2: Program Kerja (`/activity/proker`)

**Controller:** `ActivityController@proker`

```php
$workPrograms = WorkProgram::active()->ordered()->with('department')->paginate(9);
```

**Data yang ditampilkan:**

- Daftar semua program kerja dengan pagination
- Dari tabel `work_programs`

### Halaman 3: Detail Program Kerja (`/activity/proker/{slug}`)

**Controller:** `ActivityController@detailProker`

```php
$workProgram = WorkProgram::where('slug', $slug)->active()->with('department')->firstOrFail();
```

**Data yang ditampilkan:**

- Detail proker lengkap
- Nama, short description, content, cover image, gallery
- Info departemen penyelenggara

### Halaman 4: Detail News (`/activity/news/{slug}`)

**Controller:** `ActivityController@detailNews`

```php
$news = News::where('slug', $slug)->published()->firstOrFail();
```

**Data yang ditampilkan:**

- Detail berita lengkap
- Judul, kategori, konten, cover image, gallery

### Router Entry Points:

```
GET /activity              → ActivityController@index
GET /activity/proker       → ActivityController@proker
GET /activity/proker/{slug}    → ActivityController@detailProker
GET /activity/news/{slug}      → ActivityController@detailNews
```

**Admin Input:**

- Via `/admin/work-programs` - Input program kerja
- Via `/admin/news` - Input berita

---

## 🏆 4. COMPETITION

### Halaman 1: Competition List (`/competition`)

**Controller:** `CompetitionController@index`

```php
$competitions = Competition::active()
    ->orderBy('deadline', 'asc')
    ->paginate(9);
```

**Data yang ditampilkan:**

- Daftar semua kompetisi aktif (diurutkan berdasarkan deadline)
- Dari tabel `competitions`

### Halaman 2: Detail Competition (`/competition/{slug}`)

**Controller:** `CompetitionController@detail`

```php
$competition = Competition::where('slug', $slug)->active()->firstOrFail();
$relatedCompetitions = Competition::active()
    ->where('id', '!=', $competition->id)
    ->where('category', $competition->category)
    ->limit(3)
    ->get();
```

**Data yang ditampilkan:**

- Detail kompetisi lengkap
- Related competitions (3 kompetisi lain dengan kategori sama)

### Router Entry Points:

```
GET /competition        → CompetitionController@index
GET /competition/{slug} → CompetitionController@detail
```

**Admin Input:**

- Via `/admin/competitions` - Input kompetisi

---

## 📩 5. CONTACT US

### Halaman Contact (`/contact`)

**Controller:** `ContactController@index`

```php
$settings = WebSetting::getSettings();
```

**Data yang ditampilkan:**

- Email kontak
- No. WhatsApp
- Alamat kesekretariatan
- Dari tabel `web_settings`

### Form Submission (`POST /contact/send`)

**Controller:** `ContactController@send`

```php
InboxMessage::create($validated);
```

**Flow:**

1. User isi form contact
2. Data disimpan ke tabel `inbox_messages`
3. Admin bisa melihat di `/admin/inbox`

### Router Entry Points:

```
GET  /contact               → ContactController@index
POST /contact/send          → ContactController@send
```

**Admin Input:**

- Via `/admin/web-settings` - Update info kontak
- Via `/admin/inbox` - Lihat pesan masuk

---

## 🔗 Model Scopes (untuk Frontend Query)

Semua model sudah punya scopes untuk memudahkan query:

### `active()` scope

Hanya menampilkan data yang `is_active = true`

```php
// Digunakan di:
Department::active()->get();
Member::active()->get();
WorkProgram::active()->get();
Competition::active()->get();
News::published()->get();  // special scope untuk news
```

### `ordered()` scope

Mengurutkan berdasarkan column `order`

```php
// Digunakan di:
Statistic::ordered()->get();
Department::ordered()->get();
Member::ordered()->get();
WorkProgram::ordered()->get();
```

### `published()` scope (News only)

Hanya menampilkan berita yang sudah dipublish dan tanggalnya <= sekarang

```php
News::published()->get();
News::published()->ordered()->get();
```

---

## 📁 Data Flow Diagram

```
┌─────────────────────┐
│  Admin Panel Input  │
└──────────┬──────────┘
           │
    ┌──────▼───────┐
    │  Database    │
    │  (8 Tables)  │
    └──────┬───────┘
           │
    ┌──────▼────────────────┐
    │ Frontend Controllers  │
    │ (Home, About,         │
    │  Activity, Compet.)   │
    └──────┬────────────────┘
           │
    ┌──────▼──────────────┐
    │ Laravel Views       │
    │ (Blade Templates)   │
    └─────────────────────┘
           │
           ▼
    ┌────────────────────┐
    │  Public Website    │
    │  (User Browser)    │
    └────────────────────┘
```

---

## 📊 Tabel Mapping untuk Frontend

| Halaman       | View                          | Data Table                          | Controller Method                | Admin Route          |
| ------------- | ----------------------------- | ----------------------------------- | -------------------------------- | -------------------- |
| Home          | pages.home.index              | statistics, news                    | HomeController@index             | /admin/statistics    |
| Visi-Misi     | pages.about.visi-misi         | departments                         | AboutController@visiMisi         | /admin/departments   |
| Struktur      | pages.about.struktur          | members                             | AboutController@struktur         | /admin/members       |
| Sumber Daya   | pages.about.sumberdaya        | members                             | AboutController@sumberDaya       | /admin/members       |
| Detail Dept   | pages.about.detail-departemen | departments, members, work_programs | AboutController@departemenDetail | /admin/departments   |
| Activity List | pages.activity.index          | news                                | ActivityController@index         | /admin/news          |
| Proker List   | pages.activity.proker         | work_programs, departments          | ActivityController@proker        | /admin/work-programs |
| Detail Proker | pages.activity.detail-proker  | work_programs                       | ActivityController@detailProker  | /admin/work-programs |
| Detail News   | pages.activity.detail-news    | news                                | ActivityController@detailNews    | /admin/news          |
| Competition   | pages.competition.index       | competitions                        | CompetitionController@index      | /admin/competitions  |
| Detail Comp   | pages.competition.detail      | competitions                        | CompetitionController@detail     | /admin/competitions  |
| Contact       | pages.contact.index           | web_settings                        | ContactController@index          | /admin/web-settings  |

---

## 🚀 Cara Mengupdate Frontend Display

### Contoh: Menambah News

1. **Admin** masuk ke `/admin/news`
2. Click "Create New"
3. Isi form (title, kategori, content, cover image, etc)
4. Click "Save"

**Otomatis:**

- Data tersimpan di tabel `news`
- Halaman `/activity` akan menampilkan berita baru
- Berita bisa diakses via `/activity/news/{slug}`

---

### Contoh: Update Departemen Visi/Misi

1. **Admin** masuk ke `/admin/departments`
2. Click "Edit" pada departemen
3. Update visi & misi text
4. Click "Save"

**Otomatis:**

- Data tersimpan di tabel `departments`
- Halaman `/about/visi-misi` akan menampilkan visi/misi terbaru
- Halaman `/about/departemen/{slug}` akan terupdate

---

## ⚠️ Important Notes

### 1. **Slug Generation**

Slug otomatis di-generate dari title/name:

- "Program Kerja Besar" → "program-kerja-besar"
- Digunakan untuk URL (contoh: `/activity/proker/program-kerja-besar`)

### 2. **Status Filters**

Frontend hanya menampilkan data yang:

- `is_active = true` (untuk department, member, work_programs, competitions)
- `is_published = true` DAN `published_at <= now()` (untuk news)

Admin bisa:

- Deactivate item tanpa hapus data
- Schedule publikasi berita ke masa depan

### 3. **Relationships**

Frontend menggunakan relasi model untuk data terkait:

- `Department::with('members')` - Anggota departemen
- `Department::with('workPrograms')` - Program kerja departemen
- `Member::with('department')` - Departemen member

### 4. **Pagination**

Halaman dengan banyak item pakai pagination:

- Activity list: 9 per halaman
- Proker list: 9 per halaman
- Competition: 9 per halaman

---

## ✅ Checklist Selesai

- ✅ HomeController - Ambil data dari database
- ✅ AboutController - Ambil members & departments
- ✅ ActivityController - Ambil news & work programs
- ✅ CompetitionController - Ambil competitions
- ✅ ContactController - Save ke database + ambil settings
- ✅ Semua routes updated ke controller methods
- ✅ Semua models punya scopes (active, ordered, published)
- ✅ Relationships sudah configured
- ✅ Database struktur siap

**Status**: 🟢 **READY - Setiap admin input langsung ter-update di frontend!**

---

## 📞 Support

Jika UI views belum sesuai struktur data, silakan update:

- Path: `resources/views/pages/`
- Gunakan variable yang dikirim controller
- Contoh: `@foreach($news as $item)...@endforeach`
