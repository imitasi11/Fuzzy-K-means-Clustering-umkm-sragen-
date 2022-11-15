<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$omset = $_POST['omset'];
$aset = $_POST['aset'];
$tenaga = $_POST['tenaga'];

    $querys_mysql = "UPDATE cluster SET nama ='$nama',omset ='$omset',aset ='$aset',tenaga ='$tenaga' WHERE id_cluster='$id'";
    $result = $db->query($querys_mysql);
    header('location: class.php', true, 301);
?>