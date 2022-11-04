<?php 
session_start();
    if($_POST){
        include "../db.php";
        
        $produk1=mysqli_query($conn,"select * from tb_product where product_id = '".$_GET['product_id']."'");
        $produk=mysqli_fetch_array($produk1);
        $_SESSION['cart'][]=array(
            'product_id'=>$produk['product_id'],
            'product_name'=>$produk['product_name'],
            'product_price'=>$produk['product_price'],
            'qty'=>$_POST['jumlah_beli']
    );
    }

    header('location: keranjang.php');
