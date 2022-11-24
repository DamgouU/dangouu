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
    <title>Kategori | BukaWarung</title>
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
            <h3 style="color: #00FFD1">Data Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php" style="color: #D800A6;">Tambah Data</a></p>
                <br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th width="840px">Kategori</th>
                            <th width="0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC ");
                        if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a href="prodes-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin Ingin Hapus')">Hapus</a>
                            </td>
                        </tr>
                       <?php }} else { ?>
                            <tr>
                            <td colspan="3"><center>Tidak Ada Data</center></td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
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