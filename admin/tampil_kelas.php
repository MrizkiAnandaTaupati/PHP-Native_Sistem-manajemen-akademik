<?php 
include "header.php";


$ambil = $koneksi -> query ("SELECT * FROM kelas LEFT JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan LEFT JOIN tahun ON kelas.id_tahun = tahun.id_tahun GROUP BY nama_kelas");
$kelas = array();
while($data = $ambil -> fetch_assoc())
{
	$kelas[] = $data;
}

?>
<div class="container">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<h5>Data Kelas</h5>
		<hr>
		<div class="table-responsive">
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kelas</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php foreach ($kelas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_kelas"]; ?></td>
							<td>
								<a href="ubah_kelas.php?id=<?php echo $value["id_kelas"]; ?>" class="btn-sm btn btn-outline-warning">Edit</a>
								<a href="hapus_kelas.php?id=<?php echo $value["id_kelas"]; ?>" class="btn-sm btn btn-outline-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambah_kelas.php" class="btn btn-outline-primary">TAMBAH</a>
			
		</div>
	</div>
</div>

<?php 
include "footer.php";
?>