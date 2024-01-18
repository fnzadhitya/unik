<?php
include('../../conf/config_apd.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tb_data_seragam WHERE id='$id'");
header('Location: ../index.php?page=data-pengiriman')
?>