<?php
class karyawanController
{
    private $model;
    public function __construct()
    {
        $this->model = new karyawanModel();
    }
    /**Function index berfungsi untuk mengatur tampilan awal
     */
    public function index()
    {
        // $id = $_SESSION['admin']['id'];
        $data = $this->model->get();
        extract($data);
        require_once("_header.php");
        require_once("view/karyawan/karyawan.php");
    }

    public function tambahKaryawan()
    {
        require_once("view/karyawan/tambah.php");
    }

    public function storeKaryawan()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_hp = $_POST['no_hp'];

        if ($this->model->addKaryawan($nama, $email, $username, $password, $no_hp)) {
            header("location: index.php?page=karyawan&aksi=view");
        } else {
            header("location: index.php?page=karyawan&aksi=view");
        }
    }

    public function EditKaryawan()
    {
        $id = $_GET['id'];
        $edit = $this->model->getDataKaryawan($id);
        extract($edit);
        require_once("view/karyawan/edit.php");
    }

    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        if ($this->model->updateKaryawan($id, $nama, $username, $email)) {
            header("location: index.php?page=karyawan&aksi=view");
        } else {
            header("location: index.php?page=karyawan&aksi=view");
        }
    }

    public function deleteKaryawan()
    {
        $id = $_GET['id'];
        if ($this->model->deleteKaryawan($id)) {
            header("location: location: index.php?page=karyawan&aksi=view");
        } else {
            header("location: location: index.php?page=karyawan&aksi=view");
        }
    }

    public function jumlahkaryawan()
    {
        $jmlhkary = $this->model->jmlhkaryawan();
        extract($jmlhkary);
        require_once("view/karyawan/karyawan.php");
    }

    // public function DataLaporan()
    // {
    //     require_once("view/Laporan/index.php");
    // }
}
