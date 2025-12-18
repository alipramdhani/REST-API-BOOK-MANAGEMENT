# 📚 Book API – Laravel

REST API sederhana untuk manajemen data buku menggunakan **Laravel**. API ini dibuat untuk kebutuhan **backend test** dan mencakup fitur CRUD serta pencarian buku.

---

## 🚀 Teknologi yang Digunakan

* PHP >= 8.1
* Laravel >= 10 / 11
* Database: MySQL / PostgreSQL / SQLite
* RESTful API

---

## ⚙️ Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone <repository-url>
cd book-api
```

### 2. Install Dependency

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Atur koneksi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookmanage
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Migration

```bash
php artisan migrate
```

### 5. Jalankan Server

```bash
php artisan serve
```

Server akan berjalan di:

```
http://127.0.0.1:8000
```

---

## 📌 Base URL

```
http://127.0.0.1:8000/api
```

---

## 📘 Endpoint API

### 1️⃣ Create Book

**Endpoint**

```
POST /books
```

**Request Body (JSON)**

```json
{
  "book_name": "Belajar Laravel Dasar",
  "author": "Mohamad Alif Ramdani",
  "description": "Buku tentang framework Laravel",
  "published_date": "2024-01-01"
}
```

**Validasi**

* `book_name` max 150 karakter
* `author` max 150 karakter
* Kombinasi `book_name + author` harus unik
* `published_date` harus format tanggal valid

**Response (201)**

```json
{
  "id": 1,
  "book_name": "Belajar Laravel Dasar",
  "author": "Mohamad Alif Ramdani",
  "description": "Buku tentang framework Laravel dan Algoritma",
  "published_date": "2024-01-01",
  "created_at": "2024-01-01T10:00:00Z",
  "updated_at": "2024-01-01T10:00:00Z"
}
```

---

### 2️⃣ List Books (Pagination)

**Endpoint**

```
GET /books
```

**Keterangan**

* Default pagination: **4 buku per halaman**

**Contoh Response**

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "book_name": "Belajar Laravel Dasar",
      "author": "Mohamad Alif Ramdani"
    }
  ],
  "per_page": 4,
  "total": 10
}
```

---

### 3️⃣ Update Book (Description Only)

**Endpoint**

```
PUT /books/{id}
```

**Request Body**

```json
{
  "description": "Deskripsi buku diperbarui"
}
```

**Catatan**

* Field yang dapat diupdate **hanya `description`**

---

### 4️⃣ Delete Book

**Endpoint**

```
DELETE /books/{id}
```

**Response**

```json
{
  "message": "Buku berhasil dihapus"
}
```

**Catatan**

* API akan mengecek apakah data buku tersedia sebelum dihapus

---

### 5️⃣ Search Books

**Endpoint**

```
GET /books/search
```

**Query Parameter (Opsional)**

* `book_name`
* `description`

**Contoh Request**

```
GET /books/search?book_name=Laravel
```

Atau:

```
GET /books/search?description=framework
```

---

## 🧪 Testing

API dapat diuji menggunakan:

* Postman

---

## 📄 Catatan Tambahan

* API ini **tidak menggunakan autentikasi** (sesuai kebutuhan test)
* Struktur dibuat sederhana dan mudah dikembangkan

