<?php
include "../../conf/config_apd.php";

// Peroleh ID APD dari parameter URL
$id_apd = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : "";

// Pastikan $id_apd adalah angka
if (!is_numeric($id_apd)) {
    die("Parameter ID APD tidak valid.");
}

// Query untuk mengambil data ukuran berdasarkan ID APD
$query = mysqli_query($koneksi, "SELECT * FROM tb_ukuran WHERE id_apd = '$id_apd'") or die(mysqli_error($koneksi));

// Bangun array untuk menyimpan data ukuran
$ukuranArray = array();

// Loop melalui hasil query dan tambahkan data ukuran ke array
while ($data = mysqli_fetch_assoc($query)) {
    $ukuranArray[] = array(
        'id' => $data['id_ukuran'],
        'nama' => $data['ukuran']
    );
}

// Mengembalikan data ukuran dalam format JSON
echo json_encode($ukuranArray);
?>
