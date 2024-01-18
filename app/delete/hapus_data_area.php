<?php
include('../../conf/config_apd.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tb_area WHERE id_area='$id'");
header('Location: ../index.php?page=data-area')
?>