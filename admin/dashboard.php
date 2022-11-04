<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoe Shop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
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

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Shoe Shop</h4>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Shoe Shop</small>
        </div>
    </footer>
</body>
</html>




