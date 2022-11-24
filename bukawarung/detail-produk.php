<?php  
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);

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
    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h2><?php echo $p->product_name ?></h2>
                    <h4>Rp. <?php echo number_format($p->product_price) ?><br></h4>
                    <p>Deskrepsi :<br>
                        <?php echo $p->product_description?>
                    </p>
                </div>
                <center><p><a href="https://instagram.com/_my_arrofi?igshid=YmMyMTA2M2Y=" style="color: #FBDF07;" target="_blank" class="dm"><img src="img/category.png" width="20px"> Dm My instagram</a></p></center>
            </div>
        </div>
    </div>

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