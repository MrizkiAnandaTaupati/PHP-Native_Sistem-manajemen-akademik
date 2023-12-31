<?php 
include "header.php";
$id_jurusan = $_GET["id"];
$ambil_tahun = $koneksi -> query("SELECT * FROM tahun");
$tahun = array();
while ($tiap_tahun = $ambil_tahun -> fetch_assoc()) 
{
	$tahun[] = $tiap_tahun;
}


?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Tahun Ajaran</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Tahun Ajaran</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tahun as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value["tahun_ajaran"]; ?></td>
							<td>
								<a href="detail_jurusan.php?idt=<?php echo $value["id_tahun"]; ?>&idj=<?php echo $id_jurusan; ?>" class="btn-sm btn btn-primary">Kelas</a>
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


