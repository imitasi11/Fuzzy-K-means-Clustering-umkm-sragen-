<?php
	include "koneksi.php";
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	
	$query = "select * from login where user = '".$_POST['username']."' and pass ='".$_POST['password']."'";
	$hasil = mysqli_query($connect,$query);
	$row  = mysqli_fetch_array($hasil);
	$cekrow = mysqli_num_rows($hasil);
	
	//session_destroy();
	//profil echo
	
	
	if ($cekrow==1){
	session_start();
	$_SESSION['username'] = $user;

	header("location:index.php");
	}
	else{
	echo "<script>alert('Username atau password anda salah, silahkan ulangi lagi');window.location='LOGIN.php'</script>";
}
?>