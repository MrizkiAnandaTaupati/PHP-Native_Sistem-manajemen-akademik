<?php 
include "header.php";



$tid = $_GET["id"];
$ambil = $koneksi -> query ("SELECT * FROM tahun WHERE id_tahun = '$tid'");
$tahun = $ambil ->fetch_assoc();
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h4>Edit Tahun Ajaran</h4>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3"> 
					<label class="form-label">Tahun Ajaran</label>
					<input type="text" class="form-control" name="tahun" value="<?php echo $tahun["tahun_ajaran"]; ?>">
				</div>
				<div>
					<button class="btn btn-outline-primary" name="simpan">Simpan</button>
					<a href="tampil_tahun.php" class="btn btn-danger">Kembali</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) 
{
	$tahun = $_POST["tahun"];
	$koneksi -> query("UPDATE tahun SET tahun_ajaran = '$tahun' WHERE id_tahun ='$tid'");

	echo "<script>alert('Data Diubah')</script>";
	echo "<script>location = 'tampil_tahun.php'</script>";
}


include "footer.php";
?>