<?php 
// Menampilkan Array untuk User
// menggunakan Pengulangan = for/foreach

$angka = [1,2,3,4,5];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: mediumturquoise;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear{clear: both ;}
    </style>
</head>
<body>
        <!-- penggunaan fungsi count untuk menghitung berapa banyak jumlah array, sekalipun ada penambahan elemen -->
    <?php for ($i=0; $i < count($angka); $i++) {?> 
       <div class="kotak"><?= $angka[$i]; ?></div> 
        <?php } ?>
<div class="clear"></div>
    
    <?php foreach ($angka as $a) {?>
        <div class="kotak"><?= $a; ?></div>
    <?php }?>
<div class="clear"></div>

    <!-- Penulisan templating -->
    <?php foreach ($angka as $a) : ?>
        <div class="kotak"> <?= $a; ?> </div>
<?php endforeach; ?>

</body>
</html>