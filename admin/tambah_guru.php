<?php 
include "header.php";

?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h5>Tambah Guru</h5>
		<hr>
		<div class="col-md-8">
			<form method="post"enctype="multipart/form-data">
				<div class="mb-3">
			<label>Username</label>
			<input type="text" class="form-control" name="username_guru">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" id="inputPassword" name="password_guru">
					<input type="checkbox" onclick="myFunction()">Tampilkan Password
				</div>
				<div class="mb-3">
					<label>Nama Guru</label>
					<input type="text" class="form-control" name="nama_guru">
				</div>
				<div class="mb-3">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="lahir_guru">
				</div>
				<div class="mb-3">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggallahir_guru">
				</div>
				<div class="mb-3">
					<label>Nip Guru</label>
					<input type="text" class="form-control" name="nip_guru">
				</div>
				<div class="mb-3">
					<label>Jabatan</label>
					<input type="text" class="form-control" name="jabatan_guru">
				</div>
				<div class="mb-3">
					<label>Pendidikan Terakhir Guru</label>
					<input type="text" class="form-control" name="pendidikan_guru">
				</div>
				<div class="mb-3">
					<label>Pangkat/Golongan</label>
					<input type="text" class="form-control" name="pangkat_golongan">
				</div>
				
				<div class="mb-3">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat_guru"></textarea>
				</div>
				<div class="mb-3">
					<label>No Telp</label>
					<input type="text" class="form-control" name="hp_guru">
				</div>
				<div class="mb-3">
					<label class="form-label" >Jenis Kelamin</label>
					<select class="form-control" name="jk_guru">
					<option value="">Pilih Gender</option>
					<option value="laki laki">Laki-Laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
				</div>
				<div class="mb-3">
					<label>Foto</label>
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

	move_uploaded_file($file, "../asset/file/guru/$waktu_foto");

	$koneksi ->query("INSERT INTO guru(username_guru,password_guru,nama_guru,lahir_guru,tanggallahir_guru,nip_guru,jabatan_guru,pendidikan_guru,pangkat_golongan,alamat_guru,hp_guru,jk_guru,foto_guru) VALUES('$user','$password','$nama','$lahir_guru','$tanggallahir_guru','$nip','$jabatan','$pendidikan_guru','$pangkat_golongan','$alamat','$hp','$jk','$waktu_foto')");
	echo "<script>alert('Data Guru Berhasil Ditambahkan!!!')</script>";
	echo "<script>location = 'tampil_guru.php'</script>";

}

include "footer.php";
?>