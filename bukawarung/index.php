<?php  
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-devise-width, initial-scale-1">
    <title>Dashboard | BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <Header>
        <div class="container">
            <h1><a href="index.php">BukaWarung</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </div>
    </Header>
    <!-- Search -->
    <div class="search">
        <div class="">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" >
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- Category -->
    <div class="section">
        <div class="container2">
            <br>
            <h3>Kategori</h3>
            <br>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                    
                ?>

                        <div class="col-5">
                            <a href="produk.php?kat=<?php echo $k['category_id'] ?>"><img src="img/category.png" width="50px" style="margin-bottom: 5px;"></a>
                            <p><?php echo $k['category_name']?></p>
                        </div>
                    
                <?php }} else { ?>
                    <p >Kategori Tidak Ada</p>
                <?php }  ?>
                <!-- BUG -->
                <center><h3 style="color: #54B435;">Maaf Masih Banyak <b>BUG'nya</b></h3></center>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>



    <!-- New Product -->
    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <br>
            <div class="box">
                <?php 
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 8");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image'] ?>">
                        <p class="nama"><?php echo $p['product_name'] ?></p>
                        <a href="detail-produk.php?id=<?php echo$p['product_id'] ?>"><p class="harga">Rp. <?php echo $p['product_price']?></p></a>
                    </div>
                <?php }} else { ?>
                    <p>Produk Tidak Ada</p>
                <?php } ?>    
            </div>
            <br>
            <br>
            <br>
            <br>
            <center>
                <h3 style="color: #CF0A0A;">Maaf Masih Sangat Banyak <b>BUG'nya</b></h3>
            </center>
        </div>
    </div>


    <br>
    <br>
    <center><hr style="color: #0008C1;"></center>
    <br>
    <br>
    <!-- Footer -->
    <footer>
        <div class="footer">
        <div class="container">
            <!-- <h4>Alamat</h4>
            <p><?php echo $a->admin_addres ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>No HP</h4>
            <p><?php echo $a->admin_telp ?></p> -->
            &copy; 2022 <a href="https://Blog.ayohosting.repl.co" style="color: #0008C1;" target="_blank" class="copy">-M_PROJECT</a>
        </div>
        </div>
    </footer>
    <br>
    <br>
    <br>
    <br>
</body>
</html>