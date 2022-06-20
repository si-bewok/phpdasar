<?php 
// Pengulangan
// 1. for
// for ($i=0; $i < 5; $i++) { 
//     echo "Halo Sob <br>";
// }
// 2. while
// $a = 0;
// while ($a < 5) {
//     echo "Halo Bro <br>";
// $a++;
//}
// 3. do.. while
// $a = 0;
// do {
//     echo "Halo Cuy <br>";
//     $a++;
// } while ($a < 5);
// 4. foreach (khusus untuk array)
?>

<!-- CONTOH KASUS : Membuat Tabel dengan Pengulangan -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i=0; $i <= 3; $i++) : ?>
            <tr>
                <?php for ($j=0; $j <=5 ; $j++) : ?>
                    <td><?php echo "$i,$j";?></td>
                <?php endfor; ?>
            </tr> 
        <?php endfor; ?>
    </table>
</body>
</html>