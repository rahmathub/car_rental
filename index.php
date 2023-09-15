<?php
require 'koneksi/koneksi.php';
if(empty($_SESSION['USER']))
{
    session_start();
}
include 'header.php';

?>

<br>
<br>
<!-- POSTER MOBIL -->
<div class="container-fluid">
        <img src="rental.jpeg" style="width:90%;height:40%;display:block;margin-left:auto;margin-right:auto;">
</div>
<br>
<br>

<!--CAROUSEL-->
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php 
            $querymobil =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
            $no =1;
            foreach($querymobil as $isi)
            {
        ?>
        <li data-target="#carouselId" data-slide-to="<?= $no;?>" class="<?php if($no == '1'){ echo 'active';}?>"></li>
        <?php $no++;}?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php 
            $no =1;
            foreach($querymobil as $isi)
            {
        ?>
        <div class="carousel-item <?php if($no == '1'){ echo 'active';}?>">
            <img src="assets/image/<?= $isi['gambar'];?>" alt="First slide" 
            class="img-fluid" style="width:1100px auto;height:600px auto;display:block;margin-left:auto;margin-right:auto;">
        </div>
        <?php $no++;}?>
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- DAFTAR DATABASE MOBIL RENTAL -->
<div class="container-fluid mt-5">
    <div class="row">

        <!-- BAGIAN LOGIN,DAFTAR -->
        <div class="col-sm-3 p-2">
            <div class="card" style=" background: #ddd">
                <div class="card-body">
                    <?php if($_SESSION['USER']){?>

                        Selamat Datang , <?php echo $_SESSION['USER']['nama_pengguna'];?>
                        <br/>
                        <br/>
                        <center>
                            <?php if($_SESSION['USER']['level'] == 'admin'){?>
                                <a href="admin/index.php" class="btn btn-primary mb-2 btn-block">Dashboard</a>
                            <?php }else{?>
                                <a href="blog.php" class="btn btn-primary mb-2 btn-block">Booking Sekarang !</a>
                            <?php }?>
                            <!-- Button trigger modal -->
                            <a href="admin/logout.php" class="btn btn-danger text-white btn-block">
                                Logout
                            </a>
                        </center>

                    <?php }else{?>
                        <!-- JENDELA LOGIN -->
                    <form method="post" action="koneksi/proses.php?id=login">
                        <center><h5 class="card-title" style="font-weight:bold">LOGIN MEMBER RENTAL</h5></center>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" class="form-control" aria-describedby="helpId" required >
                        </div>
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" class="form-control" aria-describedby="helpId" required >
                        </div>
                        <center><button class="btn btn-primary">Login Member</button>
                        
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modelId">
                            Daftar untuk Booking
                         </a></center>
                    </form>
                    <?php }?>
                </div>
            </div>
            <br>
            <!-- tambahan di bawah login -->
             <div class="card" style="background: #ddd;">
                <img src="galeri/9.jpeg" style="margin:10px auto;width:250px;height:200px;display:inline-block">
                <p style="margin:10px ;font: 16px/25px arial, sans-serif;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="https://www.instagram.com/reztajayarentcar/" style="text-decoration:none">CV. Reztajaya Kendari</a> merupakan salah satu penyedia jasa layanan rental 
                mobil terbaik dan termurah di daerah Kendari,Sulawesi, dan sekitarnya. Kami Selalu memberikan pelayanan yang terbaik, demi kepuasan
                para pengguna jasa. Antara mobil yang tersedia di lengkapi dengan pelayanan
                yang prima dan harga yang kompetitif, Kami siap menjadi jasa langganan 
                terpercaya bagi perjalanan anda.</p>
                <hr>
                <p style="margin:10px;font: 16px/25px arial, sans-serif;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDengan komitmen menjadi Agen Rental Mobil Kendari yang terpercaya di kalangan
                masyarakat, jadi kepercayaan pengguna jasa selalu menjadi prioritas utama kami.</p>
                <hr>
                <p style="margin:10px;font: 16px/25px arial, sans-serif;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdapun proses penyewaan dapat Anda lakukan dengan menghubungi kontak layanan kami yang tercantum dalam website ini atau pemesanan lewat website ini melalui akun member anda. Kunjungi juga kantor kami yang berlokasi <a href="#" style="text-decoration:none">Jl. HEA Mokodompit, Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara.</a> Tim kami akan selalu siap menyambut Anda.</p>
                <br>
                <br>
                <a class="btn btn-outline-dark btn-social mx-2" href="https://www.instagram.com/reztajayarentcar/"><i class="bi bi-instagram fa-2x"></i></a>
                <br>
                <a class="btn btn-outline-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=6285346066644"><i class="bi bi-whatsapp fa-2x"></i></a>
                <br>
                <br>
            </div>
        </div>

        <!-- RAK MOBIL RENTAL -->
        <div class="col-sm-9">
            <div class="row">
                <?php 
                    $query =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
                    $no =1;
                    foreach($query as $isi)
                    {
                ?>
                <br/>
                <br/>
                <div class="col-sm-4 p-2">
                    <div class="card">
                    <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;">
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
                        <center><a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-success">Booking now!</a>
                        <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-info">Detail</a></center>
                        </div>
                    </div>
                </div>
                <?php $no++;}?>
            </div>
        </div>
    </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Member Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="post" action="koneksi/proses.php?id=daftar">
                    <div class="form-group">
                    <label for="">Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="user" id="" class="form-control"  required aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="pass" id="" class="form-control" required  aria-describedby="helpId">
                    </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary text-white" data-dismiss="modal">Keluar</a>
                <button type="submit" class="btn btn-primary">Daftar Member Baru</button>
            </div>
            </form>
        </div>
    </div>
</div>
<br>


<?php
include 'footer.php';
?>