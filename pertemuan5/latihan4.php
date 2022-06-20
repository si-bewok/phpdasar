<?php 
// Array Associative = key-nya adalah string yang kita buat sendiri
$mahasiswa = [
    ["nama" => "Zhafari",
    "nim" => "1234567890",
    "jurusan" => "SI",
    "email" => "zhafari@mhs.ac.id",
    "foto" => "zhafari.jpg"],

    ["nama" => "SiBewok",
    "nim" => "0987654321",
    "jurusan" => "TI",
    "email" => "sibewok@mhs.ac.id",
    "foto" => "sibewok.jpg"]
];

// Cara menampilkan array multidimensi yang berupa array numerik dan associative
// echo $mahasiswa[1]["email"];

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
            <li> <img src="img/<?= $mhs["foto"];?>"></li>
            <li>Nama    : <?= $mhs["nama"]; ?></li>
            <li>NIM     : <?= $mhs["nim"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email   : <?= $mhs["email"]; ?></li>
    </ul>
    <?php endforeach;?>
</body>
</html>

