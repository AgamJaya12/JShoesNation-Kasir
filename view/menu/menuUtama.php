<?php
// require_once('_header.php'); 

?>

<div id="main" class="main-content">
	<div class="container">
		<div class="baris">
			<div class="selamat-datang">
				<div class="col-header">
					<p class="judul-sm">Selamat Datang <span>
							<?php
							if ($_SESSION['role'] == 'karyawan') : ?>
								<?= ucfirst($_SESSION['karyawan']['NAMA_USER']) ?>
							<?php elseif ($_SESSION['role'] == 'admin') : ?>
								<?= ucfirst($_SESSION['admin']['NAMA_USER']) ?>
							<?php endif ?>
						</span></p>
					<h2 class="judul-md">Dashboard</h2>
				</div>
				<?php if ($_SESSION['role'] == 'karyawan') : ?>
					<div class="col-header txt-right">
						<a href="index.php?page=order&aksi=order" class="btn-lg bg-primary">+ Order Baru</a>
					</div>
				<?php endif ?>
			</div>
		</div>


		<div class="baris">
			<?php if ($_SESSION['role'] == 'admin') : ?>
				<div class="col col-4">
					<div class="card">
						<div class="card-body">
							<div class="card-panel">
								<div class="panel-header">
									<p>Jumlah Karyawan</p>
									<?= $jumlahkaryawan['jumlah'] ?>
								</div>
								<div class="panel-icon">
									<img src="_assets/img/team.png" alt="karyawan" height="48">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<?php if ($_SESSION['role'] == 'admin') : ?>
				<div class="col col-4">
				<?php elseif ($_SESSION['role'] == 'karyawan') : ?>
					<div class="col col-6">
					<?php endif ?>
					<div class="card">
						<div class="card-body">
							<div class="card-panel">
								<div class="panel-header">
									<p>Total Order</p>
									<?= $jumlahorder['jumlah'] ?>
								</div>

								<div class="panel-icon">
									<img src="_assets/img/total_order.png" alt="order" height="48">
								</div>
							</div>
						</div>
					</div>
					<?php if ($_SESSION['role'] == 'admin') : ?>
					</div>
				<?php elseif ($_SESSION['role'] == 'karyawan') : ?>
				</div>
			<?php endif ?>

			<div class="col col-4">
				<div class="card">
					<div class="card-body">
						<div class="card-panel">
							<div class="panel-header">
								<p>Jumlah Treatment Tersedia</p>
								<?= $jumlahtreat['jumlah'] ?>
							</div>

							<div class="panel-icon">
								<img src="_assets/img/jumlah_paket.png" alt="paket" height="48">
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Daftar Order Treatment -->
		<?php if ($_SESSION['role'] == 'karyawan') : ?>
			<div class="baris">
				<?php require_once('view/daftar_order/daftarorder.php'); ?>
			</div>
		<?php endif ?>
	</div>
</div>