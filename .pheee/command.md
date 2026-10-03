# Agent Command Triggers & Execution Protocols

Patuhi batasan izin tindakan berdasarkan kata kunci prompt pengguna:

### 1. `init-pheee` (Inisialisasi Konteks Proyek Awal - Adaptif)
- **Izin Tindakan:** Pemindaian otomatis seluruh codebase yang ada untuk mengisi/memperbarui seluruh file konfigurasi konteks di `.pheee/`.
- **Prosedur Berurutan:** Mengikuti protokol Bagian 9 di `.pheee/rules.md`:
  0. Deteksi otomatis tipe stack (Frontend, Backend, atau Fullstack).
  1. Generate `structure.md` (visual tree direktori + keterangan peran).
  2. Generate `store_state.md` (adaptif: store frontend atau registry database/state backend).
  3. Generate `contracts.md` (adaptif: API consumer envelope frontend atau DTO/endpoint backend).
  4. Generate `susunan/` & `susunan/README.md` (memakai Varian A Frontend atau Varian B Backend + Token Safety Guard).
  5. Inisialisasi log perdana di `changelog.md`.

### 2. `debug <masalah>`
- **Izin Tindakan:** HANYA inspeksi alur eksekusi, analisis log/error, dan identifikasi akar masalah (*root cause*).
- **Larangan Mutlak:** DILARANG KERAS memodifikasi, mengedit, atau menulis file kode apa pun.
- **Output:** Sajikan Ringkasan Gejala (Symptoms), Akar Masalah (Root Cause), dan Rekomendasi Solusi.

### 3. `perbaiki <target>`
- **Izin Tindakan:** DIIZINKAN melakukan modifikasi kode secara presisi dan minimal invasif pada berkas terkait.
- **Prosedur Wajib:**
  1. Terapkan perbaikan pada rentang blok target.
  2. Lakukan **Syntax Guard** (periksa integritas kurung `{ }`, tag penutup, dan validitas sintaks).
  3. Pastikan fungsi di `.pheee/susunan/<nama_modul>.md` tetap sinkron.

### 4. `audit <target>`
- **Izin Tindakan:** HANYA memeriksa kepatuhan berkas target terhadap standar di `.pheee/rules.md`.
- **Larangan Mutlak:** DILARANG mengubah kode.
- **Checklist Evaluasi:**
  - *Frontend:* Pure JS (tanpa TS), 4-State Visual (Loading, Error, Empty, Ready), Penataan Tabel (Alignment), DaisyUI Semantics.
  - *Backend:* Envelope JSON Contract, Anti-Null Array Safety, HTTP Status Code Semantics.
- **Output:** Sajikan tabel Checklist Evaluasi (Status: Pass / Fail) beserta catatan bagian yang perlu disesuaikan.

### 5. `batal <target>` atau `revert <target>`
- **Izin Tindakan:** Mengembalikan file yang baru saja diubah ke kondisi commit / snapshot Git terakhir.
- **Prosedur:** Eksekusi `git restore <target>` atau `git checkout -- <target>`, lalu verifikasi status file kembali bersih.

### 6. `diskusi <topik>`
- **Izin Tindakan:** Brainstorming arsitektur, perencanaan fitur baru, atau logika bisnis bersama pengguna.
- **Kewajiban:** Rangkum hasil kesepakatan diskusi ke dalam berkas baru/update di folder `konsep/catatan-diskusi-[topik].md`.

### 7. `sync` atau `sync <nama_modul>`
1. Pindai fungsi, state, atau watcher yang baru saja diubah/dibuat.
2. Perbarui konten di `.pheee/susunan/<nama_modul>.md` sesuai format baku yang relevan.
3. Perbarui daftar tree berkas di `.pheee/structure.md`.
4. Catat ringkasan aksi di baris teratas `.pheee/changelog.md`.

### 8. `tambah menu <nama_modul>` atau Instruksi Pembuatan Modul Baru
1. Tulis kode implementasi komponen/skema sesuai spesifikasi.
2. Buat file baru `.pheee/susunan/<nama_modul>.md` menggunakan **Format Baku Susunan** yang relevan (Varian A atau B).
3. Daftarkan menu ke tabel `.pheee/susunan/README.md`.
4. Tambahkan path file ke dalam tree `.pheee/structure.md`.
5. Catat satu baris ringkasan di `.pheee/changelog.md`.
