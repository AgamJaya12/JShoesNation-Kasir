<?php
//koneksi
require_once("Koneksi.php");


require_once("model/AuthModel.php");
require_once("model/treatmentModel.php");
require_once("model/orderModel.php");
require_once("model/KaryawanModel.php");
require_once("model/LaporanModel.php");

/**Memanggil Controller */
require_once("Controller/AuthController.php");
require_once("Controller/HomeController.php");
require_once("Controller/treatmentController.php");
require_once("Controller/orderController.php");
require_once("Controller/riwayatController.php");
require_once("Controller/karyawanController.php");
require_once("Controller/laporanController.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {

    session_start();
    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    if ($page == "auth") {
        $auth = new AuthController();
        if ($aksi == 'view') {
            $auth->index();
        } else if ($aksi == 'loginKaryawan') {
            $auth->loginKaryawan();
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
        } else if ($aksi == 'authKaryawan') {
            $auth->authKaryawan();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "home") {
        require_once('_header.php');

        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'karyawan') {
            $home = new HomeController();
            if ($aksi == 'view') {
                $home->index();
            } else if ($aksi == 'about') {
                $home->about();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginKaryawan");
        }
    } else if ($page == "karyawan") {
        require_once('_header.php');
        if ($_SESSION['role'] == 'admin') {
            $karyawan = new karyawanController();
            if ($aksi == 'view') {
                $karyawan->index();
            } else if ($aksi == 'tambahKaryawan') {
                $karyawan->Tambahkaryawan();
            } else if ($aksi == 'storeKaryawan') {
                $karyawan->storekaryawan();
            } else if ($aksi == 'editKaryawan') {
                $karyawan->editkaryawan();
            } else if ($aksi == 'updateKaryawan') {
                $karyawan->update();
            } else if ($aksi == 'deleteKaryawan') {
                $karyawan->Deletekaryawan();
            } else {
                echo "Method Not Found";
            }
        }
    } else if ($page == "treatment") {
        require_once('_header.php');

        if ($_SESSION['role'] == 'admin') {
            $treatment = new treatmentController();
            if ($aksi == 'view') {
                $treatment->index();
            } else if ($aksi == 'Isitreatment') {
                $treatment->isiTreatment();
            } else if ($aksi == 'tambahtreatment') {
                $treatment->tambahTreatment();
            } else if ($aksi == 'Edittreatment') {
                $treatment->editTreatment();
            } else if ($aksi == 'AksiEditTreatment') {
                $treatment->aksiEditTreatment();
            } else if ($aksi == 'Deletetreatment') {
                $treatment->deleteTreatment();
            } else if ($aksi == 'jmlhtreatment') {
                $treatment->jmlhTreatment();
            } else if ($aksi == 'storetreatment') {
                $treatment->storeTreatment();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    } else if ($page == "order") {
        require_once('_header.php');

        if ($_SESSION['role'] == 'karyawan') {
            $order = new orderController();
            if ($aksi == 'daftarorder') {
                $order->index();
            } else if ($aksi == 'detailOrder') {
                $order->detailOrder();
            } else if ($aksi == 'prosesBayar') {
                $order->prosesBayar();
            } else if ($aksi == 'orderTreatment') {
                $order->Ordertreatment();
            } else if ($aksi == 'DeleteOrder') {
                $order->deleteorder();
            } else if ($aksi == 'storePemesanan') {
                $order->storepemesanan();
            } else if ($aksi == 'order') {
                $order->Order();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    } else if ($page == "riwayat") {
        require_once('_header.php');

        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'karyawan') {
            $riwayat = new riwayatController();
            if ($aksi == 'riwayatIsiTransaksi') {
                $riwayat->riwayatisi();
            } else if ($aksi == 'riwayatTransaksi') {
                $riwayat->riwayatTrans();
            } else if ($aksi == 'detailTreatment') {
                $riwayat->detailtreatment();
            } else if ($aksi == 'cetak') {
                $riwayat->cetak();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    } else if ($page == "bayar") {

        if ($_SESSION['role'] == 'karyawan') {
            $bayar = new orderController();
            if ($aksi == 'bayar') {
                $bayar->bayar();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    } else if ($page == "cetak") {

        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'karyawan') {
            $riwayat = new riwayatController();
            if ($aksi == 'cetak') {
                $riwayat->cetak();
            } else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    } else if ($page == "Laporan") {
        require_once('_header.php');
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'karyawan') {
            $laporan = new laporanController();
            if ($aksi == 'index') {
                $laporan->Laporan();
            } else if($aksi == 'cekhari'){
                $laporan->cekhari();
            }else if($aksi == 'cekbulan'){
                $laporan->cekbulan();
            }else if($aksi == 'cekid'){
                $laporan->cekid();
            }
            else {
                echo "Method Not Found";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    }
} else {
    header("location: index.php?page=auth&aksi=loginKaryawan"); //Jangan ada spasi habis location
}
