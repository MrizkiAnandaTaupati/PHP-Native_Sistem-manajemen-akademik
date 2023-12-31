<?php 
include "header.php";

$id_guru = $_GET["id"];

$ambil_mengajar = $koneksi -> query("SELECT * FROM mengajar LEFT JOIN guru ON guru.id_guru = mengajar.id_guru LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas WHERE guru.id_guru = '$id_guru'");

$mengajar = array();

while ($data_mengajar = $ambil_mengajar ->fetch_assoc()) 
{
 	$mengajar[] = $data_mengajar;
} 

// echo "<pre>";
// print_r($mengajar);
// echo "</pre>";
?>
<div class="container-fluid">
	<div class="p-3 me-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Waktu Mengajar Guru</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Guru</th>
						<th>Nip Guru</th>
						<th>Mata Pelajaran</th>
						<th>Kelas</th>
						<th>KKM</th>
						<th>Semester</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($mengajar as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_guru"]; ?></td>
							<td><?php echo $value["nip_guru"]; ?></td>
							<td><?php echo $value["nama_mapel"]; ?></td>
							<td><?php echo $value["nama_kelas"]; ?></td>
							<td><?php echo $value["kkm"]; ?></td>
							<td><?php echo $value["semester"]; ?></td>
							<td nowrap="nowrap">
								<a href="ubah_mengajar.php?id=<?php echo $value["id_mengajar"]; ?>&idg=<?php echo "$id_guru"; ?>" class="btn-sm btn btn-outline-warning">EDIT</a>
								<a href="hapus_mengajar.php?id=<?php echo $value["id_mengajar"]; ?>&idg=<?php echo "$id_guru"; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-sm btn btn-outline-danger">HAPUS</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambah_mengajar.php?id=<?php echo $id_guru; ?>" class="btn btn-outline-primary">TAMBAH</a>
		</div>
	</div>
</div>


<?php 
include "footer.php";
?>