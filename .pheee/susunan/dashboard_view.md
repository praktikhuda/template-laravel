# Susunan Modul: Dashboard Keuangan (Tailwind Native)

- **Target File:** `resources/views/dashboard.blade.php` & `resources/views/layouts/app.blade.php`
- **Tanggung Jawab:** Menyajikan antarmuka visual dashboard utama dengan 100% Tailwind CSS Native, dual theme (light & night), drawer sidebar, serta komponen Blade terisolasi.
- **Dependencies / Asset Pipeline:**
  - Tailwind CSS Play CDN (Zero NPM)
  - Alpine.js CDN (Client-side drawer & theme reactivity)
  - Lucide Icons CDN

---

### Local States & Reactivity (Alpine.js)
- `sidebarOpen` (`boolean`): Kontrol status collapse sidebar desktop.
- `mobileSidebarOpen` (`boolean`): Kontrol status overlay drawer di perangkat mobile.
- `theme` (`'light' | 'dark' | 'system'`): Menyimpan dan menyinkronkan tema aktif ke `localStorage`.

---

### Blade Component Graph
- `<x-layouts.app>`: Master layout shell (Navbar, Drawer, Theme switcher, Modal).
- `<x-card>`: Container panel card dengan header dan actions.
- `<x-button>`: Tombol serbaguna (primary, outline, ghost, danger, warning).
- `<x-badge>`: Status pill indikator (success, danger, brand, info).
- `<x-table>`: Komponen tabel responsif dengan format perataan data standar.
- `<x-modal.confirm>`: Dialog konfirmasi aksi berbasis HTML5 native `<dialog>`.
