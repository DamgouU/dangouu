<?php

include_once 'db.php';

    if(isset($_POST['submit'])){

        $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
        $user   = $_POST['user'];
        $hp     = $_POST['hp'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        $alamat = ucwords( $_POST['alamat']);
        
        
        if(empty($nama) || empty($user) || empty($hp) || empty($email) || empty($alamat) || empty($password)) {
            if($update){
                echo '<script>alert("Edit Data Berhasil")</script>';
                echo '<script>window.location="data-kategori.php"</script>';
            } else {
                echo 'Gagal' .mysqli_error($conn);
            }
        } else {
        $result = mysqli_query($conn,  "INSERT INTO tb_admin(admin_name,username,password,admin_telp,admin_email,admin_addres) VALUES ('$nama','$user','$password','$hp','$email','$alamat')");
        header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-devise-width, initial-scale-1">
    <title>Register | BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3 style="color: #00FFD1">Profil</h3>
            <div class="box">
                <form action="" method="post" >
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control"  required>
                    <input type="email" name="email" placeholder="Email" class="input-control"  required>
                    <input type="password" name="password" placeholder="Password" class="input-control" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"  required>
                    <br>
                    <br>
                    <button type="submit" name="submit" value="submit" class="btn">tambah data</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
                
             