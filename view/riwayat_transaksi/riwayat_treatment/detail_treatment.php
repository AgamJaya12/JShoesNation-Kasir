<div id="detail_or_cs" class="main-content">
    <div class="container">
        <div class="baris">
            <div class="col mt-2">
                <div class="card-md">

                    <div class="card-title card-flex">
                        <div class="card-col">
                            <h2>Detail Order</h2>
                        </div>
                        <div class="card-col txt-right">
                            <h3 class="no-order">No Order: <?= $data['id_order'] ?></h3>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="jdl-or">
                            <h4>Customer</h4>
                        </div>
                        <table class="tb-detail_customer">
                            <tr>
                                <th>Nama</th>
                                <td><?= $data['nama_cust'] ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= $data['nomor_cust'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $data['alamat_cust'] ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <td><?= $data['tgl_bayar'] ?? '-' ?></td>
                            </tr>
                            <tr>
                                <th>Treatment</th>
                                <td><?= $data['treatment_list'] ?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?= $data['deskripsi_list'] ?></td>
                            </tr>
                        </table>

                        <div class="jdl-or">
                            <h4>Detail Pembayaran</h4>
                        </div>
                        <table class="tb-detail_order">
                            <tr>
                                <th>Total Bayar</th>
                                <td><?= "Rp. " . number_format($data['total_bayar'] ?? 0, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th>Nominal Bayar</th>
                                <td><?= "Rp. " . number_format($data['nominal_bayar'] ?? 0, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th>Kembalian</th>
                                <td><?= "Rp. " . number_format($data['kembalian'] ?? 0, 0, ",", ".") ?></td>
                            </tr>
                        </table>

                        <div class="form-footer_detail">
                            <div class="buttons">
                                <a class="btn-sm bg-primary" href="index.php?page=cetak&aksi=cetak&id=<?= $data['id_order'] ?>">Cetak Invoice</a>
                                <a class="btn-sm bg-transparent" href="index.php?page=riwayat&aksi=riwayatIsiTransaksi">Kembali</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>