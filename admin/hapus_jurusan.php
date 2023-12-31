<?php 
include "header.php";

$id_jurusan = $_GET["id"];

$koneksi -> query("DELETE FROM jurusan WHERE  id_jurusan = '$id_jurusan'");

echo "<script>alert('Data Jurusan Ini Berhasil Dihapus!')</script>";
echo "<script>location='jurusan.php'</script>";
?>