<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="asset/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="asset/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	
	<style type="text/css" media="screen">
		*:before,
		*:after{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #32CD32;
		}
		.background{
			width: 430px;
			height: 520px;
			position: absolute;
			transform: translate(-50%,-50%);
			left: 50%;
			top: 50%;
		}
		.background .shape{
			height: 200px;
			width: 200px;
			position: absolute;
			border-radius: 50%;
		}
		.shape:first-child{
			background: linear-gradient(
				#FF0000,
				#FFFF00
			);
			left: -80px;
			top: -80px;
		}
		.shape:last-child{
			background: linear-gradient(
				to right,
				#FFFF00,
				#FF4500
			);
			right: -30px;
			bottom: -80px;
		}
		form{
			height: 580px;
			width: 400px;
			background-color: rgba(255,255,255,0.13);
			position: absolute;
			transform: translate(-50%,-50%);
			top: 50%;
			left: 50%;
			border-radius: 10px;
			backdrop-filter: blur(10px);
			border: 2px solid rgba(255,255,255,0.1);
			box-shadow: 0 0 40px rgba(8,7,16,0.6);
			padding: 50px 35px;
		}
		form *{
			font-family: 'Poppins',sans-serif;
			color: #ffffff;
			letter-spacing: 0.5px;
			outline: none;
			border: none;
		}
		form h3{
			font-size: 32px;
			font-weight: 500;
			line-height: 42px;
			text-align: center;
		}

		label{
			display: block;
			margin-top: 30px;
			font-size: 16px;
			font-weight: 500;
		}
		input{
			display: block;
			height: 50px;
			width: 100%;
			background-color: rgba(255,255,255,0.07);
			border-radius: 3px;
			padding: 0 10px;
			margin-top: 8px;
			font-size: 14px;
			font-weight: 300;
		}
		::placeholder{
			color: #e5e5e5;
		}
		button{
			margin-top: 30px;
			width: 100%;
			background-color: #ffffff;
			color: #080710;
			padding: 15px 0;
			font-size: 18px;
			font-weight: 600;
			border-radius: 5px;
			cursor: pointer;
		}
		.social{
			margin-top: 30px;
			display: flex;
		}
		.social div{
			background: red;
			width: 100px;
			border-radius: 3px;
			padding: 5px 10px 10px 5px;
			background-color: rgba(255,255,255,0.27);
			color: #eaf0fb;
			text-align: center;
		}
		.social div:hover{
			background-color: rgba(255,255,255,0.47);
		}
		.social .fb{
			margin-left: 25px;
		}
		.social i{
			margin-right: 4px;
		}
	</style>

</head>
<body>
	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<form method="post">
		<h2 class="text-center">Selamat Datang Di Sistem Akademik</h2>
		<h4 class="text-center">Man 1 Cilacap</h4>
		<label for="username">Username</label>
		<input type="text" class="form-control" placeholder="masukkan username anda" name="login_username">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="inputPassword" placeholder="masukan password anda" name="login_password">
		<div class="mb-1 row">
			<div class="ms-2">
				<input type="checkbox" class="form-check-input" id="show-password">Show Password
			</div>
		</div> 
		<button name="masuk" class="btn btn-warning">Log In</button>
	</form>
	<?php 
	if (isset($_POST["masuk"])) 
	{
		$user = $_POST["login_username"];
		$password = $_POST["login_password"];

		$cek = $koneksi -> query("SELECT * FROM admin WHERE username_admin = '$user' AND password_admin='$password'");

		$hitung = $cek->num_rows;

		if ($hitung==1) 
		{
			$login = $cek -> fetch_assoc();

			$_SESSION["admin"] = $login;

			echo "<script>alert('Login berhasil')</script>";
			echo "<script>location = 'admin/index.php'</script>";
		}

		else
		{
			$cek1 = $koneksi -> query("SELECT * FROM guru WHERE username_guru = '$user' AND password_guru='$password'");

			$hitung1 = $cek1->num_rows;

			if ($hitung1==1) 
			{
				$login1 = $cek1 -> fetch_assoc();

				$_SESSION["guru"] = $login1;

				echo "<script>alert('Login berhasil')</script>";
				echo "<script>location = 'guru/'</script>";



			}

			else
			{
				$cek = $koneksi -> query("SELECT *FROM siswa WHERE nis_siswa='$user' AND password_siswa='$password'");
				$hitung = $cek->num_rows;

				if ($hitung==1) 
				{
					$data_login = $cek->fetch_assoc();
					$_SESSION['siswa'] = $data_login;

					echo "<script>alert('Login Berhasil')</script>";
					echo "<script>location = 'Siswa/'</script>";
				}

				else
				{
					echo "<script>alert('Username atau password salah !')</script>";
					echo "<script>location = 'login.php'</script>";


				}

			}

			
		}

	}

	?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#show-password').click(function() {
				if ($(this).is(':checked')) {
					$('#inputPassword').attr('type', 'text');
				} else {
					$('#inputPassword').attr('type', 'password');
				}
			});
		});
	</script>

</body>
</html>





