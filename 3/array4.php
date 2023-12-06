<?php
$angka = [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array 4</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: #bada55;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
        }

        .kotak:hover {
            transform: rotate(360deg);
            transition: 1s;
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php foreach ($angka as $agk) : ?>
        <?php foreach ($agk as $a) : ?>
            <div class="kotak">
                <?= $a ?>
            </div>
        <?php endforeach ?>
        <div class="clear"></div>
    <?php endforeach ?>
</body>

</html>