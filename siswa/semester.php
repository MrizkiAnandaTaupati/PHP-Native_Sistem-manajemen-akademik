<?php 
include "header.php";
$id_kelas = $_GET["id"];
//mengambil data siswa kelas berdasarkan siswa yang login
$ambil_sk = $koneksi -> query("SELECT * FROM mengajar LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun WHERE mengajar.id_kelas = '$id_kelas'");
$sk = array();
while ($tiap_sk = $ambil_sk -> fetch_assoc()) 
{
	$sk[] = $tiap_sk;
}

$ambil_sikel = $koneksi -> query("SELECT * FROM siswa_kelas WHERE id_siswa = '$id_siswa'");
$sikel = $ambil_sikel -> fetch_assoc();
// echo "<pre>";
// print_r($sikel);
// echo "</pre>";
?>
<div class="card bg-white shadow mt-3">
	<div class="card-body">	
		<h4>Tahun Ajaran</h4>
		<hr>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatabel">
				<thead>
					<tr>
						<th>No</th>
						<th>Semester</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sk as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["semester"]; ?> - <?php echo $value["tahun_ajaran"]; ?></td>
							<td>
								<a href="nilai.php?ids=<?php echo $sikel["id_siswakelas"]; ?>&idm=<?php echo $value["id_mengajar"]; ?>" class="btn-sm btn btn-outline-primary">Nilai</a>
								<a href="print_siswa.php?ids=<?php echo $sikel["id_siswakelas"]; ?>&idm=<?php echo $value["id_mengajar"]; ?>" class="btn-sm btn btn-outline-warning">Download</a>
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