<?php 
include "../koneksi.php";

$id_jurusan = $_GET["idj"];

$id_siswa_kelas = $_GET["id"];

$id_kelas = $_GET["idk"];

$id_mengajar = $_GET['idm'];

$koneksi ->query("DELETE FROM siswa_kelas WHERE id_siswakelas = '$id_siswa_kelas'");

echo "<script>alert('Siswa Berhasil Terhapus')</script>";
echo "<script>location = 'detail_siswa.php?id=$id_kelas&idj=$id_jurusan&idm=$id_mengajar'</script>";


?>