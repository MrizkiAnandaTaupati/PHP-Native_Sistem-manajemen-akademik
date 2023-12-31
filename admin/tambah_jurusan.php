<?php 
include "header.php";


?>

<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label>Tambah Jurusan</label>
					<input class="form-control" type="text" name="nama_jurusan">
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
	$nama_jurusan = $_POST["nama_jurusan"];

	$koneksi ->query("INSERT INTO jurusan(nama_jurusan) VALUES('$nama_jurusan')");

	echo "<script>alert('Selamat Anda Berhasil menambahkan Jurusan Terbaru')</script>";
	echo "<script>location = 'jurusan.php'</script>";

}


include "footer.php";
?>