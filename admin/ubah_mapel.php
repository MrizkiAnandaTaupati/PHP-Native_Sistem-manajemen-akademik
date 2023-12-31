<?php 
include "header.php";

$id_mapel = $_GET["id"];

$ambil_mapel = $koneksi ->query("SELECT * FROM mapel WHERE id_mapel = '$id_mapel'");

$mapel = $ambil_mapel->fetch_assoc();
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Edit Mata Pelajaran</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label>Nama Mata Pelajaran</label>
					<input type="text" class="form-control" name="nama_mapel" value="<?php echo $mapel["nama_mapel"] ?>">
				</div>
				<div class="mb-3">
					<button class="btn btn-outline-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) 
{
	$namamapel = $_POST["nama_mapel"];

	$koneksi -> query("UPDATE mapel SET nama_mapel = '$namamapel' WHERE id_mapel = '$id_mapel'");

	echo "<script>alert('Berhasil Merubah Mata Pelajaran!!!')</script>";
 	echo "<script>location = 'tampil_mapel.php'</script>";
}

include 'footer.php';
 ?>