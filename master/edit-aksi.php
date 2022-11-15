<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nama_usaha = $_POST['nama_usaha'];
$bidang_usaha = $_POST['bidang_usaha'];
$omset = $_POST['omset'];
$aset = $_POST['aset'];
$tenaga = $_POST['tenaga'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];


    $querys_mysql = "UPDATE data SET nama ='$nama',nama_usaha ='$nama_usaha',bidang_usaha ='$bidang_usaha',omset ='$omset',aset ='$aset',tenaga ='$tenaga',lat ='$lat',lng ='$lng' WHERE id_data='$id'";
    $result = $db->query($querys_mysql);
    header('location: cluster.php', true, 301);
?>