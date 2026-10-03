# Data & API Contracts (Laravel Backend)

## 1. Global Response Envelope
Semua endpoint REST API pada backend Laravel wajib mengembalikan struktur JSON terstandarisasi:

```json
{
  "status": "success",
  "message": "Data berhasil diambil",
  "data": [],
  "metadata": {}
}
```

### Response Sukses (200 OK / 201 Created)
- `status`: `"success"`
- `message`: Penjelasan singkat hasil operasi (string manusiawi).
- `data`: Objek data atau koleksi array hasil query (**Wajib `[]` jika kosong, DILARANG `null`**).
- `metadata`: Objek pendukung seperti pagination (`page`, `per_page`, `total`, `total_pages`).

### Response Error (400 / 401 / 403 / 404 / 422 / 500)
```json
{
  "status": "error",
  "message": "Pesan deskriptif kesalahan",
  "data": [],
  "metadata": {
    "errors": {
      "field_name": ["Detail pesan validasi field"]
    }
  }
}
```

---

## 2. Aturan Anti-Null Array Safety
- Jika kumpulan record data kosong, backend **WAJIB** mengembalikan array kosong `[]`, bukan `null`.
- Gunakan Laravel API Resource (`JsonResource::collection($data)`) atau helper envelope seragam untuk memastikan list selalu berupa array kosong `[]` jika tidak ada record.

---

## 3. Semantik HTTP Status Code
| Status Code | Penggunaan |
| :--- | :--- |
| `200 OK` | Operasi pengambilan / update data berhasil |
| `201 Created` | Data / entitas baru berhasil dibuat |
| `400 Bad Request` | Payload malformed atau parameter request tidak valid |
| `401 Unauthorized` | Autentikasi diperlukan atau token kedaluwarsa |
| `403 Forbidden` | Kredensial valid tetapi tidak memiliki hak akses (authorization failure) |
| `404 Not Found` | Resource atau URL endpoint tidak ditemukan |
| `422 Unprocessable` | Validasi input form request gagal |
| `500 Internal Error` | Kesalahan sistem/database tak terduga (sembunyikan pesan internal DB) |

---

## 4. Routing & Endpoint Catalog
| Method | Endpoint | Handler / Controller | Keterangan |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | Closure (`routes/web.php`) | Render landing page view (`welcome`) |