# Catatan Diskusi: Rancang Bangun Global Skill "UI Template Archivist"

- **Tanggal:** 2026-10-03
- **Status:** Dalam Diskusi & Perancangan
- **Target Instalasi:** `C:\Users\Pheee\.gemini\config\skills/ui-template-archivist/SKILL.md`

---

## 1. Latar Belakang & Kebutuhan
Pengguna menginginkan sebuah **Global Skill** di Google Antigravity yang secara otomatis menangani alur kerja saat pengguna mengirimkan gambar/screenshot UI (komponen individual maupun template halaman lengkap):
1. **Penyimpanan Aset Gambar:** Otomatis menyimpan berkas gambar ke direktori acuan proyek yang terstruktur.
2. **Ekstraksi Spesifikasi (.md):** Otomatis membuatkan berkas markdown panduan acuan (*design specification & blueprint*) yang membedah anatomi visual, tokens styling (Tailwind/DaisyUI), status interaksi (4-state visual), dan kode implementasi siap pakai.

---

## 2. Alur Operasional Skill (*Workflow Proposed*)

```
[User kirim gambar UI]
          │
          ▼
1. Simpan Gambar ke Direktori Proyek:
   `konsep/desain/<kategori>/<nama-komponen>.png`
          │
          ▼
2. Analisis Visual & Ekstraksi Anatomi:
   - Hierarki layout (Grid/Flex, responsive breakpoint)
   - Color palette & Typography tokens (Tailwind / DaisyUI)
   - 4-State Visual (Loading skeleton, Empty, Ready, Hover/Focus)
          │
          ▼
3. Buat Berkas Acuan `.md`:
   `konsep/desain/<kategori>/<nama-komponen>.md`
   (Memuat preview gambar, breakdown token, dan boilerplate kode)
          │
          ▼
4. Daftarkan ke Indeks Acuan:
   Sinkronisasi daftar acuan di `konsep/desain/README.md`
```

---

## 3. Struktur Standar Dokumen Acuan Markdown (`.md`)

Setiap dokumen acuan yang dihasilkan akan mengikuti format baku berikut:
```markdown
# Acuan Desain: [Nama Komponen / Template]

- **Kategori:** [Komponen / Template Halaman / Widget]
- **Target Stack:** [Laravel Blade / Vue 3 / HTML]
- **File Gambar:** ![Preview](./screenshot.png)

---

### 1. Anatomi & Struktur Visual
- [Area 1: Header / Title / Action buttons]
- [Area 2: Content Body / Grid / Table]
- [Area 3: Footer / Pagination / Summary]

---

### 2. Styling Tokens (Tailwind / DaisyUI)
- **Colors:** Palette utama, border, badge status, background card
- **Dark Mode Behavior:** Penyesuaian class saat mode gelap aktif
- **Typography:** Font weight, size hierarchy, alignment

---

### 3. State & Interactivity
- **Hover / Active:** Efek transisi, scale, shadow
- **Loading State:** Skeleton visual yang sesuai
- **Empty State:** Ilustrasi / teks fallback jika data kosong

---

### 4. Blueprint / Boilerplate Kode
[Kode komponen Blade / Vue siap pakai]
```

---

## 4. Poin Keputusan Diskusi
1. **Lokasi Penyimpanan Default:** Apakah `konsep/desain/` disepakati sebagai lokasi standar penyimpanan gambar dan berkas markdown di setiap proyek?
2. **Kategori Acuan:** Pemisahan otomatis antara `komponen/` (Button, Card, Modal, Form) dan `template/` (Dashboard, Landing, Table Page).
3. **Format Boilerplate:** Apakah template kode langsung disesuaikan dengan stack aktif (misal Blade untuk Laravel, Vue untuk Nuxt)?
