<?php
class KaryawanModel
{

    function jmlhKaryawan()
    {
        $jumlah_treat = "SELECT COUNT(user.id_user) as jumlah FROM user WHERE id_role=2";
        $query = koneksi()->query($jumlah_treat);
        $hasil = $query->fetch_assoc();
        return $hasil;
    }

    function get()
    {
        $admin = "SELECT * FROM user WHERE id_role=2";
        $query = koneksi()->query($admin);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    // CRUD (Management Karyawan)
    function addKaryawan($nama, $email, $username, $password, $no_hp)
    {

        // Cek apakah username dan email sudah tersedia
        $user = "SELECT * FROM user WHERE username_user='$username' OR email_user='$email'";
        $usercek = koneksi()->query($user);
        if ($usercek->fetch_assoc() > 0) {
            echo"
			<script>
				alert('Username atau Email Sudah Terdaftar')
			</script>
		";
        }

        // $password = password_hash($password, PASSWORD_DEFAULT);
        $insert = "INSERT INTO user(id_role,nama_user,email_user,username_user,password_user,nomor_user) 
	VALUES (2,'$nama','$email','$username','$password','$no_hp')";
        return $query = koneksi()->query($insert);
    }

    function updatekaryawan($id, $nama, $username, $email)
    {

        $update_query = "UPDATE user SET 
		nama_user 	 = '$nama', 
		username_user = '$username', 
		email_user 	 = '$email' 
		WHERE id_user = $id
	";
        $query = koneksi()->query($update_query);
        return $query;
    }

    function getDataKaryawan($id)
    {
        $data_kary = "SELECT * FROM user WHERE id_user = $id";
        $query = koneksi()->query($data_kary);
        return $query->fetch_assoc();
    }

    function deleteKaryawan($id)
    {
        $delete_query = "DELETE FROM user WHERE id_user = $id";
        $query = koneksi()->query($delete_query);
        return $query;
    }
}
