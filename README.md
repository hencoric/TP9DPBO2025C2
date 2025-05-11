# JANJI

Saya Marco Henrik Abineno dengan NIM 2301093 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# DESAIN PROGRAM

TP9 Membuat Web Manajemen Data Mahasiswa menggunakan MVP (Model-View-Presenter) dan CRUD (Hampir sama kaya tp8 yang menggunakan MVC, bedanya tp9 hanya satu tabel. makasih kang...)

## TABEL MAHASISWA

1. id -> Merupakan Primary Key
2. nim -> Berisi Nomor Induk Mahasiswa
3. nama -> Berisi Nama Mahasiswa
4. tempat -> Berisi Tempat Lahir Mahasiswa
5. tl -> Berisi Tanggal Lahir Mahasiswa
6. gender -> Berisi Jenis Kelamin Mahasiswa **(only laki-laki dan perempuan, NO MORE)**
7. email -> Berisi Email Mahasiswa
8. tlp -> Berisi Nomor Telepon Mahasiswa

## STRUKTUR

![image](https://github.com/user-attachments/assets/86e445f4-4e1e-40ee-9141-44850fec2c9f)

Program ini dirancang menggunakan arsitektur MVP (Model-View-Presenter), yang membagi logika aplikasi ke dalam tiga bagian utama:

1. Model berfungsi sebagai penyimpan logika data dan representasi entitas yang digunakan dalam aplikasi. Pada program ini, entitas yang digunakan adalah Mahasiswa, yang mencakup informasi seperti NIM, nama, jurusan, dan data lainnya yang berkaitan.
2. View adalah komponen antarmuka pengguna yang bertugas menampilkan data serta menerima input dari pengguna. Komponen ini hanya mengelola tampilan dan tidak menangani logika bisnis.
3. Presenter berperan sebagai perantara antara Model dan View. Presenter mengambil data dari Model, memprosesnya bila diperlukan, lalu mengirimkannya ke View untuk ditampilkan. Selain itu, Presenter juga mengelola input dari View dan mengatur alur interaksi aplikasi.
4. TAMBAHAN : Template : Isinya Hanya HTML dan Index.php Berisi Rute

# ALUR PROGRAM

1. Ketika pengguna pertama kali membuka halaman aplikasi, proses dimulai dengan View yang aktif menunggu untuk menampilkan data. View kemudian mengirimkan permintaan kepada Presenter agar mengambil data yang dibutuhkan.
2. Setelah menerima permintaan dari View, Presenter bertindak sebagai penghubung dan meneruskan permintaan tersebut ke Model. Model kemudian mengambil data Mahasiswa, yang berisi informasi seperti nim, nama, tempat, tanggal, gender, email, no.tlp, dari database.
3. Setelah data berhasil diambil, Model mengirimkannya kembali ke Presenter. Presenter selanjutnya dapat melakukan pengolahan atau penyesuaian data jika diperlukan, sebelum akhirnya mengembalikan data tersebut ke View.
4. Akhirnya, View menerima data yang sudah siap ditampilkan dan memprosesnya menggunakan template HTML untuk disajikan kepada pengguna dalam tampilan antarmuka yang sesuai dan mudah dipahami.

# DOKUMENTASI

https://github.com/user-attachments/assets/1bdeda01-72b8-47dc-a981-70578160c81b

