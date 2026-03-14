<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Invoice <?= $data['id_order']; ?></title>
   <link rel="shortcut icon" href="_assets/img/logo/favicon.svg" type="image/x-icon">
   <link rel="stylesheet" href="_assets/css/invoice.css">
</head>
<body>

   <div class="invoice">
      <div class="invoice-content">

         <!-- ── HEADER ──────────────────────────── -->
         <div class="invoice-header">
            <div class="logo">
               <img src="_assets/img/logo/logonama4.png" alt="Logo Jaya Shoes Nation">
            </div>
            <div class="invoice-no_order">
               <span>Invoice #<?= $data['id_order'] ?></span>
            </div>
         </div>

         <!-- ── TITLE ───────────────────────────── -->
         <p class="invoice-title">Bukti Transaksi</p>

         <!-- ── BODY ───────────────────────────── -->
         <div class="invoice-body">

            <!-- Data Pelanggan -->
            <table class="table-invoice">
               <tr>
                  <th>Nama Pelanggan</th>
                  <td><?= $data['nama_cust'] ?></td>
               </tr>
               <tr>
                  <th>Nomor Telepon</th>
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
            </table>

            <hr class="section-divider">

            <!-- Tanggal Order -->
            <table class="table-invoice">
               <tr>
                  <th>Tanggal Order</th>
                  <td><?= $data['tgl_masuk'] ?? '-' ?></td>
               </tr>
               <tr>
                  <th>Diambil Pada</th>
                  <td><?= $data['tgl_keluar'] ?? '-' ?></td>
               </tr>
            </table>

            <hr class="section-divider">

            <!-- Rincian Pembayaran -->
            <table class="byr">
               <thead>
                  <tr>
                        <th class="heading">Jenis Treatment</th>
                        <th class="heading">Deskripsi</th>
                        <th class="heading">Harga</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                        $treatments  = explode(', ', $data['treatment_list']);
                        $deskripsis  = explode(', ', $data['deskripsi_list'] ?? '');
                        $hargas      = explode(', ', $data['harga_list'] ?? '');
                        $total_items = count($treatments);
                  ?>

                  <?php for ($i = 0; $i < $total_items; $i++) : ?>
                        <tr>
                           <td><?= $treatments[$i] ?? '-' ?></td>
                           <td><?= $deskripsis[$i]  ?? '-' ?></td>
                           <td><?= 'Rp ' . number_format($hargas[$i] ?? 0, 0, ',', '.') ?></td>
                        </tr>
                  <?php endfor; ?>

                  <tr>
                        <th colspan="2" class="ub">Total Bayar</th>
                        <td class="ub-col"><?= 'Rp ' . number_format($data['total_bayar'] ?? 0, 0, ',', '.') ?></td>
                  </tr>
                  <tr>
                        <th colspan="2" class="ub">Nominal Bayar</th>
                        <td class="ub-col"><?= 'Rp ' . number_format($data['nominal_bayar'] ?? 0, 0, ',', '.') ?></td>
                  </tr>
                  <tr>
                        <th colspan="2" class="ub">Uang Kembali</th>
                        <td class="ub-col"><?= 'Rp ' . number_format($data['kembalian'] ?? 0, 0, ',', '.') ?></td>
                  </tr>
               </tbody>
            </table>

            <!-- Footer Invoice -->
            <div class="invoice-footer">
               <h3 class="foot_logo">
                  Jaya <span>Shoes</span> Nation
               </h3>
               <p>Terima kasih telah menggunakan jasa kami.</p>
            </div>

         </div><!-- /invoice-body -->
      </div><!-- /invoice-content -->

      <a href="index.php?page=riwayat&aksi=riwayatIsiTransaksi" class="btn-back">
         ← Kembali
      </a>
   </div>

   <!-- PRINT BUTTON -->
   <div class="printbtn" id="btnPrint">
      <img src="_assets/img/printer.svg" alt="Print">
      <span>Cetak Invoice</span>
   </div>

   <script>
      document.getElementById('btnPrint').addEventListener('click', () => window.print());
   </script>

</body>
</html>