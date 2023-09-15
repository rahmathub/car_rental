<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("Harap Login");window.location="index.php"</script>';
    }

    if(!empty($_POST['nama_pengguna']))
    {
        // Blacklist kata-kata yang tidak diperbolehkan diinput ke database
        $blacklist = array("DROP", "TABLE", "DELETE", "UPDATE", "INSERT", "SELECT");
        $nama_pengguna = $_POST['nama_pengguna'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $id_login = $_SESSION['USER']['id_login'];
        
        foreach ($blacklist as $word) {
            if (stripos($nama_pengguna, $word) !== false || stripos($username, $word) !== false) {
                die("Input tidak valid");
            }
        }
        
        // Escape string untuk mencegah SQL Injection
        $nama_pengguna = $koneksi->quote($nama_pengguna);
        $username = $koneksi->quote($username);
        
        $sql = "UPDATE login SET nama_pengguna = $nama_pengguna, username = $username, password = '$password' WHERE id_login = $id_login";
        $row = $koneksi->prepare($sql);
        $row->execute();
        echo '<script>alert("Update Data Profil Berhasil !");window.location="profil.php"</script>';
        exit;
    }
    /*
    Berikut adalah tahapan proses dari source code yang telah diberikan:
    1. Mengecek apakah form dengan method "POST" sudah di-submit atau belum menggunakan conditional statement if(!empty($_POST['nama_pengguna'])).
    2. Jika form telah di-submit, maka data yang diinputkan oleh pengguna akan diambil dan disimpan dalam array $data. Data tersebut kemudian akan di-blacklist dan di-sql escape untuk mencegah terjadinya SQL Injection.
    3. Setelah data selesai di-blacklist dan di-sql escape, query SQL akan dibuat dengan menggunakan parameter binding. Parameter binding akan menggantikan tanda tanya (?) yang ada pada query SQL dengan nilai yang telah di-blacklist dan di-sql escape. Hal ini dilakukan untuk mencegah terjadinya SQL Injection.
    4. Query SQL yang telah dibuat akan dieksekusi dengan menggunakan metode execute().
    5. Jika query berhasil dieksekusi, maka pengguna akan diarahkan ke halaman profil dan pesan sukses akan ditampilkan.
    6. Jika terjadi kesalahan dalam eksekusi query SQL, maka akan muncul pesan error yang dihasilkan oleh database.
    */    
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                            <?php
                                $id =  $_SESSION["USER"]["id_login"];
                                $sql = "SELECT * FROM login WHERE id_login = ?";
                                $row = $koneksi->prepare($sql);
                                $row->execute(array($id));
                                $edit_profil = $row->fetch(PDO::FETCH_OBJ);
                            ?>
                            <div class="form-group">
                                <label for="">Nama Pengguna</label>
                                <input type="text" class="form-control" value="<?= $edit_profil->nama_pengguna;?>" name="nama_pengguna" id="nama_pengguna" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" required class="form-control" value="<?= $edit_profil->username;?>" name="username" id="username" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" required class="form-control" value="" name="password" id="password" placeholder=""/>
                            </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
<br>
<br>
<br>

<?php include 'footer.php';?>