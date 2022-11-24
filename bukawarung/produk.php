<?php  
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
                <input type="text" name="search" placeholder="Cari Produk" class="">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- Category -->
    



    <!-- New Product -->
    <div class="section">
        <div class="container">
            <h3 style="color: #00FFD1">Produk</h3>
            <br>
            <div class="box">
                <?php 
                    if($_GET['search'] = '' || $_GET['kat'] = ''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    // 
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                    <div class="col-4">
                            
                        <img src="produk/<?php echo $p['product_image'] ?>">
                        <p class="nama"><?php echo $p['product_name'] ?></p>
                        <a href="detail-produk.php?id=<?php echo$p['product_id'] ?>"><p class="harga">Rp. <?php echo $p['product_price'] ?></p></a>
                    </div>
                <?php }} else { ?>
                    <p>Produk Tidak Ada</p>
                <?php } ?>    
            </div>
            <center>
                <h3 style="color: #CF0A0A;">Maaf Masih Banyak <b>BUG'nya</b></h3>
            </center>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer">
        <div class="container">
            &copy; 2022 <a href="https://Blog.ayohosting.repl.co" style="color: #0008C1;" target="_blank" class="copy">-M_PROJECT</a>
        </div>
        </div>
    </footer>
</body>
</html>