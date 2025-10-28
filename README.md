# Memphis Fried Chicken - Form Pemesanan Ayam Goreng

Aplikasi web sederhana berbasis **PHP**, **HTML**, dan **CSS** untuk menghitung total harga pesanan ayam goreng, nasi, serta teknik masak *Speed Fry* berdasarkan cabang yang dipilih pelanggan.

---

## Deskripsi
Program ini menampilkan **form pemesanan** yang memungkinkan pelanggan memilih cabang restoran, jumlah menu yang dipesan, dan apakah ingin menggunakan teknik *Speed Fry*. Setelah form dikirim, sistem menghitung harga sesuai ketentuan, lalu menampilkan **nota pembelian** lengkap dengan rincian setiap item dan total keseluruhan harga.

---

## Alur Aplikasi

1. **Inisialisasi Data Cabang**
   - PHP mendefinisikan array berisi daftar cabang:
     ```php
     $cabang = ["Cikarang", "Bekasi", "Karawang", "Bogor"];
     sort($cabang);
     ```
     Data ini digunakan untuk menampilkan pilihan cabang di dropdown form.

2. **Menampilkan Form Pemesanan**
   Pengguna mengisi:
   - Cabang restoran  
   - Jumlah dada ayam  
   - Jumlah paha ayam  
   - Jumlah nasi  
   - Pilihan *Speed Fry* (Ya/Tidak)  

   Saat tombol **“Hitung Pesanan”** ditekan, data dikirim (`POST`) ke halaman yang sama (`index.php`).

3. **Proses Perhitungan**
   Setelah data diterima, program melakukan langkah berikut:
   - Membaca semua input menggunakan `$_POST`.
   - Menetapkan harga dasar:
     ```php
     $hrgDada = 11000;
     $hrgPaha = 8000;
     $hrgNasi = 5000;
     ```
   - Jika cabang = **Cikarang**, semua harga naik **Rp1.000**.
   - Jika menggunakan *Speed Fry*, ayam dada dan paha naik **Rp3.000** per potong.
   - Menghitung total tiap item dan jumlah keseluruhan:
     ```php
     $total = ($jmlDada * $hrgDada) + ($jmlPaha * $hrgPaha) + ($jmlNasi * $hrgNasi);
     ```

4. **Menampilkan Nota Pemesanan**
   Hasil perhitungan ditampilkan dalam bentuk nota:

