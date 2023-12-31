<?php 
include "header.php";

$id_jurusan = $_GET["idj"];
$id_tahun = $_GET["idt"];

// $ambil_kelas = $koneksi ->query("SELECT * FROM kelas WHERE id_jurusan = '$id_jurusan' AND id_tahun = '$id_tahun'");
$ambil_kelas = $koneksi -> query("SELECT * FROM mengajar LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas WHERE kelas.id_jurusan = '$id_jurusan' AND kelas.id_tahun = '$id_tahun'");
$kelas = array();

while ($tiap_jurusan = $ambil_kelas ->fetch_assoc()) 
{
	$kelas[] = $tiap_jurusan; 
}

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Data Kelas</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kelas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value["nama_kelas"]; ?></td>
							<td><?php echo $value["semester"]; ?></td>
							<td class="text-center">
								<a href="detail_siswa.php?id=<?php echo $value["id_kelas"] ?>&idj=<?php echo   
								$id_jurusan; ?>&idm=<?php echo $value["id_mengajar"]; ?>" class="btn-sm btn btn-outline-info">Detail Siswa</a>
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


