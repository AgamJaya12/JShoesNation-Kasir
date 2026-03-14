<?php
class laporanController
{
    private $model;
    private $model2;
    public function __construct()
    {
        $this->model = new LaporanModel();
        $this->model2 = new OrderModel();
    }

    public function laporan()
    {
        $queryTreat = $this->model->DataTransaksi();
        extract($queryTreat);
        require_once("view/laporan/index.php");
    }

    public function cekhari()
    {
        $hari = $_POST['hari'];
        $hasil = $this->model->hari($hari);
        $total = [];
        $temptotal = 0;
        foreach($hasil as $data){
            $temptotal = $data['TOTAL_HRG'] + $temptotal;
            // $temptotal++;
            // echo $total;
        }
        $total[0] = $temptotal;
        // var_dump($total);
        extract($total);
        extract($hasil);
        require_once("view/laporan/index.php");
    }

    public function cekbulan()
    {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $hasil = $this->model->perbulan($bulan,$tahun);
        $total = [];
        $temptotal = 0;
        foreach($hasil as $data){
            $temptotal = $data['TOTAL_HRG'] + $temptotal;
            // $temptotal++;
            // echo $total;
        }
        $total[0] = $temptotal;
        // var_dump($total);
        extract($total);
        extract($hasil);
        require_once("view/laporan/index.php");
    }

    public function cekid()
    {
        if(isset($_POST ['cari'])){
            $id = $_POST['id_order'];
            $queryTreat = $this->model->cekid($id);
        }else if (isset($_POST['reset'])) {
            $queryTreat = $this->model2->riwayatTransaksi();
        }
        require_once("view/riwayat_transaksi/riwayat_treatment/riwayat_treatmentisi.php");
    }
    
}