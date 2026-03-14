<?php
class treatmentController
{
    private $model;
    public function __construct()
    {
        $this->model = new treatmentModel();
    }

    public function index()
    {
        require_once("view/treatment/treatment.php");
    }

    public function isiTreatment()
    {
        $isi = $this->model->getAllTreatment();
        extract($isi);
        require_once("view/treatment/pkt_treatment/treatmentisi.php");
    }
    public function tambahTreatment()
    {

        require_once("view/treatment/pkt_treatment/tambah.php");
    }

    public function storeTreatment()
    {
        $nama_treatment = $_POST['nama_treatment'];
        $waktu_kerja = $_POST['wkt_kerja'];
        $biaya = $_POST['biaya'];
        if ($this->model->addTreatment($nama_treatment, $waktu_kerja, $biaya)) {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        } else {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        }
    }

    public function editTreatment()
    {
        $id = $_GET['id'];
        $edit = $this->model->getDataTreatment($id);
        extract($edit);
        require_once("view/treatment/pkt_treatment/edit.php");
    }

    public function aksiEditTreatment()
    {
        $id = $_POST['id'];
        $nama_treatment = $_POST['nama_treatment'];
        $waktu_kerja = $_POST['wkt_kerja'];
        $biaya = $_POST['biaya'];
        if ($this->model->editTreatment($id, $nama_treatment, $waktu_kerja, $biaya)) {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        } else {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        }
    }
    public function deleteTreatment()
    {
        $id = $_GET['id'];
        if ($this->model->deleteTreatment($id)) {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        } else {
            header("location: index.php?page=treatment&aksi=Isitreatment");
        }
    }
    public function jmlhTreatment()
    {
        $jumlah = $this->model->jmlTreatment();
        extract($jumlah);
        require_once("View/treatment/treatment.php");
    }
}
