# Susunan Modul: Dashboard Simple (SaaS Product Management)

- **Target File:** `resources/views/dashboard-simple.blade.php`
- **Tanggung Jawab:** Menyajikan antarmuka manajemen katalog produk SaaS, ringkasan kartu metrik KPI, tabel data interaktif dengan multiselect baris, dan bilah aksi melayang (*floating batch action*).
- **Dependencies / External Assets:**
  - Tailwind CSS Play CDN (Zero NPM)
  - Lucide Icons (`package`, `tag`, `edit-3`, `trash-2`, `star`, dll.)
  - Alpine.js v3 (State reaktif, toggle statistik, dan multiselect baris tabel)

---

### Local States & Reactivity (Alpine.js)
- `sidebarOpen` (`boolean`): Kontrol buka/tutup bilah navigasi sidebar kiri.
- `showStatistics` (`boolean`): Toggle visibilitas 4 kartu metrik KPI statistik.
- `selectedItems` (`array`): Menyimpan daftar ID produk yang sedang dicentang.
- `metrics` (`array`): Data statis metrik KPI (Total Product, Revenue, Sold, Avg Sales).
- `products` (`array`): Data daftar katalog produk (ID, Nama, Harga, Sales, Revenue, Stok, Status, Rating).

---

### Function & Method Graph
- `productDashboard() -> Object`:
  - *Trigger:* Inisialisasi komponen Alpine `x-data` pada tag `<body>`.
  - *Peran:* Mengembalikan objek reaktif state, getter `isAllSelected`, dan fungsi helper tabel.
- `toggleSelectAll()`:
  - *Trigger:* Checkbox master pada header tabel diubah.
  - *Peran:* Memilih seluruh produk atau mengosongkan array `selectedItems`.
- `isSelected(id: Number) -> Boolean`:
  - *Trigger:* Evaluasi styling highlight baris dan status checked checkbox per baris.
  - *Peran:* Mengecek apakah ID produk ada di dalam `selectedItems`.
- `toggleSelect(id: Number)`:
  - *Trigger:* Checkbox pada salah satu baris produk diklik.
  - *Peran:* Menambah atau menghapus ID produk dari `selectedItems`.
- `deleteSelected()`:
  - *Trigger:* Tombol "Delete" pada *Floating Batch Action Bar* diklik.
  - *Peran:* Meminta konfirmasi lalu menyaring array `products` untuk menghapus item terpilih.

---

### UI Sections & Layout Architecture
1. **`AppSidebar`**: Navigasi vertikal dengan grouping (Main Menu, Tools, Workspace), badge counter, dan upgrade promo banner.
2. **`TopbarHeader`**: Header judul "Product", stack avatar kolaborator, dan quick controls.
3. **`SubToolbar`**: Filter bar dengan toggle switch oranye "Show Statistics" dan tombol aksi "+ Add New Product".
4. **`MetricCardsGrid`**: Grid responsif 4 kolom kartu statistik metrik performa produk.
5. **`ProductDataTable`**: Tabel data produk dengan status badges (`In Stock`, `Out of Stock`, `Restock`) dan rating bintang.
6. **`FloatingBatchBar`**: Floating bar melayang di bawah layar yang muncul otomatis saat `selectedItems.length > 0`.
7. **`PaginationBar`**: Navigasi halaman, limit selector per page, dan jump to page input.
