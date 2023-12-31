<?php 
include "header.php";
$id_mengajar = $_GET["idm"];
$id_siswa = $_GET["id"];
$id_kelas = $_GET["idk"];
$id_siswakelas = $_GET["ids"];

$ambil_mengajar = $koneksi ->query("SELECT * FROM mengajar LEFT JOIN mapel ON mapel.id_mapel = mengajar.id_mapel WHERE mengajar.id_mengajar ='$id_mengajar'");
$mapel_mengajar = $ambil_mengajar->fetch_assoc();

$ambil_siswakelas = $koneksi ->query("SELECT * FROM siswa_kelas LEFT JOIN siswa ON siswa.id_siswa =siswa_kelas.id_siswa WHERE siswa_kelas.id_siswa ='$id_siswa'");

$siswa = $ambil_siswakelas ->fetch_assoc();
// echo "<pre>";
// print_r($id_mengajar);
// echo "</pre>";

$ambil_kelas = $koneksi ->query("SELECT * FROM kelas WHERE id_kelas ='$id_kelas'");
$kelas = $ambil_kelas ->fetch_assoc();


$ambil_nilai = $koneksi ->query ("SELECT * FROM nilai LEFT JOIN siswa_kelas ON nilai.id_siswakelas = siswa_kelas.id_siswakelas LEFT JOIN mengajar ON mengajar.id_mengajar = nilai.id_mengajar WHERE nilai.id_siswakelas = '$id_siswakelas' AND nilai.id_mengajar = '$id_mengajar'");
$nilai = $ambil_nilai ->fetch_assoc();

// echo "<pre>";
// print_r($nilai);
// echo "</pre>";
?>
<div class="card">
	<div class="card-body">
		<h4 class="my-3">Formulir Siswa</h4>
		<hr>
		<div class="text-center">
			<img src="../asset/file/<?php echo $siswa["foto_siswa"]; ?>" width="270" class="img-fluid">
			<div class="row">
				<div class="col-8 offset-2 mt-3">
					<div class="table">
						<table class="table table-bordered shadow">
							<tr>
								<th width="30%" class="text-start">NISN Siswa</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nisn_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NIS Siswa</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nis_siswa"]; ?></td>
							</tr>
							<tr>
								<th width="30%" class="text-start">NAMA</th>
								<td class="text-start" colspan="2"> <?php echo $siswa["nama_siswa"]; ?></td>
							</tr>
							<tr>
								<th class="text-start" width="30%">Nilai Semester <?php echo $mapel_mengajar["semester"]; ?></th>
								<td class="text-start">
									<?php if (empty($nilai["nilai"])): ?>
										<form method="post">
											<div class="form-group mb-2">
												<label class="form-label fw-bold">Input Nilai</label>
												<input type="number" class="form-control-sm form-control" name="nilai">
											</div>
											<button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
										</form>
										<?php 
										if (isset($_POST["simpan"])) 
										{
											$input_nilai = $_POST["nilai"];

											$koneksi -> query("INSERT INTO nilai (id_siswakelas,id_mengajar,nilai) VALUES('$id_siswakelas','$id_mengajar','$input_nilai')");
											echo "<script>alert('Berhasil menginput nilai')</script>";
											echo "<script>location='tampil_nilai.php?id=$id_siswa&idk=$id_kelas&idm=$id_mengajar&ids=$id_siswakelas'</script>";
										}
										?>
									<?php else: ?>
										<?php echo $nilai["nilai"]; ?>
									<?php endif ?>
								</td>
								<td>
									<?php if (isset($nilai["nilai"])): ?>
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
											Ubah Nilai
										</button>

										<!-- Modal -->
										<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Nilai Siswa</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="post">
															<div class="form-group mb-2">
																<label class="form-label fw-bold">Ubah  Nilai</label>
																<input type="number" class="form-control-sm form-control" value="<?php echo $nilai["nilai"]; ?>" name="nilai">
															</div>
															<button class="btn btn-primary btn-sm" name="simpan">Simpan</button>
														</form>
														<?php 
														if (isset($_POST["simpan"])) 
														{
															$input_nilai = $_POST["nilai"];

															$koneksi -> query("UPDATE nilai SET nilai = '$input_nilai' WHERE id_nilai = '$nilai[id_nilai]'");
															echo "<script>alert('Berhasil mengubah nilai')</script>";
															echo "<script>location='tampil_nilai.php?id=$id_siswa&idk=$id_kelas&idm=$id_mengajar&ids=$id_siswakelas'</script>";
														}
														?>
													</div>
												</div>
											</div>
										</div>
									<?php endif ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
include "footer.php";
?>