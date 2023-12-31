<?php 
include "header.php";

//mengambil id mengajar
$ids = $_GET["ids"];
$idm = $_GET["idm"];

$ambil_sikel = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa.id_siswa= siswa_kelas.id_siswa WHERE id_siswakelas ='$ids'");

$sikel = $ambil_sikel ->fetch_assoc();
echo "<pre>";
print_r($sikel);
echo "</pre>";

//mengambil data nilai berdasarkan id siswakelas dan di gabung ke mengajar dan mapel untuk mendapatkan data mapel
$ambil_nilai = $koneksi -> query("SELECT * FROM nilai LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel LEFT JOIN siswa_kelas ON nilai.id_siswakelas = siswa_kelas.id_siswakelas LEFT JOIN siswa ON siswa.id_siswa = siswa_kelas.id_siswa  WHERE mengajar.id_mengajar = '$idm' AND nilai.id_siswakelas = '$ids'");
$nilai = array();
while ($tiap_nilai = $ambil_nilai -> fetch_assoc()) 
{
	$nilai[] = $tiap_nilai;
}

$ambil_tahun = $koneksi -> query("SELECT * FROM mengajar LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun WHERE id_mengajar = '$idm'");
$tahun = $ambil_tahun -> fetch_assoc();
echo "<pre>";
print_r($tahun);
echo "</pre>";
?>
<div class="card">
	<div class="card-body">
		<h4 class="my-3">Daftar Nilai Siswa</h4>
		<hr>
		<div class="text-center">
			<img src="../asset/file/<?php echo $siswa["foto_siswa"]; ?>" width="270" class="img-fluid">
			<div class="row">
				<div class="col-8 offset-2 mt-3">
					<div class="table">
						<table class="table table-bordered shadow">
							<tr>
								<th width="30%" class="text-start">NAMA</th>
								<td class="text-start"> <?php echo $siswa["nama_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NISN Siswa</th>
								<td class="text-start"> <?php echo $siswa["nisn_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NIS Siswa</th>
								<td class="text-start"> <?php echo $siswa["nis_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">Kelas</th>
								<td class="text-start"> <?php echo $tahun["nama_kelas"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NO HP</th>
								<td class="text-start"> <?php echo $sikel["hp_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">Tahun Ajaran</th>
								<td class="text-start"> <?php echo $tahun["tahun_ajaran"]; ?></td>
							</tr>
						</table>

						<div class="card shadow">
							<div class="card-body">
								<div class="table-responsive">
									<table class="mt-3 table table-bordered table-hover " id="datatabel">
										<thead>
											<tr>
												<th>No</th>
												<th>Mapel</th>
												<th>KKM</th>
												<th>Nilai</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($nilai as $key => $value): ?>
												<tr>
													<td><?php echo $key+1; ?></td>
													<td><?php echo $value["nama_mapel"]; ?></td>
													<td><?php echo $value["kkm"]; ?></td>
													<td><?php echo $value["nilai"]; ?></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<?php 
include "footer.php";

?>