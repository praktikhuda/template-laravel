---
name: cross-project-agents-protocol
description: >-
  Wajib diaktifkan setiap kali pengguna meminta memeriksa, mempelajari, membandingkan, 
  atau mereferensikan direktori atau proyek lain (eksternal) di luar workspace aktif saat ini. 
  Mengharuskan AI untuk membaca berkas AGENTS.md dan dokumen arsitektur .pheee/ di proyek 
  tersebut sebelum membaca berkas kode sumber lainnya.
---

# Cross-Project AGENTS Protocol

Skill ini mengatur tata cara operasional ketika AI diminta meneliti atau mengambil referensi dari proyek lain milik pengguna.

---

## 1. Prioritas Pertama: Verifikasi `AGENTS.md`

Ketika pengguna memberikan path ke proyek lain (misalnya `@~/script/nuxt/template-nuxt` atau direktori eksternal lainnya):

1. **Dilarang langsung membuka file kode sumber secara acak.**
2. **Periksa keberadaan berkas `AGENTS.md` di root proyek eksternal tersebut.**
3. **Baca dan pelajari `AGENTS.md` terlebih dahulu:**
   - Pahami *Agent Directives* dan protokol masuk yang ditetapkan di proyek tersebut.
   - Periksa apakah proyek tersebut memiliki sistem tata kelola konteks (seperti `.pheee/`).

---

## 2. Peta Arsitektur & Aturan Khusus Proyek

Jika proyek tersebut memiliki direktori `.pheee/`:
1. **Aturan & Standar:** Baca `.pheee/rules.md` untuk memahami batasan, konvensi penulisan kode, dan efisiensi token.
2. **Kamus Perintah:** Periksa `.pheee/command.md` jika ada instruksi spesifik.
3. **Peta Fungsi (Surgical Read):** Gunakan `.pheee/susunan/README.md` untuk mengetahui modul apa saja yang tersedia, alih-alih melakukan *full inspection* pada direktori kode.
4. **Kontrak Data & State:** Periksa `.pheee/contracts.md` dan `.pheee/store_state.md` untuk memahami struktur data dan state yang digunakan.

---

## 3. Surgical Read Protocol pada Proyek Referensi

1. Jangan pernah membaca seluruh isi file (*no full-file read*) untuk berkas kode (`.vue`, `.js`, `.go`, `.php`).
2. Gunakan pencarian berbasis nama identifier/fungsi (regex/grep), lalu baca hanya rentang baris fungsi terkait.
3. Hormati status proyek referensi sebagai **Read-Only** (hanya dibaca untuk referensi, dilarang mengubah file tanpa izin eksplisit pengguna).
