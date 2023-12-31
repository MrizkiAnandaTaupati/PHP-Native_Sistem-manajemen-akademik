<?php 
include "header.php";

?>
<main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 bg-white vh-100 py-3">
	<div class="card">
		<div class="card-body">
			<h4 class="my-3">Biodata Guru</h4>
			<hr>
			<div class="text-center">
				<img src="../asset/file/guru/<?php echo $guru["foto_guru"]; ?>" width="270" class="img-fluid rounded">
			</div>
			<div class="row">
				<div class="col-md-8 offset-2 mt-3">
					<div class="table">
						<table class="table table-bordered">
							<tr>
								<th>Username</th>
								<td>: <?php echo $guru["username_guru"]; ?></td>
							</tr>
							<tr>
								<th>Password</th>
								<td class="" id="inputPassword">: <?php echo $guru["password_guru"]; ?>
								</tr>
								<tr>
									<th>NAMA</th>
									<td>: <?php echo $guru["nama_guru"]; ?></td>
								</tr>
								<tr>
									<th>Tempat Lahir</th>
									<td>: <?php echo $guru["lahir_guru"]; ?></td>
								</tr>
								<tr>
									<th>Tanggal lahir</th>
									<td>: <?php echo $guru["tanggallahir_guru"]; ?></td>
								</tr>
								<tr>
									<th>NIP</th>
									<td>: <?php echo $guru["nip_guru"]; ?></td>
								</tr>
								<tr>
									<th>Jabatan</th>
									<td>: <?php echo $guru["jabatan_guru"]; ?></td>
								</tr>
								<tr>
									<th>Pendidikan Terakhir</th>
									<td>: <?php echo $guru["pendidikan_guru"]; ?></td>
								</tr>
								<tr>
									<th>Pangkat / Golongan</th>
									<td>: <?php echo $guru["pangkat_golongan"]; ?></td>
								</tr>
								<tr>
									<th>Alamat</th>
									<td>: <?php echo $guru["alamat_guru"]; ?></td>
								</tr>
								<tr>
									<th>Jenis Kelamin</th>
									<td>: <?php echo $guru["jk_guru"]; ?></td>
								</tr>
								<tr>
									<th>Nomor Handphone</th>
									<td>: <?php echo $guru["hp_guru"]; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<?php
	if (isset($_POST["simpan"])) 
	{
		$user = $_POST["username_guru"];
		$password = $_POST["password_guru"];
		$nama = $_POST["nama_guru"];
		$lahir_guru = $_POST["lahir_guru"];
		$tanggallahir_guru = $_POST["tanggallahir_guru"];
		$nip = $_POST["nip_guru"];
		$jabatan = $_POST["jabatan_guru"];
		$pendidikan_guru = $_POST["pendidikan_guru"];
		$pangkat_golongan = $_POST["pangkat_golongan"];
		$alamat = $_POST["alamat_guru"];
		$hp = $_POST["hp_guru"];
		$jk = $_POST["jk_guru"];
		$foto = $_FILES["foto_guru"] ["name"];
		$file = $_FILES["foto_guru"] ["tmp_name"];
		$up = date("YmdHis");
		$upload = $up.$foto;

		if (empty($file)) 
		{
			$koneksi -> query("UPDATE guru SET
				username_guru = '$user',
				password_guru = '$password',
				nama_guru = '$nama',
				lahir_guru = '$lahir_guru',
				tanggallahir_guru = '$tanggallahir_guru',
				nip_guru = '$nip',
				jabatan_guru = '$jabatan',
				pendidikan_guru = '$pendidikan_guru',
				pangkat_golongan = '$pangkat_golongan',
				alamat_guru = '$alamat',
				hp_guru = '$hp',
				jk_guru = '$jk' WHERE id_guru = '$id_guru'");
		}

		else
		{
			$koneksi -> query("UPDATE guru SET
				username_guru = '$user',
				password_guru = '$password',
				nama_guru = '$nama',
				lahir_guru = '$lahir_guru',
				tanggallahir_guru = '$tanggallahir_guru',
				nip_guru = '$nip',
				jabatan_guru = '$jabatan',
				pendidikan_guru = '$pendidikan_guru',
				pangkat_golongan = '$pangkat_golongan',
				alamat_guru = '$alamat',
				hp_guru = '$hp',
				jk_guru = '$jk',
				foto_guru ='$upload' WHERE id_guru = '$id'");

			move_uploaded_file($file,"../asset/file/guru/$upload");
		}
		echo "<script>alert('Biodata Guru Berhasil Diperbarui !!!')</script>";
		echo "<script>location = 'profil_guru.php'</script>";

	}
	?>


	<?php 
	include "footer.php";
?>