<?php
    session_start();
    unset($_SESSION['cart'][$_GET['id']]); //id index dari cart 
    header('location: keranjang.php');
?>