<?php
include('../../conf/config_apd.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tb_job WHERE id='$id'");
header('Location: ../index.php?page=data-job')
?>