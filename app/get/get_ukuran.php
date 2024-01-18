<?php
include "../../conf/config_apd.php";

$query = "SELECT * FROM tb_ukuran";
$result = $koneksi->query($query);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
$koneksi->close();
?>
