<?php 
include "../koneksi.php";

$id_mapel = $_GET["id"];

$koneksi -> query("DELETE FROM mapel WHERE id_mapel = '$id_mapel'");

echo "<script>alert('Mata Pelajaran Berhasil Dihapus!!!')</script>";
echo "<script>location = 'tampil_mapel.php'</script>";
 ?>