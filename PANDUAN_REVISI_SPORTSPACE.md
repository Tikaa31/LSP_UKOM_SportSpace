# Panduan Revisi SportSpace

Revisi dibatasi pada tiga kebutuhan:
1. Jam booking ditampilkan berurutan setiap satu jam (08.00–21.00; jam tutup 22.00). Slot yang bentrok dengan booking aktif diberi status `Dipesan` dan tidak dapat dipilih. Pengecekan mengikuti durasi booking.
2. Jadwal perbaikan lapangan dikelola admin dengan tanggal mulai, tanggal selesai, dan alasan. Pada tanggal perbaikan, halaman booking menampilkan informasi perbaikan dan menonaktifkan semua slot.
3. Admin tidak dapat menyimpan jadwal perbaikan jika ada booking berstatus `pending` atau `confirmed` pada rentang tanggal tersebut. Daftar ID dan waktu booking yang konflik ditampilkan sebagai peringatan.

## Cara menerapkan

1. Backup folder project dan database terlebih dahulu.
2. Ekstrak ZIP revisi, lalu salin file project ke folder SportSpace kamu (atau gunakan folder hasil ekstrak sebagai project baru).
3. Jangan mengganti `.env` milik lokal kamu. File `.env` sengaja tidak disertakan dalam ZIP.
4. Buka terminal di folder project dan jalankan:

```bash
composer install
npm install
php artisan migrate
php artisan storage:link
npm run build
php artisan optimize:clear
```

Jika dependency sudah terpasang, `composer install` dan `npm install` dapat dilewati.

## Menguji fitur

- Login sebagai admin, buka Manajemen Lapangan, lalu buka bagian **Atur perbaikan** pada lapangan.
- Masukkan rentang tanggal dan alasan. Jika ada booking aktif, sistem menolak penyimpanan dan menampilkan booking yang konflik.
- Jika tidak ada konflik, jadwal perbaikan tersimpan.
- Login sebagai pengguna, buka booking lapangan dan pilih tanggal perbaikan. Informasi perbaikan tampil dan semua slot terkunci.
- Pilih tanggal normal. Semua jam 08.00 sampai 21.00 tampil; slot yang bertabrakan dengan booking pending/confirmed menjadi disabled.

Catatan: pemeriksaan backend tetap dijalankan saat submit booking, sehingga status slot dari tampilan bukan satu-satunya pengaman.
