
        <footer class="footer1" style="background-color: #6c757d;padding: 15px;">
            <div class="container" style="text-align:center;color:#eaeaea;">
                <br>
                <div>
                    <!-- footer tengah -->
                    <i class="bi bi-emoji-smile fa-2x" style="line-height: 30px;"> Kenapa Memilih kami?</i>
                    <br>
                    <br>
                      <i class="bi bi-car-front-fill fa-2x" style="line-height: 30px;"> Mobil Terawat Dengan Baik</i>
                      <br>
                      <p style="margin: 10px;">Mobil yang kami sediakan sudah terawat dengan baik agar nyaman saat digunakan</p>
                      <br>
                      <i class="bi bi-person-fill-check fa-2x" style="line-height: 30px;"> Driver Berpengalaman</i>
                      <p style="margin: 10px;">Kami memiliki driver profesional yang berpengalaman dan terpercaya</p>
                      <br>
                      <i class="bi bi-hand-thumbs-up fa-2x" style="line-height: 30px;"> Pelayanan Terbaik</i>
                      <p style="margin: 10px;">Kami memberikan pelayanan yang ramah bagi setiap klien kami</p>
                      <br>
                      <i class="bi bi-cash fa-2x" style="line-height: 30px;"> Harga Terjangkau</i>
                      <p style="margin: 10px;">Kami menawarkan harga bersahabat yang pas untuk anda</p>
                </div>
                <br>
                <hr color="white">
                <div class="row sm-4 p-4">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4" style="font-weight:bold;font-size:20px;">Lokasi Kami</h4>
                        <p class="lead mb-0">
                          <?= $info_web->alamat;?>
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4" style="font-weight:bold;font-size:20px;">Kontak Kami</h4>
                        <a class="btn btn-outline-light btn-social mx-2" href="https://www.instagram.com/reztajayarentcar/"><i class="bi bi-instagram fa-2x"></i></a>
                        <a class="btn btn-outline-light btn-social mx-2" href="https://api.whatsapp.com/send?phone=6285346066644"><i class="bi bi-whatsapp fa-2x"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4" style="font-weight:bold;font-size:20px;">Tentang Rental Kami</h4>
                        <p class="lead mb-0" >
                            Kami Siap Melayani Rental Mobil selama 24 Jam 
                        </p>
                    </div>
                </div>
            </div>
        </footer>

      <div class="footer">
        <p>Copyright <?= date('Y');?> <?= $info_web->nama_rental;?> All Reserved</p>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>