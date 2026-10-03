---
name: coding-mistakes-recorder
description: >-
  Mengelola pencatatan history prompt otomatis (append-only) dan ekstraksi dataset 
  kesalahan koding per-proyek. Digunakan saat mencatat jejak sesi tanpa boros token, 
  atau dipanggil eksplisit ketika pengguna ingin meninjau dataset kesalahan koding (coding mistakes) 
  dan pola clean code.
---

# Coding Mistakes & History Recorder

Skill ini mengatur pencatatan jejak prompt dan pembangunan dataset kesalahan coding secara hemat token di folder `.pheee/history_chat/` pada setiap proyek.

---

## 1. Siklus Tulis Otomatis (Append-Only — Tanpa Baca Riwayat Lama)

Untuk menjamin **efisiensi token maksimal**:

1. **Dilarang Membaca Riwayat Lama:** Saat ingin mencatat jejak prompt atau kesalahan, AI **DILARANG membaca** file log yang sudah ada sebelumnya.
2. **Append-Only ke Berkas Harian:** AI langsung menambahkan 2-4 baris ringkasan ke bagian paling bawah file:
   `.pheee/history_chat/log-[YYYY-MM-DD].md`
   Format entri:
   ```markdown
   - [HH:MM] Task: [Ringkasan singkat instruksi] -> Output: [Hasil/file yang disentuh]
   ```
3. **Pencatatan Kesalahan (Saat Bug / Koreksi Selesai Diperbaiki):**
   Jika terjadi perbaikan bug atau koreksi teknis, AI langsung menambahkan entri baru di bagian bawah `.pheee/history_chat/mistakes_dataset.md`:
   ```markdown
   ### [ERR-YYYYMMDD-XX] [Judul Singkat Kesalahan]
   - **Kategori:** [Frontend / Backend / Database / Syntax]
   - **Pola Salah (Anti-Pattern):** [Kode atau asumsi yang keliru]
   - **Solusi Bersih (Clean Pattern):** [Kode perbaikan yang benar]
   - **Aturan Pencegahan:** [Instruksi 1 kalimat agar AI tidak mengulanginya]
   ```

---

## 2. Siklus Baca On-Demand (Hanya Saat Dipanggil)

1. Pada percakapan rutin sehari-hari, AI **TIDAK PERNAH membaca** isi berkas di dalam `.pheee/history_chat/` (Konsumsi token baca = 0).
2. AI **HANYA membaca** berkas `.pheee/history_chat/mistakes_dataset.md` jika:
   - Pengguna secara eksplisit memanggil skill ini (`coding-mistakes-recorder`, `review-kesalahan`, atau `evaluasi kesalahan saya`).
   - Pengguna meminta saran pola koding bersih berdasarkan kesalahan masa lalu.
