<?php
// $mahasiswa = [["Jovan Hariono", "2301907473", "jovanhariono@gmail.com", "Computer Science"], ["Abed", "2301907473", "abed@gmail.com", "Computer Science"]]

//Array Associative
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [["nama" => "Jovan Hariono", "nim" => "2301907473", "email" => "jovanhariono@gmail.com", "jurusan" => "Computer Science"], ["nama" => "Abed", "nim" => "2301907473", "email" => "abed@gmail.com", "jurusan" => "Computer Science"]]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array 4</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <a href="latihanArray4-detail.php?nama=<?= $mhs["nama"] ?>&nim=<?= $mhs["nim"] ?>&email=<?= $mhs["email"] ?>&jurusan=<?= $mhs["jurusan"] ?>">Nama : <?= $mhs["nama"] ?></a>
            </li>
        </ul>
    <?php endforeach ?>
</body>

</html>