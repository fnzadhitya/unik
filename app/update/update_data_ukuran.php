<?php
include('../../conf/config_apd.php');
$id				= $_POST['id'];
$ukuran			= $_POST['ukuran'];
$uom			= $_POST['uom'];

$query = mysqli_query($koneksi, "UPDATE tb_ukuran SET ukuran='$ukuran',uom='$uom' WHERE id_ukuran='$id'");
header('Location: ../index.php?page=data-ukuran')
?>