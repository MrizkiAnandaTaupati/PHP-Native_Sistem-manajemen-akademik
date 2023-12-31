<?php 
include "header.php";

$ambil_jurusan = $koneksi -> query ("SELECT * FROM jurusan");
$jurusan = array();
while($data = $ambil_jurusan -> fetch_assoc())
{ 
	$jurusan[]= $data;
}

$ambil_tahun = $koneksi -> query ("SELECT * FROM tahun");
$tahun = array();
while($data = $ambil_tahun -> fetch_assoc())
{
	$tahun[] = $data;
}
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Jurusan</label>
					<select class="form-control" name="nama_jurusan">
						<option value="">Pilih Jurusan</option>
						<?php foreach ($jurusan as $key => $value): ?>
							<option value="<?php echo $value["id_jurusan"]; ?>">
								<?php echo $value["nama_jurusan"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Tahun Ajaran</label>
					<select class="form-control" name="tahun_ajaran">
						<option value="">--Pilih--</option>
						<?php foreach ($tahun as $key => $value): ?>
							<option value="<?php echo $value["id_tahun"] ?>">
								<?php echo $value["tahun_ajaran"] ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Nama Kelas</label>
					<input type="text" name="namakelas" class="form-control">
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
	$tahun_ajaran = $_POST["tahun_ajaran"];
	$nama_kelas   = $_POST["namakelas"];

	$koneksi ->query("INSERT INTO kelas(id_jurusan,nama_kelas,id_tahun) VALUES('$nama_jurusan','$nama_kelas','$tahun_ajaran')");

	echo "<script>alert('berhasil menambahkan data')</script>";
	echo "<script>location = 'tampil_kelas.php'</script>";

}


include "footer.php";
?>