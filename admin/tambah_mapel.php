<?php 
include "header.php";
?>

<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Tambah Mata Pelajaran</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label>Nama Mata Pelajaran</label>
					<input type="text" class="form-control" name="nama_mapel">
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

	$koneksi ->query("INSERT INTO mapel(nama_mapel) VALUES('$namamapel')");
	echo "<script>alert('berhasil menambahkan data mata pelajaran')</script>";
	echo "<script>location = 'tampil_mapel.php'</script>";

}

?>