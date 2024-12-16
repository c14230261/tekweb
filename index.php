

<?php
include 'koneksi.php';


$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn,$query);
$no = 0;

// while($result = mysqli_fetch_assoc($sql)){
// // var_dump($sql);
// echo $result['nama_siswa' ]."<br>";
// };





?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>belajar_crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="d-flex">
          <a href="login.php" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
      <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </div>

    <div class="container">
        <a href="kelola.php" class="btn btn-primary my-1">Add</a>
        <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    An example success alert with an icon
  </div>
</div>
    </div>
    

    <!-- Table -->
    <div class="container">
        <table class="table align-middle table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Foto Siswa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                    <tr>
                    <td>
                        <?php echo ++$no;?>
                        </td>
                    <td>
                    <?php echo $result['nisn'];?>
                    </td>
                    <td>
                    <?php echo $result['nama_siswa'];?>
                    </td>
                    <td>
                    <?php echo $result['jenis_kelamin'];?>
                    </td>
                    <td><img src="img/<?php echo $result['foto_siswa'];?>" style="height: 100px;" alt=""></td>
                    <td>   <?php echo $result['alamat'];?></td>
                    <td >
                        <a href="proses.php?hapus=<?php echo $result['id_siswa'];?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                        <a href="kelola.php?ubah=<?php echo $result['id_siswa'];?>" class="btn btn-success btn-sm m-1">Edit</a>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Table Closed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>