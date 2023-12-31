<?php 
include "header.php";

$ambil = $koneksi -> query ("SELECT * FROM tahun");
$tahun = array();
while($data = $ambil -> fetch_assoc())
{
	$tahun[] = $data;
}

$ambil_jurusan = $koneksi -> query("SELECT * FROM jurusan");
$jurusan = array();
while($data = $ambil_jurusan -> fetch_assoc())
{
	$jurusan[] = $data;
}
?>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Nama Jurusan</label>
					<select class="form-control" name="nama_jurusan">
						<option value="">Pilih Jurusan</option>
						<?php foreach ($jurusan as $key => $value): ?>
							<option value="<?php echo $value["id_jurusan"]; ?>">
								<?php echo $value["nama_jurusan"]; ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3"> 
					<label class="form-label">Tahun Ajaran</label>
					<select class="form-control" name="tahun_ajaran">
						<option value="">--Pilih--</option>
						<?php foreach ($tahun as $kt => $vt): ?>
							<option value="<?php echo $vt["id_tahun"] ?>">
								<?php echo $vt["tahun_ajaran"] ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-3">
					<label>NISN Siswa</label>
					<input type="text" class="form-control" name="nisn_siswa">
				</div>
				<div class="mb-3">
					<label>NIS Siswa</label>
					<input type="text" class="form-control" name="nis_siswa">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" id="inputPassword" name="password_siswa">
					<input type="checkbox" onclick="myFunction()">Tampilkan Password
				</div>
				<div class="mb-3">
					<label>Nama Siswa</label>
					<input type="text" class="form-control" name="nama_siswa">
				</div>
				<div class="mb-3">
					<label class="form-label" >AGAMA</label>
					<select class="form-control" name="agama_siswa">
						<option value="">PILIH AGAMA</option>
						<option value="islam">ISLAM</option>
						<option value="kristen">KRISTEN</option>
						<option value="katholik">KATHOLIK</option>
						<option value="hindu">HINDU</option>
						<option value="budha">BUDHA</option>
					</select>
				</div>
				<div class="mb-3">
					<label>Kewarganegaraan</label>
					<select class="form-control" name="asal_siswa">
						<option value="">PILIH Kewarganegaraan</option>
						<option value="wna">WNA</option>
						<option value="wni">WNI</option>
					</select>
				</div>
				<div class="mb-3">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" name="lahir_siswa">
				</div>
				<div class="mb-3">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" name="tanggallahir_siswa">
				</div>
				<div class="mb-3">
					<label>Anak Ke</label>
					<input type="text" class="form-control" name="status_anak">
				</div>
				<div class="mb-3">
					<label>Jumlah Saudara</label>
					<input type="text" class="form-control" name="jumlah_saudara">
				</div>
				<div class="mb-3">
					<label>Alamat Siswa</label>
					<textarea class="form-control" name="alamat_siswa"></textarea>
				</div>
				<div class="mb-3">
					<label>No Telp</label>
					<input type="text" class="form-control" name="telp_rumah">
				</div>
				<div class="mb-3">
					<label>Status Tinggal</label>
					<input type="text" class="form-control" name="status_tinggal">
				</div>
				<div class="mb-3">
					<label>Golongan_darah</label>
					<input type="text" class="form-control" name="darah_siswa">
				</div>
				<div class="mb-3">
					<label>Berat Badan</label>
					<input type="text" class="form-control" name="bb_siswa">
				</div>
				<div class="mb-3">
					<label>Tinggi Badan</label>
					<input type="text" class="form-control" name="tb_siswa">
				</div>
				<div class="mb-3">
					<label>Riwayat Penyakit</label>
					<input type="text" class="form-control" name="riwayat_sakit">
				</div>
				<div class="mb-3">
					<label>Nama Ayah</label>
					<input type="text" class="form-control" name="nama_ayah">
				</div>
				<div class="mb-3">
					<label>Pekerjaan Ayah</label>
					<input type="text" class="form-control" name="pekerjaan_ayah">
				</div>
				<div class="mb-3">
					<label>Pendidikan Ayah</label>
					<input type="text" class="form-control" name="pendidikan_ayah">
				</div>
				<div class="mb-3">
					<label>No Telp Ayah</label>
					<input type="text" class="form-control" name="hp_ayah">
				</div>
				<div class="mb-3">
					<label>Penghasilan Ayah</label>
					<input type="text" class="form-control" name="penghasilan_ayah">
				</div>
				<div class="mb-3">
					<label>Alamat Tinggal</label>
					<textarea class="form-control" name="alamat_ayah"></textarea>
				</div>
				<div class="mb-3">
					<label>Nama Ibu</label>
					<input type="text" class="form-control" name="nama_ibu">
				</div>
				<div class="mb-3">
					<label>Pekerjaan Ibu</label>
					<input type="text" class="form-control" name="pekerjaan_ibu">
				</div>
				<div class="mb-3">
					<label>Pendidikan Ibu</label>
					<input type="text" class="form-control" name="pendidikan_ibu">
				</div>
				<div class="mb-3">
					<label>Penghasilan Ibu</label>
					<input type="text" class="form-control" name="penghasilan_ibu">
				</div>
				<div class="mb-3">
					<label>No Telp Ibu</label>
					<input type="text" class="form-control" name="hp_ibu">
				</div>
				<div class="mb-3">
					<label>Alamat Tinggal</label>
					<textarea class="form-control" name="alamat_ibu"></textarea>
				</div>
				<div class="mb-3">
					<label>Nama Wali</label>
					<input type="text" class="form-control" name="nama_wali">
				</div>
				<div class="mb-3">
					<label>No Telp Wali</label>
					<input type="text" class="form-control" name="hp_wali">
				</div>
				<div class="mb-3">
					<label>Pekerjaan Wali</label>
					<input type="text" class="form-control" name="pekerjaan_wali">
				</div>
				<div class="mb-3">
					<label>Status Wali</label>
					<input type="text" class="form-control" name="status_wali">
				</div>
				<div class="mb-3">
					<label>Alamat Wali</label>
					<textarea class="form-control" name="alamat_wali"></textarea>
				</div>
				<div class="mb-3">
					<label class="form-label" >Jenis Kelamin</label>
					<select class="form-control" name="jk_siswa">
						<option value="">Pilih Gender</option>
						<option value="laki laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>
				<div class="mb-3">
					<label>Telp Siswa</label>
					<input type="text" class="form-control" name="hp_siswa">
				</div>
				<div class="mb-3">
					<label>Hobi Siswa</label>
					<input type="text" class="form-control" name="hobi_siswa">
				</div>
				<div class="mb-3">
					<label>Email Siswa</label>
					<input type="text" class="form-control" name="email_siswa">
				</div>
				<div class="mb-3">
					<label>Foto Siswa</label>
					<input type="file" class="form-control" name="foto_siswa">
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
	$jurusan    = $_POST["nama_jurusan"];
	$tahun      = $_POST["tahun_ajaran"];
	$nisn_siswa  = $_POST["nisn_siswa"]; 
	$nis_siswa   = $_POST["nis_siswa"];
	$password_siswa = $_POST["password_siswa"];
	$nama_siswa  = $_POST["nama_siswa"];
	$agama_siswa = $_POST["agama_siswa"];
	$asal_siswa = $_POST["asal_siswa"];
	$lahir_siswa  = $_POST["lahir_siswa"];
	$tanggallahir_siswa = $_POST["tanggallahir_siswa"];
	$status_anak  = $_POST["status_anak"];
	$jumlah_saudara = $_POST["jumlah_saudara"];
	$alamat_siswa  = $_POST["alamat_siswa"];
	$telp_rumah  = $_POST["telp_rumah"];
	$status_tinggal  = $_POST["status_tinggal"];
	$darah_siswa  = $_POST["darah_siswa"];
	$bb_siswa     = $_POST["bb_siswa"];
	$tb_siswa    = $_POST["tb_siswa"];
	$riwayat_sakit        = $_POST["riwayat_sakit"];
	$nama_ayah       = $_POST["nama_ayah"];
	$pekerjaan_ayah  = $_POST["pekerjaan_ayah"];
	$pendidikan_ayah = $_POST["pendidikan_ayah"];
	$hp_ayah         = $_POST["hp_ayah"];
	$penghasilan_ayah = $_POST["penghasilan_ayah"];
	$alamat_ayah     = $_POST["alamat_ayah"];
	$nama_ibu        = $_POST["nama_ibu"];
	$pekerjaan_ibu   = $_POST["pekerjaan_ibu"];
	$pendidikan_ibu  = $_POST["pendidikan_ibu"];
	$penghasilan_ibu = $_POST["penghasilan_ibu"];
	$hp_ibu      = $_POST["hp_ibu"];
	$alamat_ibu      = $_POST["alamat_ibu"];
	$nama_wali       = $_POST["nama_wali"];
	$hp_wali        = $_POST["hp_wali"];
	$pekerjaan_wali  = $_POST["pekerjaan_wali"];
	$status_wali     = $_POST["status_wali"];
	$alamat_wali     = $_POST["alamat_wali"];
	$jk_siswa        = $_POST["jk_siswa"];
	$hp_siswa      = $_POST["hp_siswa"];
	$hobi_siswa      = $_POST["hobi_siswa"];
	$email_siswa     = $_POST["email_siswa"];
	$foto          = $_FILES["foto_siswa"] ["name"];
	$file           = $_FILES["foto_siswa"] ["tmp_name"];
	$waktu          = date ("YmdHis");
	$waktu_foto     = $waktu.$foto;
	move_uploaded_file($file,"../asset/file/siswa/$waktu_foto");

	$koneksi -> query("INSERT INTO siswa(id_jurusan,id_tahun,nisn_siswa,nis_siswa,password_siswa,nama_siswa,agama_siswa,asal_siswa,lahir_siswa,tanggallahir_siswa,status_anak, jumlah_saudara,alamat_siswa,telp_rumah,status_tinggal,darah_siswa,bb_siswa,tb_siswa,riwayat_sakit,nama_ayah,pekerjaan_ayah,pendidikan_ayah,hp_ayah,penghasilan_ayah,alamat_ayah,nama_ibu,pekerjaan_ibu,pendidikan_ibu,penghasilan_ibu,hp_ibu,alamat_ibu,nama_wali,hp_wali,pekerjaan_wali,status_wali,alamat_wali,jk_siswa,hp_siswa,hobi_siswa,email_siswa,foto_siswa) VALUES('$jurusan','$tahun','$nisn_siswa','$nis_siswa','$password_siswa','$nama_siswa','$agama_siswa','$asal_siswa','$lahir_siswa','$tanggallahir_siswa','$status_anak','$jumlah_saudara','$alamat_siswa','$telp_rumah','$status_tinggal','$darah_siswa','$bb_siswa','$tb_siswa','$riwayat_sakit','$nama_ayah','$pekerjaan_ayah','$pendidikan_ayah','$hp_ayah','$penghasilan_ayah','$alamat_ayah','$nama_ibu','$pekerjaan_ibu','$pendidikan_ibu','$penghasilan_ibu','$hp_ibu','$alamat_ibu','$nama_wali','$hp_wali','$pekerjaan_wali','$status_wali','$alamat_wali','$jk_siswa','$hp_siswa','$hobi_siswa','$email_siswa','$waktu_foto')");



	echo "<script>alert('berhasil menambahkan data')</script>";
	echo "<script>location = 'tampil_siswa.php'</script>";
}




include "footer.php";
?>