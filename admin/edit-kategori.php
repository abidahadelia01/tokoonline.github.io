<?php
session_start();
include '../db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."'");
if(mysqli_num_rows($kategori) == 0){
    echo '<script>window.location="kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
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
                <li><a href="proses_ubah_status.php">Status</a></li>
				<li><a href="logout.php">Keluar</a></li>
			</ul>
		</div>
	</header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Edit Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        
                        $update = mysqli_query($conn, "UPDATE tb_category SET 
                                                category_name = '".$nama."'
                                                WHERE category_id = '".$k->category_id."'");
                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
                            echo '<script>window.location="kategori.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }
                    }
                ?>
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
