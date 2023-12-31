<?php 
include "header.php";
//mengambil data siswa kelas berdasarkan siswa yang login untuk mendapatkan nama kelas dan tahun ajaran dari siswa tersebut
$ambil_sk = $koneksi -> query("SELECT * FROM siswa_kelas LEFT JOIN kelas ON kelas.id_kelas = siswa_kelas.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun WHERE id_siswa = '$id_siswa'");
$sk = array();
while ($tiap_sk = $ambil_sk -> fetch_assoc()) 
{
	$sk[] = $tiap_sk;
}
// echo "<pre>";
// print_r($sk);
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
						<th>Kelas / Tahun Ajaran</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sk as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_kelas"]; ?> - <?php echo $value["tahun_ajaran"]; ?></td>
							<td>
								<a href="semester.php?id=<?php echo $value["id_kelas"]; ?>" class="btn-sm btn btn-outline-info">Semester</a>
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