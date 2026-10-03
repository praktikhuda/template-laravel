# Project Directory Structure & Manifest

```text
template-laravel/
├── AGENTS.md                          # [ROOT] Panduan wajib AI, keyword rules, entry protocol
├── README.md                          # Dokumentasi umum repositori Laravel
├── artisan                            # Entry point CLI Artisan Laravel
├── composer.json                      # Dependensi pustaka PHP & konfigurasi autoload PSR-4
├── package.json                       # Dependensi frontend toolchain (Vite, Tailwind, PostCSS)
├── phpunit.xml                        # Konfigurasi automated testing PHPUnit
├── postcss.config.js                  # Konfigurasi PostCSS untuk Tailwind CSS
├── tailwind.config.js                 # Konfigurasi utility styling Tailwind CSS
├── vite.config.js                     # Konfigurasi bundling Vite untuk asset Laravel
├── .env / .env.example                # Variabel lingkungan aplikasi (DB, CACHE, QUEUE, APP_KEY)
├── .gitignore                         # Daftar berkas & folder yang diabaikan Git (termasuk .pheee/)
│
├── .pheee/                            # [AGENT BRAIN] Sistem kontrol konteks & knowledge AI
│   ├── rules.md                       # Standar operasional, surgical read, dan etika token
│   ├── command.md                     # Kamus perintah shortcut (debug, perbaiki, sync, audit)
│   ├── contracts.md                   # Envelope API response, DTO, & error standard
│   ├── store_state.md                 # State global backend (Database, Cache, Session, Queue)
│   ├── structure.md                   # Peta visual struktur file proyek (file ini)
│   ├── changelog.md                   # Histori perubahan fitur & berkas proyek
│   ├── history_chat/                  # [RECORDER] Jejak sesi prompt harian & dataset kesalahan koding
│   │   ├── log-2026-10-03.md          # Log aktivitas prompt per sesi harian (append-only)
│   │   └── mistakes_dataset.md        # Dataset kumpulan kesalahan koding & solusi clean code
│   └── susunan/                       # Peta modul fungsi & controller backend
│       └── README.md                  # Indeks peta susunan modul
│
├── konsep/                            # [DISKUSI & KONSEP] Catatan diskusi, blueprint, & arsitektur
│   ├── catatan-diskusi-penerapan-daisyui.md # Analisis & opsi arsitektur integrasi DaisyUI
│   ├── catatan-diskusi-migrasi-konsep-nuxt-ke-laravel.md # Blueprint implementasi JSON Dynamic Dashboard Nuxt ke Laravel
│   ├── catatan-diskusi-rekomendasi-global-skills.md # Rekomendasi daftar global skills untuk config/skills/
│   ├── catatan-diskusi-skill-learning-mistakes-history.md # Konsep perekaman history prompt & dataset kesalahan coding
│   ├── catatan-diskusi-skill-ui-template-archivist.md # Blueprint & alur kerja skill penyimpan gambar dan pembuat acuan template .md
│   ├── panduan-penggunaan-ui-template-vault.md # Cheat sheet panduan cara menyimpan dan memasang template UI dari global vault
│   └── skills/                        # Template skills kustom
│       ├── auto-agents-protocol/      # Skill global otomatisasi AGENTS.md, .pheee, dan .gitignore
│       │   └── SKILL.md               # Definisi & alur eksekusi skill
│       ├── coding-mistakes-recorder/  # Skill pencatatan history prompt & dataset kesalahan (append-only)
│       │   └── SKILL.md               # Definisi & alur eksekusi skill
│       ├── cross-project-agents-protocol/ # Skill inspeksi proyek referensi eksternal
│       │   └── SKILL.md               # Definisi & instruksi skill
│       └── ui-template-vault/         # Gudang acuan desain & template UI global
│           └── SKILL.md               # Definisi & panduan ekstraksi template
│
├── app/                               # Kode inti logika aplikasi backend (Laravel 11)
│   ├── Http/                          # Lapisan HTTP handling
│   │   └── Controllers/               # Request controllers
│   │       └── Controller.php         # Base controller class
│   ├── Models/                        # Domain models & Eloquent ORM
│   │   └── User.php                   # Model entitas pengguna aplikasi
│   └── Providers/                     # Service providers bootstrapping
│       └── AppServiceProvider.php     # Registrasi dan bootstrapping global service
│
├── bootstrap/                         # Bootstrap & inisialisasi framework
│   ├── app.php                        # Konfigurasi middleware, routing, dan exceptions Laravel 11
│   └── providers.php                  # Daftar service provider yang dimuat aplikasi
│
├── config/                            # Konfigurasi konfigurasi sistem aplikasi
│   ├── app.php                        # Pengaturan umum aplikasi, timezone, locale
│   ├── auth.php                       # Konfigurasi guard, provider otentikasi & hashing
│   ├── cache.php                      # Driver & store caching (database, file, redis)
│   ├── database.php                   # Konfigurasi koneksi database (sqlite, mysql, pgsql)
│   ├── filesystems.php                # Driver media storage (local, public, s3)
│   ├── logging.php                    # Kanal & konfigurasi logging aplikasi
│   ├── mail.php                       # Konfigurasi SMTP & mailer transport
│   ├── queue.php                      # Konfigurasi connection & worker antrean pekerjaan
│   ├── services.php                   # Konfigurasi credentials third-party service
│   └── session.php                    # Konfigurasi storage & lifecycle session
│
├── database/                          # Skema, migrasi, dan seed data
│   ├── factories/                     # Model factories untuk testing & seeding
│   ├── migrations/                    # File migrasi DDL database
│   │   ├── 0001_01_01_000000_create_users_table.php   # Migrasi tabel users & reset token
│   │   ├── 0001_01_01_000001_create_cache_table.php   # Migrasi tabel cache sistem
│   │   └── 0001_01_01_000002_create_jobs_table.php    # Migrasi tabel queue jobs & batches
│   └── seeders/                       # Database seeders
│       └── DatabaseSeeder.php         # Seeder utama untuk inisialisasi data
│
├── public/                            # Web root public server
│   ├── index.php                      # HTTP entry point Laravel
│   └── robots.txt                     # Kebijakan web crawler
│
├── resources/                         # Assets mentah dan views aplikasi
│   ├── css/                           # Stylesheets aplikasi
│   │   └── app.css                    # Entry CSS Tailwind
│   ├── js/                            # JavaScript frontend scripts
│   │   ├── app.js                     # Entry point JS utama
│   │   └── bootstrap.js               # Inisialisasi Axios & HTTP client
│   └── views/                         # Template Blade
│       ├── layouts/                   # Master app shells
│       │   └── app.blade.php          # Master layout dashboard (Tailwind native, drawer, dual-theme)
│       ├── components/                # Reusable Blade components
│       │   ├── layouts/               # Blade layout components (<x-layouts...>)
│       │   │   └── app.blade.php      # Master layout component
│       │   ├── button.blade.php       # Komponen tombol serbaguna
│       │   ├── card.blade.php         # Komponen container kartu
│       │   ├── badge.blade.php        # Komponen badge status
│       │   ├── table.blade.php        # Komponen tabel responsif
│       │   └── modal/
│       │       └── confirm.blade.php  # Komponen modal dialog konfirmasi
│       ├── dashboard.blade.php        # Halaman utama dashboard keuangan multi-wallet
│       ├── dashboard-simple.blade.php # Halaman dashboard SaaS Product Management (template global)
│       └── welcome.blade.php          # Tampilan default landing page Laravel
│
├── routes/                            # Definisi rute aplikasi
│   ├── console.php                    # Rute command-line Artisan
│   └── web.php                        # Rute HTTP web browser
│
├── storage/                           # Storage internal sistem (logs, cache, uploads)
└── tests/                             # Automated testing suite (Feature & Unit)
```