<?php 
include "header.php";

$ambil = $koneksi -> query ("SELECT * FROM siswa_kelas LEFT JOIN kelas ON siswa_kelas.id_kelas = kelas.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan ");
$siswa_kelas = array();
while($data = $ambil ->fetch_assoc())
{
	$siswa_kelas[] = $data;
}
$ambil_siswa = $koneksi -> query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
$siswa = $ambil_siswa -> fetch_assoc();
?>

<div class="container-fluid">
	<div class="p-3 me-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Daftar Siswa Kelas</h4>
			<hr>
			<div class="table-responsive">
				<table id="datatabel" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kelas</th>
							<th>Jurusan</th>
							<th>Tahun Ajaran</th>
							<th>Nama</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php foreach ($siswa_kelas as $key => $value): ?>
							<tr>
								<td class="text-center"><?php echo $key+1; ?></td>
								<td class="text-center"><?php echo $value["nama_kelas"] ?></td>
								<td class="text-center"><?php echo $value["nama_jurusan"] ?></td>
								<td class="text-center"><?php echo $value["tahun_ajaran"] ?></td>
								<td class="text-center"><?php echo $siswa["nama_siswa"] ?></td>
								<td class="text-center">
									<a href="ubah_siswakelas.php?id=<?php echo $value["id_siswa_kelas"] ?>" class="btn btn-outline-warning">Edit</a>
									<a href="hapus_siswakelas.php?id=<?php echo $value["id_kelas"] ?><?php echo $value["id_siswa_kelas"] ?>" class="btn btn-outline-danger">Hapus</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>