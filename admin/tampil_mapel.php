<?php 
include "header.php";

$ambil_mapel = $koneksi ->query("SELECT * FROM mapel");

$mapel = array();

while ($tiap_mapel = $ambil_mapel->fetch_assoc()) 
{
	$mapel[] = $tiap_mapel;
}
?>

<div class="container">
	<div class="col-md-15 p-5 m-5 card bg-white shadow"> 
		<div class="table-responsive">
			<h5>Mata Pelajaran</h5>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Mata Pelajaran</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($mapel as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_mapel"]; ?></td>
							<td nowrap="nowrap">
								<a href="ubah_mapel.php?id=<?php echo $value["id_mapel"]; ?>" class="btn-sm btn btn-outline-warning">EDIT</a>
								<a href="hapus_mapel.php?id=<?php echo $value["id_mapel"]; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Mata Pelajaran Ini?')" class="btn-sm btn btn-outline-danger">HAPUS</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambah_mapel.php" class="btn btn-outline-primary">TAMBAH</a>
		</div>
	</div>
</div>

<?php 
include "footer.php";
?>