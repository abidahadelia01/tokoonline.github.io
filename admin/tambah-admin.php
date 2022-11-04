<?php
session_start();
include '../db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoe Shop</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
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
                <li><a href="proses_ubah_status.php">Status</a></li>
                <li><a href="login.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!-- Header End -->

    <!-- Content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Admin</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="admin_name" require placeholder="enter your name">
                    <input type="text" name="username" require placeholder="enter your username">
                    <input type="password" name="password" require placeholder="enter your password">
                    <input type="tel" name="admin_telp" require placeholder="enter your phone number">
                    <input type="email" name="admin_email" require placeholder="enter your email">
                    <input type="text" name="admin_address" require placeholder="enter your address">
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $admin_telp = mysqli_real_escape_string($conn, $_POST['admin_telp']);
                    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
                    $admin_address = mysqli_real_escape_string($conn, $_POST['admin_address']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                            null,
                            '" . $admin_name . "',
                            '" . $username . "',
                            '" . md5($password) . "',
                            '" . $admin_telp . "',
                            '" . $admin_email . "',
                            '" . $admin_address . "'
                                )");

                    if ($insert) {
                        echo '<script>alert("Tambah data berhasil")</script>';
                        echo '<script>window.location="data_admin.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
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
    <script>
        CKEDITOR.replace('desc');
    </script>
</body>

</html>