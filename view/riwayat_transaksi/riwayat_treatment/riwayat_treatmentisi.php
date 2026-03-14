<div class="card">
    <div class="card-title card-flex">
        <div class="card-col">
            <h2>Daftar Transaksi - Treatment</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-title card-flex">
            <div class="card-col">
                <h2>Cari Transaksi</h2>
            </div>
        </div>

        <form action="index.php?page=Laporan&aksi=cekid" method="POST">
            <div class="form-grup">
                <div class="row">
                    <div class="col">
                        <input type="text" name="id_order" placeholder="Masukkan id order" autocomplete="off" id="nama">
                    </div>
                    <div class="col">
                        <button type="submit" name="cari" class="btn-sm bg-primary">Cari</button>
                        <button type="submit" name="reset" class="btn-sm bg-primary">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="tabel-kontainer">
            <table class="tabel-transaksi">
                <thead>
                    <tr>
                        <th class="sticky">No</th>
                        <th class="sticky">Tgl</th>
                        <th class="sticky">No. Order</th>
                        <th class="sticky">Nama</th>
                        <th class="sticky">Alamat</th>
                        <th class="sticky">No Telepon</th>
                        <th class="sticky">Jenis Treatment</th>
                        <th class="sticky">Deskripsi</th>
                        <th class="sticky">Total</th>
                        <th class="sticky">Uang Bayar</th>
                        <th class="sticky">Kembalian</th>
                        <th class="sticky" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        // var_dump($queryTreat);
                        // die();
                        // ?>
                    <?php if (!empty($queryTreat)) : ?>
                        <?php $i = 1; foreach ($queryTreat as $data) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data['tgl_bayar'] ?></td>
                                <td><?= $data['id_order'] ?></td>
                                <td style="max-width: 150px; overflow: hidden;"><?= $data['nama_cust'] ?></td>
                                <td style="max-width: 150px; overflow: hidden;"><?= $data['alamat_cust'] ?></td>
                                <td style="max-width: 150px; overflow: hidden;"><?= $data['nomor_cust'] ?></td>
                                <td><?= $data['treatment_list'] ?></td>
                                <td><?= $data['deskripsi_list'] ?></td>
                                <td><?= "Rp. " . number_format($data['total_bayar'], 0, ",", ".") ?></td>
                                <td><?= "Rp. " . number_format($data['nominal_bayar'], 0, ",", ".") ?></td>
                                <td><?= "Rp. " . number_format($data['kembalian'], 0, ",", ".") ?></td>
                                <td align="center">
                                    <a href="index.php?page=riwayat&aksi=detailTreatment&id=<?= $data['id_order'] ?>" class="btn btn-edit">Detail</a><br>
                                    <a href="index.php?page=cetak&aksi=cetak&id=<?= $data['id_order'] ?>" class="btn btn-hapus">Cetak Bukti</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="12" class="txt-center">Data tidak tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>