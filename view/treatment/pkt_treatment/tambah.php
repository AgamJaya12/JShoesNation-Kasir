<div id="tambah_cs" class="main-content">
      <div class="container">
         <div class="baris">
            <div class="col mt-2">
               <div class="card">
                  <div class="card-title card-flex">
                     <div class="card-col">
                        <h2>Tambah Treatment</h2>	
                     </div>
                     <div class="card-col txt-right">
                        <a href="index.php?page=treatment&aksi=Isitreatment" class="btn-xs bg-primary">Kembali</a>
                     </div>
                  </div>

                  <div class="card-body">
                     <form action="index.php?page=treatment&aksi=storetreatment" method="POST" class="form-input">
                        <div class="form-grup">
                           <label for="nama">Nama Treatment</label>
                           <input type="text" name="nama_treatment" placeholder="Nama Treatment" autocomplete="off" id="nama" required>
                        </div>

                        <div class="form-grup">
                           <label for="wkt">Waktu Kerja</label>
                           <input type="text" name="wkt_kerja" placeholder="Durasi Kerja" autocomplete="off" id="wkt" required>
                        </div>

                        <div class="form-grup">
                           <label for="harga">Harga</label>
                           <input type="text" name="biaya" placeholder="Harga Treatment" autocomplete="off" id="harga" required>
                        </div>

                        <div class="form-grup ">
                           <button type="submit" class="mt-1" name="tambah">Tambah</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>