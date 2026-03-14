<?php
?>

<!DOCTYPE html>
<html>

<head>
	<title>Jayashoesnation | Dashboard</title>
	<link rel="stylesheet" href="_assets/css/style.css">
	<link rel="stylesheet" href="_assets\bootstrap-5.0.2-dist\css">
	<link rel="shortcut icon" href="_assets/img/logo/logo4.png" type="image/x-icon">
</head>

<body>

	<header>
		<nav>
			<div class="logo">
				<a href="index.php?page=home&aksi=view">
					<img src="_assets/img/logo/logonama3.png" alt="Jayashoesnation Logo">
				</a>
			</div>
			<ul class="nav-menu">
				<li>
					<span class="form-control mr-sm-2">
						<?php
						if ($_SESSION['role'] == 'karyawan') : ?>
							<?= ucfirst($_SESSION['karyawan']['NAMA_USER']) ?>
						<?php elseif ($_SESSION['role'] == 'admin') : ?>
							<?= ucfirst($_SESSION['admin']['NAMA_USER']) ?>
						<?php endif ?>
					</span>
					<ul class="dropdown-menu">
						<li><a href="index.php?page=home&aksi=about">Tentang Kami</a></li>
						<li><a href="index.php?page=auth&aksi=logout">Keluar</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<div id="nav-mini">
			<a href="index.php?page=riwayat&aksi=riwayatTransaksi" class="link-nav">Riwayat Transaksi</a>
			<?php
			if ($_SESSION['role'] == 'admin') : ?>
				<a href="index.php?page=Laporan&aksi=index" class="link-nav">Laporan Transaksi</a>
				<a href="index.php?page=karyawan&aksi=view" class="link-nav">Kelola Karyawan</a>
				<a href="index.php?page=treatment&aksi=view" class="link-nav">Daftar Treatment</a>
			<?php endif ?>
		</div>
	</header>