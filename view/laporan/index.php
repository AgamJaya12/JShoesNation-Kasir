<?php
// ============================================================
// Laporan Transaksi - Treatment
// ============================================================

$daftarBulan = [
    '01' => 'Januari',  '02' => 'Februari', '03' => 'Maret',
    '04' => 'April',    '05' => 'Mei',       '06' => 'Juni',
    '07' => 'Juli',     '08' => 'Agustus',   '09' => 'September',
    '10' => 'Oktober',  '11' => 'November',  '12' => 'Desember',
];

$tahunAwal       = 2017;
$tahunSekarang   = (int) date('Y');
$totalPendapatan = $total[0] ?? 0;

$totalTransaksi = count($hasil ?? []);
$totalBayar     = array_sum(array_column($hasil ?? [], 'NOMINAL_BYR'));
$totalKembali   = array_sum(array_column($hasil ?? [], 'KEMBALIAN'));
?>

<link rel="stylesheet" href="_assets/css/laporanTrans.css">

<div class="lr-wrap">

    <!-- ── Header ──────────────────────────────────────────── -->
    <div class="lr-header">
        <h1>Laporan transaksi — treatment</h1>
        <span>Diperbarui <?= date('d/m/Y H:i') ?></span>
    </div>

    <!-- ── Stat Cards ──────────────────────────────────────── -->
    <div class="lr-stats">
        <div class="lr-stat">
            <div class="lr-stat-label">Total transaksi</div>
            <div class="lr-stat-value"><?= $totalTransaksi ?></div>
        </div>
        <div class="lr-stat">
            <div class="lr-stat-label">Total pendapatan</div>
            <div class="lr-stat-value blue">
                Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>
            </div>
        </div>
        <div class="lr-stat">
            <div class="lr-stat-label">Total bayar</div>
            <div class="lr-stat-value green">
                Rp <?= number_format($totalBayar, 0, ',', '.') ?>
            </div>
        </div>
        <div class="lr-stat">
            <div class="lr-stat-label">Total kembalian</div>
            <div class="lr-stat-value red">
                Rp <?= number_format($totalKembali, 0, ',', '.') ?>
            </div>
        </div>
    </div>

    <!-- ── Filter ──────────────────────────────────────────── -->
    <div class="lr-filter">
        <div class="lr-filter-title">Filter data</div>
        <div class="lr-filter-row">

            <!-- Form: Bulan & Tahun -->
            <form action="index.php?page=Laporan&aksi=cekbulan" method="POST" class="lr-filter-row">
                <div class="lr-filter-group">
                    <label for="bulan">Bulan</label>
                    <select id="bulan" name="bulan">
                        <option value="">-- Pilih bulan --</option>
                        <?php foreach ($daftarBulan as $nilai => $nama) : ?>
                            <option value="<?= $nilai ?>"><?= $nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="lr-filter-group">
                    <label for="tahun">Tahun</label>
                    <select id="tahun" name="tahun">
                        <option value="">-- Pilih tahun --</option>
                        <?php for ($tahun = $tahunAwal; $tahun <= $tahunSekarang; $tahun++) : ?>
                            <option value="<?= $tahun ?>"><?= $tahun ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <button type="submit" class="lr-btn primary">
                    <i class="fa fa-search"></i> Cari data
                </button>
            </form>

            <div class="lr-divider"></div>

            <!-- Form: Hari -->
            <form action="index.php?page=Laporan&aksi=cekhari" method="POST" class="lr-filter-row">
                <div class="lr-filter-group">
                    <label for="hari">Tanggal</label>
                    <input id="hari" type="date" name="hari" value="<?= date('Y-m-d') ?>">
                </div>
                <button type="submit" class="lr-btn primary">
                    <i class="fa fa-search"></i> Cari hari
                </button>
            </form>

        </div>
    </div>

    <!-- ── Tabel Data ──────────────────────────────────────── -->
    <div class="lr-table-wrap">
        <table class="lr-table">

            <colgroup>
                <col class="col-no">
                <col class="col-tgl">
                <col class="col-tgl">
                <col class="col-order">
                <col class="col-customer">
                <col class="col-treatment">
                <col class="col-jml">
                <col class="col-uang">
                <col class="col-uang">
                <col class="col-uang">
                <col class="col-aksi">
            </colgroup>

            <thead>
                <tr>
                    <th class="txt-center">No</th>
                    <th>Tgl masuk</th>
                    <th>Tgl keluar</th>
                    <th>No. order</th>
                    <th>Customer</th>
                    <th>Treatment</th>
                    <th class="txt-center">Jml</th>
                    <th class="txt-right">Total</th>
                    <th class="txt-right">Bayar</th>
                    <th class="txt-right">Kembali</th>
                    <th class="txt-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($hasil)) : ?>
                    <?php foreach ($hasil as $no => $row) : ?>
                        <tr>
                            <td class="lr-no txt-center"><?= $no + 1 ?></td>
                            <td><?= date('d/m/Y', strtotime($row['TGL_MASUK'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($row['TGL_KELUAR'])) ?></td>
                            <td><span class="lr-order-id"><?= $row['ID_ORDER'] ?></span></td>
                            <td><?= htmlspecialchars($row['NAMA_CUST']) ?></td>
                            <td><span class="lr-badge"><?= htmlspecialchars($row['NAMA_TREATMENT']) ?></span></td>
                            <td class="txt-center"><?= $row['JMLH_TREATMENT'] ?></td>
                            <td class="txt-right lr-money">
                                <?= number_format($row['TOTAL_HRG'],   0, ',', '.') ?>
                            </td>
                            <td class="txt-right lr-money-green">
                                <?= number_format($row['NOMINAL_BYR'], 0, ',', '.') ?>
                            </td>
                            <td class="txt-right lr-kembali">
                                <?= number_format($row['KEMBALIAN'],   0, ',', '.') ?>
                            </td>
                            <td>
                                <div class="lr-actions">
                                    <a href="index.php?page=riwayat&aksi=detailTreatment&id=<?= $row['ID_ORDER'] ?>" class="lr-btn-sm">
                                        <i class="fa fa-eye"></i> Detail
                                    </a>
                                    <a href="index.php?page=cetak&aksi=cetak&id=<?= $row['ID_ORDER'] ?>" class="lr-btn-sm">
                                        <i class="fa fa-print"></i> Cetak
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="lr-empty">
                            <i class="fa fa-inbox"></i>
                            Data tidak tersedia
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7" class="lr-total-label">Total pendapatan</td>
                    <td colspan="4" class="txt-right lr-total">
                        Rp <?= number_format($totalPendapatan, 0, ',', '.') ?>,-
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>

</div><!-- /.lr-wrap -->