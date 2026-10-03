# Backend Global State & Persistence Reference (Laravel 11)

Dokumen acuan konfigurasi state persistence, caching, session, dan database pool backend.

---

### 1. Database Connection & ORM
- **Default Connection:** SQLite (`database/database.sqlite`) / MySQL / PostgreSQL sesuai konfigurasi environment (`DB_CONNECTION`).
- **ORM:** Eloquent ORM & Query Builder (`Illuminate\Support\Facades\DB`).
- **State Pool:** Managed PDO connection instance per HTTP request lifecycle.

---

### 2. Cache Layer (`config/cache.php`)
- **Default Store:** `database` (menggunakan tabel `cache` dan `cache_locks`) atau `file` / `redis`.
- **Usage Standard:**
  - `Cache::get($key, $default)`
  - `Cache::put($key, $value, $ttl)`
  - `Cache::remember($key, $ttl, Closure)`

---

### 3. Session Management (`config/session.php`)
- **Driver:** `database` (tabel `sessions`) / `file` / `cookie`.
- **Lifecycle:** Stateful HTTP session untuk antarmuka web, terisolasi via cookie enkripsi `laravel_session`.
- **Stateless Guard:** Untuk API endpoint murni, gunakan stateless tokens / bearer tokens (Sanctum/Passport).

---

### 4. Queue & Background Jobs (`config/queue.php`)
- **Default Connection:** `database` (tabel `jobs` dan `job_batches`) / `sync`.
- **Asynchronous Execution:** Digunakan untuk pemrosesan batch, pengiriman email, dan tugas berat di luar siklus respons HTTP.