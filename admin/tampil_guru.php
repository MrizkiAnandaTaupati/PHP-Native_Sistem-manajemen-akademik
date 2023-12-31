<?php 
include "header.php";

$ambil_guru = $koneksi -> query("SELECT * FROM guru");

$guru = array();

while ($tiap_guru = $ambil_guru->fetch_assoc()) 
{
	$guru[] = $tiap_guru;
}
?>
<div class="container">
	<div class="col-md-15 p-5 m-4 card bg-white shadow">
		<div class="table-responsive">
			<h4>Data Guru</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Guru</th>
						<th>Nip Guru</th>
						<th>Jabatan</th>
						<th>Pendidikan Terakhir</th>
						<th>Pangkat/Golongan</th>
						<th>Jenis Kelamin</th>
						<th>Foto</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($guru as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_guru"]; ?></td>
							<td><?php echo $value["nip_guru"]; ?></td>
							<td><?php echo $value["jabatan_guru"]; ?></td>
							<td><?php echo $value["pendidikan_guru"]; ?></td>
							<td><?php echo $value["pangkat_golongan"]; ?></td>
							<td><?php echo $value["jk_guru"]; ?></td>
							<td>
								<img src="../asset/file/guru/<?php echo $value["foto_guru"]; ?>" width="100" class="rounded">
							</td>
							<td nowrap="nowrap">
								<a href="detail_guru.php?id=<?php echo $value["id_guru"]; ?>" class="btn-sm btn btn-outline-success" target="_blank">Detail</a>
								<a href="mengajar.php?id=<?php echo $value["id_guru"]; ?>" class="btn-sm btn btn-outline-info">Mengajar</a>
								<a href="ubah_guru.php?id=<?php echo $value["id_guru"]; ?>" class="btn-sm btn btn-outline-warning">EDIT</a>
								<a href="hapus_guru.php?id=<?php echo $value["id_guru"]; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-sm btn btn-outline-danger">HAPUS</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="tambah_guru.php" class="btn btn-outline-primary">TAMBAH</a>
			<a href="import_guru.php" class="btn btn-outline-warning">IMPORT GURU</a>
		</div>
	</div>
</div>
<?php 
include "footer.php";
 ?>