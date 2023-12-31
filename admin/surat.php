<?php 
include "../koneksi.php";
$id_mengajar = $_GET["idm"];

$ambil = $koneksi -> query("SELECT * FROM nilai LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar LEFT JOIN siswa_kelas ON siswa_kelas.id_siswakelas = nilai.id_siswakelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas WHERE mengajar.id_mengajar = '$id_mengajar'");
$nilai = array();
while ($tiap_nilai = $ambil -> fetch_assoc()) {
	$nilai[] = $tiap_nilai;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/surat.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<body>
	<div class="rangkasurat">
		<div class="p-3 table-responsive">
			<table width="100%" class="kepala table-sm small">
				<tr>
					<td>
						<img src="../asset/file/logo/icon.png" width="100">
					</td>
					<td class="tengah">
						<h6>DATA NILAI</h6>
						<h6>MADRASAH ALIYAH NEGERI</h6>
						<h4 style="font-family: times-new-romans;">MAN 1 CILACAP</h4>
						<h6>“TEMU BERLIAN”
							Terdepan dalam Ilmu Pengetahuan dan Teknologi, Berbudaya Lingkungan, Agamis dan Nasionalis
							<br>
						TERAKREDITASI "A"</h6>
						<p class="small">Jl. Raya Kalisabuk, Km 15, Kec Kesugihan Cilacap Jawa Tengah 53274</p>
					</td>
				</tr>
			</table>
			<table id="datatabel" class="table table-bordered table-hover mt-5">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>NAMA</th>
						<th>Jenis Kelamin</th>
						<th>Nilai</th>
						<th>Kelas</th>
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
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">print();</script>
</body>
</html>