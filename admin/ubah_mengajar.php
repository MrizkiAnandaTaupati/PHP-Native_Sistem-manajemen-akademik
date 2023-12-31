<?php 
include "header.php";

$id_mengajar = $_GET["id"];
$ambil = $koneksi -> query ("SELECT * FROM mengajar WHERE id_mengajar = '$id_mengajar'");
$mengajar = $ambil -> fetch_assoc();

$id_guru = $_GET["idg"];
$ambil_guru = $koneksi -> query("SELECT * FROM guru WHERE id_guru ='$id_guru'");
$guru = $ambil_guru ->fetch_assoc();

$ambil_mapel = $koneksi -> query ("SELECT * FROM mapel");

$mapel = array();
while($data_mapel = $ambil_mapel -> fetch_assoc())
{
	$mapel[] = $data_mapel;
}

$ambil_kelas = $koneksi -> query("SELECT * FROM kelas");
$kelas = array();
while($data_kelas = $ambil_kelas ->fetch_assoc())
{
	$kelas[] = $data_kelas;
}

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h4>Edit Mengajar</h4>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">	
				<div class="mb-3">
					<label class="form-label">Nama Guru</label>
					<select class="form-control" name="nama_guru">
						<option value="<?php echo $guru['id_guru']; ?>" <?php if($mengajar["id_guru"]==$guru["id_guru"]) {echo "selected";} ?>>
							<?php echo $guru["nama_guru"]; ?>
						</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Mata Pelajaran</label>
					<select class="form-control" name="nama_mapel">
						<option>PILIH</option>
						<?php foreach ($mapel as $key => $value): ?>
							<option value="<?php echo $value["id_mapel"]; ?>" <?php if($mengajar["id_mapel"]==$value["id_mapel"]) {echo "selected";}?>>
								<?php echo $value["nama_mapel"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Kelas</label>
					<select class="form-control" name="kelas">
						<option>PILIH</option>
						<?php foreach ($kelas as $key => $vk): ?>
							<option value="<?php echo $vk["id_kelas"]; ?>" <?php if($mengajar["id_kelas"]==$vk["id_kelas"]) {echo "selected";}?>>
								<?php echo $vk["nama_kelas"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label" >KKM</label>
					<input type="text" name="kkm" class="form-control" value="<?php echo $mengajar["kkm"]; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Semester</label>
					<select class="form-control" name="semester">
						<option value="">PILIH</option>
						<option value="ganjil" <?php if($mengajar["semester"]=="ganjil"){echo "selected";} ?>>Ganjil</option>
						<option value="genap" <?php if($mengajar["semester"]=="genap"){echo "selected";} ?>>Genap</option>
					</select>
				</div>
				<div>
					<button class="btn btn-outline-primary" name="simpan">simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"]))
{
	$nama = $_POST["nama_guru"];
	$mapel = $_POST["nama_mapel"];
	$kelas = $_POST["kelas"];
	$kkm = $_POST["kkm"];
	$semester = $_POST["semester"];

	$koneksi -> query("UPDATE mengajar SET
		id_guru = '$nama',
		id_mapel = '$mapel',
		id_kelas = '$kelas',
		kkm = '$kkm',
		semester = '$semester' WHERE id_mengajar = '$id_mengajar'");

	echo "<script>alert('Data Diubah')</script>";
	echo "<script>location = 'mengajar.php?id=$id_guru'</script>";

}

include "footer.php";
?>