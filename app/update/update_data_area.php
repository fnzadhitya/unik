<?php
include('../../conf/config_apd.php');
$id				= $_POST['id'];
$nama			= $_POST['nama'];

$query = mysqli_query($koneksi, "UPDATE tb_area SET nama_area='$nama' WHERE id_area='$id'");
header('Location: ../index.php?page=data-area')
?>