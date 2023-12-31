<?php 
include "header.php";
$ambil_jurusan = $koneksi -> query("SELECT * FROM jurusan");
$jurusan = array();
while ($tiap_jurusan = $ambil_jurusan -> fetch_assoc()) 
{
	$jurusan[] = $tiap_jurusan;
}

$ambil = $koneksi -> query("SELECT * FROM tahun");
$tahun = array();
while($data = $ambil -> fetch_assoc())
{
	$tahun[]=$data;
}

// echo "<pre>";
// print_r($tahun);
// echo "</pre>";
?>
<div class="card bg-white">
	<div class="card-body">
		<h3 class="mt-3">Import Siswa</h3>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Jurusan</label>
						<select class="form-control" name="id_jurusan" required>
							<option value="">--Pilih Jurusan--</option>
							<?php foreach ($jurusan as $kj => $vj): ?>
								<option value="<?php echo $vj["id_jurusan"] ?>"><?php echo $vj["nama_jurusan"]; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Tahun</label>
						<select class="form-control" name="id_tahun" required>
							<option value="">--Pilih Tahun--</option>
							<?php foreach ($tahun as $kl => $vl): ?>
								<option value="<?php echo $vl["id_tahun"] ?>"><?php echo $vl["tahun_ajaran"]; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Import Data</label>
						<textarea class="form-control" name="isi" required></textarea >
						<i class="text-muted small">
							*Paste data siswa dari excel disini
						</i>
					</div>
					<div class="mb-3">
						<button class="btn btn-primary" name="simpan">Simpan</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<?php 
if (isset($_POST["simpan"])) 
{
	//mendapatkan data yang di input di formulir
	$id_jurusan = $_POST["id_jurusan"];
	$id_tahun = $_POST["id_tahun"];
	$isi = $_POST["isi"];
	//memecah data berdasarkan baris
	$baris = explode("\n", $isi);
	foreach ($baris as $key => $perbaris) {

		//memecah data berdasarkan kolom
		$kolom = explode("\t", $perbaris);
		
		if (isset($kolom[0]) AND isset($kolom[1]) AND isset($kolom[2]) AND isset($kolom[3]) AND isset($kolom[4]) AND isset($kolom[5]) AND isset($kolom[6]) AND isset($kolom[7]) AND isset($kolom[8]) AND isset($kolom[9]) AND isset($kolom[10]) AND isset($kolom[11]) AND isset($kolom[12]) AND isset($kolom[13]) AND isset($kolom[14]) AND isset($kolom[15]) AND isset($kolom[16]) AND isset($kolom[17]) AND isset($kolom[18]) AND isset($kolom[19]) AND isset($kolom[20]) AND isset($kolom[21]) AND isset($kolom[22]) AND isset($kolom[23]) AND isset($kolom[24]) AND isset($kolom[25]) AND isset($kolom[26]) AND isset($kolom[27]) AND isset($kolom[28]) AND isset($kolom[29]) AND isset($kolom[30]) AND isset($kolom[31]) AND isset($kolom[32]) AND isset($kolom[33]) AND isset($kolom[34]) AND isset($kolom[35]) AND isset($kolom[36]) AND isset($kolom[37]) AND isset($kolom[38])){ 
			//memisahkan setiap data menjadi 1 variable
			$nisn = $kolom["0"];
			$nis = $kolom["1"];
			$password = $kolom["2"];
			$nama = $kolom["3"];
			$agama = $kolom["4"];
			$asal  = $kolom["5"];
			$lahir = $kolom["6"];
			$tgl_lahir = $kolom["7"];
			$status_anak = $kolom["8"];
			$jumlah_saudara = $kolom["9"];
			$alamat = $kolom["10"];
			$telp_rumah = $kolom["11"];
			$status_tinggal = $kolom["12"];
			$darah_siswa = $kolom["13"];
			$bb_siswa = $kolom["14"];
			$tb_siswa = $kolom["15"];
			$riwayat_sakit = $kolom["16"];
			$nama_ayah = $kolom["17"];
			$pekerjaan_ayah = $kolom["18"];
			$pendidikan_ayah = $kolom["19"];
			$hp_ayah = $kolom["20"];
			$penghasilan_ayah = $kolom["21"];
			$alamat_ayah = $kolom["22"];
			$nama_ibu = $kolom["23"];
			$pekerjaan_ibu = $kolom["24"];
			$pendidikan_ibu = $kolom["25"];
			$penghasilan_ibu = $kolom["26"];
			$hp_ibu = $kolom["27"];
			$alamat_ibu = $kolom["28"];
			$nama_wali = $kolom["29"];
			$hp_wali = $kolom["30"];
			$pekerjaan_wali = $kolom["31"];
			$status_wali = $kolom["32"];
			$alamat_wali = $kolom["33"];
			$jk_siswa = $kolom["34"];
			$hp_siswa = $kolom["35"];
			$iq_siswa = $kolom["36"];
			$hobi_siswa = $kolom["37"];
			$email_siswa = $kolom["38"];

		//menyimpan data ke database
			$koneksi -> query("INSERT INTO siswa(id_jurusan,id_tahun,nisn_siswa,nis_siswa,password_siswa,nama_siswa,agama_siswa,asal_siswa,lahir_siswa,tanggallahir_siswa,status_anak,jumlah_saudara,alamat_siswa,telp_rumah,status_tinggal,darah_siswa,bb_siswa,tb_siswa,riwayat_sakit,nama_ayah,pekerjaan_ayah,pendidikan_ayah,hp_ayah,penghasilan_ayah,alamat_ayah,nama_ibu,pekerjaan_ibu,pendidikan_ibu,penghasilan_ibu,hp_ibu,alamat_ibu,nama_wali,hp_wali,pekerjaan_wali,status_wali,alamat_wali,jk_siswa,hp_siswa,iq_siswa,hobi_siswa,email_siswa) VALUES('$id_jurusan','$id_tahun','$nisn','$nis','$password','$nama','$agama','$asal','$lahir','$tgl_lahir','$status_anak','$jumlah_saudara','$alamat','$telp_rumah','$status_tinggal','$darah_siswa','$bb_siswa','$tb_siswa','$riwayat_sakit','$nama_ayah','$pekerjaan_ayah','$pendidikan_ayah','$hp_ayah','$penghasilan_ayah','$alamat_ayah','$nama_ibu','$pekerjaan_ibu','$pendidikan_ibu','$penghasilan_ibu','$hp_ibu','$alamat_ibu','$nama_wali','$hp_wali','$pekerjaan_wali','$status_wali','$alamat_wali','$jk_siswa','$hp_siswa','$iq_siswa','$hobi_siswa','$email_siswa')");
		}
	}


	echo "<script>alert('Data ditambahkan')</script>";
	echo "<script>location = 'tampil_siswa.php'</script>";
}
include "footer.php";
?>