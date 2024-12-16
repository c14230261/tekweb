<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM tb_login1 WHERE username = '$username' AND password = '$password'"; //Values = ngambil dari name = 'xxx'
$sql = mysqli_query($conn,$query);

if (mysqli_num_rows($sql) == 0) {
    echo '<script language = "javascript"> alert ("Username atau Password salah! Silahkan Login kembali."); document.location = "login.php";</script>';
} else {
    $row = mysqli_fetch_assoc($sql); // Ambil data user
    $_SESSION['username'] = $row['username']; // Simpan username ke session

    // Redirect ke halaman dashboard
    echo '<script language="javascript"> 
            alert("Login Berhasil."); 
            document.location = "index.php";
          </script>';
}



?>
