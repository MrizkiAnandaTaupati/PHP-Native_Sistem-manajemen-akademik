<?php 
include "header.php";

$koneksi = new mysqli("localhost","root","","aplikasimancilacap");
$ambil_admin = $koneksi -> query("SELECT * FROM admin");

$admin = array();

while ($tiap_admin = $ambil_admin->fetch_assoc()) 
{
	$admin[] = $tiap_admin;
}

?>
<div class="container">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<h4>Daftar Admin</h4>
		<hr>
		<div class="table-responsive">
			<table id="datatabel" class="table table-bordered table-hover" >
			<thead>
				<tr>
					<th>NO</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($admin as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["username_admin"]; ?></td>
						<td><?php echo $value["nama_admin"]; ?></td>
						<td>
							<img src="../asset/file/<?php echo $value["foto_admin"]; ?>" width="100" class="rounded">
						</td>
						<td class="text-center">
							<a href="hapus_admin.php?id=<?php echo $value["id_admin"]; ?>" class="btn-small btn btn-outline-danger" onclick="return confirm('anda yakin ingin menghapus data ini')">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="tambah_admin.php" class="btn btn-outline-primary">Tambah Admin</a>
		<a href="index.php" class="btn btn-outline-primary">HOME</a>
		</div>
		
		
	</div>
	
</div>








<?php 
include "footer.php";

?>