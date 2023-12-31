<?php 
include "header.php";

$ambil_guru = $koneksi -> query("SELECT * FROM guru");

$guru = array();

while ($tiap_guru = $ambil_guru->fetch_assoc()) 
{
	$guru[] = $tiap_guru;
}

?>
<div class="card bg-white">
	<div class="card-body">
		<h3 class="mt-3">Import Guru</h3>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Import Data</label>
						<textarea class="form-control" name="isi" required></textarea >
						<i class="text-muted small">
							*Paste data siswa dari excel disini
						</i>
					</div>
					<div class="mb-3">
						<button class="btn btn-outline-primary" name="simpan">Simpan</button>
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
	$isi = $_POST["isi"];
	//memecah data berdasarkan baris
	$baris = explode("\n", $isi);
	foreach ($baris as $key => $perbaris) {

		//memecah data berdasarkan kolom
		$kolom = explode("\t", $perbaris);

		// echo "<pre>";
		// print_r($kolom);
		// echo "</pre>";
		
		if (isset($kolom[0]) AND isset($kolom[1]) AND isset($kolom[2]) AND isset($kolom[3]) AND isset($kolom[4]) AND isset($kolom[5]) AND isset($kolom[6]) AND isset($kolom[7]))

		{
			//memisahkan setiap data menjadi 1 variable
			$username_guru = $kolom["0"];
			$password_guru = $kolom["1"];
			$nama_guru = $kolom["2"];
			$lahir_guru = $kolom["3"];
			$tanggallahir_guru = $kolom["4"];
			$nip_guru = $kolom["5"];
			$jabatan_guru = $kolom["6"];
			$pendidikan_guru = $kolom["7"];
			$pangkat_golongan = $kolom["8"];
			$alamat_guru = $kolom["9"];
			$jk_guru = $kolom["10"];
			$hp_guru = $kolom["11"];

		//menyimpan data ke database
			$koneksi -> query("INSERT INTO guru(username_guru,password_guru,nama_guru,lahir_guru,tanggallahir_guru,nip_guru,jabatan_guru,pendidikan_guru,pangkat_golongan,alamat_guru,jk_guru,hp_guru) VALUES('$username_guru','$password_guru','$nama_guru','$lahir_guru','$tanggallahir_guru','$nip_guru','$jabatan_guru','$pendidikan_guru','$pangkat_golongan','$alamat_guru','$jk_guru','$hp_guru')");
		}
	}


	echo "<script>alert('Biodata Guru Berhasil Di Import!!!')</script>";
	echo "<script>location = 'tampil_guru.php'</script>";
}