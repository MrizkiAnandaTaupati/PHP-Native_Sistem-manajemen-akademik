<?php 
include "header.php";

$id_kelas = $_GET["id"];
$id_jurusan = $_GET["idj"];
$id_mengajar = $_GET["idm"];

$ambil = $koneksi -> query("SELECT * FROM nilai LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar LEFT JOIN siswa_kelas ON siswa_kelas.id_siswakelas = nilai.id_siswakelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas WHERE mengajar.id_mengajar = '$id_mengajar'");
$nilai = array();
while ($tiap_nilai = $ambil -> fetch_assoc()) {
	$nilai[] = $tiap_nilai;
}

// echo "<pre>";
// print_r($nilai);
// echo "</pre>";
?>
<div class="container">
	<div class="p-5 m-5 card bg-white shadow">
		<div class="table-responsive">
			<h4>Data Siswa</h4>
			<hr>
			<table id="datatabel" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>NAMA</th>
						<th>Jenis Kelamin</th>
						<th>Nilai</th>
						<th>Kelas</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($nilai as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value["nis_siswa"]; ?></td>
							<td><?php echo $value["nama_siswa"]; ?></td>
							<td><?php echo $value["jk_siswa"]; ?></td>
							<td><?php echo $value["nilai"]; ?></td>
							<td><?php echo $value['nama_kelas'] ?></td>
							<td class="text-center">
								<a href="tampil_nilai.php?id=<?php echo $value["id_siswa"];  ?>&idm=<?php echo $id_mengajar ?>" class="btn-sm btn btn-outline-info" >Nilai</a>
								<a href="hapus_siswakelas.php?id=<?php echo $value["id_siswakelas"]; ?>&idk=<?php echo $id_kelas; ?>&idj=<?php echo $id_jurusan; ?>&idm=<?php echo $id_mengajar ?>" class="btn-sm btn btn-outline-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>

							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a class="btn btn-outline-primary" href="tambah_siswakelas.php?id=<?php echo $id_kelas; ?>&idj=<?php echo $id_jurusan; ?>&idm=<?php echo $id_mengajar ?>">Tambah</a>
			<a href="surat.php?idm=<?php echo $id_mengajar ?>" class="btn btn-outline-info" target="_blank">Print</a>
		</div>
	</div>
</div>

<?php 
include 'footer.php';

?>
