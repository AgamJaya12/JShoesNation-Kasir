<?php
class treatmentModel
{
    function getAllTreatment()
    {
        $data_treat = 'SELECT * FROM treatment';
        $query = koneksi()->query($data_treat);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    function jmltreatment()
    {
        $jumlah_treat = "SELECT COUNT(treatment.id_treatment) as jumlah FROM treatment";
        $query = koneksi()->query($jumlah_treat);
        $hasil = $query->fetch_assoc();
        return $hasil;
    }

    function addTreatment($nama_treatment, $waktu_kerja, $biaya)
    {

        $query_treatment = "INSERT INTO treatment(nama_treatment,waktu_treatment,biaya_treatment) VALUES('$nama_treatment', '$waktu_kerja', $biaya)";
        return koneksi()->query($query_treatment);
    }

    function editTreatment($id, $nama_treatment, $waktu_kerja, $biaya)
    {

        $update_treat = "UPDATE treatment SET
        nama_treatment = '$nama_treatment',
        waktu_treatment = '$waktu_kerja',
        biaya_treatment = $biaya
        WHERE id_treatment = $id";
        $query = koneksi()->query($update_treat);
        return $query;
    }
    function getDataTreatment($id)
    {
        $data_treat = "SELECT * FROM treatment WHERE id_treatment = $id";
        $query = koneksi()->query($data_treat);
        return $query->fetch_assoc();
    }

    function deleteTreatment($id)
    {
        $delete_treat = "DELETE FROM treatment WHERE id_treatment = $id";
        $query = koneksi()->query($delete_treat);
        return $query;
    }
}
