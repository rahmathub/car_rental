<?php
    session_start();
    if(!empty($_SESSION['USER']['level'] == 'admin')){ 

    }else{ 
        echo '<script>alert("Login Khusus Admin !");window.location="../index.php";</script>';
    }
 
    // select untuk panggil nama admin
    $id_login = $_SESSION['USER']['id_login'];
    
    $row = $koneksi->prepare("SELECT * FROM login WHERE id_login=?");
    $row->execute(array($id_login));
    $hasil_login = $row->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title_web;?> | Rental Mobil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $url;?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url;?>assets/css/font-awesome.css">

    <!-- cara kedua -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
    <link rel="stylesheet" href="../assets/css/font-awesome.css" >

    <!-- cara ketiga -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" >
    <link rel="stylesheet" href="assets/css/font-awesome.css" >

    <!-- style css buatan ku -->
    <link rel="stylesheet" href="<?php echo $url;?>cssku/style.css">
    <link rel="stylesheet" href="<?php echo $url;?>admin/cssku/style.css">
    
    <!-- style css buatan ku 2 -->
    <link rel="stylesheet" href="cssku/style.css">
    
    <!-- botstrap pake javascript jika tidak berfungsi di atas -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    

  </head>
  <body>
    <div class="jumbotron pt-4 pb-4">
        <div class="row">
            <div class="col-sm-8">
                <h2><b style="text-transform:uppercase;font-size:35px;font-weight: bold;"><?= $info_web->nama_rental;?> </b></h2>
            </div>
        </div>
    </div>
    <div style="margin-top:-2pc"></div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333;">
        <a class="navbar-brand" href="<?php echo $url;?>admin/"><b>Admin Panel</b></a>
        <button class="navbar-toggler text-white d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation" style="color:#fff;">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?php if($title_web == 'Dashboard'){ echo 'active';}?>">
                    <a class="nav-link" href="<?= $url;?>admin/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($title_web == 'User'){ echo 'active';}?>">
                    <a class="nav-link" href="<?= $url;?>admin/user/index.php">User / Pelanggan</a>
                </li>
                <li class="nav-item <?php if($title_web == 'Daftar Mobil'){ echo 'active';}?>
                <?php if($title_web == 'Tambah Mobil'){ echo 'active';}?>
                <?php if($title_web == 'Edit Mobil'){ echo 'active';}?>">
                    <a class="nav-link" href="<?= $url;?>admin/mobil/mobil.php">Daftar Mobil</a>
                </li>
                <li class="nav-item <?php if($title_web == 'Daftar Booking'){ echo 'active';}?>
                <?php if($title_web == 'Konfirmasi'){ echo 'active';}?>">
                    <a class="nav-link" href="<?= $url;?>admin/booking/booking.php">Daftar Booking</a>
                </li>
                <li class="nav-item <?php if($title_web == 'Peminjaman'){ echo 'active';}?>">
                    <a class="nav-link" href="<?= $url;?>admin/peminjaman/peminjaman.php">Peminjaman / Pengembalian</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user"> </i> Hallo, <?php echo $hasil_login['nama_pengguna'];?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?= $url;?>admin/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>