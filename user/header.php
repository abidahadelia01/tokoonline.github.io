<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
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
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>
