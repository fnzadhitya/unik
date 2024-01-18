<?php
include('../../conf/config_apd.php');
$nama			= $_GET['nama'];
$query = mysqli_query($koneksi, "INSERT INTO tb_area (id_area,nama_area) VALUES ('','$nama')");
header('Location: ../index.php?page=data-area')

?>