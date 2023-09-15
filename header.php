<!doctype html>
<html lang="en">
  <head>
    <title>Rental Mobil Kendari Terbaik atau
    RentalmobilMurahKendari atau
    Rentalkendarimurah
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" >
    <link rel="stylesheet" href="assets/css/font-awesome.css" >

    <!-- style css buatan ku -->
    <link rel="stylesheet" href="cssku/style.css">
    
    
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- HEADER  -->
        <div class="header">
            <!-- NAMA PEMILIK RENTAL ATAU OWNER -->
            <div class="nama_rental">
                <h2><?= $info_web->nama_rental;?></h2>
            </div>

            <!-- FITUR SEARCHING -->
            <div class="searching">
                <form class="form-inline" method="get" action="blog.php">
                    <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari Nama Mobil" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>


    <!-- FITUR NAVIGASI -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li>
                    <a class="nav-link" href="index.php" style="font-size: 20px;">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="blog.php" style="font-size: 20px;">Daftar Mobil</a>
                </li>
                <li>
                    <a class="nav-link" href="galeri.php" style="font-size: 20px;">Galeri</a>
                </li>
                <li>
                    <a class="nav-link" href="kontak.php" style="font-size: 20px;">Kontak Kami</a>
                </li>
            <?php if(!empty($_SESSION['USER'])){?>
                <!--<li>-->
                <!--    <a class="nav-link" href="history.php">History</a>-->
                <!--</li>-->
                <li>
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
            <?php }?>
            </ul>
            <?php if(!empty($_SESSION['USER'])){?>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user"> </i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna'];?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?php echo $url;?>admin/logout.php">Logout</a>
                </li>
            </ul>
            <?php }?>
        </div>
    </nav>