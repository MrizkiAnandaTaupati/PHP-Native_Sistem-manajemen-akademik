<?php 
include "header.php";

$id_guru = $_GET["id"];

$ambil_guru = $koneksi ->query("SELECT * FROM guru WHERE id_guru = '$id_guru'");

$guru = $ambil_guru->fetch_assoc();
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Edit Data Guru</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
					<label>Username</label>
					<input type="text" class="form-control" name="username_guru" value="<?php echo $guru["username_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" id="inputPassword" name="password_guru" value="<?php echo $guru["password_guru"] ?>">
					<input type="checkbox" onclick="myFunction()">Tampilkan Password
				</div>
				<div class="mb-3">
					<label>Nama Guru</label>
					<input type="text" class="form-control" name="nama_guru" value="<?php echo $guru["nama_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="lahir_guru" value="<?php echo $guru["lahir_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggallahir_guru" value="<?php echo $guru["tanggallahir_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Nip Guru</label>
					<input type="text" class="form-control" name="nip_guru" value="<?php echo $guru["nip_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Jabatan</label>
					<input type="text" class="form-control" name="jabatan_guru" value="<?php echo $guru["jabatan_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Pendidikan Terakhir</label>
					<input type="text" class="form-control" name="pendidikan_guru" value="<?php echo $guru["pendidikan_guru"] ?>">
				</div>
				<div class="mb-3">
					<label>Pangkat/Golongan</label>
					<input type="text" class="form-control" name="pangkat_golongan" value="<?php echo $guru["pangkat_golongan"] ?>">
				</div>
				<div class="mb-3">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat_guru"><?php echo $guru["alamat_guru"]; ?></textarea>
				</div>
				<div class="mb-3">
					<label>No Telp</label>
					<input type="text" class="form-control" name="hp_guru" value="<?php echo $guru["hp_guru"] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label" >Jenis Kelamin</label>
					<select class="form-control" name="jk_guru">
						<option value="">Pilih</option>
						<option value="laki laki" <?php if($guru["jk_guru"]=="laki laki"){echo "selected";} ?>  >Laki-Laki</option>
						<option value="perempuan" <?php if($guru["jk_guru"]=="perempuan"){echo "selected";} ?>  >Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label>Foto</label>
					<img src="../asset/file/guru/<?php echo $guru["foto_guru"]; ?>" width="100">
					<input type="file" class="form-control" name="foto_guru">
				</div>
				<div class="mb-3">
					<button class="btn btn-outline-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


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
	$waktu = date ("YmdHis");
	$waktu_foto = $waktu.$foto;

	if (empty($file)) {

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

	else{
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
			foto_guru = '$waktu_foto' WHERE id_guru = '$id_guru'");

		move_uploaded_file($file, "../asset/file/guru/$waktu_foto");

	}

	echo "<script>alert('Biodata Guru Berhasil Diperbarui !!!')</script>";
	echo "<script>location = 'tampil_guru.php'</script>";
} 

include "footer.php";
?>
