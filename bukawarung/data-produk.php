<?php
    session_start();
    include'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-devise-width, initial-scale-1">
    <title>Produk | BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
    <div class="section" >
        <div class="container">
            <h3 style="color: #00FFD1">Data Pruduk</h3>
            <div class="box">
                <p style="color: 00005C;"><a href="tambah-produk.php" style="color: #D800A6;">Tambah Data Produk</a></p>
                <br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th whdth="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC ");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                            // var_dump($row);
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp.<?php echo number_format($row['product_price']) ?></td>
                            <td><center><a href="<?= $row['product_image'] ?>"><img src="<?= $row['product_image'] ?>" width="150px"  alt=""></center></a></td>
                            <td><?php echo ($row['product_status'] == 1)? 'Aktif':'Tidak Aktif'?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id']?>">Edit</a> || <a href="hapus-produk.php?idp=<?php echo $row['product_id']?>" onclick="return confirm('Yakin Ingin Hapus')">Hapus</a>
                            </td>
                        </tr>
                       <?php }} else{?>
                            <tr>
                                <td colspan="7"><center> Tidak Ada Data</center></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <center>
                <h3 style="color: #54B435;">Maaf Masih Banyak <b>BUG'nya</b></h3>
                <h4 style="color: #54B435;">Maaf Kalau Ada kendala Mengenai Update Data Bisa Di Edit</h4>
            </center>

        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            &copy; 2022 <a href="https://Blog.ayohosting.repl.co" target="_blank">-M_PROJECT</a>
        </div>
    </footer>
</body>
</html>