<?php
include('../../conf/config_apd.php');
$nama			= $_GET['nama'];
$query = mysqli_query($koneksi, "INSERT INTO tb_customer (id_customer,nama_customer) VALUES ('','$nama')");
header('Location: ../index.php?page=data-customer')

?>