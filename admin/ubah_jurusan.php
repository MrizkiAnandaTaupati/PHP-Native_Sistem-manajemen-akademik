<?php 
include "header.php";


$id_jurusan = $_GET["id"];

$ambil_jurusan = $koneksi -> query ("SELECT * FROM jurusan WHERE id_jurusan = '$id_jurusan'");

$jurusan = $ambil_jurusan ->fetch_assoc();

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Edit Jurusan</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama Jurusan</label>
					<input class="form-control" type="text" name="nama_jurusan" value="<?php echo $jurusan["nama_jurusan"]; ?>">
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
	$pilih = $_POST["nama_jurusan"];
	$koneksi -> query("UPDATE jurusan SET nama_jurusan = '$pilih' WHERE id_jurusan = '$id_jurusan'");
	
	echo "<script>alert('Selamat Anda Berhasil Mengubah Jurusan')</script>";
	echo "<script>location='jurusan.php'</script>";
}






include "footer.php";
?>
