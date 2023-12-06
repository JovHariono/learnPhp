<?php
$mahasiswa = [["Jovan Hariono", "2301907473", "Computer Science", "Email"], ["Bryan Putra", "2301123548", "Computer Science", "Email"]]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        /* ul {
            list-style: none;
        } */
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    
    <?php foreach($mahasiswa as $m) : ?>
    <ul>
        
        <li>Nama : <?= $m[0] ?></li>
        <li>NRP : <?= $m[1] ?></li>
        <li>Jurusan : <?= $m[2] ?></li>
        <li>Email : <?= $m[3] ?></li>
    </ul>
    <?php endforeach?>
</body>

</html>