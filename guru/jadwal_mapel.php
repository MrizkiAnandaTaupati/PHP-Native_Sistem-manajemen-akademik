<?php 
include "header.php";

$id_guru = $_GET["id"];
$ambil = $koneksi -> query ("SELECT * FROM mengajar LEFT JOIN kelas ON mengajar.id_kelas = kelas.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun WHERE id_mapel = '$idg' AND id_guru = '$id_guru' ");

$mapel = array();
while ($data = $ambil -> fetch_assoc()) 
{
	$mapel[] = $data;
}

$ambil_mapel = $koneksi -> query("SELECT * FROM mapel WHERE id_mapel = '$idg'");
$nama_mapel = $ambil_mapel -> fetch_assoc(); 

?>