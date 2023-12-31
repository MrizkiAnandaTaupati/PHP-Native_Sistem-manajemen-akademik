<?php 
include "../koneksi.php";
// $id_mengajar = $_GET["idm"];

// $ambil = $koneksi -> query("SELECT * FROM nilai LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar LEFT JOIN siswa_kelas ON siswa_kelas.id_siswakelas = nilai.id_siswakelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas WHERE mengajar.id_mengajar = '$id_mengajar'");
// $nilai = array();
// while ($tiap_nilai = $ambil -> fetch_assoc()) {
// 	$nilai[] = $tiap_nilai;
// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<!-- 	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/surat.css"> -->
</head>
<body>
	<div class="rangkasurat">
		<div class="p-3 table-responsive">
			<table width="100%" class="kepala table-sm small">
				<tr>
					<td>
						<img src="<?php echo asset("img/gambar.png"); ?>" width="100">
					</td>
					<td class="tengah">
						<h6>YAYASAN BOPKRI YOGYAKARTA</h6>
						<h6>SEKOLAH MENENGAH KEJURUAN</h6>
						<h4 style="font-family: times-new-romans;">SMK BOPKRI 2 YOGYAKARTA</h4>
						<h6>PROGRAM KEAHLIAN : KULINER : TATA BUSANA : PERHOTELAN DAN JASA PARIWISATA <br>
							KOMPETENSI KEAHLIAN : TATA BOGA : TATA BUSANA : PERHOTELAN <br>
						TERAKREDITASI "A"</h6>
						<p class="small">Jalan Kapten Laut Samadikun 6 TELP (0274)376563 - EMAIL : bopkri2smk@gmail.com - YOGYAKARTA 55151</p>
					</td>
				</tr>
			</table>
		</div>
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
	</div>
</body>
</html>