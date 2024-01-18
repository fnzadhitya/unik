<?php
include('../../conf/config_apd.php');
$ukuran			= $_GET['ukuran'];
$uom			= $_GET['uom'];
$query = mysqli_query($koneksi, "INSERT INTO tb_ukuran (id_ukuran,ukuran,uom) VALUES ('','$ukuran','$uom')");
header('Location: ../index.php?page=data-ukuran')

?>