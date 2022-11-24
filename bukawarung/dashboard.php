<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-devise-width, initial-scale-1">
    <title>Dashboard | BukaWarung</title>
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
    <div class="section">
        <div class="container">
            <h3 style="color: #00FFD1">Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?> di Warung Online</h4>
            </div>
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