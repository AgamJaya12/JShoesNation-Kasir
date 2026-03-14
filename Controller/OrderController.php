<?php
class orderController
{
    private $model;
    private $treatment;

    public function __construct()
    {
        $this->model = new orderModel();
        $this->treatment = new treatmentModel();
    }

    public function prosesBayar()
    {
        $nomor_order = $_POST['or_number'];
        $nominal = $_POST['nominal'];
        $total = $_POST['total'];

        $this->model->transaksi_treatment($nomor_order, $total, $nominal);
        header("location: index.php?page=riwayat&aksi=riwayatIsiTransaksi");
    }

    public function bayar()
    {
        $nomor_order = $_POST['or_number'];
        $data = $this->model->getData($nomor_order);
        require_once("view/detail_order/bayar.php");
    }

    public function detailOrder()
    {
        if (!isset($_GET['id'])) {
            echo "ID Order tidak ditemukan";
            return;
        }

        // hapus prefix "treatment-" jika ada
        $no_treat = str_replace("treatment-", "", $_GET['id']);

        $data = $this->model->getData($no_treat);

        if (empty($data)) {
            echo "Data order tidak ditemukan";
            return;
        }

        require_once("view/detail_order/detail_order_treatment.php");
    }

    public function index()
    {
        $daftarorder = $this->model->get();
        require_once("view/daftar_order/daftarorder.php");
    }

    public function storePemesanan()
{
    $id_user = $_POST['id_user'];
    $nama_cus = $_POST['nama_cus'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $tgl_msk = str_replace("T"," ",$_POST['tgl_msk']);
    $tgl_kluar = str_replace("T"," ",$_POST['tgl_kluar']);

    $treatments = $_POST['treatment'];  // array id_treatment
    $qty = $_POST['qty'];                // array qty per treatment
    $descriptions = $_POST['deskripsi']; // array deskripsi per treatment

    // generate nomor order
    $noTreat = uniqid();
    $orderNum_treat = 'JSN-' . strtoupper(substr($noTreat, 0, 7));

    $totalHarga = 0;

    // hitung total harga
    foreach ($treatments as $id_treat) {
        $dataTreat = $this->treatment->getDataTreatment($id_treat);
        $harga = $dataTreat['BIAYA_TREATMENT'];
        $jumlah = $qty[$id_treat];
        $subtotal = $harga * $jumlah;
        $totalHarga += $subtotal;
    }

    // simpan order utama
    $this->model->orderTreatment(
        $orderNum_treat,
        $id_user,
        $nama_cus,
        $no_telp,
        $alamat,
        $tgl_msk,
        $tgl_kluar,
        $totalHarga
    );

    // simpan detail per treatment
    foreach ($treatments as $id_treat) {
        $dataTreat = $this->treatment->getDataTreatment($id_treat);
        $harga = $dataTreat['BIAYA_TREATMENT'];
        $jumlah = $qty[$id_treat];
        $subtotal = $harga * $jumlah;
        $desc = isset($descriptions[$id_treat]) ? $descriptions[$id_treat] : '';

        $this->model->insertOrderDetail(
            $orderNum_treat,
            $id_treat,
            $jumlah,
            $harga,
            $subtotal,
            $desc
        );
    }

   header("location: index.php?page=home&aksi=view");
}

    public function Ordertreatment()
    {
        $isi = $this->treatment->getAllTreatment();
        require_once("view/order/order_treat.php");
    }

    public function deleteorder()
    {
        $nomor_order = $_GET['id'];
        $this->model->deleteOrder($nomor_order);
        header("location: index.php?page=home&aksi=view");
    }
    
    public function Order()
    {
        require_once("view/order/order.php");
    }
}