<?php 
// Variable Scope
// $x = 5; // variabel ini merupakan variabel lokal dalam halaman ini

// function tampilX() {
    // global $x; // untuk menggunakan variabel lokal yang terdapat di luar function/global (dalam halaman ini)
    // echo $x; // variabel ini merupakan variabel lokal dalam function ini
// }

// tampilX();

// Variable Superglobals = variabel built in php, yang berlaku untuk semua halaman
// Variable Superglobals bertipe Array Associative
/*  1. $_GET = data dikirim lewat URL
    2. $_POST = data dikirim lewat form
    3. $_REQUEST
    4. $_SESSION
    5. $_COOKIE
    6. $_SERVER
    7. $_ENV (environtment) 
*/

// Menggunakan $_GET

$barang = [
    [
        "id_brg" => "001",
        "nama_brg" => "Pulpen",
        "jenis_brg" => "ATK",
        "jml_brg" => 1000,
        "foto_brg" => "pulpen.png"
    ],
    [
        "id_brg" => "002",
        "nama_brg" => "Pensil",
        "jenis_brg" => "ATK",
        "jml_brg" => 800,
        "foto_brg" => "pensil.png"
    ],
    [
        "id_brg" => "003",
        "nama_brg" => "Gunting",
        "jenis_brg" => "ATK",
        "jml_brg" => 200,
        "foto_brg" => "gunting.png"
    ],
    [
        "id_brg" => "004",
        "nama_brg" => "Penghapus",
        "jenis_brg" => "ATK",
        "jml_brg" => 500,
        "foto_brg" => "penghapus.png"
    ],
    [
        "id_brg" => "005",
        "nama_brg" => "Tipe X",
        "jenis_brg" => "ATK",
        "jml_brg" => 350,
        "foto_brg" => "tipe_x.png"
    ],
    [
        "id_brg" => "006",
        "nama_brg" => "Lakban",
        "jenis_brg" => "ATK",
        "jml_brg" => 150,
        "foto_brg" => "lakban.png"
    ],
    [
        "id_brg" => "007",
        "nama_brg" => "Label",
        "jenis_brg" => "ATK",
        "jml_brg" => 500,
        "foto_brg" => "label.png"
    ],
    [
        "id_brg" => "008",
        "nama_brg" => "Kertas A4",
        "jenis_brg" => "ATK",
        "jml_brg" => 5000,
        "foto_brg" => "kertas_a4.png"
    ],
    [
        "id_brg" => "009",
        "nama_brg" => "Steples",
        "jenis_brg" => "ATK",
        "jml_brg" => 400,
        "foto_brg" => "steples.png"
    ],
    [
        "id_brg" => "010",
        "nama_brg" => "Penggaris",
        "jenis_brg" => "ATK",
        "jml_brg" => 300,
        "foto_brg" => "penggaris.png"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan GET</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <ul>
        <?php foreach ( $barang as $brg ) :?>
            <li>
                <!-- Mengirim data menggunakan metode Request GET -->
                <a href="latihan2.php?id_brg=<?= $brg["id_brg"];?>&nama_brg=
                <?= $brg["nama_brg"];?>&jenis_brg=
                <?= $brg["jenis_brg"];?>&jml_brg=
                <?= $brg["jml_brg"];?>&foto_brg=
                <?= $brg["foto_brg"];?>"><?= $brg["nama_brg"]; ?></a>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>