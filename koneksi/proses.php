<?php
 require 'koneksi.php';

// lOGIN
//  Upgrade Keamanan menggunakan blacklisting dan SQL Escape
if($_GET['id'] == 'login'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Blacklisting
    $user = preg_replace("/[&`;'\|*?~<>^()\[\]{}\$\\\n\r]/", "", $user);
    $pass = preg_replace("/[&`;'\|*?~<>^()\[\]{}\$\\\n\r]/", "", $pass);

    // SQL Escape String
    $user = $koneksi->quote($user);
    $pass = $koneksi->quote($pass);

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = $user AND password = md5($pass)");
    
    $row->execute();
    
    $hitung = $row->rowCount();

    if($hitung > 0)
    {

        session_start();
        $hasil = $row->fetch();
        
        $_SESSION['USER'] = $hasil;

        if($_SESSION['USER']['level'] == 'admin')
        {
            echo '<script>alert("Login Sukses");window.location="../admin/index.php";</script>';    
        }
        else
        {
            echo '<script>alert("Login Sukses");window.location="../index.php";</script>'; 
        }

    }
    else
    {
        echo '<script>alert("Login Gagal");window.location="../index.php";</script>'; 
    }
}
/* 
Pada contoh di atas, SQL Escape String diaplikasikan pada variabel $user dan $pass menggunakan method quote() 
dari objek koneksi PDO. Kemudian, variabel $user dan $pass dimasukkan langsung ke dalam query SQL.

Iya, dengan tambahan SQL Escape String pada variabel $user dan $pass, data yang dimasukkan oleh user 
akan di-escape sehingga menghindari serangan SQL Injection pada query SQL yang dijalankan. 
Namun, tetap disarankan untuk terus memperbaharui keamanan kode dan melakukan 
pengujian secara rutin untuk mengidentifikasi potensi kerentanan pada aplikasi.

    1. Cek apakah ada parameter GET dengan id 'login'
    2. Jika ada, ambil nilai dari parameter POST 'user' dan 'pass'
    3. Lakukan blacklisting pada nilai 'user' dan 'pass', yaitu menghilangkan karakter-karakter yang tidak diizinkan
    4. Lakukan SQL escape string pada nilai 'user' dan 'pass', yaitu mengubah karakter-karakter khusus menjadi aman untuk digunakan dalam query SQL
    5. Lakukan query SQL untuk mencari data pengguna dengan username dan password yang sesuai dengan nilai 'user' dan 'pass' yang telah di-blacklist dan di-escape string
    6. Jika ditemukan data pengguna yang sesuai, buat sesi untuk pengguna tersebut dan arahkan ke halaman yang sesuai dengan level pengguna
    6. Jika tidak ditemukan data pengguna yang sesuai, kembalikan ke halaman login dan tampilkan pesan kesalahan
*/


// BAGIAN DAFTAR MEMBER
if($_GET['id'] == 'daftar')
{
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $level = 'pengguna';

    // Blacklisting
    $nama = preg_replace("/[&`;'\|*?~<>^()\[\]{}\$\\\n\r]/", "", $nama);
    $user = preg_replace("/[&`;'\|*?~<>^()\[\]{}\$\\\n\r]/", "", $user);
    $pass = preg_replace("/[&`;'\|*?~<>^()\[\]{}\$\\\n\r]/", "", $pass);

    // SQL Escape String
    $nama = $koneksi->quote($nama);
    $user = $koneksi->quote($user);

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ?");
    
    $row->execute(array($user));
    
    $hitung = $row->rowCount();

    if($hitung > 0)
    {
        echo '<script>alert("Daftar Gagal, Username Sudah digunakan ");window.location="../index.php";</script>'; 
    }
    else
    {
        $sql = "INSERT INTO `login`(`nama_pengguna`, `username`, `password`, `level`)
                VALUES ($nama, $user, '$pass', '$level')";
        $koneksi->exec($sql);

        echo '<script>alert("Daftar Sukses Silahkan Login");window.location="../index.php";</script>'; 
    }
}

/*
Dalam source code di atas, kita menambahkan proses blacklisting dan SQL escape string 
untuk masing-masing variabel input yang kemungkinan mengandung karakter-karakter yang tidak 
diinginkan atau berbahaya. Selain itu, kita juga memperbaiki cara input data ke database dengan 
menggunakan prepared statement dan menghapus penggunaan array $data.

Alur proses pada kode yang telah diperbaiki adalah sebagai berikut:
    1. Cek apakah terdapat parameter 'id' dengan nilai 'daftar' pada variabel $_GET. Jika iya, maka lanjut ke langkah 2.
    2. Ambil data input dari form pendaftaran, yaitu nama, username, password, dan level (default: 'pengguna'), dan simpan ke dalam array $data.
    3. Lakukan proses blacklisting pada username dan password menggunakan fungsi preg_replace() dengan pola regex yang sama seperti sebelumnya.
    4. Lakukan proses SQL Injection prevention dengan melakukan SQL Escape String pada username dan password menggunakan fungsi $koneksi->quote().
    5. Buat prepared statement SQL untuk mengecek apakah terdapat username yang sama pada tabel 'login'. Eksekusi prepared statement tersebut dengan parameter $_POST['user'].
    6. Hitung jumlah baris hasil eksekusi prepared statement menggunakan rowCount().
    7. Jika jumlah baris hasil eksekusi > 0, maka username telah digunakan oleh pengguna lain. Tampilkan pesan error dan redirect kembali ke halaman login.
    8. Jika jumlah baris hasil eksekusi = 0, maka username belum digunakan. Lakukan proses INSERT ke dalam tabel 'login' menggunakan prepared statement SQL dengan parameter $data. Tampilkan pesan sukses dan redirect kembali ke halaman login.
Dengan menggunakan kombinasi blacklisting dan SQL Injection prevention pada inputan user, kita dapat mencegah terjadinya serangan SQL Injection yang dapat merusak sistem atau mencuri data sensitif.
*/


// BAGIAN BOOKING
if($_GET['id'] == 'booking')
{
    $total = $_POST['total_harga'] * $_POST['lama_sewa'];
    $unik  = random_int(100,999);
    $total_harga = $total+$unik;

    $data[] = time();
    $data[] = $_POST['id_login'];
    $data[] = $_POST['id_mobil'];
    $data[] = filter_var($_POST['ktp'], FILTER_SANITIZE_NUMBER_INT);
    $data[] = filter_var($_POST['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data[] = filter_var($_POST['alamat'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $data[] = filter_var($_POST['no_tlp'], FILTER_SANITIZE_NUMBER_INT);
    $data[] = $_POST['tanggal'];
    $data[] = $_POST['lama_sewa'];
    $data[] = $total_harga;
    $data[] = "Belum Bayar";
    $data[] = date('Y-m-d');

    // Blacklist kata-kata yang tidak diperbolehkan diinput ke database
    $blacklist = array("DROP", "TABLE", "DELETE", "UPDATE", "INSERT", "SELECT");
    foreach ($data as $value) {
        foreach ($blacklist as $word) {
            if (stripos($value, $word) !== false) {
                die("Input tidak valid");
            }
        }
    }

    // Escape string untuk mencegah SQL Injection
    $data = array_map(function($item) use ($koneksi) {
        if (!is_numeric($item)) {
            $item = $koneksi->quote($item);
        }
        return $item;
    }, $data);

    $sql = "INSERT INTO booking (kode_booking, 
    id_login, 
    id_mobil, 
    ktp, 
    nama, 
    alamat, 
    no_tlp, 
    tanggal, lama_sewa, total_harga, konfirmasi_pembayaran, tgl_input) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    echo '<script>alert("Anda Sukses Booking silahkan Melakukan Pembayaran");
    window.location="../bayar.php?id='.time().'";</script>'; 
}

/*
Alur proses yang terjadi pada kode di atas adalah sebagai berikut:

    1. Mengecek apakah parameter id pada $_GET bernilai 'booking'.
    2. Jika parameter id bernilai 'booking', maka akan dilakukan proses penyimpanan data booking ke dalam database.
    3. Pertama-tama, variabel $total dihitung dengan mengalikan $_POST['total_harga'] dengan $_POST['lama_sewa']. Selanjutnya, variabel $unik diisi dengan bilangan acak antara 100 dan 999. Lalu, variabel $total_harga dihitung dengan menambahkan $total dan $unik.
    4. Data yang akan disimpan ke dalam database diambil dari $_POST dan dimasukkan ke dalam array $data. Beberapa data di antaranya telah melalui filter sanitasi seperti FILTER_SANITIZE_NUMBER_INT dan FILTER_SANITIZE_FULL_SPECIAL_CHARS.
    5. Dilakukan pengecekan kata-kata yang tidak diperbolehkan diinput ke dalam database dengan menggunakan array $blacklist. Jika terdapat kata-kata tersebut pada data yang akan disimpan, maka program akan dihentikan dengan menampilkan pesan "Input tidak valid".
    6. Data pada array $data kemudian di-escape menggunakan fungsi $koneksi->quote() untuk mencegah serangan SQL Injection.
    7. Dilakukan penyimpanan data ke dalam tabel booking pada database dengan menggunakan query INSERT INTO.
    8. Jika penyimpanan data berhasil dilakukan, maka akan ditampilkan pesan "Anda Sukses Booking silahkan Melakukan Pembayaran" beserta redirect ke halaman ../bayar.php?id=[timestamp].

Sekedar informasi, penggunaan time() sebagai nilai pada parameter id di halaman ../bayar.php mungkin tidak cukup aman karena nilai timestamp dapat dengan mudah diubah oleh pengguna. Sebaiknya, gunakan mekanisme yang lebih aman seperti menghasilkan sebuah kode unik acak dan menyimpannya ke dalam tabel booking, kemudian mengambil kode tersebut pada halaman ../bayar.php untuk menampilkan data booking yang sesuai.
*/ 


// KONFIRMASI BOOKING
if($_GET['id'] == 'konfirmasi')
{

    $data[] = $_POST['id_booking'];
    $data[] = $_POST['no_rekening'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['nominal'];
    $data[] = $_POST['tgl'];

    $sql = "INSERT INTO `pembayaran`(`id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) 
    VALUES (?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    $data2[] = 'Sedang di proses';
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE `booking` SET `konfirmasi_pembayaran`=? WHERE id_booking=?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Kirim Sukses , Pembayaran anda sedang diproses");history.go(-2);</script>'; 
}