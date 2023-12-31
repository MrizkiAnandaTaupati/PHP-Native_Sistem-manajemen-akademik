<?php 
include "header.php";

$idk = $_GET["id"];
$koneksi -> query ("DELETE FROM kelas WHERE id_kelas = '$idk'");
		
		echo "<script>alert('Selamat Data Kelas Sudah Dihapus!!')</script>";
	 	echo "<script>location = 'tampil_kelas.php'</script>";
?>