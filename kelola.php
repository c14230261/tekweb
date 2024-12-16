<!doctype html>


<?php
include 'koneksi.php';

$id_siswa = '';
$nisn = '';
$nama = '';
$jenisKelamin = '';
$alamat = '';


if (isset($_GET['ubah'])){
  $id_siswa = $_GET['ubah'];

  $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
  $sql = mysqli_query($conn,$query);

  $result = mysqli_fetch_assoc($sql); // kalau result ngambil dari nama database

  $nisn = $result['nisn'];
  $nama = $result['nama_siswa'];
  $jenisKelamin = $result['jenis_kelamin']; 
  $alamat = $result['alamat'];
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>belajar_crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <!-- Navbar Open -->
    <nav class="navbar bg-body-secondary ">
        <div class="container">
          <a class="navbar-brand" href="#">
        Database
          </a>
          <button class="btn btn-primary text-white">Login</button>
        
        </div>
    </nav>
    <!-- Navbar tutup -->

    <div class="container g-3">
      
      <form method="POST" action="proses.php">
        <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
      <div class="row my-2 align-items-center">
        <div class="col-md-2">
          <label for="inputNISN" class="col-form-label">NISN</label>
        </div>
        <div class="col-md-6">
          <input required type="text" id="inputNISN" name="nisn" value="<?php echo $nisn; ?>" class="form-control mx-auto" placeholder="ex : 112233" >
        </div>
      </div>

      <div class="row my-2 align-items-center">
        <div class="col-md-2">
          <label for="inputNama" class="col-form-label">Nama</label>
        </div>
        <div class="col-md-6">
          <input required type="text" id="inputNama" value="<?php echo $nama; ?>" name="nama" class="form-control "  >
        </div>
        <div class="col-auto">

        </div>
      </div>

      <div class="row my-2 align-items-center">
        <div class="col-md-2">
          <label for="inputJenisKelamin" class="col-form-label">Jenis Kelamin</label>
        </div>
        <div class="col-md-6">
          <select required id="inputJenisKelamin" class="form-select" name="jenisKelamin" value="<?php echo $jenisKelamin; ?>" aria-label="Default select example">
            <option <?php if($jenisKelamin == 'Laki-laki'){echo "selected";}?> value="Laki-laki">Laki-laki</option>
            <option <?php if($jenisKelamin == 'Perempuan'){echo "selected";}?> value="Perempuan" >Perempuan</option>
          </select>
  
        </div>
      </div>


      <div class="row my-2 align-items-center">
        <div class="col-md-2">
          <label for="inputFileInput" class="col-form-label">Foto Profile</label>
        </div>
        <div class="col-md-6">
          <div class="mb-1">
            <input class="form-control" name="foto" type="file" id="inputFileInput">
          </div>
      </div>


      <div class="row my-2">
        <div class="col-md-2">
          <label for="inputAlamat" class="col-form-label">Alamat</label>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <textarea required class="form-control" name="alamat" placeholder="Leave a comment here" id="inputAlamat" style="height: 100px"><?php echo $alamat; ?>
            </textarea>
            <div class="row">
              
                <?php
                if(isset($_GET['ubah'])){
                ?>
                <div class="col-auto">
                <button type="submit" name="aksi" value="edit" class="btn btn-primary my-2">Simpan Perubahan</button>
              </div>
              <?php
                } else {
                  
              ?>
              <div class="col-auto">
                <button type="submit" name="aksi" value="add" class="btn btn-primary my-2">Tambah Data</button>
              </div>
              <?php
                }
                ?>
              <div class="col-auto">
                <a href="index.php" type="button" class="btn btn-danger my-2">Back</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      </form>
     



    </div>
    
    <!-- Table Closed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  
  
  
  </body>
</html>