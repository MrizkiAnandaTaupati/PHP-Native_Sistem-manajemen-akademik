<?php include "header.php"; 

$ambil_siswa = $koneksi -> query("SELECT * FROM siswa LEFT JOIN jurusan ON jurusan.id_jurusan = siswa.id_jurusan LEFT JOIN tahun ON tahun.id_tahun = siswa.id_tahun");
$siswa = array();
while ($data_siswa = $ambil_siswa -> fetch_assoc()) 
{
	$siswa[] = $data_siswa;
}
?>
<div class="container">
	<div class="col-md-15 p-3 m-4 me-4 card bg-white shadow">
		<div class="table-responsive">
			<h4>Data Siswa</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Jurusan</th>
						<th>Tahun Ajaran</th>
						<th>Nisn</th>
						<th>Nis</th>
						<th>Nama Siswa</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Nama Ayah</th>
						<th>Nama Ibu</th>
						<th>Nama Wali</th>
						<th>Jenis Kelamin</th>
						<th>Foto</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($siswa as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_jurusan"]; ?></td>
							<td><?php echo $value["tahun_ajaran"]; ?></td>
							<td><?php echo $value["nisn_siswa"]; ?></td>
							<td><?php echo $value["nis_siswa"]; ?></td>
							<td><?php echo $value["nama_siswa"]; ?></td>
							<td><?php echo $value["lahir_siswa"]; ?></td>
							<td><?php echo $value["tanggallahir_siswa"]; ?></td>
							<td><?php echo $value["nama_ayah"]; ?></td>
							<td><?php echo $value["nama_ibu"]; ?></td>
							<td><?php echo $value["nama_wali"]; ?></td>
							<td><?php echo $value["jk_siswa"]; ?></td>
							<td>
								<img src="../asset/file/siswa/<?php echo $value["foto_siswa"]; ?>" width="100" class="rounded">
							</td>
							<td nowrap="nowrap">
								<a href="print_siswa.php?id=<?php echo $value["id_siswa"]; ?>" class="btn-sm btn btn-outline-success" target="_blank">Detail</a>
								<a href="ubah_siswa.php?id=<?php echo $value["id_siswa"]; ?>" class="btn-sm btn btn-outline-warning">UBAH</a>
								<a href="hapus_siswa.php?id=<?php echo $value["id_siswa"]; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')" class="btn-sm btn btn-outline-danger">HAPUS</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambah_siswa.php" class="btn btn-outline-primary">Tambah Siswa</a>
			<a href="import_siswa.php" class="btn btn-outline-warning">Import Siswa</a>
		</div>
	</div>
</div>

<?php 
include 'footer.php';
?>
