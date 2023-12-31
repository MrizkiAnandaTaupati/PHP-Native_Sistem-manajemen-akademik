<?php 
include "header.php";
$id_nilai = $_GET["idn"];
$id_mengajar = $_GET["idm"];
$id_siswakelas = $_GET["ids"];
$id_siswa = $_GET["idss"];
$id_kelas = $_GET["idkls"];

//mengambil nilai yang ingin diubah
$ambil_nilai = $koneksi -> query("SELECT * FROM nilai WHERE id_nilai = '$id_nilai' AND WHERE id_mengajar = '$id_mengajar'");
$nilai = $ambil_nilai -> fetch_assoc();
?>
<div class="card">
	<div class="card-body">
		<h3>Ubah Nilai</h3>
		<hr>
		<div class="col-md-6">
			<form method="post">
				<div class="mb-3">
					<label class="form-label">Nilai Siswa</label>
					<input type="number" name="nilai" class="form-control" value="<?php echo $nilai["nilai"]; ?>">
				</div>
				<button class="btn btn-primary" name="simpan">Simpan</button>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) 
{
	//dapatkan data yang di inputkan di formulir
	$n = $_POST["nilai"];

	$koneksi -> query("UPDATE nilai SET 
		id_siswakelas = '$id_siswakelas',
		id_mengajar = '$id_mengajar',
		nilai = '$n' WHERE id_nilai = '$id_nilai'");

	echo "<script>alert('Nilai berhasil diubah')</script>";
	echo "<script>location = 'tampil_nilai.php?id=$id_siswa&idk=$id_kelas&idm=$id_mengajar'</script>";
}
include "footer.php";
?>