<?php
include "dashboard.php";
error_reporting(E_ERROR | E_PARSE);
?>
<h2 align="center" style="margin:30px">Histori Pembelian</h2>
<div align="center">
    <table class="table" style="background:#F8F8F8;width:90%" cellspacing="0">
        <thead style="background:#b89068; ">
            <tr width="auto">
                <th>NO</th>
                <th>Username</th>
                <th>Tanggal Beli</th>
                <th>Product Name</th>
                <th>Total</th>
                <th>Status</th>
                <th colspan="8">Aksi</th>
            </tr>
        </thead>
        <tbody>
                        <?php
                        include '../db.php';
                        $no = 1;
                        $qry_histori = mysqli_query($conn, "select * from tb_pembelian join tb_user on tb_user.user_id=tb_pembelian.user_id ORDER BY id_pembelian DESC;");
                        while ($dt_histori = mysqli_fetch_array($qry_histori)) {

                            $qry_histori1 = mysqli_query($conn, "select * from detail_pembelian_produk JOIN tb_product ON detail_pembelian_produk.product_id = tb_product.product_id where id_pembelian='" . $dt_histori['id_pembelian'] . "'");
                            while ($dt_histori1 = mysqli_fetch_array($qry_histori1)) {
                                $subtotal =$dt_histori1['qty'] * $dt_histori1['product_price'];
                        ?> <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt_histori['username']?></td>
                                <td><?= $dt_histori['tanggal_pembelian'] ?></td>
                                <td><?= $dt_histori1['product_name'] ?></td>
                                <td><?= "<ispan>Rp. </span>" . $subtotal?></td>
                                <td><?= $dt_histori['status'] ?></td>
                                <td><?php
                                    if ($dt_histori1['product_status']) {
                                    }
                                    ?></td>
                                <td>

                                    <form action="proses_ubah_status.php" method="post">
                                        <input type="hidden" name="id_pembelian" value="<?= $dt_histori['id_pembelian'] ?>">
                                        <select name="status" onchange='if(this.value != 0) { this.form.submit(); }'>
                                            <option value="">Pilih</option>
                                            <option value="Menunggu Barang di Confirm">Menunggu Barang diconfirm</option>
                                            <option value="Barang Sudah di Confirm">Barang Sudah di Confirm</option>
                                            <option value="Produk Sedang Dikemas">Barang Sedang di Kemas</option>
                                            <option value="Produk Sedang Dikirim">Barang Sedang di Kirim</option>
                                            <option value="Produk Sudah Diterima">Barang Sudah di Terima</option>
                                        </select>
                                    </form>

                                </td>

                            </tr>
                        <?php
                            }
                        }
                        ?>
            </tbody>
    </table>
</div>



<!-- batas//////// -->