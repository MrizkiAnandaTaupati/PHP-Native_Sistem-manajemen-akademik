<?php 
include "header.php";

$ambil = $koneksi -> query("SELECT * FROM tahun");
$tahun = array();
while($data = $ambil -> fetch_assoc())
{
	$tahun[]=$data;
} 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
	$(document).ready( function () {
		$('#tabel').DataTable();
	} );
</script>

<div class="container">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<div class="card-body">
			<h5><i class="bi bi-calendar-date"></i> TAHUN AJARAN</h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
					<thead class="text-center">
						<tr> 
							<th>No</th>
							<th>Tahun Ajaran</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php foreach ($tahun as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value ["tahun_ajaran"]; ?></td>
								<td nowrap="nowrap">
									<a href="ubah_tahun.php?id=<?php echo $value ["id_tahun"]; ?>" class="btn btn-outline-warning">Edit</a>
									<a href="hapus_tahun.php?id=<?php echo $value ["id_tahun"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" class="btn btn-outline-danger">Hapus</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="tambah_tahun.php" class="btn btn-outline-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>


<?php 
include "footer.php";
?>
