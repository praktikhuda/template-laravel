# Coding Mistakes & Clean Code Dataset

Dokumen ini merekam kumpulan kesalahan koding, anti-pattern, dan pola perbaikan bersih (*clean code pattern*) yang diekstrak dari riwayat pengembangan proyek ini.

---

<!-- Entri kesalahan baru akan otomatis di-append di bawah ini saat terjadi perbaikan bug/koreksi -->

### [ERR-20261003-02] Terlewat Membuat Berkas Susunan Modul Saat Memasang Template UI Baru
- **Kategori:** Workflow Protocol & Integrity Guard
- **Pola Salah (Anti-Pattern):** Saat mengeksekusi pemasangan template UI baru (pasang template), AI hanya memperbarui structure.md dan changelog.md, tetapi lupa membuat berkas .pheee/susunan/<nama_modul>.md dan memperbarui susunan/README.md.
- **Solusi Bersih (Clean Pattern):** Setiap kali menu/halaman view baru dibuat dari template, AI wajib sekaligus menyusun berkas .pheee/susunan/<nama_view>.md (format Varian A) dan mendaftarkannya ke .pheee/susunan/README.md.
- **Aturan Pencegahan:** Selalu periksa checklist triad integritas sistem secara lengkap: (1) structure.md, (2) susunan/*.md + susunan/README.md, dan (3) changelog.md.
