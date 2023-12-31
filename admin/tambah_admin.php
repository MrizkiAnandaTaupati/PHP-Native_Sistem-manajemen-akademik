<?php 
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Man 1 Cilacap</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../asset/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/dataTables.bootstrap5.min.css">
</head>
<body>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.108.0">
	<title>MAN 1 Cilacap</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="../asset/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/5.3/examples/dashboard/dashboard.css">

	<!-- Custom styles for this template -->
	<link href="../asset/css/dashboard.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
	<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
	<script src="../asset/js/jquery-3.5.1.js"></script>

	<style type="text/css">
		li
		{
			background: white;
			transition: 0.5s;

		}
		li:hover
		{
			background-color: #d2d3d2;

		}
	</style>
</head>
<div class="container-fluid">
	<div class="col-md-15 p-5 m-5 card bg-warning-subtle shadow">
		<h4>Form Pendaftaran Admin Man 1 Cilacap</h4>
		<hr>
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label>Username</label>
					<input type="text" class="form-control" name="username_admin">
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" class="form-control" id="inputPassword" name="password_admin">
					<input type="checkbox" onclick="myFunction()">Tampilkan Password
				</div>
				<div class="mb-3">
					<label>Nama Admin</label>
					<input type="text" class="form-control" name="nama_admin">
				</div>
				<div class="mb-3">
					<label>Foto Admin</label>
					<input type="file" class="form-control" name="foto_admin">
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" name="simpan">Simpan</button>
				</div>
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
		$user = $_POST["username_admin"];
		$password =$_POST["password_admin"];
		$nama = $_POST["nama_admin"];
		$foto = $_FILES["foto_admin"] ["name"];
		$file = $_FILES["foto_admin"] ["tmp_name"];
		$waktu = date("YmdHis");
		$waktu_foto = $waktu.$foto;

		move_uploaded_file($file,"../asset/file/$waktu_foto");

		$koneksi -> query("INSERT INTO admin(username_admin,password_admin,nama_admin,foto_admin) VALUES('$user','$password','$nama','$waktu_foto')"); 

		echo "<script>alert('berhasil menambahkan admin')</script>";
		echo "<script>location = 'tampil_admin.php'</script>";
	}


	include "footer.php";
	?>

