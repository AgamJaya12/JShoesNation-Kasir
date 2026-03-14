<div id="tambah_karyawan" class="main-content">
	<div class="container">
		<div class="baris">
			<div class="col mt-2">
				<div class="card">
					<div class="card-title card-flex">
						<div class="card-col">
							<h2>Tambah Data Karyawan</h2>
						</div>
						<div class="card-col txt-right">
							<a href="index.php?page=karyawan&aksi=view" class="btn-xs bg-primary">Kembali</a>
						</div>
					</div>

					<div class="card-body">
						<form action="index.php?page=karyawan&aksi=storeKaryawan" method="post" class="form-input">
							<div class="form-grup">
								<label for="nama">Nama Karyawan</label>
								<input type="text" name="nama" placeholder="Nama lengkap" autocomplete="off" id="nama" required autofocus>
							</div>

							<div class="form-grup">
								<label for="username">Username</label>
								<input type="text" name="username" placeholder="Username" autocomplete="off" id="username" required>
							</div>

							<div class="form-grup">
								<label for="email">Email</label>
								<input type="text" name="email" placeholder="Email" autocomplete="off" id="email" required>
							</div>

							<div class="form-grup">
								<label for="email">Nomor</label>
								<input type="text" name="no_hp" placeholder="Nomor" autocomplete="off" id="no_hp" required>
							</div>

							<div class="form-grup">
								<label for="password">Password</label>
								<input type="password" name="password" placeholder="password" autocomplete="off" id="password" required>
							</div>

							<div class="form-grup ">
								<button type="submit" class="mt-1" name="tambah_karyawan">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>