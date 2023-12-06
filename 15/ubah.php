<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
//koneksi ke db
// require "functions.php";
require 'functions.php';

//ambil data di url
$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    //ambil data dari tiap elemen form
    //ke function    

    //insert data
    //ke function    

    if (update($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "Data gagal diubah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
                <input type="hidden" name="id" id="id" required value="<?= $mhs["id"] ?>" hidden></type>
                <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>" hidden>
            <li>
                <label for"nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ?>"></type>
            </li>
            <li>
                <label for"nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>"></type>
            </li>
            <li>
                <label for"email">Email : </label>
                <input type="text" name="email" id="email" required value=<?= $mhs["email"] ?>></type>
            </li>
            <li>
                <label for"jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value=<?= $mhs["jurusan"] ?>></type>
            </li>
            <li>
                <label for"gambar">Gambar : </label>
                <br>
                <img src="img/<?= $mhs["gambar"] ?>" width="50px" alt="">
                <br>
                <input type="file" name="gambar" id="gambar"></type>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>

</html>