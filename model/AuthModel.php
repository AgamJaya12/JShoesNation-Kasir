<?php
class AuthModel {

    public function prosesAuthAdmin($username, $password) {
        $sql = "SELECT * FROM user WHERE username_user = '$username' and password_user = '$password' and id_role =1";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesAuthKaryawan($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username_user = '$username' and password_user = '$password' and id_role =2";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}