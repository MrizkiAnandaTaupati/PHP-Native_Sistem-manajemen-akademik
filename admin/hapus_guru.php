<?php 
include "../koneksi.php";

$id_guru = $_GET["id"];

$koneksi -> query("DELETE FROM guru WHERE id_guru = '$id_guru'");

echo "<script>alert('data terhapus')</script>";
echo "<script>location = 'tampil_guru.php'</script>";
 ?>