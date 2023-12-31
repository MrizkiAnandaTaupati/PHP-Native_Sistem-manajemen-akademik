<?php 
include "header.php";

$ambil_guru = $koneksi -> query("SELECT * FROM guru");
$guru = array();
while($data_guru = $ambil_guru->fetch_assoc())
{
    $guru[] = $data_guru;
}
$jumlah_guru = count($guru);

$ambil_siswa = $koneksi -> query("SELECT * FROM siswa");
$siswa = array();
while($data_siswa = $ambil_siswa -> fetch_assoc())
{
    $siswa[] = $data_siswa;
}
$jumlah_siswa = count($siswa);

$ambil_kelas = $koneksi -> query("SELECT * FROM kelas");
$kelas = array();
while($data_kelas = $ambil_kelas -> fetch_assoc())
{
    $kelas[] = $data_kelas;
}
$jumlah_kelas = count($kelas);

$ambil_mapel = $koneksi -> query("SELECT * FROM mapel");
$mapel = array();
while($data_mapel = $ambil_mapel -> fetch_assoc())
{
    $mapel[] = $data_mapel;
}
$jumlah_mapel = count($mapel);
?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Selamat Datang Di Panel Man 1 Cilacap</li>
</ol>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><div class="card-header text-center shadow">
                <h2>
                    <i class="bi bi-mortarboard-fill"></i> : <?php echo $jumlah_siswa ?>
                </h2>
            </div></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampil_siswa.php">Siswa Man 1 Cilacap</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <div class="card-header text-center shadow">
                    <h2>
                        <i class="bi bi-people-fill"></i> : <?php echo $jumlah_guru ?>
                    </h2>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampil_guru.php">Pengajar Man 1 Cilacap</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body"><div class="card-header text-center shadow">
                <h2>
                    <i class="bi bi-journal-bookmark-fill"></i> : <?php echo $jumlah_mapel ?>
                </h2>
            </div></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="tampil_mapel.php">Mata Pelajaran Man 1 Cilacap</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <div class="card-header text-center shadow">
                            <h2>
                                <i class="bi bi-buildings"></i> : <?php echo $jumlah_kelas ?>
                            </h2>
                        </div></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="tampil_kelas.php">Kelas Man 1 Cilacap</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            <?php 
            include "footer.php";
            ?>
