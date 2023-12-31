<?php 
include "header.php";

$id_kelas = $_GET["id"];

$ambil_kelas = $koneksi -> query ("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

$kelas = $ambil_kelas ->fetch_assoc();

$ambil_jurusan= $koneksi -> query("SELECT * FROM jurusan");

$jurusan = array();

while ($tiap_jurusan = $ambil_jurusan->fetch_assoc()) 
{
    $jurusan[] = $tiap_jurusan; 
}
$ambil_tahun= $koneksi -> query("SELECT * FROM tahun");

$tahun = array();

while ($tiap_tahun = $ambil_tahun->fetch_assoc()) 
{
    $tahun[] = $tiap_tahun; 
}


?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Edit Kelas</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Jurusan</label>
					<select class="form-control" name="nama_jurusan">
						<option value="">Pilih Jurusan</option>
						<?php foreach ($jurusan as $key => $value): ?>
							<option value="<?php echo $value["id_jurusan"]; ?>" <?php if($value["id_jurusan"]==$kelas["id_jurusan"]){echo "selected";} ?>  >
								<?php echo $value["nama_jurusan"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Tahun Ajaran</label>
					<select class="form-control" name="tahun_ajaran">
						<option value="">--Pilih--</option>
						<?php foreach ($tahun as $kt => $vt): ?>
							<option value="<?php echo $vt["id_tahun"] ?>" <?php if ($kelas["id_tahun"]==$vt["id_tahun"]) {echo "selected";} ?>> 
								<?php echo $vt["tahun_ajaran"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Nama Kelas</label>
					<input type="text" name="namakelas" class="form-control" value="<?php echo $kelas["nama_kelas"]; ?>">
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
	$jurusan = $_POST["nama_jurusan"];
	$tahun_ajaran  = $_POST["tahun_ajaran"];
	$nama_kelas   = $_POST["namakelas"];
	$koneksi -> query("UPDATE kelas SET id_jurusan = '$jurusan',
		nama_kelas = '$nama_kelas',
		id_tahun = '$tahun_ajaran' WHERE id_kelas ='$id_kelas'");

	echo "<script>alert('Data Diubah')</script>";
	echo "<script>location = 'tampil_kelas.php'</script>";
}


include "footer.php";
?>