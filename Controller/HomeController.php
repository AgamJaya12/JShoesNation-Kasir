<?php
class HomeController
{
    private $karyawan;
    private $order;
    private $treatment;
    public function __construct()
    {
        $this->karyawan = new karyawanModel();
        $this->order = new orderModel();
        $this->treatment = new treatmentModel;;
    }

    public function about()
    {
        require_once("about.php");
    }

    public function index()
    {
        $jumlahkaryawan = $this->karyawan->jmlhKaryawan();
        $jumlahorder = $this->order->jmlOrder();
        $jumlahtreat = $this->treatment->jmlTreatment();
        $daftarorder = $this->order->get();
        extract($daftarorder);
        extract($jumlahkaryawan);
        extract($jumlahorder);
        extract($jumlahtreat);
        require_once("view/menu/menuUtama.php");
    }
}
