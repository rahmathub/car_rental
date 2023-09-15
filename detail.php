<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    $id = strip_tags($_GET['id']);
    $hasil = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<div class="container mt-5">
<div class="row">
    <div class="col-sm-6">
        <img class="card-img-top w-100" 
            style="object-fit:cover;" 
            src="assets/image/<?php echo $hasil['gambar'];?>" alt="">
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center;font-weight:bold;font-size:18px;"><?php echo $hasil['merk'];?></h4>
                <p class="list-group-item bg-dark text-white">
                    <?php echo $hasil['deskripsi'];?>
                </p>
                <ul class="list-group list-group-flush">
                    <?php if($hasil['status'] == 'Tersedia'){?>
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
                        <i class="fa fa-money"></i> Rp. <?php echo number_format($hasil['harga']);?>/ day
                    </li>
                </ul>
                <hr/>
                <center>
                    <a href="booking.php?id=<?php echo $hasil['id_mobil'];?>" class="btn btn-success">Booking now!</a>
                    <a href="index.php" class="btn btn-info">Back</a>
                </center>
            </div>
         </div> 
    </div>
</div>
</div>


<?php include 'footer.php';?>