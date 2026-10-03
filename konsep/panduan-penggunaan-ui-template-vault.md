# Panduan Penggunaan: Global Skill "UI Template Vault"

Dokumen panduan cepat (*Quick Cheat Sheet*) cara menggunakan fitur **UI Template Vault** di Google Antigravity.

---

## 📌 Apa Itu UI Template Vault?

UI Template Vault adalah gudang acuan desain pribadi kamu. Kapan pun kamu menemukan desain UI keren (baik dari screenshot aplikasi, Figma, Dribbble, atau web lain), kamu tinggal kirim gambarnya ke AI. AI akan:
1. **Menyimpan gambarnya** secara permanen di PC kamu.
2. **Membuat berkas panduan (`spec.md`)** yang membedah warna Tailwind/DaisyUI, tata letak grid, dan status interaksinya.
3. **Mendaftarkannya ke katalog.**
4. **Siap dipasang ke proyek baru mana pun** hanya dengan 1 baris prompt!

---

## 📂 Lokasi Penyimpanan di Komputer Kamu

Semua aset tersimpan di folder global AI:
👉 `C:\Users\Pheee\.gemini\config\skills\ui-template-vault\`

```text
ui-template-vault/
├── SKILL.md            # Aturan & logika kerja agen
├── KATALOG.md          # Indeks tabel seluruh koleksi template & komponen
├── README.md           # Panduan ini
├── templates/          # Kumpulan template halaman utuh (Dashboard, Landing, Kasir, dll.)
│   └── finance-hub-dashboard/
│       ├── preview.png # Screenshot asli yang kamu upload
│       └── spec.md     # Dokumen acuan styling & kode
└── components/         # Kumpulan komponen kecil (Card, Button, Modal, Table, Navbar)
    └── [nama-komponen]/
        ├── preview.png
        └── spec.md
```

---

## 🚀 Kamus Perintah (Cheat Sheet Prompt)

Kamu bisa menggunakan perintah bahasa sehari-hari yang sangat santai:

### 1. Menyimpan Template Halaman Penuh
> **Format:** `simpan template [nama]`
> 
> **Contoh Prompt (sambil lampirkan gambar):**
> - *"simpan template dashboard-finance"*
> - *"simpan tampilan ini jadi template analytics"*
> - *"jadikan template halaman-kasir"*

### 2. Menyimpan Komponen Individual (Card / Modal / Tabel / Form)
> **Format:** `simpan komponen [nama]`
> 
> **Contoh Prompt (sambil lampirkan gambar):**
> - *"simpan komponen card-wallet"*
> - *"simpan komponen tabel-mutasi"*
> - *"jadikan ini komponen modal-transfer"*

### 3. Simpan Santai (Biar AI yang Kasih Nama Sendiri)
> Kalau kamu malas memikirkan nama, cukup ketik:
> - 👉 **`simpan ke vault`** atau **`simpan desain ini`**
> 
> *AI akan langsung menganalisis gambar, menentukan apakah itu template atau komponen, memberi nama slug yang tepat, lalu menyimpannya.*

---

### 4. Melihat Seluruh Koleksi Template Kamu
> Kapan pun kamu ingin melihat daftar apa saja yang sudah kamu simpan:
> - 👉 **`katalog template`**
> - 👉 **`lihat katalog vault`**
> 
> *AI akan menampilkan tabel daftar template/komponen beserta tag dan link preview gambarnya.*

---

### 5. Memasang Template ke Proyek Baru (The Magic Part! ✨)
Saat kamu membuat proyek baru (misal Laravel baru atau Nuxt baru) dan bingung mau tampilan seperti apa:

1. **Cek koleksi:** *"katalog template"*
2. **Pasang langsung:**
   - 👉 **`pasang template finance-hub-dashboard`**
   - 👉 **`pasang komponen card-wallet ke halaman ini`**
3. **Kustomisasi warna saat pasang (Opsional):**
   - *"pasang template finance-hub-dashboard tapi ubah warna primernya jadi biru laut"*

---

## 💡 Tips & Trik Pro

1. **Lintas Framework:** Template yang kamu simpan bisa dipasang ke mana saja:
   - Laravel Blade (`resources/views/...`)
   - Vue 3 / Nuxt (`app/pages/...` atau `components/...`)
   - HTML biasa + Tailwind CSS
2. **Kualitas Gambar:** Gunakan screenshot yang bersih (tidak pecah) agar AI bisa membaca teks, font, dan warna hex-nya dengan presisi 100%.
