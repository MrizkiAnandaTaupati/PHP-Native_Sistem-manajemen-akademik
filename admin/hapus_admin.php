<?php 
$koneksi = new mysqli("localhost","root","","aplikasimancilacap");

$id_admin = $_GET["id"];

$koneksi -> query("DELETE FROM admin WHERE id_admin = '$id_admin'");

echo "<script>alert('data terhapus')</script>";
echo "<script>location = 'tampil_admin.php'</script>";