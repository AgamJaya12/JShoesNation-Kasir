<?php
//    require_once('../../_header.php');
?>

<div id="pkt_cs" class="main-content">
	<div class="container">
		<div class="baris">
			<div class="selamat-datang">
				<div class="col-header">
					<h2 class="judul-md">Treatment Cuci Sepatu</h2>
				</div>

				<div class="col-header txt-right">
					<a href="index.php?page=treatment&aksi=tambahtreatment" class="btn-lg bg-primary">+ Tambah Treatment</a>
				</div>
			</div>
		</div>

		<div class="baris">
			<div class="col">
				<div class="card">
					<div class="card-title card-flex">
						<div class="card-col">
							<h2>Daftar Treatment Tersedia</h2>
						</div>

						<div class="card-col txt-right">
							<a href="index.php?page=treatment&aksi=view" class="btn-xs bg-primary">Kembali</a>
						</div>
					</div>

					<div class="card-body">
						<div class="tabel-kontainer">
							<table class="tabel-transaksi">
								<thead>
									<tr>
										<th class="sticky">No</th>
										<th class="sticky">Nama Treatment</th>
										<th class="sticky" style="text-align: center;">Waktu Kerja</th>
										<th class="sticky">Harga</th>
										<th class="sticky" style="text-align: center;">Action</th>
									</tr>
								</thead>

								<tbody>


									<?php
									$no = 1; ?>
									<?php foreach ($isi as $treat) : ?>

										<tr>
											<td><?= $no ?></td>
											<td><?= $treat['NAMA_TREATMENT'] ?></td>
											<td align="center"><?= $treat['WAKTU_TREATMENT'] ?></td>
											<td><?= $treat['BIAYA_TREATMENT'] ?></td>
											<td align="center">
												<a href="index.php?page=treatment&aksi=Edittreatment&id=<?= $treat['ID_TREATMENT'] ?>" class="btn btn-edit">Edit</a>
												<a href="index.php?page=treatment&aksi=Deletetreatment&id=<?= $treat['ID_TREATMENT'] ?>" onclick="return confirm('Yakin akan menghapus?');" class="btn btn-hapus">Hapus</a>
											</td>
										</tr>
										<?php $no++ ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>