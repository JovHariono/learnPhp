<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
//koneksi ke db
// require "functions.php";
require 'functions.php';

if (isset($_POST["submit"])) {
    //ambil data dari tiap elemen form
    //ke function    

    //insert data
    //ke function

    if( insert($_POST) > 0 ){
        echo "
            <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php'
            </script>
        ";
    }else{
        echo "Data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for"nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required></type>
            </li>
            <li>
                <label for"nama">Nama : </label>
                <input type="text" name="nama" id="nama" required></type>
            </li>
            <li>
                <label for"email">Email : </label>
                <input type="text" name="email" id="email" required></type>
            </li>
            <li>
                <label for"jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required></type>
            </li>
            <li>
                <label for"gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar" required></type>
            </li>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </ul>
    </form>
</body>

</html>