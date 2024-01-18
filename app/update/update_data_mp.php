<?php
include('../../conf/config_apd.php');
$id				= $_POST['id'];
$nama			= $_POST['nama'];
$customer		= $_POST['customer'];
$area			= $_POST['area'];
$job			= $_POST['job'];

$query = mysqli_query($koneksi, "UPDATE tb_mp SET nama_mp='$nama',id_customer='$customer',id_area='$area',id_job='$job' WHERE id_mp='$id'");
header('Location: ../index.php?page=data-mp')
?>