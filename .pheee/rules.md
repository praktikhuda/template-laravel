# Agent Core Rules & Protocol

Berkas ini adalah hukum operasional mutlak dalam proyek ini. Setiap AI Agent wajib mematuhi seluruh poin di bawah ini sebelum dan selama mengeksekusi instruksi pengguna.

---

## 1. Aturan Efisiensi Token & Respon
- **Dilarang Menampilkan Seluruh Isi Berkas:** Jangan pernah mencetak ulang seluruh baris berkas kode jika hanya memodifikasi sebagian fungsi. Selalu gunakan format *diff* atau potongan blok fungsi terkait.
- **Pembaruan Senyap (*Background Update*):** Pembaruan terhadap `.pheee/susunan/`, `.pheee/structure.md`, dan `.pheee/changelog.md` wajib dilakukan secara otomatis di latar belakang tanpa mencetak ulang seluruh isi dokumen tersebut ke layar obrolan pengguna.

---

## 2. Navigasi Modular (Susunan First Protocol)
- **Dilarang Membaca Codebase Secara Acak:** Jangan pernah melakukan pembacaan direktori menyeluruh atau membuka berkas tanpa acuan konteks.
- **Urutan Langkah Navigasi:**
  1. Identifikasi modul yang relevan melalui `.pheee/susunan/README.md`.
  2. Buka dan baca HANYA berkas susunan spesifik di `.pheee/susunan/<nama_modul>.md`.
  3. Buka berkas kode sumber asli HANYA jika fungsi terkait perlu diubah atau diteliti lebih lanjut.

---

## 3. Surgical Read Protocol (Resilient Identifier Search)
- **Larangan Mutlak:** Dilarang keras melakukan inspeksi menyeluruh (baris 1 sampai akhir / full-file read) terhadap berkas kode sumber aplikasi (`.vue`, `.js`, `.go`, `.php`, dll.).
- **Pencarian Berbasis Identifier (Resilient):**
  - DILARANG mengandalkan nomor baris statis atau teks komentar (yang rentan dihapus oleh maintainer lain).
  - AI wajib mencari pola deklarasi teknis nama fungsi/identifier menggunakan regex/grep:
    - *Vue / JS:* `function namaFungsi`, `const namaFungsi =`, `ref(...)`
    - *Golang (Fiber):* `func (h *Handler) NamaHandler`, `func NamaFungsi`
    - *PHP:* `function namaFungsi`, `public function ...`
  - Baca **HANYA rentang baris** dari kurung pembuka `{` hingga kurung penutup `}` blok fungsi target.
- **Isolasi Markup:** Dilarang membaca blok `<template>` atau `<style>` kecuali jika instruksi pengguna secara eksplisit meminta perbaikan tata letak UI atau CSS.

---

## 4. Berkas Terlindungi (Protected Files Guard)
DILARANG memodifikasi, menginstal paket baru, atau mengubah konfigurasi berikut tanpa izin eksplisit pengguna:
- **Umum:** `.env*`, `.gitignore`, `docker-compose.yml`, `Dockerfile`.
- **Frontend (Nuxt / Node):** `package.json`, `package-lock.json`, `pnpm-lock.yaml`, `nuxt.config.*`, `tsconfig.json`.
- **Backend (Golang Fiber):** `go.mod`, `go.sum`, serta berkas bootstrap server utama (`main.go`).

---

## 5. Standar Kode & Pemisahan Kategori (FE & BE)

### A. Kategori Frontend (Nuxt, Vue, JS, Blade/HTML)
- **Paradigma Scripting:**
  - Wajib **Pure JavaScript (ES6+)** dan Vue 3 Composition API (`<script setup>`).
  - DILARANG menggunakan sintaks TypeScript pada berkas komponen (`.vue`) maupun composables (`.js`).
  - Dilarang memanipulasi DOM manual (`document.querySelector`, dll.); gunakan selalu reactive binding (`ref`, `reactive`, `computed`, `v-model`).
- **4-State Visual Rendering:** Setiap widget, kontainer data, atau tabel wajib menangani 4 kondisi visual:
  1. *Loading:* Tampilkan Skeleton (DaisyUI/Tailwind).
  2. *Error:* Tampilkan banner info error / toast yang ramah pengguna.
  3. *Empty:* Tampilkan indikator/ilustrasi data kosong jika array kosong (bukan membiarkan tabel/chart crash atau blank).
  4. *Ready / Success:* Render data aktual.
- **Standar Penataan Kolom Tabel (Data Alignment):**
  - Header kolom (`th`): Rata tengah (`text-center justify-center`).
  - Teks, nama, dan deskripsi: Rata kiri (`text-left`).
  - Angka, nilai uang, persentase, dan kuantitas: Rata kanan (`text-right`).
  - Nomor urut, kode/ID wilayah, dan badge status: Rata tengah (`text-center`).
- **Styling:** Gunakan utility Tailwind CSS dan DaisyUI dengan dukungan variabel semantik (`bg-base-100`, `text-base-content`, `border-base-300`).

### B. Kategori Backend (Golang Fiber, Node.js, PHP)
- **Return Data Contract (Global Envelope):**
  - Wajib konsisten mengembalikan struktur JSON standar: `{ status, message, data, metadata }`.
- **Anti-Null Array Safety:**
  - Jika hasil query data kosong, backend WAJIB mengembalikan array kosong `[]`, bukan `null` / `nil`, agar Frontend tidak mengalami runtime crash saat melakukan iterasi (`.map()` atau `v-for`).
- **Semantik HTTP Status Code:**
  - `200 OK` / `201 Created` untuk transaksi sukses.
  - `400 Bad Request` untuk kegagalan validasi payload.
  - `401 Unauthorized` / `403 Forbidden` untuk masalah otentikasi/hak akses.
  - `404 Not Found` jika entitas tidak ditemukan.
  - `500 Internal Server Error` untuk error sistem/database tanpa membocorkan pesan error database mentah ke client.

---

## 6. Syntax Guard Pasca-Edit
Setiap kali AI selesai melakukan modifikasi kode (`perbaiki`):
- AI wajib memverifikasi integritas sintaks berkas:
  - *JS / Vue:* Pastikan pasangan kurung kurawal `{ }`, kurung siku `[ ]`, dan tag markup penutup (`</template>`, `</script>`) seimbang dan valid.
  - *Golang:* Pastikan tidak ada *unused import* atau kurung fungsi yang patah sebelum menyelesaikan tugas.

---

## 7. Protokol Integritas Struktur Berkas (`structure.md`)
- **Penambahan Berkas Baru:** Setiap kali berkas baru dibuat (di `app/`, `konsep/`, `.pheee/`, dll.), AI WAJIB menyisipkan jalur berkas tersebut ke dalam pohon direktori `.pheee/structure.md` lengkap dengan keterangan peran (# komentar di sisi kanan).
- **Penghapusan / Pemindahan:** Jika ada berkas yang dihapus atau dipindahkan (*rename/move*), AI WAJIB memperbarui atau menghapus jalurnya dari `.pheee/structure.md`.

---

## 8. Standar Baku Format File Susunan (`.pheee/susunan/*.md`)
Setiap kali membuat file susunan baru untuk modul apa pun, AI **WAJIB** memilih format baku yang sesuai dengan peran berkas:

### Varian A: Modul Frontend (Vue, Nuxt, React, JS Component)
```markdown
# Susunan Modul: [Nama Modul / Halaman]

- **Target File:** [Path file implementasi, contoh: app/pages/.../menu.vue]
- **Tanggung Jawab:** [Penjelasan 1 kalimat peran modul]
- **Dependencies / Composables:**
  - `namaComposable()` (`path/file.js`) -> [Peran singkat]

---

### Local States & Reactivity
- `namaState` (`tipeData`): [Fungsi dan kegunaan state lokal]

---

### Function & Method Graph
- `namaFungsi(param: Tipe) -> ReturnType`:
  - *Trigger:* [Kapan fungsi ini dipanggil / event pemicu]
  - *Peran:* [Penjelasan 1-2 kalimat apa yang dikerjakan fungsi]

---

### Watchers & Lifecycle
- `watch(target)` / `onMounted()`: [Trigger dan dampak perilakunya]
```

### Varian B: Modul Backend (Golang Fiber, Node.js, PHP Handler/Service)
```markdown
# Susunan Modul: [Nama Handler / Service]

- **Target File:** [Path file implementasi, contoh: internal/handler/user_handler.go]
- **Tanggung Jawab:** [Penjelasan 1 kalimat peran modul backend]
- **Dependencies & Injected Structs:**
  - `db *gorm.DB` -> [Koneksi database]
  - `repo UserRepository` -> [Akses repositori data]

---

### Route & Endpoint Graph
- `METHOD /path/route -> NamaHandler(param) -> ReturnType`:
  - *Request DTO:* [Struct/tipe payload request body atau query param]
  - *Response DTO / Status:* [Envelope response dan HTTP status code]
  - *Peran:* [Alur validasi, eksekusi logic, dan return]

---

### Business Logic & Helper Functions
- `namaHelper(param: Tipe) -> ReturnType`: [Peran kalkulasi/transformasi internal]
```

---

## 9. `init-pheee` (Inisialisasi Konteks Proyek Awal - Adaptif)
Perintah ini dijalankan saat proyek sudah memiliki basis kode tetapi folder `.pheee/` belum terisi atau perlu pembaruan menyeluruh.

### Langkah 0: Deteksi Tipe Stack Proyek Otomatis
Sebelum memindai, AI wajib mengidentifikasi jenis proyek:
- Terdapat `go.mod` $\rightarrow$ **Backend Golang**.
- Terdapat `composer.json` $\rightarrow$ **Backend / Monolith PHP**.
- Terdapat `package.json` dengan dep `vue`/`nuxt`/`react`/`next` $\rightarrow$ **Frontend**.
- Terdapat berkas FE dan BE secara berdampingan $\rightarrow$ **Fullstack**.

### Alur Eksekusi Berurutan:

1. **Generate `structure.md`:**
   - Telusuri pohon direktori proyek. Abaikan folder build/vendor (`node_modules`, `vendor`, `.git`, `.output`, `dist`, `.nuxt`, binary).
   - Petakan ke format visual tree lengkap dengan keterangan peran di sisi kanan (`# peran file`).

2. **Generate `store_state.md` (Kondisional):**
   - **Frontend:** Pindai folder store (`stores/`). Jika tidak ada global store, catat: `N/A: Proyek berbasis local state / reactive composables`.
   - **Backend:** Catat konfigurasi state global & dependensi (Database Pool, Redis/Cache, Context Locals, atau tandai *Stateless Service*).

3. **Generate `contracts.md`:**
   - **Frontend:** Ekstrak envelope response API dan parameter payload yang dikonsumsi oleh service frontend.
   - **Backend:** Definisikan standar global response envelope, skema Request/Response DTO, aturan format error, dan katalog endpoint utama.

4. **Generate `susunan/` & `susunan/README.md` (Token Safety Guard):**
   - **Frontend:** Pindai berkas halaman (`pages/`) dan komponen utama (`components/`). Gunakan **Varian A (Frontend)**.
   - **Backend:** Pindai berkas Handler / Controller / Service inti. Gunakan **Varian B (Backend)**.
   - *Token Safety Guard:* Untuk proyek besar (>10 modul), buat susunan untuk modul-modul prioritas/inti terlebih dahulu. Modul lainnya dibuat menyusul secara on-demand.
   - Buat tabel pemetaan indeks di `.pheee/susunan/README.md`.

5. **Inisialisasi `changelog.md`:**
   - Tulis entri log pertama bahwa inisialisasi `.pheee/` telah selesai dilakukan.
