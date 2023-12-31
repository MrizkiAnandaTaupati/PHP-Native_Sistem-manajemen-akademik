<?php 
include "header.php";

$ambil_jurusan= $koneksi -> query("SELECT * FROM jurusan");

$jurusan = array();

while ($tiap_jurusan = $ambil_jurusan->fetch_assoc()) 
{
    $jurusan[] = $tiap_jurusan; 
}

?>
<div class="container">
    <div class="col-md-15 p-5 m-5 card bg-white shadow">
        <div class="table-responsive">
            <h4>Jurusan</h4>
            <hr>
            <table id="datatabel" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jurusan as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value["nama_jurusan"] ?></td>
                            <td class="text-center">
                                <a href="jurusan_tahun.php?id=<?php echo $value["id_jurusan"]; ?>" class="btn-sm btn btn-outline-info">Tahun Ajaran</a>
                                <a href="ubah_jurusan.php?id=<?php echo $value["id_jurusan"]; ?>" class="btn-sm btn btn-outline-warning">Ubah </a>
                                <a href="hapus_jurusan.php?id=<?php echo $value["id_jurusan"]; ?>" class="btn-sm btn btn-outline-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Jurusan Ini?')">Hapus</a>

                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            <a href="tambah_jurusan.php" class="btn btn-outline-primary">Tambah</a>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>
