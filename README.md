Saya bernama Zahran Zaidan Saputra dengan NIM 2415429 mengerjakan TP1 dalam matakuliah Desain dan Pemrogaman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasikan Aminn.

Konsep Desain

**Class & Atribut**
- ProdukElektronik  : Desain ini berpusat pada satu class utama,yaitu "ProdukElektronik".
- Kode         : Sebagai ID unik untuk setiap produk barang.
- namaBarang   : Untuk mengidentifikasi nama dari sebuah produk elektronik.
- jenisBarang  : Untuk mengidentifikasi jenis barang dari suatu produk bisa saja Laptop atau HP.
- merek        : Untuk menamai merek dari sebuah produk
- berat        : Untuk mengetahui berat suatu produk dalam satuan kilogram.
- gambar(PHP)  : Untuk menampilkan gambar produk

**Flow Kode**

**=========Keseluruhan=========**

Python,Java,dan C++
* User akan diberikan 6 pilihan berupa angka yang bisa diisi oleh si user.
* 6 pilihan tersebut,yaitu (Tambah Data,Menampilkan Semua Produk, Update Produk, Hapus Produk, Cari Data Produk, dan Keluar).

* Jika user memilih Tambah Produk,maka user harus mengisi atribut sesuai spesifikasi yang ada
<img width="459" height="419" alt="image" src="https://github.com/user-attachments/assets/994acd0c-94fe-4019-8469-fe21e12bf6b5" />

* Jika user memilih menampilkan semua produk,maka program akan menampilkan produk yang telah di ibput oleh si user.
<img width="400" height="454" alt="image" src="https://github.com/user-attachments/assets/239aaf1b-461c-4e69-a46b-6f96c06605f3" />

* Jika user memilih Update data produk,maka user bisa merubah data produk yang sebelumnya telah di masukkan.
<img width="547" height="444" alt="image" src="https://github.com/user-attachments/assets/1aecc8b7-9fde-428f-b4a6-52cf1471125a" />

* Jika user memilih Hapus data produk,maka produk yang sebelumnya telah dibuat kini bisa dihapus dengan mengisi kode produk.
<img width="564" height="332" alt="image" src="https://github.com/user-attachments/assets/f4545e8c-a7dc-4e8f-94e4-75b9d4cd8760" />

* Jika user memilih Cari data produk,maka program akan menampilkan seluruh data produk yang telah dibuat.
<img width="476" height="465" alt="image" src="https://github.com/user-attachments/assets/c216e3b9-b1ce-4b37-bf63-6fc772be84e4" />

*Jika tidak ditemukan produknya maka akan menampilkan:

<img width="521" height="338" alt="image" src="https://github.com/user-attachments/assets/d4b70111-4a67-4f8c-905c-9c247540abec" />

*Jika user memilih keluar,maka program akan berhenti berjalan dan keluar.
<img width="684" height="282" alt="image" src="https://github.com/user-attachments/assets/1df1c071-46f2-4d73-aea8-84dec506ecbd" />


PHP

Untuk PHP sama saja hanya saja terdapat atribut path gambar supaya pengguna dapat melihat gambar dari produk tersebut.
<img width="1903" height="902" alt="Screenshot 2025-09-18 180719" src="https://github.com/user-attachments/assets/abd02866-2619-4985-be97-ce6c5945c582" />












1.Python
* Program dijalankan melalui "py main.py".File pada "main.py" mengimpor class dari "ProdukElektronik.py"
* Program berjalan di dalam while true loop yang terus menampilkan menu
* Data disimpan di dalam sebuah list python.
* Di setiap putaran loop,menu pilihan seperti (Tambah,Cari,Update,Tampilkan,Hapus,Keluar)akan dicetak ke layar.
* Lalu program akan berhenti sejenak,menunggu user memasukkan nomor pilihan.
* Terdapat enam pilihan nomor yang bisa dimasukkan oleh si user seperti (Tambah,Cari,Update,Tampilkan,Hapus,Keluar)
<img width="457" height="791" alt="Screenshot 2025-09-18 175042" src="https://github.com/user-attachments/assets/d90118c1-6940-4ac5-9f51-1b70d02f7c52" />


2.Java
* Program dijalankan melalui "java Main"yang akan mengeksekusi main di dalam class main.
* Saat program berjalan,Array list kosong bernama **daftarProduk** dibuat untuk menyimpan semua objek produk dan ada **Scanner** juga buat menangani semua input dari pengguna selama program berjalan.
* Program masuk ke looping (while (true)) dan program berhenti dan menunggu input berupa angka
* Terdapat enam angka yang memiliki fungsi yang berbeda-beda.
* Program memakai switch-case buat memanggil method yang sesuai dengan pilihan pengguna.
<img width="500" height="879" alt="Screenshot 2025-09-17 182157" src="https://github.com/user-attachments/assets/67cb49d2-0efe-4876-9a56-02528fab92bb" />


3.C++
* Program masuk ke dalam looping while yang akan terus berjalan.
* Di setiap putaran,menu pilihan akan ditampilkan ke layar.
* Program ini bakal berhenti dan menunggu input angka dari user menggunakan cin.
* Program menggunakan switch-case buat menjalankan blok kode yang sesuai dengan pilihan user.
<img width="415" height="739" alt="Screenshot 2025-09-17 175346" src="https://github.com/user-attachments/assets/69b9b0a7-7ec9-43d6-bf58-3bfd1d88d3df" />


4.PHP
* Data disimpan di $_Session agar datanya ga hilang jika halamannya di refresh.
* User mengakses link URL di browser
* Terdapat beberapa pilihan yang dapat diisi oleh si usernya
* Jika sudah program akan memulai dan akan menampilkan menu berdasarkan inputan oleh si user.
<img width="1903" height="902" alt="Screenshot 2025-09-18 180719" src="https://github.com/user-attachments/assets/e92d771d-abe6-4d8a-bb34-befbe94e3797" />








