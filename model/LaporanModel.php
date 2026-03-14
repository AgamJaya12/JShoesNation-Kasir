<?php
class laporanModel
{

	function DataTransaksi()
	{
		$sql = "SELECT 
			MAX(o.tgl_masuk) AS TGL_MASUK,
			MAX(tr.tgl_bayar) AS TGL_KELUAR,
			o.id_order AS ID_ORDER,
			MAX(o.nama_cust) AS NAMA_CUST,

			GROUP_CONCAT(t.NAMA_TREATMENT SEPARATOR ', ') AS NAMA_TREATMENT,

			SUM(od.qty) AS JMLH_TREATMENT,
			SUM(od.subtotal) AS TOTAL_HRG,

			MAX(tr.nominal_bayar) AS NOMINAL_BYR,
			MAX(tr.kembalian) AS KEMBALIAN

			FROM orders o

			LEFT JOIN order_detail od 
			ON o.id_order = od.id_order

			LEFT JOIN treatment t 
			ON od.id_treatment = t.ID_TREATMENT

			LEFT JOIN transaksi tr 
			ON o.id_order = tr.id_order

			WHERE o.status = 1

			GROUP BY o.id_order

			ORDER BY MAX(tr.tgl_bayar) DESC";

		$hasil = [];
		$query = koneksi()->query($sql);

		while ($data = $query->fetch_assoc()) {
			$hasil[] = $data;
		}

		return $hasil;
	}

	public function hari($hari)
	{
		$sql = "SELECT 
			MAX(o.tgl_masuk) AS TGL_MASUK,
			MAX(tr.tgl_bayar) AS TGL_KELUAR,
			o.id_order AS ID_ORDER,
			MAX(o.nama_cust) AS NAMA_CUST,

			GROUP_CONCAT(t.NAMA_TREATMENT SEPARATOR ', ') AS NAMA_TREATMENT,

			SUM(od.qty) AS JMLH_TREATMENT,
			SUM(od.subtotal) AS TOTAL_HRG,

			MAX(tr.nominal_bayar) AS NOMINAL_BYR,
			MAX(tr.kembalian) AS KEMBALIAN

			FROM orders o

			LEFT JOIN order_detail od 
			ON o.id_order = od.id_order

			LEFT JOIN treatment t 
			ON od.id_treatment = t.ID_TREATMENT

			LEFT JOIN transaksi tr 
			ON o.id_order = tr.id_order

			WHERE DATE(o.tgl_masuk) = '$hari'

			GROUP BY o.id_order
		";

		$hasil = [];

		$query = koneksi()->query($sql);

		while ($data = $query->fetch_assoc()) {
			$hasil[] = $data;
		}

		return $hasil;
	}

	public function perbulan($bulan,$tahun)
	{
		$sql = "SELECT 
			MAX(o.tgl_masuk) AS TGL_MASUK,
			MAX(tr.tgl_bayar) AS TGL_KELUAR,
			o.id_order AS ID_ORDER,
			MAX(o.nama_cust) AS NAMA_CUST,

			GROUP_CONCAT(t.NAMA_TREATMENT SEPARATOR ', ') AS NAMA_TREATMENT,

			SUM(od.qty) AS JMLH_TREATMENT,
			SUM(od.subtotal) AS TOTAL_HRG,

			MAX(tr.nominal_bayar) AS NOMINAL_BYR,
			MAX(tr.kembalian) AS KEMBALIAN

			FROM orders o

			LEFT JOIN order_detail od 
			ON o.id_order = od.id_order

			LEFT JOIN treatment t 
			ON od.id_treatment = t.ID_TREATMENT

			LEFT JOIN transaksi tr 
			ON o.id_order = tr.id_order

			WHERE MONTH(o.tgl_masuk) = '$bulan'
			AND YEAR(o.tgl_masuk) = '$tahun'

			GROUP BY o.id_order

			ORDER BY MAX(tr.tgl_bayar) DESC";

		$hasil = [];

		$query = koneksi()->query($sql);

		while ($data = $query->fetch_assoc()) {
			$hasil[] = $data;
		}

		return $hasil;
	}

	public function cekid($id)
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
			WHERE o.id_order = '$id'
			GROUP BY o.id_order";

			$hasil = [];
			$query = koneksi()->query($sql);
			while ($row = $query->fetch_assoc()) {
				$hasil[] = $row;
			}

			return $hasil;
		}
}