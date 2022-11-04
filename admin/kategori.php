<?php
    session_start();
    include '../db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Shop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
		<div class="container">
			<h1><a href="dashboard.php">Shoe Shop</a></h1>
			<ul>
				<li><a href="data_user.php">Data User</a></li>
				<li><a href="data_admin.php">Data Admin</a></li>
				<li><a href="kategori.php">Data Kategori</a></li>
				<li><a href="produk.php">Data Produk</a></li>
                <li><a href="histori_pembelian.php">Status</a></li>
				<li><a href="logout.php">Keluar</a></li>
			</ul>
		</div>
	</header>
    <!-- Header End -->

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="
                                proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Ingin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content End-->

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Shoe Shop.</small>
        </div>
    </footer>
    <!-- Footer -->

</body>
</html>