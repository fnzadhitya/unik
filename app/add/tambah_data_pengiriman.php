<?php
include('../../conf/config_apd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nrpArray = $_POST['nrp'];
    $periodeArray = $_POST['periode'];
    $jumlahArray = $_POST['jumlah'];
    $apdArray = $_POST['apd'];
    $ukuranArray = $_POST['ukuran'];
    $tanggalKirim = $_POST['kirim'];
    $nomorResi = $_POST['resi'];

    foreach ($nrpArray as $nrp) {
        if (empty($nrp)) {
            header('Location: ../index.php?page=data-pengiriman&error=true&message=NRP tidak boleh kosong');
            exit;
        }
    }

    foreach ($periodeArray as $periode) {
        if (empty($periode)) {
            header('Location: ../index.php?page=data-pengiriman&error=true&message=Periode tidak boleh kosong');
            exit;
        }
    }

    $queryInsert = mysqli_prepare($koneksi, "INSERT INTO tb_data_seragam (nrp, nama, periode, jumlah, id_apd, id_ukuran, tanggal_kirim, no_resi) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_begin_transaction($koneksi);
    $success = true;

    for ($i = 0; $i < count($nrpArray); $i++) {
        $nrp = $nrpArray[$i];
        $periode = $periodeArray[$i];
        $jumlah = $jumlahArray[$i];
        $apd = $apdArray[$i];
        $ukuran = $ukuranArray[$i];
        $kirim = $kirimArray[$i];
        $resi = $resiArray[$i];

        $queryNama = mysqli_prepare($koneksi, "SELECT nama_mp FROM tb_mp WHERE nrp_mp = ?");
        mysqli_stmt_bind_param($queryNama, "s", $nrp);
        mysqli_stmt_execute($queryNama);
        mysqli_stmt_bind_result($queryNama, $nama);
        mysqli_stmt_fetch($queryNama);
        mysqli_stmt_close($queryNama);

        mysqli_stmt_bind_param($queryInsert, "ssssssss", $nrp, $nama, $periode, $jumlah, $apd, $ukuran, $tanggalKirim, $nomorResi);
        $result = mysqli_stmt_execute($queryInsert);

        if (!$result) {
            $success = false;
            break;
        }
    }

    if ($success) {
        mysqli_commit($koneksi);
        header('Location: ../index.php?page=data-pengiriman');
        exit;
    } else {
        mysqli_rollback($koneksi);
        header('Location: ../index.php?page=data-pengiriman&error=true&message=' . mysqli_error($koneksi));
        exit;
    }

    mysqli_stmt_close($queryInsert);
    mysqli_close($koneksi);
} else {
    // Handle jika bukan request POST
    header('Location: ../index.php?page=data-pengiriman&error=true&message=Metode pengiriman data tidak valid');
    exit;
}
?>
