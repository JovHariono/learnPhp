<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
//connect database
//ke functions
require 'functions.php';

//ambil data dari mahasiswa
//query juga di functions
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id");

//jika tombol cari ditekan maka query ganti
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php" onclick="return confirm('Apakah anda ingin logout?')">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>

    <br></br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="Search..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Search</button>
    </form>

    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1 ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Hapus</a>
                    </td>
                    <td><img src="img/<?= $row["gambar"] ?>" alt="unknown" width="50px"></td>
                    <td><?= $row["nrp"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["jurusan"] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>

</html>