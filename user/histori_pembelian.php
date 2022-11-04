<?php
include "../db.php";
include "header.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokoOnline</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

</head>

<body>
    <br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <tbody>
                    <?php
                    include "../db.php";
                    if ($_SESSION['status_login'] != true) {
                        header('location: login_user.php');
                    }
                    ?>
                    <h2 align='center'>Histori Pembelian Produk</h2>
                    <br><br>
                    <div class="container">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>NO</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                include "../db.php";
                                echo $_SESSION['id'];
                                $qry_histori = mysqli_query($conn, "SELECT * from tb_pembelian where user_id='" . $_SESSION['id'] . "' order by id_pembelian desc");
                                $no = 0;
                                while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                                    $no++;
                                    //menampilkan produk yang dibeli
                                    $produk_dibeli = "<ol>";
                                    $qry_produk = mysqli_query($conn, "select * from detail_pembelian_produk JOIN tb_product ON detail_pembelian_produk.product_id = tb_product.product_id where id_pembelian = '" . $dt_histori['id_pembelian'] . "'");
                                    mysqli_error($conn);
                                    while ($dt_produk = mysqli_fetch_array($qry_produk)) {

                                        $produk_dibeli = $dt_produk['product_name'];
                                        $qty_produk = $dt_produk['qty'];
                                        $hrg_produk = $dt_produk['product_price'];
                                        $total_harga = $dt_produk['qty'] * $dt_produk['product_price'];
                                        $produk_dibeli .= "</ol>";
                                        //diterima
                                        $qry_cek_diterima = mysqli_query($conn, "select * from tb_pembelian where id_pembelian = '" . $dt_histori['id_pembelian'] . "'");
                                        $qry_cek_diterima = mysqli_fetch_array($qry_cek_diterima);
                                        if ($qry_cek_diterima['status'] == 'Menunggu Barang di Confirm') {
                                            $status_diterima = "<label class='alert alert-success'>Menunggu Barang di Confirm</label>";
                                            $button_diterima = "";
                                        } elseif ($qry_cek_diterima['status'] == "Barang Sudah di Confirm") {
                                            $status_diterima = "<label class='alert alert-success'>Sudah di Confirm</label>";
                                            $button_diterima = "";
                                        } elseif ($qry_cek_diterima['status'] == "Produk Sedang Dikemas") {
                                            $status_diterima = "<label class='alert alert-success'>Produk Sedang di Kemas</label>";
                                            $button_diterima = "";
                                        } elseif ($qry_cek_diterima['status'] == "Produk Sedang Dikirim") {
                                            $status_diterima = "<label class='alert alert-success'> Produk Sedang di Kirim</label>";
                                            $button_diterima = "<a href='diterima.php?id=" . $dt_histori['id_pembelian'] . "' class='btn btn-warning' onclick='return confirm(\"Produk Sudah Diterima\")'>Diterima</a>";
                                        } elseif ($qry_cek_diterima['status'] == "Produk Sudah Diterima") {
                                            $status_diterima = "<label class='alert alert-success'>Produk Sudah di Terima</label>";
                                            $button_diterima = "";
                                        } else {
                                            $status_diterima = "<label class='alert alert-danger'>Belum diterima</label>";
                                            $button_diterima = "";
                                        }
                                ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $dt_histori['tanggal_pembelian'] ?></td>
                                            <td><?= $produk_dibeli ?></td>
                                            <td><?= $qty_produk ?></td>
                                            <td><?= $hrg_produk ?></td>
                                            <td><?= $total_harga ?></td>
                                            <td><?= $status_diterima ?></td>
                                            <td><?= $button_diterima ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </tbody>
                </table>