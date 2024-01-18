<?php
include('../../conf/config_apd.php');
$job			= $_GET['job'];
$query = mysqli_query($koneksi, "INSERT INTO tb_job (id_job,job) VALUES ('','$job')");
header('Location: ../index.php?page=data-job')

?>