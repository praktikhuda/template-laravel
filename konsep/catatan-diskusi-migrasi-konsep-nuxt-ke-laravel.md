# Konsep & Blueprint: Porting Template Nuxt (Jejak Dana) ke Template Laravel 11

- **Tanggal:** 2026-10-03
- **Status:** Konsep & Perencanaan Arsitektur
- **Sumber Asli:** `~/script/nuxt/template-nuxt` (Nuxt 4 + Tailwind v4 + DaisyUI v5)
- **Target:** `template-laravel` (Laravel 11 Blade + Tailwind & DaisyUI)

---

## 1. Bedah Arsitektur `template-nuxt`
Setelah membedah langsung codebase di `~/script/nuxt/template-nuxt`, berikut fondasi utamanya:

1. **Design System & Tema:**
   - Menggunakan semantic color DaisyUI: `bg-base-100`, `bg-base-200`, `text-base-content`, `border-base-300`, `primary`, `error`, `warning`.
   - Dual Theme: `light` (default) dan `night` (dark mode) dengan sinkronisasi ke `localStorage` dan media query sistem.
2. **Sistem Layout:**
   - `layouts/default.vue`:
     - **Sidebar Drawer:** Collapsible sidebar (desktop & mobile) dengan menu navigasi dinamis.
     - **Top Bar:** Navbar dengan breadcrumb/title, avatar user, tombol notifikasi, dan tombol toggle tema.
     - **Modal Pengaturan & Tema:** Modal berbasis native HTML5 `<dialog class="modal">`.
   - `layouts/auth.vue`:
     - Container minimalis terpusat untuk halaman `login.vue` dan `register.vue`.
3. **Komponen Inti (Design System Components):**
   - `ConfirmModal.vue`: Modal konfirmasi aksi (tipe: `danger`, `warning`, `info`) dengan tombol aksi dinamis.
   - `Table.vue`: Data table kaya fitur (search, sorting kolom, pagination, zero-state, loading state).
   - `InputValidate.vue`: Input form terintegrasi icon, label, dan error message validasi.
   - `Select.vue`: Dropdown select kustom dengan pencarian.
   - `ToastNotification.vue`: Notifikasi mengambang (toast) DaisyUI di sudut layar.

---

## 2. Pemetaan Porting ke Template Laravel 11

| Modul di Nuxt (`template-nuxt`) | Padanan di Laravel 11 (`template-laravel`) | Pendekatan Teknis di Blade |
| :--- | :--- | :--- |
| `layouts/default.vue` | `resources/views/layouts/app.blade.php` | Master dashboard layout dengan Drawer, Topbar, dan script theme switch |
| `layouts/auth.vue` | `resources/views/layouts/auth.blade.php` | Layout bersih terpusat untuk Login / Register / Forgot Password |
| `components/ConfirmModal.vue` | `<x-modal.confirm id="..." />` | Blade Component membungkus `<dialog class="modal">` + Vanilla JS / Alpine trigger |
| `components/Table.vue` | `<x-table :headers="..." :rows="..." />` | Reusable Blade Component dengan slot pagination bawaan Laravel (`$data->links()`) |
| `components/InputValidate.vue` | `<x-form.input name="..." label="..." />` | Otomatis menangani directive `@error('name')` dan class Tailwind/DaisyUI |
| `components/ToastNotification.vue` | `<x-toast />` | Menangkap session flash message Laravel (`session('success')`, `session('error')`) |
| Theme Switcher (`light`/`night`) | `<x-theme-toggle />` | Vanilla JS / Alpine.js mini script membaca `localStorage.getItem('theme')` |

---

## 3. Pilihan Handling Interaktivitas Frontend di Laravel
Di Nuxt, interaktivitas (seperti buka/tutup sidebar, buka modal konfirmasi, switch tema) menggunakan reactivity Vue (`ref`, `computed`). 
Di Laravel, ada 2 pendekatan terbaik:

- **Opsi A — Alpine.js (Standar Emas Laravel / TALL Stack):**
  - Ukuran sangat kecil (~15KB via CDN `<script src="//unpkg.com/alpinejs" defer></script>`).
  - Langsung menempel di markup Blade (misal: `x-data="{ open: false }"`, `@click="open = !open"`).
  - Sangat mirip dengan sintaks Vue, sehingga logika dari `template-nuxt` dapat diporting hampir 1:1 tanpa perlu Node/Vite build.
- **Opsi B — Vanilla JS Murni:**
  - Fungsi bantuan kecil di file `resources/js/app.js` atau inline script (misal: `toggleSidebar()`, `showConfirm(options)`).

---

## 4. Keuntungan Porting Ini untuk Template Laravel Anda
1. **Tampilan & UX 100% Identik:** Antarmuka dashboard Laravel Anda akan memiliki tampilan premium yang sama persis dengan `template-nuxt` (tema light/night, sidebar responsif, modal halus).
2. **Server-Side Rendered:** Form request langsung terhubung dengan validasi request Laravel (`$request->validate()`), CSRF token otomatis, dan pagination database Eloquent.
3. **Fleksibilitas Build:** Bisa dipasang via Tailwind CDN + DaisyUI CDN (Zero NPM) sehingga Anda cukup mengetik `php artisan serve` saat bekerja.
