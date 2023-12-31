<?php 
include"header.php";

$id_siswa = $_GET["id"];
$ambil_siswa_kelas = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa_kelas.id_siswa=siswa.id_siswa WHERE siswa.id_siswa ='$id_siswa'");

$siswa_kelas = $ambil_siswa_kelas ->fetch_assoc();

$id_kelas = $_GET["idk"];
$ambil_mengajar = $koneksi ->query("SELECT * FROM mengajar LEFT JOIN kelas ON mengajar.id_kelas = kelas.id_kelas WHERE kelas.id_kelas ='$id_kelas'");
$mengajar = $ambil_mengajar ->fetch_assoc();
$id_mengajar = $mengajar ["id_mengajar"];

// echo "<pre>";
// print_r($siswa_kelas);
// echo "</pre>";

?>
<div class="container">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama Siswa</label>
					<select class="form-control" name="id_siswakelas">
						<option value="<?php echo $siswa_kelas["id_siswakelas"]; ?>"><?php echo $siswa_kelas["nama_siswa"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Kelas</label>
					<select class="form-control" name="id_kelas">
						<option value="<?php echo $mengajar["id_mengajar"]; ?>"><?php echo $mengajar["nama_kelas"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Semester 1</label>
					<input type="number" name="semester_ganjil" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Semester 2</label>
					<input type="number" name="semester_genap" class="form-control">
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
	$siswa = $_POST["id_siswakelas"];
	$kelas = $_POST["id_kelas"];
	$semester_ganjil = $_POST["semester_ganjil"];
	$semester_genap = $_POST["semester_genap"];

	$koneksi ->query("INSERT INTO nilai(id_siswakelas,id_mengajar,semester_ganjil,semester_genap) VALUES('$siswa','$kelas','$semester_ganjil','$semester_genap')");

	echo "<script>alert('Selamat, Sudah Berhasil Menambahkan Nilai Siswa')</script>";
	echo "<script>location = 'siswa_kelas.php?id=$id_kelas&idm=$id_mengajar'</script>";
}

include "footer.php";
?>