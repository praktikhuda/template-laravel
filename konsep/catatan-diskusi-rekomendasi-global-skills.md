# Catatan Diskusi: Rekomendasi Global Skills untuk Antigravity

- **Tanggal:** 2026-10-03
- **Status:** Rekomendasi & Blueprint
- **Lokasi Target:** `C:\Users\Pheee\.gemini\config\skills/`

---

## Daftar Rekomendasi Global Skills

### 1. `auto-agents-protocol` (Aktivasi Otomatis & Auto-Setup)
- **Tujuan:** Menjamin kepatuhan protokol AI di setiap proyek.
- **Logika Otomatisasi (Jika `AGENTS.md` & `.pheee/` Belum Ada):**
  1. AI otomatis mendeteksi ketiadaan berkas `AGENTS.md` dan folder `.pheee/`.
  2. Secara otomatis membuatkan berkas `AGENTS.md` dasar.
  3. Menjalankan alur inisialisasi `.pheee/` (`init-pheee`: deteksi stack, `structure.md`, `contracts.md`, `store_state.md`, `susunan/`).
  4. **Wajib Gitignore:** Otomatis menambahkan baris `.pheee/` ke dalam berkas `.gitignore` proyek agar folder internal agen tidak mengotori repositori git.

### 2. `surgical-read-protocol`
- **Tujuan:** Menjamin efisiensi token mutlak di setiap proyek.
- **Aturan:** Melarang pembacaan satu file utuh (`no full-file read`). Pencarian wajib berbasis nama identifier/fungsi melalui regex/grep, lalu membaca HANYA rentang baris kurung pembuka `{` hingga kurung penutup `}`.

### 3. `pheee-system-engine`
- **Tujuan:** Engine eksekutor kamus perintah `.pheee/` (`init-pheee`, `sync`, `audit`, `perbaiki`, `tambah menu`).
- **Integritas:** Seluruh pembaruan terhadap berkas `.pheee/` wajib berjalan senyap di latar belakang (*background silent update*) tanpa mendump isi file ke chat pengguna.

### 4. `daisyui-theme-system`
- **Tujuan:** Standar UI/UX frontend berbasis DaisyUI + Tailwind CSS.
- **Standar:** 4-State Visual (Loading skeleton, Error, Empty, Ready), dual theme `light` & `night`, serta table data alignment.

### 5. `api-envelope-guardian`
- **Tujuan:** Standarisasi response contract backend (Laravel & Go Fiber).
- **Aturan:** Global envelope `{ status, message, data, metadata }`, *anti-null array safety* (`[]`), dan semantik HTTP status code.
