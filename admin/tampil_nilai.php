<?php 
include "header.php";

$id_mengajar = $_GET["idm"];
$id_siswa = $_GET['id'];

$ambil_nilai = $koneksi ->query("SELECT * FROM nilai LEFT JOIN siswa_kelas ON siswa_kelas.id_siswakelas = nilai.id_siswakelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel WHERE siswa_kelas.id_siswa = '$id_siswa' AND mengajar.id_mengajar = '$id_mengajar'");

$nilai = array();

while ($tiap_nilai = $ambil_nilai ->fetch_assoc()) 
{
	$nilai[] = $tiap_nilai;
}

$ambil_siswa = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa WHERE siswa.id_siswa = '$id_siswa'");
$siswa = $ambil_siswa ->fetch_assoc();

// echo "<pre>";
// print_r($nilai);
// echo "</pre>";
?>
<div class="container">
	<div class="p-5 m-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Nilai Siswa</h4>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<table class="table">
						<tr>
							<th>Nama Siswa</th>
							<td> : <?php echo $siswa["nama_siswa"]; ?></td>
						</tr>
						<tr>
							<th>NISN Siswa</th>
							<td> : <?php echo $siswa["nisn_siswa"]; ?></td>
						</tr>
						<tr>
							<th>NIS Siswa</th>
							<td> : <?php echo $siswa["nis_siswa"]; ?></td>
						</tr>
						<tr>
							<th>Telp Siswa</th>
							<td> : <?php echo $siswa["hp_siswa"]; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="table-responsive">
				<table id="datatabel" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Mata Pelajaran</th>
							<th>KKM</th>
							<th>Nilai Semester Ganjil</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($nilai as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_mapel"]; ?></td>
								<td><?php echo $value["kkm"]; ?></td>
								<?php if ($value["nilai"]==0): ?>
									<td>Nilai Belum Ada</td>
								<?php else: ?>
									<td><?php echo $value["nilai"]; ?></td>
								<?php endif ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>






<?php 
include "footer.php";
?>