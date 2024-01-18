<?php
include('../../conf/config_apd.php');
$id				= $_POST['id'];
$nama			= $_POST['nama'];

$query = mysqli_query($koneksi, "UPDATE tb_apd SET nama_apd='$nama' WHERE id_apd='$id'");
header('Location: ../index.php?page=data-apd')
?>