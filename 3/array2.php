<?php
// pengulangan pada array

use function PHPSTORM_META\map;

$angka = [1, 3, 5, 7, 12, 45, 20, 59];
sort($angka)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array2</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 3px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php for ($i = 0; $i < count($angka); $i++) { ?>
        <div class="kotak">
            <?= $angka[$i] ?>
        </div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $a) {?>
        <div class="kotak">
            <?= $a ?>
        </div>
    <?php }?>

    <div class="clear"></div>

    <!-- penulisan yang bener -->
    <?php foreach($angka as $a) :?>
        <div class="kotak">
            <?= $a ?>
        </div>
    <?php endforeach?>
</body>

</html>