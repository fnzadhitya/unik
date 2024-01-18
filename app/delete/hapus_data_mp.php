<?php
include('../../conf/config_apd.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tb_mp WHERE id_mp='$id'");
header('Location: ../index.php?page=data-mp')
?>