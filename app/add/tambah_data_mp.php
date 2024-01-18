<?php
include('../../conf/config_apd.php');
$nrp			= $_GET['nrp'];
$nama			= $_GET['nama'];
$customer		= $_GET['customer'];
$area			= $_GET['area'];
$job			= $_GET['job'];
$query = mysqli_query($koneksi, "INSERT INTO tb_mp (id_mp,nrp_mp,nama_mp,id_customer,id_area,id_job) VALUES ('','$nrp','$nama','$customer','$area','$job')");
header('Location: ../index.php?page=data-mp')

?>