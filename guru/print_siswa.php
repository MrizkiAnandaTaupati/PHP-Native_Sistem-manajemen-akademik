<?php 
include "header.php";
$id_mengajar = $_GET["idm"];
$id_siswa = $_GET["id"];
$id_kelas = $_GET["idk"];

$ambil_mengajar = $koneksi ->query("SELECT * FROM mengajar LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel WHERE mengajar.id_mengajar ='$id_mengajar'");
$mapel_mengajar = $ambil_mengajar->fetch_assoc();

$ambil_siswakelas = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa.id_siswa =siswa_kelas.id_siswa WHERE siswa_kelas.id_siswa ='$id_siswa'");

$siswa = $ambil_siswakelas ->fetch_assoc();
$id_siswakelas = $siswa["id_siswakelas"];
// echo "<pre>";
// print_r($id_mengajar);
// echo "</pre>";

$ambil_kelas = $koneksi ->query("SELECT * FROM kelas WHERE id_kelas ='$id_kelas'");
$kelas = $ambil_kelas ->fetch_assoc();


$ambil_nilai = $koneksi ->query ("SELECT * FROM nilai WHERE id_siswakelas = '$id_siswakelas'");
$nilai = $ambil_nilai ->fetch_assoc();
?>
<div class="container">
	<div class="col-md-15 p-5 m-5 me-5 card bg-white shadow">
		<h4 class="my-3">Formulir Siswa</h4>
		<hr>
		<div class="text-center">
			<img src="../asset/file/<?php echo $siswa["foto_siswa"]; ?>" width="270" class="img-fluid">
			<div class="row">
				<div class="col-8 offset-2 mt-3">
					<div class="table">
						<table class="table table-bordered shadow">
							<tr>
								<th width="30%" class="text-start">NISN Siswa</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nisn_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NIS Siswa</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nis_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NAMA</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nama_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">Nilai Semester <?php echo $mapel_mengajar["semester"]; ?></th>
								<td class="text-start"> <?php if (isset($nilai["nilai"])): ?>
								<?php echo $nilai["nilai"]; ?>
								
							<?php else: ?>
								<form method="post">
									<input type="number" name="nilai" class="form-control-sm form-control">
									<br>
									
									<?php 
									if (isset($_POST["simpan"])) 
									{
										$siswa = $id_siswakelas;
										$kelas = $id_mengajar;
										$nilai = $_POST["nilai"];

										$koneksi ->query("INSERT INTO nilai(id_siswakelas,id_mengajar,nilai) VALUES('$siswa','$kelas','$nilai')");

										echo "<script>alert('Selamat, Sudah Berhasil Menambahkan Nilai Siswa')</script>";
										echo "<script>location = 'tampil_nilai.php?idk=$id_kelas&idm=$id_mengajar&id=$id_siswa'</script>";
									}
									?>
								</form>
								<?php endif ?> </td>
							</tr>
						</table>
					</div>
					<script type="text/javascript"> print();</script>
				</div>
			</div>
			</div>
		</div>
	</div>



	<?php 
	include "footer.php";
?>