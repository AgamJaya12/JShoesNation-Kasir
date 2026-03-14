<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Treatment</title>
   <link rel="stylesheet" href="_assets/css/orderTreat.css">
</head>
<body>

<div id="order_treat">
   <div class="container">

      <div class="card">

         <!-- ── HEADER ─────────────────────────── -->
         <div class="card-header">
            <h2>Order <span>Treatment</span></h2>

            <a href="index.php?page=order&aksi=order" class="btn-back">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
               </svg>
               Kembali
            </a>
         </div>

         <!-- ── BODY ───────────────────────────── -->
         <div class="card-body">

            <form action="index.php?page=order&aksi=storePemesanan" method="post">
               <input type="hidden" name="id_user" value="<?= $_SESSION['karyawan']['ID_USER'] ?>">

               <div class="form-grid">

                  <!-- KOLOM KIRI — Data Pelanggan -->
                  <div>
                     <p class="section-label">Data Pelanggan</p>

                     <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" name="nama_cus" id="nama"
                               placeholder="Nama lengkap" autocomplete="off">
                     </div>

                     <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" name="no_telp" id="no_telp"
                               placeholder="Contoh: 081234567890" autocomplete="off">
                     </div>

                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat"
                                  placeholder="Alamat lengkap pelanggan"></textarea>
                     </div>
                  </div>

                  <!-- KOLOM KANAN — Detail Order -->
                  <div>
                     <p class="section-label">Detail Order</p>

                     <!-- Pilih Treatment -->
                     <div class="form-group">
                        <label>Pilih Treatment</label>
                        <div class="treatment-list">
                           <?php foreach ($isi as $treat) : ?>
                              <div class="treatment-item">
                                 <input 
                                    type="checkbox"
                                    class="treat-check"
                                    data-id="<?= $treat['ID_TREATMENT'] ?>"
                                    name="treatment[]"
                                    value="<?= $treat['ID_TREATMENT'] ?>"
                                    id="treat_<?= $treat['ID_TREATMENT'] ?>"
                                 >
                                 <label class="treatment-name" for="treat_<?= $treat['ID_TREATMENT'] ?>">
                                    <?= $treat['NAMA_TREATMENT'] ?>
                                 </label>
                                 <div class="qty-wrap">
                                    <label>Qty</label>
                                    <input 
                                       type="number"
                                       class="qty-input"
                                       data-id="<?= $treat['ID_TREATMENT'] ?>"
                                       name="qty[<?= $treat['ID_TREATMENT'] ?>]"
                                       value="1"
                                       min="1"
                                       style="width:60px"
                                    >
                                 </div>
                                 <div class="desc-wrap">
                                    <label>Deskripsi</label>
                                    <input
                                       type="text"
                                       name="deskripsi[<?= $treat['ID_TREATMENT'] ?>]"
                                       placeholder="Deskripsi untuk <?= $treat['NAMA_TREATMENT'] ?>"
                                       autocomplete="off"
                                       style="width:100%"
                                    >
                                 </div>
                              </div>
                           <?php endforeach ?>
                        </div>
                     </div>

                     <hr class="divider">

                     <div class="form-group">
                        <label for="kuantitas">Jumlah Order</label>
                        <input type="number" name="jmlh_treatment" id="kuantitas"
                               placeholder="Jumlah order" readonly>
                     </div>

                     <div class="form-group">
                        <label for="tgl_order_msk">Tanggal Order Masuk</label>
                        <input type="datetime-local" name="tgl_msk" id="tgl_order_msk">
                     </div>

                     <div class="form-group">
                        <label for="tgl_order_klr">Tanggal Order Keluar</label>
                        <input type="datetime-local" name="tgl_kluar" id="tgl_order_klr">
                     </div>

                     <!-- Actions -->
                     <div class="form-footer">
                        <button type="reset" class="btn btn-outline">Batal</button>
                        <button type="submit" name="order_treat" class="btn btn-primary">
                           Pesan
                        </button>
                     </div>

                  </div>
               </div>

            </form>
            <script>

               const checkboxes = document.querySelectorAll(".treat-check");
               const qtyInputs = document.querySelectorAll(".qty-input");
               const jumlahOrder = document.getElementById("kuantitas");

               function hitungTotalOrder(){

               let total = 0;
               checkboxes.forEach(function(cb){
               if(cb.checked){
               let id = cb.dataset.id;
               let qtyInput = document.querySelector('.qty-input[data-id="'+id+'"]');
               let qty = parseInt(qtyInput.value) || 0;
               total += qty;
               }
               });
               jumlahOrder.value = total;
               }
               /* saat checkbox berubah */

               checkboxes.forEach(function(cb){
               cb.addEventListener("change", hitungTotalOrder);
               });

               /* saat qty berubah */

               qtyInputs.forEach(function(qty){
               qty.addEventListener("input", hitungTotalOrder);
               });

               </script>

         </div><!-- /card-body -->
      </div><!-- /card -->

   </div>
</div>

</body>
</html>