<?php 
    include "header.php";
    include "../db.php";
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
<br><br>
<div class="container">
        <div class="card">
            <div class="card-header">
<h2>Daftar Belanja Produk</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if(@$_SESSION['cart']!=null){
        foreach (@$_SESSION['cart'] as $key_produk => $val_produk): 
            $subtotal = $val_produk['qty'] * $val_produk['product_price'];
        ?>
            <tr>
                <td><?=($key_produk+1)?></td>
                <td><?=$val_produk['product_name']?></td>
                <td><?=$val_produk['product_price']?></td>
                <td><?=$val_produk['qty']?></td>
                <td><?=$subtotal?></td>
                <td><a href="hapus_keranjang.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>Hapus</strong></a></td>
            </tr>

        <?php endforeach; }
        ?>     
    </tbody>
</table>
<a href="checkout.php" class="btn btn-primary">Check Out</a>
    </body>
</html>