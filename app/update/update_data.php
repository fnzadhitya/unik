<?php
include('../../conf/config_apd.php');
$id			= $_POST['id'];
$periode	= $_POST['periode'];
$apd		= $_POST['apd'];
$ukuran		= $_POST['ukuran'];
$jumlah		= $_POST['jumlah'];
$kirim		= $_POST['kirim'];
$resi		= $_POST['resi'];

$query = mysqli_query($koneksi, "UPDATE tb_data_seragam SET periode='$periode',id_apd='$apd',id_ukuran='$ukuran',jumlah='$jumlah', tanggal_kirim='$kirim', no_resi='$resi' WHERE id='$id'");
header('Location: ../index.php?page=data-pengiriman')
?>