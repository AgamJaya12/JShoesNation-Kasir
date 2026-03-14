<?php
class authController
{
    private $model;
    /**Function ini adalah konstruktor yang berguna menginisialisasi objek auth model */
    public function __construct()
    {
        $this->model = new AuthModel();
    }
    /**Function index digunakan untuk mengatur tampilan awal
     */
    public function index()
    {
        require_once("view/auth/login.php");
    }

    public function loginKaryawan()
    {
        require_once("view/auth/loginKaryawan.php");
    }



    public function authAdmin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAdmin($username, $password);
        if ($data) {
            $_SESSION['role'] = 'admin';
            $_SESSION['admin'] = $data;
            header("location: index.php?page=home&aksi=view&pesan=Berhasil Login");
        } else {
            header("location: index.php?page=auth&aksi=view&pesan=Password atau Npm anda salah !!!");
        }
    }

    public function authKaryawan()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthKaryawan($username, $password);
        if ($data) {
            $_SESSION['role'] = 'karyawan';
            $_SESSION['karyawan'] = $data;
            header("location: index.php?page=home&aksi=view&pesan=Berhasil Login");
        } else {
            header("location: index.php?page=auth&aksi=view&pesan=Password atau Npm anda salah !!!");
        }
    }

    public function logout()
    {
        require_once("view/auth/logout.php");
    }
}
