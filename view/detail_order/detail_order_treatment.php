<?php
// pastikan $data sudah dikirim dari controller
if (empty($data)) {
    echo "<p>Data order tidak ditemukan.</p>";
    return;
}

// ambil header order dari index pertama
$order = $data[0];
?>

<div id="detail_or_treat" class="main-content">
    <div class="container">
        <div class="baris">
            <div class="col mt-2">
                <div class="card-md">
                    <div class="card-title card-flex">
                        <div class="card-col">
                            <h2>Detail Order</h2>
                        </div>
                        <div class="card-col txt-right">
                            <h3 class="no-order"><small>No Order : </small><?= $order['id_order'] ?></h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="index.php?page=bayar&aksi=bayar" method="post">
                            <input type="hidden" name="or_number" value="<?= $order['id_order'] ?>">

                            <div class="jdl-or">
                                <h4>Customer</h4>
                            </div>
                            <table class="tb-detail_customer">
                                <tr>
                                    <th>Nama</th>
                                    <td><input type="text" name="nama_cus" disabled value="<?= $order['nama_cust'] ?>"></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td><input type="text" name="no_telp" disabled value="<?= $order['nomor_cust'] ?>"></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        <textarea name="alamat" disabled class="txt-area"><?= $order['alamat_cust'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order Masuk</th>
                                    <td><input type="text" name="tgl_msk" disabled value="<?= $order['tgl_masuk'] ?>"></td>
                                </tr>
                                <tr>
                                    <th>Diambil Pada</th>
                                    <td><input type="text" name="tgl_kluar" disabled value="<?= $order['tgl_keluar'] ?>"></td>
                                </tr>
                            </table>

                            <div class="mt-1"></div>

                            <div class="jdl-or">
                                <h4>Detail Treatment</h4>
                            </div>

                            <table class="tb-detail_order">
                                <tr>
                                    <th>Nama Treatment</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                    <th>Deskripsi</th>
                                </tr>

                                <?php 
                                $totalHarga = 0; // inisialisasi total
                                foreach ($data as $d) :
                                    $subtotal = $d['qty'] * $d['harga'];
                                    $totalHarga += $subtotal;
                                ?>
                                    <tr>
                                        <td><?= $d['nama_treatment'] ?></td>
                                        <td><?= $d['qty'] ?></td>
                                        <td><?= 'Rp. ' . number_format($d['harga'],0,",",".") ?></td>
                                        <td><?= 'Rp. ' . number_format($subtotal,0,",",".") ?></td>
                                        <td><?= $d['deskripsi'] ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <th colspan="3" style="text-align:right">Total</th>
                                    <th colspan="2"><?= 'Rp. ' . number_format($totalHarga,0,",",".") ?></th>
                                </tr>
                            </table>

                            <div class="form-footer_detail">
                                <div class="buttons">
                                    <button type="submit" name="bayar_treat" class="btn-sm bg-primary">Bayar Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>