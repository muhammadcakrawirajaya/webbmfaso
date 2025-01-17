# Dokumentasi Proyek

## Website Monitoring Progress Order Fallout End State PT Telkom

### Aktivasi

#### Langkah 1: Unduh atau Klon Proyek Ini
- Anda dapat mengunduh atau mengklon proyek ini ke komputer Anda.

#### Langkah 2: Atur File `.env`
- Buka proyek dan ubah file `.env` (Anda dapat menyalin dari `.env.example` dan jangan lupa mengganti namanya menjadi `.env`).

```
APP_TIMEZONE=Asia/Jakarta

APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=telkomnew
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=local
```

- *Catatan:* Nama database dapat disesuaikan dengan preferensi Anda.
- Sistem disk bersifat opsional, tetapi ubah menjadi "public" jika Anda akan menghosting aplikasi ini.

#### Langkah 3: Instal Dependensi dengan Composer
- Jalankan perintah berikut di terminal:
  ```
  composer install --ignore-platform-reqs
  ```

#### Langkah 4: Buat Link Storage
- Jalankan perintah berikut untuk membuat link storage:
  ```
  php artisan storage:link
  ```

#### Langkah 5: Migrasi Database
- Pastikan database sudah dibuat terlebih dahulu.
- Jalankan perintah berikut untuk migrasi dan seeding database:
  ```
  php artisan migrate:fresh --seed
  ```

#### Langkah 6: Jalankan Server
- Jalankan perintah berikut untuk menjalankan server lokal:
  ```
  php artisan serve
  ```
- Nikmati aplikasi Anda!

#### Langkah Opsional: Instal Library Excel
- Jika diperlukan, jalankan perintah berikut untuk menginstal library Excel:
  ```
  composer require maatwebsite/excel
  ```

---

## Versi Aplikasi

### Versi 1.0001

#### Fitur Dashboard
- **Dashboard**
  - **Team Leader**:
    - Membaca data order.
  - **Admin**:
    - Membaca data order.

#### Fitur Data Master
- **Data Order**
  - **Team Leader**:
    - CRUD Data Order dengan pembatasan "data PO".
  - **Admin**:
    - CRUD Data Order.
- **Upload Excel**
  - **Admin & ASO**:
    - Mengunggah data order.
- **Check Complete**
  - **Admin & ASO**:
    - Memperbarui data order.

#### Fitur Pengelolaan Data
- **Manajemen Data Pengguna**
  - **Team Leader**:
    - Membaca data pengguna.
  - **Admin**:
    - CRUD data pengguna.

- **Manajemen Data Log**
  - **Team Leader**:
    - Membaca data log.
  - **Admin**:
    - Membaca data log.

- **Manajemen Data SO**
  - **Team Leader**:
    - Membaca data SO.
  - **Admin**:
    - CRUD data SO.

- **Manajemen Data STO**
  - **Team Leader**:
    - Membaca data STO.
  - **Admin**:
    - CRUD data STO.

- **Manajemen Data UIC**
  - **Team Leader**:
    - Membaca data UIC.
  - **Admin**:
    - CRUD data UIC.

- **Manajemen Data PIC**
  - **Team Leader**:
    - Membaca data PIC.
  - **Admin**:
    - CRUD data PIC.

- **Manajemen Data Status Kendala**
  - **Team Leader**:
    - Membaca data status kendala.
  - **Admin**:
    - CRUD data status kendala.

---

