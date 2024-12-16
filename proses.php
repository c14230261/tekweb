<?php
    include 'koneksi.php';

   

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $nisn = $_POST['nisn'];
            $nama = $_POST['nama'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $foto = "2.jpg";
            $alamat = $_POST['alamat'];

            $query ="INSERT INTO tb_siswa VALUES(null,'$nisn','$nama','$jenisKelamin','$foto','$alamat')"; //Values = ngambil dari name = 'xxx'
            $sql = mysqli_query($conn,$query);

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }
            

            // echo $nisn. $nama. $jenisKelamin. $alamat. $foto;


            // echo "Tambah Data <a href='index.php'>[Home]</a>";



        } else if ($_POST['aksi']== "edit"){
            echo "Edit Data";

            $id_siswa = $_POST['id_siswa'];
            $nisn = $_POST['nisn'];
            $nama = $_POST['nama'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $alamat = $_POST['alamat'];

            $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama',jenis_kelamin='$jenisKelamin',alamat='$alamat' WHERE id_siswa=$id_siswa;";
            $sql = mysqli_query($conn,$query);

            if($sql){
                header("location: index.php");
            } 

        }
    }

    if(isset($_GET['hapus'])){
        $id_siswa = $_GET['hapus'];
        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header("location: index.php");
        } else {
            echo $query;
        }
        
        
        echo "Hapus Data <a href='index.php'>[Home]</a>";
    }

?>

