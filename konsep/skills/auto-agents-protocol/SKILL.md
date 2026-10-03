---
name: auto-agents-protocol
description: >-
  Wajib diaktifkan di setiap awal percakapan atau saat pengguna memberikan instruksi 
  terkait kode, fitur, perbaikan, analisis, atau referensi proyek eksternal. Menjamin AI 
  selalu memeriksa keberadaan AGENTS.md dan .pheee/, otomatis menginisialisasi dari berkas master templates/ 
  jika belum ada, memasukkan .pheee/ ke .gitignore, dan mematuhi Surgical Read Protocol.
---

# Auto AGENTS & Entry Protocol Guard

Skill ini adalah prosedur standar pintu masuk (*Entry Protocol*) yang wajib dipatuhi AI pada setiap giliran percakapan dan eksekusi tugas di seluruh proyek.

---

## 1. Lokasi Master Templates Baku (Sumber Acuan Mutlak)

Folder skill ini menyimpan berkas cetak biru (*master blueprint*) resmi yang tidak boleh dikarang/diubah sembarangan:
- **Lokasi Master:** `C:\Users\Pheee\.gemini\config\skills/auto-agents-protocol/templates/`
  - `templates/AGENTS.md` $\rightarrow$ Berkas master instruksi agen
  - `templates/.pheee/rules.md` $\rightarrow$ Hukum operasional mutlak, surgical read, dan etika token
  - `templates/.pheee/command.md` $\rightarrow$ Kamus perintah baku (`init-pheee`, `debug`, `perbaiki`, `audit`, `sync`, dll.)
  - `templates/.pheee/contracts.md` $\rightarrow$ Template response envelope API & DTO
  - `templates/.pheee/store_state.md` $\rightarrow$ Template spesifikasi state & DB
  - `templates/.pheee/changelog.md` $\rightarrow$ Template header changelog perdana
  - `templates/.pheee/susunan/README.md` $\rightarrow$ Template indeks peta modul

---

## 2. Pintu Masuk: Verifikasi Keberadaan `AGENTS.md` & `.pheee/`

Sebelum mengeksekusi instruksi apa pun, membaca file kode, atau menjalankan perintah:

### A. Kondisi 1: Berkas `AGENTS.md` & `.pheee/` Sudah Ada
1. **Baca `AGENTS.md` terlebih dahulu** di awal sesi untuk mengonfirmasi batasan operasional dan etika token.
2. Pahami kamus perintah yang diizinkan di `.pheee/command.md`.
3. Gunakan navigasi modular melalui `.pheee/susunan/README.md` sebelum membuka file kode.

### B. Kondisi 2: Berkas `AGENTS.md` atau `.pheee/` BELUM ADA (Auto-Setup via Master Templates)
Jika proyek saat ini belum memiliki `AGENTS.md` atau folder `.pheee/`:

1. **Salin Berkas Master Baku (Dilarang Mengarang / Hallucinate):**
   - Salin langsung `templates/AGENTS.md` ke root proyek.
   - Buat folder `.pheee/` di root proyek.
   - Salin langsung `templates/.pheee/rules.md` ke `.pheee/rules.md`.
   - Salin langsung `templates/.pheee/command.md` ke `.pheee/command.md`.
   - Salin `templates/.pheee/changelog.md` ke `.pheee/changelog.md`.
   - Buat folder `.pheee/susunan/` dan salin `templates/.pheee/susunan/README.md` ke dalamnya.

2. **Generate Berkas Dinamis Sesuai Stack Proyek:**
   - **Deteksi tipe stack:** (Golang Fiber, Laravel PHP, Nuxt/Vue, Node.js).
   - **Generate `structure.md`:** Pindai pohon direktori proyek (abaikan `vendor/`, `node_modules/`, `.git/`, binary) dan beri keterangan peran.
   - **Sesuaikan `contracts.md` & `store_state.md`:** Adaptasikan skema kontrak envelope dan state persistensi sesuai stack yang terdeteksi.

3. **Wajib Gitignore (.gitignore Guard):**
   - Periksa berkas `.gitignore` di root proyek.
   - Jika belum ada baris `.pheee/`, **WAJIB tambahkan `.pheee/` ke dalam `.gitignore`** agar direktori brain lokal agen tidak ter-commit ke repositori git.

---

## 3. Aturan Mutlak Pembacaan Kode (Surgical Read Protocol)

1. **Dilarang Keras Full-File Read:** Jangan pernah membaca satu file penuh (`cat` / baris 1 sampai akhir) untuk berkas kode sumber (`.vue`, `.js`, `.go`, `.php`, `.blade.php`).
2. **Pencarian Berbasis Identifier:** Gunakan pencarian regex/grep untuk menemukan nama fungsi, method, atau route target.
3. **Surgical Read Range:** Buka HANYA rentang baris kurung pembuka `{` hingga kurung penutup `}` dari blok fungsi terkait.

---

## 4. Protokol Integritas & Pembaruan Senyap (*Background Update*)

Setiap ada penambahan fitur, perubahan kode, atau pembuatan menu baru:
1. Perbarui file susunan modul terkait di `.pheee/susunan/`.
2. Perbarui pohon berkas di `.pheee/structure.md`.
3. Catat satu baris ringkasan di baris teratas `.pheee/changelog.md`.
4. **Pembaruan Senyap:** Seluruh pembaruan dokumentasi `.pheee/` ini wajib dilakukan di latar belakang tanpa mencetak ulang seluruh isi dokumen tersebut ke layar obrolan pengguna.
