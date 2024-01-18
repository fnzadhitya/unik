<?php
include('../../conf/config_apd.php');
$nama			= $_GET['nama'];
$query = mysqli_query($koneksi, "INSERT INTO tb_apd (id_apd,nama_apd) VALUES ('','$nama')");
header('Location: ../index.php?page=data-apd')

?>