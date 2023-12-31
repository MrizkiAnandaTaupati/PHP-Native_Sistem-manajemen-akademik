<?php 
include '../koneksi.php';
if (!isset($_SESSION['guru'])) 
{
  echo "<script>alert('anda Harus login')</script>";
  echo "<script>location='../login.php'</script>";
}

$id_guru = $_SESSION["guru"]["id_guru"];
$ambil_guru = $koneksi -> query("SELECT * FROM guru WHERE id_guru = '$id_guru'");
$guru = $ambil_guru->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

  <!-- Custom styles for this template -->
  <link href="../asset/css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
  <script src="../asset/js/jquery-3.5.1.js"></script>

  <!-- Custom styles for this template -->
  <link href="../asset/css/dashboard.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
  <script src="../asset/js/jquery-3.5.1.js"></script>




  <style type="text/css">
    li
    {
      background: white;
      transition: 1.9s;

    }
    li:hover
    {
      background-color: #d2d3d2;

    }
  </style>
</head>
<body>
  <header class="navbar navbar-dark sticky-top p-0"  style="background: #95CD41;">
    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand me-0 px-3 fs-6 text-white" href="index.php">Selamat Datang Bapak & Ibu Guru Man 1 Cilacap</a>
    <div class="navbar-nav">
      <div class="navbar-item">
        <a class="nav-link px-3 text-white" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          Sign Out
        </a>
      </div>
    </div>  
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 position-fixed start-0 top-0 bottom-0 py-5 collapse d-md-block sidebar" style="background:#1A5D1A;">
        <div class="container pt-3 ">
          <div class="text-center text-white mb-2">
           <img src="../asset/file/guru/<?php echo $guru["foto_guru"]; ?>" class="img-fluid w-25 rounded">
           <h6><?php echo $_SESSION["guru"]["nama_guru"] ?></h6>
         </div>
         <ul class="nav flex-column">
          <li class="nav-item" style="background:#1A5D1A;">
            <a class="nav-link active text-white" aria-current="page" href="index.php">
              <i class="bi bi-bank2"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item" style="background:#1A5D1A;">
            <a class="nav-link text-white" href="profil_guru.php">
              <i class="bi bi-person-fill-gear"></i>
              Profil Guru
            </a>
          </li>

        </ul>
      </div> 
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light vh-100" style="background-image: url('../asset/file/logo/logogambar.png'); background-repeat: no-repeat; background-size: auto ; background-position: center center; ">
      




