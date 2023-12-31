<?php 
include "header.php";

$id_kelas = $_GET["id"];

$ambil_siswa_kelas = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa_kelas.id_siswa=siswa.id_siswa WHERE id_kelas = '$id_kelas'");

$siswa_kelas = array();

while ($tiap_siswa_kelas = $ambil_siswa_kelas->fetch_assoc()) 
{
	$siswa_kelas[] = $tiap_siswa_kelas;
}

$ambil_kelas = $koneksi ->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

$kelas = $ambil_kelas ->fetch_assoc();

$id_mengajar = $_GET["idm"];
$ambil_mengajar = $koneksi ->query("SELECT * FROM mengajar LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel WHERE mengajar.id_mengajar ='$id_mengajar'");
$mapel_mengajar = $ambil_mengajar->fetch_assoc();
// echo "<pre>";
// print_r($kelas);
// echo "</pre>";
?>
<div class="container">
	<div class="col-md-15 p-5 m-5 me-5 card bg-white shadow">
		<div class="table-responsive">
			<h5 class="fw-bold">Mata Pelajaran <?php echo $mapel_mengajar["nama_mapel"]; ?> <?php echo $kelas["nama_kelas"]; ?> Semester <?php echo $mapel_mengajar["semester"]; ?></h5>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>NISN</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($siswa_kelas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nisn_siswa"]; ?></td>
							<td><?php echo $value["nis_siswa"]; ?></td>
							<td><?php echo $value["nama_siswa"]; ?></td>
							<td nowrap="nowrap">
								<a href="tampil_nilai.php?id=<?php echo $value["id_siswa"]; ?>&idk=<?php echo $id_kelas; ?>&idm=<?php echo $id_mengajar ?>&ids=<?php echo $value["id_siswakelas"]; ?>" class="btn-sm btn btn-outline-success">Nilai</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php 
include "footer.php";
?>