<?php
// $id = $_GET['id'];
// $data_treat = query("SELECT * FROM treatment WHERE id = '$id'")[0];
// var_dump($data_treat);   
?>

<? //php// if (isset($_POST['ubah'])) : 
?>
<? //php// if (edit_treat($_POST) > 0) : 
?>
<!-- Statement 1 -->
<!-- <div class="alert">
         <div class="box">
            <img src="_assets/img/berhasil.png" height="68" alt="alert sukses">
            <p>Treatment Berhasil Di Ubah</p>
         </div>
      </div>
   <? //php// else : 
   ?>
      <!-- Statement 2 -->
<!-- <div class="alert">
         <div class="box">
            <img src="_assets/img/gagal.png" height="68" alt="alert gagal">
            <p>Treatment Gagal Di Ubah</p>
         </div>
      </div> --> -->
<? //php// endif 
?>
<? //php// endif 
?>

<div id="edit_cs" class="main-content">
   <div class="container">
      <div class="baris">
         <div class="col mt-2">
            <div class="card">
               <div class="card-title card-flex">
                  <div class="card-col">
                     <h2>Ubah Treatment</h2>
                  </div>
                  <div class="card-col txt-right">
                     <a href="index.php?page=treatment&aksi=Isitreatment" class="btn-xs bg-primary">Kembali</a>
                  </div>
               </div>

               <div class="card-body">
                  <form action="index.php?page=treatment&aksi=AksiEditTreatment" method="post" class="form-input">
                     <input type="hidden" name="id" value="<?= $edit['ID_TREATMENT'] ?>">
                     <div class="form-grup">
                        <label for="nama">Nama Treatment</label>
                        <input type="text" name="nama_treatment" placeholder="Nama Treatment" value="<?= $edit['NAMA_TREATMENT'] ?>" autocomplete="off" id="nama" required>
                     </div>

                     <div class="form-grup">
                        <label for="wkt">Waktu Kerja</label>
                        <input type="text" name="wkt_kerja" placeholder="Durasi Kerja" value="<?= $edit['WAKTU_TREATMENT'] ?>" autocomplete="off" id="wkt" required>
                     </div>

                     <div class="form-grup">
                        <label for="harga">Harga</label>
                        <input type="text" name="biaya" placeholder="Harga Treatment" value="<?= $edit['BIAYA_TREATMENT'] ?>" autocomplete="off" id="harga" required>
                     </div>

                     <div class="form-grup ">
                        <button type="submit" class="mt-1" name="ubah">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>