<?php


if (isset($_SESSION['role']) == '') {
	echo "<script>window.location='index.php?page=auth&aksi=loginKaryawan&pesan=Berhasil Logout !!!';</script>";
}

session_unset();
session_destroy();
$_SESSION = [];

echo "<script>window.location='index.php?page=auth&aksi=loginKaryawan&pesan=Berhasil Logout !!!';</script>";
