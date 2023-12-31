<?php 
include "header.php";
?>
<main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 bg-white vh-100 py-3">
    <div class="card">
        <div class="card-body">
            <h6>Profil Admin</h6>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <img src="../asset/file/<?php echo $admin["foto_admin"] ?>" class="text-center mt-3" class="text-center" width="260">
                </div>
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" class="mt-5">
                        <div class="mb-3">
                            <label class="form-label">username</label>
                            <input type="text" class="form-control" name="username_admin" value="<?php echo $admin["username_admin"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password_admin" value="<?php echo $admin["password_admin"]; ?>">
                            <input type="checkbox" onclick="myFunction()">Tampilkan Password
                        </div>
                        <div class="mb-3">
                            <label class="form-label">nama</label>
                            <input type="text" class="form-control" name="nama_admin" value="<?php echo $admin["nama_admin"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">foto</label>
                            <!-- <img src="../asset/file/<?php echo $admin["foto_admin"]; ?>" width="100" class="rounded mb-1" > -->
                            <input type="file" class="form-control" name="foto_admin">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" name="simpan">SIMPAN</button>
                        </div>
                        <div class="mb-3">
                            <a href="tampil_admin.php" class="btn btn-outline-warning">CEK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
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
  $password = $_POST["password_admin"];
  $nama = $_POST["nama_admin"];
  $foto = $_FILES["foto_admin"] ["name"];
  $file = $_FILES["foto_admin"] ["tmp_name"];
  $up = date("YmdHis");
  $upload = $up.$foto;

  if (empty($file)) 
  {
     $koneksi -> query("UPDATE admin SET
        username_admin = '$user',
        password_admin = '$password',
        nama_admin     = '$nama' WHERE id_admin = '$id'");
 }

 else
 {
     $koneksi -> query("UPDATE admin SET
        username_admin = '$user',
        password_admin = '$password',
        nama_admin     = '$nama',
        foto_admin     = '$upload' WHERE id_admin = '$id'");

     move_uploaded_file($file,"../asset/file/$upload");
 }
 echo "<script>alert('data admin berhasil diubah')</script>";
 echo "<script>location = 'profiladmin.php'</script>";

}
?>

<?php
include "footer.php"; 

?>
