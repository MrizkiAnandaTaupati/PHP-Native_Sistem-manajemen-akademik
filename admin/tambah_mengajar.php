<?php 
include "header.php";

$id_guru = $_GET["id"];

$ambil_mengajar = $koneksi -> query("SELECT * FROM mengajar WHERE id_guru ='$id_guru'");

$mengajar = $ambil_mengajar ->fetch_assoc();

$ambil_guru = $koneksi -> query ("SELECT * FROM guru WHERE id_guru = '$id_guru'");

$guru = $ambil_guru -> fetch_assoc();

$ambil_mapel = $koneksi -> query ("SELECT * FROM mapel");

$mapel = array();
while($data_mapel = $ambil_mapel -> fetch_assoc())
{
	$mapel[] = $data_mapel;
}

$ambil_kelas = $koneksi -> query("SELECT * FROM kelas LEFT JOIN tahun ON kelas.id_tahun=tahun.id_tahun");

$kelas = array();

while($data_kelas = $ambil_kelas -> fetch_assoc())
{
	$kelas[] = $data_kelas;
}
// echo "<pre>";
// print_r($guru);
// echo "</pre>";
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h4>Tambah Jam Mengajar</h4>
		<hr>
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data"> 
				<div class="mb-3">
					<label class="form-label">Nama Guru</label>
					<select class="form-control" name="nama_guru">
						<option value="<?php echo $guru["id_guru"] ?>"><?php echo $guru["nama_guru"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Mata Pelajaran</label>
					<select class="form-control" name="mapel">
						<option>PILIH</option>
						<?php foreach ($mapel as $key => $value): ?>
							<option value="<?php echo $value["id_mapel"]; ?>">
								<?php echo $value["nama_mapel"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Kelas</label>
					<select class="form-control" name="kelas">
						<option>PILIH</option>
						<?php foreach ($kelas as $key => $value): ?>
							<option value="<?php echo $value["id_kelas"]; ?>">
								<?php echo $value["tahun_ajaran"].' - '.$value["nama_kelas"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label" >KKM</label>
					<input type="text" name="kkm" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label">Semester</label>
					<select class="form-control" name="semester">
						<option value="">PILIH</option>
						<option value="ganjil">Ganjil</option>
						<option value="genap">Genap</option>
					</select>
				</div>
				<div>
					<button class="btn btn-outline-primary" name="simpan">Simpan</button>
				</form>
			</div>
		</div>
	</div>
<?php 
if (isset($_POST["simpan"]))
{
 $nama = $_POST["nama_guru"];
 $mapel = $_POST["mapel"];
 $kelas = $_POST["kelas"];
 $kkm = $_POST["kkm"];
 $semester = $_POST["semester"];

 $koneksi -> query ("INSERT INTO  mengajar(id_guru,id_mapel,id_kelas,kkm,semester)
  VALUES('$nama','$mapel','$kelas','$kkm','$semester')");

 echo "<script>alert('Data Ditambahkan')</script>";
 echo "<script>location = 'mengajar.php?id=$guru[id_guru]'</script>";
}


include "footer.php";
?>