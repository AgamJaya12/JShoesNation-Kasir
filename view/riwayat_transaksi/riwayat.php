<?php 
   // $query_cs = query("SELECT * FROM riwayat_transaksi ORDER BY id DESC");
   // var_dump($query_cs);
?>

   <div class="riwayat" class="main-content">
      <div class="container">
			<div class="baris">
            <div class="selamat-datang">
					<div class="col-header">
						<h2 class="judul-md">Daftar Riwayat Transaksi</h2>
					</div>	
				</div>
         </div>

         <div class="baris">
            <div class="col">
               <?php header("location: index.php?page=riwayat&aksi=riwayatIsiTransaksi"); ?>
            </div>
         </div>
      </div>
   </div>