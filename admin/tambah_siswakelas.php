<?php 
include "header.php";

$id_kelas = $_GET["id"];
$id_jurusan = $_GET["idj"];
$id_mengajar = $_GET["idm"];

$ambil_siswa = $koneksi -> query ("SELECT * FROM siswa LEFT JOIN jurusan ON jurusan.id_jurusan = siswa.id_jurusan WHERE jurusan.id_jurusan = '$id_jurusan'");

$siswa = array();

while($tiap_siswa = $ambil_siswa -> fetch_assoc())
{
	$siswa[]= $tiap_siswa;
}

$ambil_kelas = $koneksi ->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

$kelas = $ambil_kelas ->fetch_assoc();

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Kelas</label>
					<select class="form-control" name="id_kelas">
							<option value="<?php echo $id_kelas; ?>"><?php echo $kelas["nama_kelas"]; ?></option>
						</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Nama SISWA/ Jurusan</label>
					<select class="form-control" name="id_siswa">
							<option value="">PILIH SISWA</option>
						<?php foreach ($siswa as $key => $value): ?>
							<option value="<?php echo $value["id_siswa"]; ?>">
								<?php echo $value["nama_siswa"]; ?> / <?php echo $value["nama_jurusan"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<button class="btn btn-outline-primary" name="simpan">SIMPAN</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) 
{
	$ikel = $_POST["id_kelas"];
	$dasis = $_POST["id_siswa"];

	$koneksi ->query("INSERT INTO siswa_kelas(id_siswa,id_kelas) VALUES('$dasis','$ikel')");

	echo "<script>alert('berhasil menambahkan data')</script>";
	echo "<script>location = 'detail_siswa.php?id=$id_kelas&idj=$id_jurusan&idm=$id_mengajar'</script>";
}

include "footer.php";
?>

