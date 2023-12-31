<?php 
include "header_print.php";

$id_guru = $_GET["id"];

$ambil_guru = $koneksi ->query("SELECT * FROM guru WHERE id_guru = '$id_guru'");

$guru = $ambil_guru->fetch_assoc();
?>
<h4 class="my-3">Formulir</h4>
<hr>
<div class="text-center">
	<img src="../asset/file/<?php echo $guru["foto_guru"]; ?>" width="270" class="img-fluid">
</div>
<div class="row">
	<div class="col-8 offset-2 mt-3">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>NAMA</th>
					<td>: <?php echo $guru["nama_guru"]; ?></td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>: <?php echo $guru["lahir_guru"]; ?></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>: <?php echo $guru["tanggallahir_guru"]; ?></td>
				</tr>
				<tr>
					<th>NIP Guru</th>
					<td>: <?php echo $guru["nip_guru"]; ?></td>
				</tr>
				<tr>
					<th>Jabatan Guru</th>
					<td>: <?php echo $guru["jabatan_guru"]; ?></td>
				</tr>
				<tr>
					<th>Pendidikan Terakhir</th>
					<td>: <?php echo $guru["pendidikan_guru"]; ?></td>
				</tr>
				<tr>
					<th>Pangkat/Golongan</th>
					<td>: <?php echo $guru["pangkat_golongan"]; ?></td>
				</tr>
				<tr>
					<th>Alamat Guru</th>
					<td>: <?php echo $guru["alamat_guru"]; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin Guru</th>
					<td>: <?php echo $guru["jk_guru"]; ?></td>
				</tr>
				<tr>
					<th>No Telp Guru</th>
					<td>: <?php echo $guru["hp_guru"]; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript"> print();</script>
<?php 
include "footer.php";

?>