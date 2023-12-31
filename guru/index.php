<?php 
include "header.php";

$ambil_tahun = $koneksi ->query("SELECT * FROM tahun");
$tahun = array();

while ($tiap_tahun = $ambil_tahun->fetch_assoc()) 
{
    $tahun[] = $tiap_tahun;
}

if (isset($_POST["simpan"])) 
{
    $_SESSION["id_tahun"] = $_POST["id_tahun"];
    echo "<script>location='tampil_mengajar.php'</script>";
}

if (isset($_SESSION["id_tahun"])) 
{
    $id_tahun_terpilih = $_SESSION['id_tahun'];
}

else
{
    $id_tahun_terpilih = '';
}

// echo "<pre>";
// print_r($id_tahun_terpilih);
// echo "</pre>";
?>
<div class="card">
    <div class="card-body">
        <h2>Selamat Datang Bapak & Ibu Guru</h2>
        <h4> <?php echo $guru["nama_guru"]; ?> </h4>
        <hr>
        <p>Selamat Datang Bapak & Ibu Guru Man 1 Cilacap, Didalam Menu Sistem Akademik Man 1 Cilacap, Bapak & Ibu Guru Dapat Melakukan Menginputan Nilai-Nilai Siswa Berdasarkan Kelas, Tahun Ajaran, Jurusan, Dan Mata Pelajaran yang Diampu oleh Bapak & Ibu Guru Yang Sesuai Dengan Jadwal Kelas. Jika Ada Pertanyaan Silahkan Hubungi Admin Operator Pada Saat Jam Kerja, Terima Kasih.
        </p>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow p-3">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tahun</label>
                            <select name="id_tahun" class="form-control">
                                <option>Pilih Tahun Ajaran</option>
                                <?php foreach ($tahun as $key => $value): ?>
                                    <option value="<?php echo $value["id_tahun"] ?>" <?php if ($id_tahun_terpilih==$value["id_tahun"]) {echo "selected";} ?>><?php echo $value["tahun_ajaran"]; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" name="simpan" >Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php";
?>