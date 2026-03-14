<div class="col">
   <div class="card">
      <div class="card-title card-flex">
         <div class="card-col">
            <h2>Order Treatment</h2>
         </div>
      </div>

      <div class="card-body">
         <div class="tabel-kontainer">
            <table class="tabel-transaksi">
               <thead>
                  <tr>
                     <th class="sticky">No</th>
                     <th class="sticky">No.Order</th>
                     <th class="sticky">Tgl Order</th>
                     <th class="sticky">Nama Pelanggan</th>
                     <th class="sticky">Jenis Paket</th>
                     <th class="sticky">Jml Barang</th>
                     <th class="sticky">Aksi</th>
                  </tr>
               </thead>

               <tbody>
                  <?php
                  if (!empty($daftarorder)) : ?>
                     <?php
                     $no_treat = 1;
                     foreach ($daftarorder as $treat) : ?>
                        <tr>
                           <td><?= $no_treat ?></td>
                           <td><?= $treat['id_order'] ?></td>
                           <td><?= $treat['tgl_masuk'] ?></td>
                           <td><?= $treat['nama_cust'] ?></td>
                           <td><?= $treat['treatment_list'] ?></td>
                           <td><?= $treat['qty'] ?></td>
                           <td>
                              <a href="index.php?page=order&aksi=detailOrder&id=<?= $treat['id_order'] ?>" class="btn btn-detail">Detail</a>
                              <a href="index.php?page=order&aksi=DeleteOrder&id=<?= $treat['id_order'] ?>" onclick="return confirm('Yakin akan menghapus?');" class="btn btn-hapus">Hapus</a>
                           </td>
                        </tr>
                        <?php $no_treat++ ?>
                     <?php endforeach; ?>

                  <?php else : ?>
                     <tr>
                        <td colspan="8" class="txt-center">Data Tidak Tersedia</td>
                     </tr>
                  <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>