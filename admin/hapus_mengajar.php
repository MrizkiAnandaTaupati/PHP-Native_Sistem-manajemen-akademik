<?php 
include "header.php";

$id_guru = $_GET["idg"];
$id_mengajar = $_GET["id"];
$koneksi ->query("DELETE FROM mengajar WHERE id_mengajar = '$id_mengajar'");

echo "<script>alert('Data Dihapus')</script>";
echo "<script>location='mengajar.php?id=$id_guru'</script>";
?>