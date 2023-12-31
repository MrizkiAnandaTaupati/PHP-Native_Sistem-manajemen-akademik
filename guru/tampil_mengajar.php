<?php 
include "header.php";

$id_tahun_terpilih = $_SESSION["id_tahun"];

$ambil_mengajar = $koneksi ->query("SELECT * FROM mengajar LEFT JOIN mapel ON mengajar.id_mapel = mapel.id_mapel LEFT JOIN kelas ON kelas.id_kelas = mengajar.id_kelas LEFT JOIN tahun ON tahun.id_tahun = kelas.id_tahun WHERE id_guru = '$id_guru' AND tahun.id_tahun = '$id_tahun_terpilih'");
$mengajar = array();
while ($tiap_mengajar = $ambil_mengajar->fetch_assoc()) 
{
    $mengajar[] = $tiap_mengajar;
}

$ambil_tahun = $koneksi -> query("SELECT * FROM tahun WHERE id_tahun = '$id_tahun_terpilih'");
$tahun = $ambil_tahun -> fetch_assoc();


// echo "<pre>";
// print_r($tahun);
// echo "</pre>";

?>
<div class="container">
    <div class="md-8">
         <div class="col-md-15 p-5 m-5 me-4 card bg-white shadow">
        <div class="table-responsive">
            <h4>Mata Pelajaran Tahun <?php echo $tahun["tahun_ajaran"]; ?></h4>
            <hr>
            <table id="datatabel" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mengajar as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value["nama_mapel"]; ?></td>
                            <td><?php echo $value["nama_kelas"]; ?></td>
                            <td><?php echo $value["semester"]; ?></td>
                            <td nowrap="nowrap">
                                <a href="siswa_kelas.php?id=<?php echo $value["id_kelas"]; ?>&idm=<?php echo $value["id_mengajar"]; ?>" class="btn-sm btn btn-outline-warning">Siswa</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<?php 
include "footer.php";
?>