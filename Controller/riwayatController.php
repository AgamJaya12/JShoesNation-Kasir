<?php
class riwayatController
{
    private $model;
    public function __construct()
    {
        $this->model = new OrderModel();
    }

    // Cetak invoice
    public function cetak()
    {
        $id_order = $_GET['id'] ?? null;
        if (!$id_order) {
            die("ID Order tidak ditemukan");
        }

        $dataArr = $this->model->getDetailRiwayat($id_order);

        if (empty($dataArr)) {
            die("Data tidak tersedia");
        }

        $data = $dataArr[0];
        require_once("view/riwayat_transaksi/riwayat_treatment/cetak_info.php");
    }

    // Detail pembayaran per order
    public function detailTreatment()
    {
        $id_order = $_GET['id'] ?? null;
        if (!$id_order) {
            die("ID Order tidak ditemukan");
        }

        $dataArr = $this->model->getDetailRiwayat($id_order);

        if (empty($dataArr)) {
            die("Data tidak tersedia");
        }

        $data = $dataArr[0]; // Ambil row pertama
        require_once("view/riwayat_transaksi/riwayat_treatment/detail_treatment.php");
    }

    public function riwayatIsi()
    {
        $queryTreat = $this->model->riwayatTransaksi();
        extract($queryTreat);
        require_once("view/riwayat_transaksi/riwayat_treatment/riwayat_treatmentisi.php");
    }

    public function riwayatTrans()
    {
        $id = $_GET['id'];
        $riwayat_treat = $this->model->riwayatTransaksi($id);
        extract($riwayat_treat);
        require_once("view/riwayat_transaksi/riwayat.php");
    }
    
}
