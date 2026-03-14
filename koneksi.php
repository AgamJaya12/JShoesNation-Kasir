<?php

function koneksi()
{
    $host = "localhost";
    $user = "root";
    $password = "@Kaka1234";
    $database = "db_laundrysepatu";

    try {
        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    } catch (Exception $e) {
        echo "Terjadi kesalahan koneksi database";
    }
}