<?php
if($_POST['id_pembelian']){
    $id_pembelian=$_POST['id_pembelian'];
    $status=$_POST['status'];
        include "../db.php";
            $update=mysqli_query($conn,"update tb_pembelian set status = '".$status."' where id_pembelian = '".$id_pembelian."'") or die(mysqli_error($conn));
            print_r($status);
            if($update){
                echo "<script>alert('Sukses update tb_pembelian');location.href='histori_pembelian.php';</script>";
            } else {
                echo "<script>alert('Gagal update transaksi');location.href='proses_ubah_transaksi.php?id_pembelian=".$id_pembelian."';</script>";
        }
    } 
?>
