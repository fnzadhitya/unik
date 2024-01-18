<?php 
include ('../conf/config_apd.php');

$periode = $_POST['periode'];

// Ambil semua APD dari tabel tb_apd
$apd_query = mysqli_query($koneksi, "SELECT id_apd, nama_apd FROM tb_apd");
$apds = array();

while ($apd_row = mysqli_fetch_assoc($apd_query)) {
    $apds[$apd_row['id_apd']] = $apd_row['nama_apd'];
}

$data = array();

if ($periode == '') {
    // Jika memilih opsi "Semua Periode"
    foreach ($apds as $id_apd => $nama_apd) {
        // Ambil jumlah pengiriman dari tb_data_seragam untuk setiap APD
        $jumlah_pengiriman = mysqli_query($koneksi, "SELECT COUNT(id_apd) AS total_pengiriman FROM tb_data_seragam WHERE id_apd = $id_apd");
        $row = mysqli_fetch_assoc($jumlah_pengiriman);
        $total_pengiriman = $row['total_pengiriman'];

        $data[] = array(
            'nama_apd' => $nama_apd,
            'jumlah_pengiriman' => $total_pengiriman
        );
    }
} else {
    // Jika memilih periode tertentu
    $query = mysqli_query($koneksi, "SELECT id_apd, COUNT(id_apd) AS jumlah_pengiriman FROM tb_data_seragam WHERE periode = '$periode' GROUP BY id_apd");

    while ($row = mysqli_fetch_assoc($query)) {
        $id_apd = $row['id_apd'];
        $jumlah_pengiriman = $row['jumlah_pengiriman'];

        // Masukkan data pengiriman yang ada ke dalam array
        $data[] = array(
            'nama_apd' => $apds[$id_apd], // Ambil nama APD dari array apds
            'jumlah_pengiriman' => $jumlah_pengiriman
        );

        // Hapus APD yang sudah memiliki data pengiriman dari array apds
        unset($apds[$id_apd]);
    }
}

// Sisipkan APD yang tidak memiliki data pengiriman ke dalam hasil akhir
foreach ($apds as $id_apd => $nama_apd) {
    $data[] = array(
        'nama_apd' => $nama_apd,
        'jumlah_pengiriman' => 0 // Set jumlah pengiriman menjadi 0 untuk APD yang tidak memiliki data pengiriman
    );
}

header('Content-Type: application/json');
echo json_encode($data);
?>
