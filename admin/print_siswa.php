<?php 
include "header_print.php";

$id_siswa = $_GET["id"];

$ambilsiswa = $koneksi ->query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'");
$siswa = $ambilsiswa->fetch_assoc();

$ambiljurusan = $koneksi ->query("SELECT * FROM jurusan");
$jurusan = array();
while ($tiap_jurusan = $ambiljurusan->fetch_assoc()) 
{
	$jurusan[] = $tiap_jurusan;
}

$ambiltahun = $koneksi ->query("SELECT * FROM tahun");
$tahun = array();
while ($tiap_tahun = $ambiltahun->fetch_assoc()) 
{
	$tahun[] = $tiap_tahun;
}
?>
<h4 class="my-3">Formulir Siswa</h4>
<hr>
<div class="text-center">
	<img src="../asset/file/<?php echo $siswa["foto_siswa"]; ?>" width="270" class="img-fluid">
</div>
<div class="row">
	<div class="col-8 offset-2 mt-3">
		<div class="table">
			<table class="table table-bordered">
				<tr>
					<th>NISN Siswa</th>
					<td>: <?php echo $siswa["nisn_siswa"]; ?></td>
				</tr>
				<tr>
					<th>NIS Siswa</th>
					<td>: <?php echo $siswa["nis_siswa"]; ?></td>
				</tr>
				<tr>
					<th>NAMA</th>
					<td>: <?php echo $siswa["nama_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Agama</th>
					<td>: <?php echo $siswa["agama_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Kewarganegaraan</th>
					<td>: <?php echo $siswa["asal_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>: <?php echo $siswa["lahir_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Tanggal lahir</th>
					<td>: <?php echo $siswa["tanggallahir_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Anak Ke</th>
					<td>: <?php echo $siswa["status_anak"]; ?></td>
				</tr>
				<tr>
					<th>Jumlah Saudara</th>
					<td>: <?php echo $siswa["jumlah_saudara"]; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>: <?php echo $siswa["alamat_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Telp Rumah</th>
					<td>: <?php echo $siswa["telp_rumah"]; ?></td>
				</tr>
				<tr>
					<th>Status Tinggal</th>
					<td>: <?php echo $siswa["status_tinggal"]; ?></td>
				</tr>
				<tr>
					<th>Golongan Darah</th>
					<td>: <?php echo $siswa["darah_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Berat Badan </th>
					<td>: <?php echo $siswa["bb_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Tinggi Badan</th>
					<td>: <?php echo $siswa["tb_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Riwayat Penyakit</th>
					<td>: <?php echo $siswa["riwayat_sakit"]; ?></td>
				</tr>
				<tr>
					<th>Nama Ayah</th>
					<td>: <?php echo $siswa["nama_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Pekerjaan</th>
					<td>: <?php echo $siswa["pekerjaan_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Riwayat Pendidikan</th>
					<td>: <?php echo $siswa["pendidikan_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Telp</th>
					<td>: <?php echo $siswa["hp_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Penghasilan</th>
					<td>: <?php echo $siswa["penghasilan_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Alamat Tinggal</th>
					<td>: <?php echo $siswa["alamat_ayah"]; ?></td>
				</tr>
				<tr>
					<th>Nama Ibu</th>
					<td>: <?php echo $siswa["nama_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Pekerjaan</th>
					<td>: <?php echo $siswa["pekerjaan_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Riwayat Pendidikan</th>
					<td>: <?php echo $siswa["pendidikan_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Penghasilan</th>
					<td>: <?php echo $siswa["penghasilan_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Telp</th>
					<td>: <?php echo $siswa["hp_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>: <?php echo $siswa["alamat_ibu"]; ?></td>
				</tr>
				<tr>
					<th>Nama Wali</th>
					<td>: <?php echo $siswa["nama_wali"]; ?></td>
				</tr>
				<tr>
					<th>Telp Wali</th>
					<td>: <?php echo $siswa["hp_wali"]; ?></td>
				</tr>
				<tr>
					<th>Pekerjaan</th>
					<td>: <?php echo $siswa["pekerjaan_wali"]; ?></td>
				</tr>
				<tr>
					<th>Hubungan Dengan Siswa</th>
					<td>: <?php echo $siswa["status_wali"]; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>: <?php echo $siswa["jk_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Telp Siswa</th>
					<td>: <?php echo $siswa["hp_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Hobi Siswa</th>
					<td>: <?php echo $siswa["hobi_siswa"]; ?></td>
				</tr>
				<tr>
					<th>Email Siswa</th>
					<td>: <?php echo $siswa["email_siswa"]; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript"> print();</script>
<?php 
include "footer.php";


?>