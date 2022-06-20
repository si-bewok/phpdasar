<?php 

// Array di dalam array (multidimensi)
$mahasiswa = [
    ["M.Zhafari", "11170930000096", "Sistem Informasi", "muhammad.zhafari17@mhs.uinjkt.ac.id"],
    ["Abdul", "11170930000097", "Sistem Informasi", "abdul17@mhs.uinjkt.ac.id"]
]; // array numerik (indeks berupa angka)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ( $mahasiswa as $mhs ) :?>
    <ul>
            <li>Nama    : <?= $mhs[0]; ?></li>
            <li>NIM     : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email   : <?= $mhs[3]; ?></li>
    </ul>
    <?php endforeach;?>
</body>
</html>