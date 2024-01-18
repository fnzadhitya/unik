<?php
include('../../conf/config_apd.php');
$id				= $_POST['id'];
$job			= $_POST['job'];

$query = mysqli_query($koneksi, "UPDATE tb_job SET job='$job' WHERE id_job='$id'");
header('Location: ../index.php?page=data-job')
?>