<?php
// require_once('_header.php'); 
// $data_karyawan = query('SELECT * FROM admin LIMIT 20 OFFSET 1');
?>
<div id="karyawan" class="main-content">
	<div class="container">
		<div class="baris">
			<div class="selamat-datang">
				<div class="col-header">
					<h2 class="judul-md">Management Karyawan</h2>
				</div>

				<div class="col-header txt-right">
					<a href="index.php?page=karyawan&aksi=tambahKaryawan" class="btn-lg bg-primary">+ Tambah Karyawan</a>
				</div>
			</div>
		</div>

		<div class="baris">
			<div class="col">
				<div class="card">
					<div class="card-title card-flex">
						<div class="card-col">
							<h2>Daftar Karyawan</h2>
						</div>
					</div>

					<div class="card-body">
						<div class="tabel-kontainer">
							<table class="tabel-transaksi">
								<thead>
									<tr>
										<th class="sticky">No</th>
										<th class="sticky">Nama Karyawan</th>
										<th class="sticky">Username</th>
										<th class="sticky">Email</th>
										<th class="sticky">Aksi</th>
									</tr>
								</thead>

								<tbody>
									<?php
									// $data_karyawan = "SELECT * FROM admin LIMIT 20 OFFSET 1";
									// $query = koneksi()->query($data_karyawan);
									// return $query;
									?>

									<?php $no = 1; ?>
									<?php foreach ($data as $karyawan) : ?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $karyawan['NAMA_USER'] ?></td>
											<td><?= $karyawan['USERNAME_USER'] ?></td>
											<td><?= $karyawan['EMAIL_USER'] ?></td>
											<td>
												<a href="index.php?page=karyawan&aksi=editKaryawan&id=<?= $karyawan['ID_USER'] ?>" class="btn btn-edit">Edit</a>
												<a href="index.php?page=karyawan&aksi=deleteKaryawan&id=<?= $karyawan['ID_USER'] ?>" onclick="return confirm('Yakin akan menghapus?');" class="btn btn-hapus">Hapus</a>
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
<?php
