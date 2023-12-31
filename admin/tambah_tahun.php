<?php  
include "header.php";

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h4>Tambah Tahun Ajaran</h4>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3"> 
					<label class="form-label">Tahun Ajaran</label>
					<input type="text" class="form-control" name="tahun">
				</div>
				<div>
					<button class="btn btn-outline-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST["simpan"]))
{
	$tahun = $_POST["tahun"];
	$koneksi -> query ("INSERT INTO tahun(tahun_ajaran)VALUES('$tahun')");

	echo "<script>alert('Data Berhasil Ditambahkan Dan Disimpan')</script>";
	echo "<script>location='tampil_tahun.php'</script>";
}
?>