<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$nama_usaha = $_POST['nama_usaha'];
$bidang_usaha = $_POST['bidang_usaha'];
$omset = $_POST['omset'];
$aset = $_POST['aset'];
$tenaga = $_POST['tenaga'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

 	$querys_mysql = "INSERT INTO data VALUES(NULL,'$nama','$nama_usaha','$bidang_usaha','$omset','$aset','$tenaga',1,'$lng','$lat')";
    $result = $db->query($querys_mysql);
    header('location: cluster.php', true, 301);
?>