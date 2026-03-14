<?php
class orderModel
{

	function jmlOrder()
    {
        $sql = "SELECT COUNT(id_order) as jumlah 
                FROM orders 
                WHERE status = 0";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }


	function insertOrderDetail($id_order, $id_treatment, $qty, $harga, $subtotal, $deskripsi)
    {
        $sql = "INSERT INTO order_detail
                (id_order, id_treatment, qty, harga, subtotal, deskripsi)
                VALUES
                ('$id_order','$id_treatment','$qty','$harga','$subtotal','$deskripsi')";
        return koneksi()->query($sql);
    }

	function get()
{
    $sql = "SELECT 
    o.id_order,
    o.tgl_masuk,
    o.nama_cust,

    GROUP_CONCAT(t.nama_treatment SEPARATOR ', ') AS treatment_list,

    SUM(od.qty) AS qty

    FROM orders o

    LEFT JOIN order_detail od
    ON o.id_order = od.id_order

    LEFT JOIN treatment t
    ON od.id_treatment = t.id_treatment

    WHERE o.status = 0

    GROUP BY o.id_order

    ORDER BY o.tgl_masuk DESC";

    $query = koneksi()->query($sql);

    $hasil = [];

    while ($data = $query->fetch_assoc()) {
        $hasil[] = $data;
    }

    return $hasil;
}

	function orderTreatment($orderNum_treat, $id_user, $nama_cust, $no_telp, $alamat, $tgl_msk, $tgl_kluar, $total_hrg)
    {
        $sql = "INSERT INTO orders
                (id_order, id_user, nama_cust, nomor_cust, alamat_cust, tgl_masuk, tgl_keluar, total_hrg, status)
                VALUES
                ('$orderNum_treat','$id_user','$nama_cust','$no_telp','$alamat','$tgl_msk','$tgl_kluar','$total_hrg',0)";
        return koneksi()->query($sql);
    }

	function getData($id_order)
    {
        $sql = "SELECT 
                    o.id_order,
                    o.nama_cust,
                    o.alamat_cust,
                    o.nomor_cust,
                    o.tgl_masuk,
                    o.tgl_keluar,
                    t.nama_treatment,
                    od.qty,
                    od.harga,
                    od.subtotal,
                    od.deskripsi
                FROM orders o
                JOIN order_detail od ON o.id_order = od.id_order
                JOIN treatment t ON od.id_treatment = t.id_treatment
                WHERE o.id_order='$id_order'";

        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
	
	// Batal/Hapus Daftar Orderan Treatment
	function deleteOrder($id_order)
	{
		$koneksi = koneksi();

		$koneksi->query("DELETE FROM transaksi WHERE id_order='$id_order'");
		$koneksi->query("DELETE FROM order_detail WHERE id_order='$id_order'");
		$koneksi->query("DELETE FROM orders WHERE id_order='$id_order'");
	}

	function formatDate($tgl)
	{
		$tgl = explode('-', $tgl);

		if ($tgl[1] == '01') {
			$tgl[1] = "Januari";
		} else if ($tgl[1] == '02') {
			$tgl[1] = "Februari";
		} else if ($tgl[1] == '03') {
			$tgl[1] = "Maret";
		} else if ($tgl[1] == '04') {
			$tgl[1] = "April";
		} else if ($tgl[1] == '05') {
			$tgl[1] = "Mei";
		} else if ($tgl[1] == '06') {
			$tgl[1] = "Juni";
		} else if ($tgl[1] == '07') {
			$tgl[1] = "Juli";
		} else if ($tgl[1] == '08') {
			$tgl[1] = "Agustus";
		} else if ($tgl[1] == '09') {
			$tgl[1] = "September";
		} else if ($tgl[1] == '10') {
			$tgl[1] = "Oktober";
		} else if ($tgl[1] == '11') {
			$tgl[1] = "November";
		} else if ($tgl[1] == '12') {
			$tgl[1] = "Desember";
		}

		$tgl = $tgl[2] . ' ' . $tgl[1] . ' ' . $tgl[0];
		return $tgl;
	}

	function transaksi_treatment($or_number,$total,$nominal_bayar)
	{
		if ($nominal_bayar < $total) {
			return false;
		}

		$kembalian = $nominal_bayar - $total;

		$sql = "INSERT INTO transaksi
		(id_order,total_bayar,nominal_bayar,kembalian,tgl_bayar)
		VALUES
		('$or_number','$total','$nominal_bayar','$kembalian',NOW())";

		koneksi()->query($sql);

		koneksi()->query("UPDATE orders SET status=1 WHERE id_order='$or_number'");

		return true;
	}

	function riwayatTransaksi()
	{
		$sql = "SELECT 
	o.id_order,
	o.nama_cust,
	o.alamat_cust,
	o.nomor_cust,
	o.tgl_keluar,

	GROUP_CONCAT(t.nama_treatment SEPARATOR ', ') AS treatment_list,
	 GROUP_CONCAT(od.deskripsi SEPARATOR ', ') AS deskripsi_list,

	MAX(tr.total_bayar) AS total_bayar,
	MAX(tr.nominal_bayar) AS nominal_bayar,
	MAX(tr.kembalian) AS kembalian,
	MAX(tr.tgl_bayar) AS tgl_bayar

	FROM transaksi tr

	JOIN orders o ON tr.id_order = o.id_order

	LEFT JOIN order_detail od ON o.id_order = od.id_order
	LEFT JOIN treatment t ON od.id_treatment = t.id_treatment

	GROUP BY o.id_order

	ORDER BY tgl_bayar DESC";

		$hasil = [];

		$query = koneksi()->query($sql);

		while ($data = $query->fetch_assoc()) {
			$hasil[] = $data;
		}

		return $hasil;
	}

	public function getDetailRiwayat($id_order)
    {
        $sql = "SELECT 
            o.id_order,
            o.nama_cust,
            o.alamat_cust,
            o.nomor_cust,
            o.tgl_masuk,
            o.tgl_keluar,

            GROUP_CONCAT(t.nama_treatment SEPARATOR ', ') AS treatment_list,
			GROUP_CONCAT(od.deskripsi SEPARATOR ', ') AS deskripsi_list,
			GROUP_CONCAT(od.harga SEPARATOR ', ')  AS harga_list,

            SUM(od.qty) AS jmlh_treatment,
            SUM(od.subtotal) AS total_harga,
            MAX(tr.total_bayar) AS total_bayar,
            MAX(tr.nominal_bayar) AS nominal_bayar,
            MAX(tr.kembalian) AS kembalian,
            MAX(tr.tgl_bayar) AS tgl_bayar

			FROM orders o
			LEFT JOIN order_detail od ON o.id_order = od.id_order
			LEFT JOIN treatment t ON od.id_treatment = t.id_treatment
			LEFT JOIN transaksi tr ON o.id_order = tr.id_order
			WHERE o.id_order = '$id_order'
			GROUP BY o.id_order";

			$hasil = [];
			$query = koneksi()->query($sql);
			while ($row = $query->fetch_assoc()) {
				$hasil[] = $row;
			}

			return $hasil;
		}

}