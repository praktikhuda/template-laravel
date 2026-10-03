# Catatan Diskusi: Penerapan DaisyUI pada Template Laravel

- **Tanggal:** 2026-10-03
- **Status:** Dalam Diskusi / Perencanaan
- **Topik:** Integrasi DaisyUI sebagai Komponen Desain Sistem Utama di Template Laravel 11

---

## 1. Konteks & Analisis Awal
- **Kondisi Saat Ini:**
  - Framework: Laravel 11.31
  - CSS Engine: Tailwind CSS v3.4.13 + PostCSS + Vite
  - Template Engine: Blade (`resources/views/`)
- **Tujuan:** Menjadikan DaisyUI sebagai fondasi desain UI yang ringan, konsisten, dan mudah dirawat.

---

## 2. Keuntungan Utama (Pros)
1. **Zero Runtime Overhead:** DaisyUI adalah Tailwind plugin murni (CSS), sehingga bundle Vite tetap ramping tanpa dependensi JS berat.
2. **Kesesuaian dengan Aturan Agen (.pheee/rules.md):** Mendukung langsung aturan 4-state visual (seperti `skeleton` saat loading) dan pewarnaan semantik (`bg-base-100`, `text-base-content`).
3. **HTML Lebih Ringkas:** Mengurangi penumpukan utility class panjang pada file Blade (contoh: cukup `btn btn-primary` dibandingkan 10 utility class Tailwind mentah).
4. **Built-in Theme & Dark Mode:** Mendukung switching tema instan (light, dark, corporate, dll.) via atribut HTML `data-theme`.
5. **Dukungan Komponen Native:** Banyak komponen (modal `<dialog>`, dropdown, collapse, drawer) dapat bekerja murni dengan CSS / HTML5 native tanpa butuh framework JS kompleks.

---

## 3. Pilihan Pola Arsitektur Frontend: Native CSS vs Blade Component

### A. Apa itu "DaisyUI Native CSS"?
DaisyUI tidak memerlukan runtime library JavaScript (seperti `bootstrap.js` atau `flowbite.js`). Komponen interaktif bekerja dengan fitur native HTML5 & CSS:
- **Modal:** Menggunakan tag HTML5 native `<dialog class="modal">` atau checkbox toggle CSS.
- **Dropdown:** Menggunakan selektor CSS `:focus` / `:focus-within`.
- **Collapse / Accordion:** Menggunakan elemen HTML5 native `<details>` dan `<summary>`.

### B. Perbandingan Penerapan di Blade Laravel:
1. **Pola Direct / Native CSS (Langsung di Blade):**
   - Menulis langsung struktur HTML & class DaisyUI di setiap file view.
   - *Kelebihan:* Fleksibel dan tanpa lapisan abstraksi.
   - *Kekurangan:* Repetitif jika styling tombol/modal dipakai di puluhan halaman.
2. **Pola Blade Component (`<x-...>` Wrapper):**
   - Mengemas pola native DaisyUI ke dalam reusable Blade component (misal: `<x-modal>`, `<x-button>`).
   - *Kelebihan:* Sangat DRY, rapi, perubahan desain terpusat di 1 file komponen.

---

## 4. Opsi Alternatif: Full Tailwind 100% Murni (Zero NPM / Zero Node Runtime)
Jika pengembang ingin menghindari dependensi Node/NPM dan DaisyUI:

### A. Pendekatan Tailwind Play CDN:
- Cukup sertakan `<script src="https://cdn.tailwindcss.com"></script>` pada file layout Blade.
- **Kelebihan:**
  - Tanpa `npm install`, tanpa folder `node_modules`, tanpa `npm run dev`.
  - Hanya butuh `php artisan serve` untuk menjalankan seluruh aplikasi.
  - Bebas menulis semua class utility Tailwind, responsive breakpoint, dan dark mode secara realtime di browser.
- **Blade Component Wrapper:**
  - Tetap bisa membuat `<x-button>`, `<x-card>`, `<x-table>` murni dengan class Tailwind agar markup tidak berulang.

### B. Perbandingan Arah Arsitektur:
1. **Opsi DaisyUI + Vite NPM:** Butuh Node.js, `npm run dev` saat edit aset, menyediakan class semantik (`btn`, `modal`, `skeleton`).
2. **Opsi Tailwind CDN (Zero NPM):** Murni PHP/Laravel, 100% utility class Tailwind, bebas setup Node, sangat ringkas untuk development.

---

## 5. Rencana Langkah Integrasi (Jika Disepakati)
1. Instalasi paket: `npm i -D daisyui@latest`
2. Konfigurasi `tailwind.config.js` untuk menambahkan plugin DaisyUI dan daftar tema.
3. Pembuatan Master Layout Blade (`layouts/app.blade.php`) dengan Navbar, Drawer/Sidebar, dan Theme Controller.
4. Pembuatan reusable Blade components pendukung.
