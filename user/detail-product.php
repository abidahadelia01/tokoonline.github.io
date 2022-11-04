<?php
error_reporting(0);
include '../db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokoOnline</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
   <header>
    <div class="container">
    <h1><a href="index.php">Shoe Shop</a></h1>
    <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="barang.php">Produk</a></li>
        <li><a href="keranjang.php">Keranjang</a></li>
        <li><a href="histori_pembelian.php">Histori Pembelian</a></li>
        <li><a href="logout_user.php">Log Out</a></li>
    </ul>
    </div>
    </header> 

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="barang.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- product detail-->
    <div class="section">
        <div class="container">
           <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="../produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->product_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->product_price) ?></h4>
                    <p>Deskripsi :<br>
                        <?php echo $p->product_description ?>
                    </p>

                    <div class="col-md-8">
                         <form action="masukkankeranjang.php?product_id=<?=$p->product_id?>" method="post">
                    
                         <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Kuantitas</td><td><input type="number" name="jumlah_beli" value="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="Check Out"></td>
                    </tr>
                </thead>
            </table>
        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <h4>Alamat</h4>
        <p><?php echo $a->admin_address ?></p>

        <h4>Email</h4>
        <p><?php echo $a->admin_email ?></p>

        <h4>Customer Service</h4>
        <p><?php echo $a->admin_telp ?></p>
        <small>Copyright &copy; 2022 - Shoe Shop</small>

        
    </div>
</body>
</html>





