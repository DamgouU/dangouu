<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';

    }
    if(isset($_POST['submit'])){
        $kategori = $_POST['kategori'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $nama_img = 'produk/'.$_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp_name, $nama_img);
        $simpan = mysqli_query($conn, "INSERT INTO tb_product (category_id, product_name, product_price, product_image) VALUES ('$kategori', '$nama', '$harga', '$nama_img')");
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-devise-width, initial-scale-1">
    <title>Tambah Data Produk| BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> -->
</head>
<body>
    <!-- HEADER -->
    <Header>
        <div class="container">
            <h1><a href="dashboard.php">BukaWarung</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </Header>

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3 style="color: #00FFD1">Tambah Data Produk</h3>
            <div class="box">
                <form action="tambah-produk.php" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <!-- <input name="deskrepsi" class="input-control" placeholder="Deskrepsi" required > -->
                    <!-- <textarea class="input-contror" name="deskrepsi" placeholder="deskrepsi"></textarea> -->
                    <select class="input-control" name="status"> 
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if(isset($_POST['submit'])){

                //  print r($_FILES['gambar']);
                //  menampung input dari form
                    $kategori  = $_POST['kategori'];
                    $nama      = $_POST['nama'];
                    $harga     = $_POST['harga'];
                    $deskrepsi = $_POST['deskrepsi'];
                    $status    = $_POST['status'];
                    $gambar    = $_POST['gambar'];

                //  menampung data file yang diuplod
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1['1'];

                    $newname = 'produk'.time().'.'.$type2;

                //  menampung data format yang diizinkan
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                //  validasi format file
                    if(!in_array($type2, $tipe_diizinkan)){
                        // jika format file tidak ada di dalam type diizinkan
                        echo '<script>alert("Format file tidak diizinkan ")</script>';
                    }else {
                        // jika format file sesuai dengan yang ada di dalam array tyep diizinkan
                        // proses upload file sekaligus insert ke database
                       
                        move_uploaded_file($tmp_name, './produk/'.$newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product(category_id, product_name, product_price,  product_image, product_description, product_status ) VALUES (
                                    -- null,
                                    '$kategori',
                                    '$nama',
                                    '$harga',
                                    '$deskrepsi',
                                    '$status',
                                    '$gambarimage.'
                                    -- null
                                        ) ");

                        if($insert){
                            echo'<script>alert("Tambah Data Berhasil")</script>';
                            echo'<script>window.location="data-produk.php"</script>';
                        }else{
                            'Gagal'.mysqli_error($conn);
                        }

                    }

                }
                ?>
            </div>

        </div>
    </div>
    <center><h3 style="color: #54B435;">Maaf Masih Banyak <b>BUG'nya</b></h3></center>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            &copy; 2022 <a href="https://Blog.ayohosting.repl.co" target="_blank">-M_PROJECT</a>
        </div>
    </footer>
    <!-- <script>
        CKEDITOR.replace( 'deskripsi' );
    </script> -->
</body>
</html> 