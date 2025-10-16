# Course Register - Web Programming Project


**Subjek**: Web Programming  
**Kelas**: DDT 5C  
**Sesi**: 1 2025/2026

Projek ini merupakan aktiviti pembelajaran yang dilakukan dalam kelas bersama pelajar **DDT 5C PSP** untuk subjek **Web Programming**.

## Ciri-ciri Utama

### Sistem Autentikasi
- **Login**: Pengguna boleh log masuk menggunakan username dan password
- **Register**: Pendaftaran pengguna baru dengan maklumat lengkap
- **Logout**: Fungsi log keluar yang selamat
- **Auth Check**: Kawalan akses untuk halaman yang memerlukan login

### Pengurusan Pengguna
- **Senarai Pengguna**: Paparan senarai semua pengguna yang berdaftar
- **Status Pengguna**: Menunjukkan status aktif/tidak aktif pengguna
- **Maklumat Pengguna**: Menyimpan username, fullname, email dan status

### Integrasi Email
- **PHPMailer**: Library untuk penghantaran email (mungkin untuk verifikasi atau notifikasi)


## Struktur Projek

```
courseRegister/
├── index.php              # Halaman login utama
├── register.php           # Halaman pendaftaran
├── list.php              # Senarai pengguna (perlu login)
├── logout.php            # Proses logout
├── process_login.php     # Pemprosesan login
├── process_register.php  # Pemprosesan pendaftaran
├── include/
│   ├── auth_check.php    # Semakan autentikasi
│   ├── db_connect.php    # Sambungan database
│   ├── header.php        # Header halaman
│   └── footer.php        # Footer halaman
└── PHPMailer/            # Library email
```

## Keperluan Sistem

- **Web Server**: Apache/Nginx dengan PHP
- **Database**: MySQL/MariaDB
- **PHP Version**: PHP 7.0 atau lebih tinggi
- **Extensions**: mysqli, session

## Persediaan Database

Database yang digunakan: `dfp50193`

Pastikan anda mempunyai table `tblUser` dengan struktur berikut:
- `id` - Primary key
- `username` - Username pengguna
- `password` - Password (disarankan untuk hash)
- `fullname` - Nama penuh
- `email` - Alamat email
- `isActive` - Status pengguna (boolean)

## Konfigurasi

1. **Database Connection**: Edit `include/db_connect.php`
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $database   = "dfp50193";
   ```

2. **Web Server**: Pastikan projek berada dalam directory web server (contoh: `htdocs`, `www`)

## Cara Menggunakan

1. Akses halaman utama (`index.php`) untuk login
2. Atau klik link untuk membuat akaun baru (`register.php`)
3. Selepas login, anda akan diarahkan ke senarai pengguna (`list.php`)
4. Gunakan butang logout untuk keluar dengan selamat

## TODO 

- [ ] **update.php** - Halaman untuk mengemaskini maklumat pengguna
  - Form untuk edit profile pengguna
  - Validation dan pemprosesan data
  - Update maklumat dalam database
  
- [ ] **delete.php** - Fungsi untuk memadam pengguna
  - Confirmation dialog sebelum delete
  - Soft delete atau hard delete
  - Log aktiviti delete

- [ ] **Advanced JOIN Queries**
  - JOIN antara multiple tables
  - Complex reporting dengan JOIN statements
  - Optimized database queries
  - Relationship management antara entities

### Lain-lain yang boleh ditambah
- [/] Password hashing dan security
- [ ] User role management (Admin, User)
- [ ] Search dan filtering dalam senarai pengguna
- [ ] Pagination untuk senarai yang panjang
- [/] Upload profile picture
- [/] Email verification untuk pendaftaran
- [ ] Password reset functionality
- [ ] Activity logs dan audit trail


## Teknologi Digunakan

- **Frontend**: HTML5, Bootstrap CSS
- **Backend**: PHP
- **Database**: MySQL
- **Library**: PHPMailer
- **Session Management**: PHP Sessions


---
