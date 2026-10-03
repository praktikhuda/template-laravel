# Catatan Diskusi: Arsitektur Skill Pencatatan History Chat & Dataset Kesalahan Coding

- **Tanggal:** 2026-10-03
- **Status:** Dalam Diskusi & Perancangan
- **Tujuan Pengguna:** Merekam jejak prompt/chat per proyek dan mengekstrak kesalahan coding (coding mistakes) menjadi sebuah dataset pembelajaran agar AI dapat menghasilkan kode yang semakin bersih (*clean code*).

---

## 1. Analisis Kebutuhan
1. **Pencatatan Otomatis Per Proyek:**
   - Menyimpan jejak interaksi/kesalahan ke folder khusus per proyek (misal: `.pheee/history_chat/` atau `history_chat/`).
2. **Fokus Nilai (Value-Oriented Dataset):**
   - Bukan sekadar dump teks obrolan mentah (*raw dump* yang boros token dan bising), melainkan ekstraksi terstruktur:
     - **Kasus/Bug:** Gejala kesalahan yang terjadi.
     - **Penyebab (Anti-Pattern):** Kebiasaan coding atau miskonfigurasi yang memicunya.
     - **Pola Kode Bersih (Clean Pattern):** Contoh perbaikan kode yang benar & standar idealnya.
3. **Penggunaan Kembali oleh AI:**
   - Menjadi referensi otomatis bagi AI sebelum menulis kode agar tidak mengulangi kesalahan yang sama.

---

## 2. Arsitektur Terpusat: Centralized Antigravity Knowledge Hub (Pilihan Pengguna)

Seluruh riwayat prompt dan rangkuman dataset kesalahan coding **disatukan ke dalam satu direktori induk terpusat (`antigravity/`)**, dipisahkan berdasarkan subfolder nama proyek:

```text
antigravity/
├── template-laravel/
│   ├── history_chat.md           # Rangkuman instruksi & alur kerja sesi
│   └── mistakes_dataset.md       # Rangkuman kesalahan coding & solusi clean code
│
├── template-nuxt/
│   ├── history_chat.md
│   └── mistakes_dataset.md
│
├── template-go/
│   ├── history_chat.md
│   └── mistakes_dataset.md
│
└── [proyek-lain]/
    ├── history_chat.md
    └── mistakes_dataset.md
```

### Keunggulan Arsitektur Terpusat Ini:
1. **Repositori Proyek Asli Tetap Bersih:** File kode proyek (`template-laravel`, `template-nuxt`, dll.) tidak tersentuh oleh file histori chat atau log.
2. **Pembelajaran Lintas Proyek (Cross-Project Synergy):** AI bisa belajar dari kesalahan di proyek Nuxt saat mengerjakan Laravel, atau sebaliknya.
3. **Mudah Dikelola & Dilihat:** Pengguna cukup membuka satu folder `antigravity/` untuk melihat seluruh rekam jejak coding di semua proyeknya.
4. **Bisa Dijadikan Single Dataset Repo:** Folder `antigravity/` ini bisa di-push ke private Git sebagai aset dataset personal.

---

## 3. Strategi Efisiensi Token: "Append-Only Write & Read-On-Demand" (Ide Brilian Pengguna)

Kekhawatiran pemborosan token diatasi 100% dengan memisahkan siklus **Tulis (Write)** dan **Baca (Read)**:

### A. Siklus Tulis Otomatis (Append-Only Write):
- **Prinsip:** AI **TIDAK PERNAH membaca file history lama** saat ingin mencatat.
- **Mekanisme:** AI langsung menyisipkan (*append*) 3-5 baris ringkasan di baris terbawah file riwayat hari ini (`.pheee/history_chat/log-[tanggal].md`).
- **Konsumsi Token:** Hanya menghabiskan **~30 s/d 50 token** per interaksi. Sangat hemat dan tidak terasa sama sekali!

### B. Siklus Baca Selektif (Read On-Demand):
- **Prinsip:** Pada obrolan normal sehari-hari, AI **TIDAK MEMBACA** file riwayat/kesalahan ini (konsumsi token = 0).
- **Trigger Baca:** AI HANYA membuka dan membaca dataset kesalahan ketika:
  1. Pengguna mengetik perintah/skill eksplisit: `coding-mistakes-recorder`, `review-kesalahan`, atau `audit-mistakes`.
  2. Saat pengguna meminta: *"tolong evaluasi kesalahan coding yang sering saya lakukan"*.

---

## 4. Struktur File Per-Proyek
```text
.pheee/
└── history_chat/
    ├── log-2026-10-03.md         # Catatan append-only per sesi/hari
    └── mistakes_dataset.md       # Rangkuman kesalahan terstruktur (append-only)
```

---

## 4. Rancangan Nama & Deskripsi Skill Global
- **Nama Skill:** `coding-mistakes-recorder` (atau `chat-history-dataset`)
- **Peran:** Otomatis mencatat poin kesalahan dan solusi bersih ke dalam folder history proyek setiap kali sesi debugging/perbaikan selesai.
