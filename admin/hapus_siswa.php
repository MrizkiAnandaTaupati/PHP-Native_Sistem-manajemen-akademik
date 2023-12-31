<?php 
include "../koneksi.php";

$id_siswa = $_GET["id"];

$koneksi -> query("DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

echo "<script>alert('Data Siswa Berhasil Dihapus!!!')</script>";
echo "<script>location = 'tampil_siswa.php'</script>";
 ?>