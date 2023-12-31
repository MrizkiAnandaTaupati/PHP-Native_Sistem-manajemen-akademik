<?php 
include "dashboard.php";

$ambil_siswa = $koneksi -> query("SELECT * FROM siswa LEFT JOIN jurusan ON jurusan.id_jurusan = siswa.id_jurusan");
$siswa = array();
while ($data_siswa = $ambil_siswa ->fetch_assoc())
{
	$siswa[] = $data_siswa;
}

?>


<h4>DATA SISWA</h4>
<hr>
<div class="table-responsive">
	<table id="testing" class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Nisn</th>
			<th>Nis</th>
			<th>Kelas</th>
			<th>Nama Orang Tua</th>
			<th>Pekerjaan Orang Tua</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Foto Siswa</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($siswa as $key => $value): ?>
			<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_siswa"]; ?></td>
			<td><?php echo $value["nama_jurusan"]; ?></td>
			<td><?php echo number_format($value["nisn_siswa"]); ?></td>
			<td><?php echo number_format($value["nis_siswa"]); ?></td>
			<td><?php  ?></td>
			<td><?php echo $value["nama_orangtua"]; ?></td>
			<td><?php echo $value["pekerjaan_orangtua"]; ?></td>
			<td><?php echo $value["tempat_lahir"]; ?></td>
			<td><?php echo date("d M Y",strtotime($value["tanggal_lahir"])); ?></td>
			<td><?php echo $value["alamat"]; ?></td>
			<td><?php echo $value["jk_siswa"]; ?></td>
			<td>
				<img src="../asset/file/<?php echo $value["foto_siswa"]; ?>" width="100" class="rounded">
			</td>
			<td></td>
		</tr>
		<?php endforeach ?>
		
	</tbody>
</table>
</div>