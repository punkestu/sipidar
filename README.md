# SIPIDAR (Sistem Informasi Peminjaman Kendaraan)
SIPIDAR merupakan aplikasi yang berguna untuk melakukan manajemen peminjaman kendaraan pada suatu perusahaan. Pada sistem ini nantinya akan ada 2 level persetujuan peminjaman sehingga mengurangi terjadinya kecurangan.

## Requirements
- php v8
- mysql v8.4.0
- laravel v10

## Cara install
1. ```composer install```
2. copy .env.example menjadi .env
3. set semua data di .env
4. ```php artisan key:generate```
5. ```php artisan migrate```
6. ```php artisan db:seed```
7. ```php artisan db:seed DriverSeeder```
8. ```php artisan db:seed UserSeeder```
9. ```php artisan db:seed VehicleSeeder```
10. ```php artisan serve```

## Cara Penggunaa
### Menambahkan data peminjaman
1. Login sebagai admin (lihat di list dummy user)
2. Masuk ke tab ```Pinjam``` di header
3. Masukan semua data peminjaman
4. Kirimkan dengan tekan tombol ```Buat Peminjaman```
### Menyetujui peminjaman
1. Login sebagai officer level 1 atau level 2 (lihat di list dummy user)
2. Masuk ke tab ```List``` di header
3. Peminjaman yang bisa disetujui akan ditandai dengan adanya aksi ```approve``` dan ```reject```
4. Tekan ```approve``` untuk menyetujui dan ```reject``` untuk menolak
5. Untuk melihat detail peminjaman tekan aksi ```detail```
6. Pada detail peminjaman jika kita login sebagai pihak yang berhak menyetujui peminjaman, maka akan muncul juga aksi ```approve``` dan ```reject```
### Ekspor data periodik
1. Login sebagai user manapun (lihat di list dummy user)
2. Masuk ke tab ```List``` di header
3. Tekan tombol ```Export``` maka secara otomatis sistem akan melakukan download file excel dengan data peminjaman yang telah disetujui dalam 1 tahun terakhir

## List dummy user
- Admin:
  - Email: admin@mail.com
  - Password: secret
- Officer level 1:
  - Officer A:
    - Email: officera@mail.com
    - Password: secret
  - Officer B:
    - Email: officerb@mail.com
    - Password: secret
- Officer level 2:
  - Officer C:
    - Email: officerc@mail.com
    - Password: secret
  - Officer D:
    - Email: officerd@mail.com
    - Password: secret
