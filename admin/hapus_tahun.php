<?php 
include "../koneksi.php";
$th = $_GET["id"];
$koneksi -> query("DELETE FROM tahun WHERE  id_tahun = '$th'");

echo "<script>alert('Data Dihapus')</script>";
echo "<script>location='tampil_tahun.php'</script>";
 ?>