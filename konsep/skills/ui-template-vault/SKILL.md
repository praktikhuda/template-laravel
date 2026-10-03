---
name: ui-template-vault
description: >-
  Mengelola gudang acuan desain UI global (Global UI Template & Component Vault). 
  Otomatis aktif saat pengguna mengirim gambar/screenshot UI untuk disimpan ("simpan template", 
  "simpan komponen", "simpan ke vault"), menyusun berkas acuan desain (.md), atau saat pengguna 
  ingin melihat katalog ("katalog template") dan memasang template ("pasang template [nama]") ke proyek baru.
---

# Global UI Template & Component Vault

Skill ini berfungsi sebagai pustaka acuan desain UI (Design-to-Spec Vault) global lintas proyek. Memungkinkan pengguna menyimpan inspirasi screenshot tampilan (komponen maupun template halaman utuh) beserta berkas spesifikasi teknisnya (`spec.md`), dan menginstalnya kembali secara instan ke proyek baru kapan saja.

---

## 1. Lokasi Penyimpanan Arsip Global

Seluruh aset desain dan spesifikasi tersimpan di dalam folder skill ini:
- **Root Vault:** `C:\Users\Pheee\.gemini\config\skills/ui-template-vault/`
- **Katalog Indeks:** `C:\Users\Pheee\.gemini\config\skills/ui-template-vault/KATALOG.md`
- **Direktori Template Halaman:** `templates/<nama-template>/`
  - `preview.png` (Screenshot acuan)
  - `spec.md` (Dokumen spesifikasi anatomi, tokens, dan state)
- **Direktori Komponen Individual:** `components/<nama-komponen>/`
  - `preview.png` (Screenshot acuan)
  - `spec.md` (Spesifikasi komponen)

---

## 2. Kamus Perintah & Pemicu (Trigger Protocol)

Patuhi alur kerja berdasarkan perintah pengguna:

### A. `simpan template [nama]` atau `simpan komponen [nama]`
1. **Deteksi Gambar:** Temukan berkas gambar yang dikirim pengguna (di direktori upload/brain atau path yang diberikan).
2. **Salin Gambar:** Simpan gambar sebagai `preview.png` ke folder target:
   - Jika template: `templates/<nama>/preview.png`
   - Jika komponen: `components/<nama>/preview.png`
3. **Generate Dokumen Acuan (`spec.md`):** Susun berkas `spec.md` mengikuti **Standar Format Dokumen Acuan** di Bagian 3.
4. **Pembaruan Senyap Katalog:** Tambahkan baris baru ke tabel indeks di `KATALOG.md`.
5. **Konfirmasi:** Berikan ringkasan singkat bahwa template/komponen telah berhasil tersimpan di Global Vault lengkap dengan preview clickable.

### B. `simpan ke vault` atau `simpan desain ini` (Nama Otomatis)
- AI menganalisis isi gambar secara visual.
- Tentukan kategori (`templates/` jika halaman utuh, `components/` jika elemen satuan).
- Buat nama slug yang deskriptif (contoh: `finance-hub-dashboard` atau `wallet-card-metric`).
- Eksekusi alur penyimpanan A di atas.

### C. `katalog template` atau `lihat katalog vault`
- Buka dan baca `C:\Users\Pheee\.gemini\config\skills/ui-template-vault/KATALOG.md`.
- Tampilkan tabel daftar template dan komponen yang tersedia beserta deskripsi singkat dan tag styling.

### D. `pasang template [nama]` atau `pasang komponen [nama]`
- Buka berkas `spec.md` dari template terkait di dalam vault.
- Deteksi stack proyek aktif saat ini (Laravel Blade, Vue/Nuxt, Tailwind, DaisyUI).
- Terapkan layout / komponen ke dalam proyek aktif sesuai standar struktur proyek tersebut.
- Pasang styling token yang presisi sesuai yang tertera pada `spec.md`.
- **Wajib Sinkronisasi Triad Integritas Sistem (.pheee/ Guard):**
  1. Buat berkas susunan modul baru di `.pheee/susunan/<nama_modul>.md` (Format Varian A untuk Frontend/View) dan daftarkan ke tabel `.pheee/susunan/README.md`.
  2. Tambahkan jalur berkas baru ke visual tree `.pheee/structure.md`.
  3. Catat 1 baris ringkasan aksi di baris teratas `.pheee/changelog.md`.

---

## 3. Standar Baku Dokumen Acuan (`spec.md`)

Setiap kali AI membuat berkas `spec.md`, AI WAJIB menyusun struktur lengkap berikut:

```markdown
# Template Acuan: [Nama Judul Desain]

- **Kategori:** [templates / components]
- **Nama Identitas:** [slug-nama]
- **Tags:** [kumpulan tag kata kunci]
- **File Gambar:** ![Preview](./preview.png)

---

## 1. Anatomi Layout & Grid Hierarchy
- Pembagian area (Header, Sidebar, Content, Footer).
- Grid layout (responsif: mobile, tablet, desktop).

---

## 2. Design Tokens & Color Palette
- **Backgrounds:** Hex / Tailwind class (Light & Dark mode).
- **Surface & Cards:** Warna kartu, border, shadow, glassmorphism.
- **Brand & Accents:** Warna primer, status success, danger, warning.
- **Typography:** Font family, font size, weight hierarchy.

---

## 3. Komponen Modular yang Dibutuhkan
- Daftar sub-komponen yang membentuk tampilan ini (Button, Card, Table, Modal, dll.).

---

## 4. 4-State Visual Behavior
- **Loading State:** Bentuk skeleton shimmer.
- **Empty State:** Tampilan visual saat data array kosong `[]`.
- **Error State:** Alert / notifikasi saat request gagal.
- **Ready State:** Tampilan data aktual.

---

## 5. Cuplikan Kode Siap Pakai (Boilerplate)
- Menyertakan contoh implementasi markup (Blade / Vue) siap pakai.
```
