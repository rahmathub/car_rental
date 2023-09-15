<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(isset($_GET['cari'])) {
        // Blacklist kata-kata yang tidak diperbolehkan diinput ke database
        $blacklist = array("DROP", "TABLE", "DELETE", "UPDATE", "INSERT", "SELECT");
        $cari = $_GET['cari'];
    
        foreach ($blacklist as $word) {
            if (stripos($cari, $word) !== false) {
                die("Input tidak valid");
            }
        }
        
        // Escape string untuk mencegah SQL Injection
        $query = $koneksi->query('SELECT * FROM mobil WHERE merk LIKE "%'.$cari.'%" ORDER BY id_mobil DESC')->fetchAll();
    } else {
        $query = $koneksi->query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
    }
/*
Berikut adalah alur proses dari source code yang diberikan:

    1. Pengecekan apakah form search telah disubmit. Jika iya, maka dilakukan proses selanjutnya untuk melakukan pencarian data.
    2. Dilakukan blacklist kata-kata yang tidak diperbolehkan diinput ke database. Jika ditemukan salah satu kata yang terdapat dalam blacklist, maka program akan memberikan pesan error "Input tidak valid" dan menghentikan proses pencarian.
    3. Melakukan escape string untuk mencegah SQL injection. Hal ini dilakukan dengan menggunakan method quote() pada objek $koneksi, yang merupakan objek dari PDO class.
    4. Membuat query untuk mencari data mobil yang mengandung string yang dicari. Query dibuat dengan menggunakan operator LIKE pada kolom merk dari tabel mobil, dan diurutkan berdasarkan id_mobil secara descending (dari yang paling baru ke yang paling lama).
    5. Jika form search tidak disubmit, maka program akan menampilkan semua data mobil yang ada pada tabel mobil.

Dengan cara ini, program mampu melakukan pencarian data dengan aman dan terhindar dari serangan SQL injection.
*/
?>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <?php 
            if($_GET['cari'])
            {
                echo '<h4> Keyword Pencarian : '.$cari.'</h4>';
            }else{
                echo '<h4> Semua Mobil</h4>';
            }
        ?>
        <div class="row mt-3">
        <?php 
            $no =1;
            foreach($query as $isi)
            {
        ?>
            <div class="col-sm-4 p-3">
                <div class="card">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;object-fit:cover;">
                    <div class="card-body" style="background:#ddd">
                        <h5 class="card-title" style="text-align: center;font-weight:bold;font-size:18px;"><?php echo $isi['merk'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($isi['status'] == 'Tersedia'){?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Mobil Tersedia 
                            </li>
                        <?php }else{?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Mobil tidak Tersedia
                            </li>
                        <?php }?>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i>Harga Luar Kota Menyesuaikan</li>
                        <li class="list-group-item bg-secondary text-white"><i class="fa fa-check"></i>+Rp200.000 USE DRIVER</li>
                        <li class="list-group-item bg-secondary text-white"><i class="bi bi-x-lg"></i> Include BBM</li>
                        <li class="list-group-item bg-dark text-white"><i class="fa fa-check"></i>Kontrak Bulanan/Tahunan</li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-success">Booking now!</a>
                            <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-info">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php $no++;}?>
        </div>
    </div>
</div>
</div>

<br>

<br>

<br>


<?php include 'footer.php';?>