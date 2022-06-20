<?php 
// Cara agar user tidak langsung ke halaman latihan2.php
// Dengan cek apakah ada data di dalam $_GET
if (!isset($_GET["id_brg"]) ||
    !isset($_GET["nama_brg"]) ||
    !isset($_GET["jenis_brg"]) ||
    !isset($_GET["jml_brg"]) ||
    !isset($_GET["foto_brg"])) {
    // Redirect
    header("Location: latihan1.php");
    exit; // Supaya kode html/kode yg dibawahnya tidak di eksekusi
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Daftar Barang</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["foto_brg"];?>" alt="<?= $_GET["foto_brg"];?>"></li>
        <li>ID Barang = <?= $_GET["id_brg"]; ?></li>
        <li>Nama Barang = <?= $_GET["nama_brg"]; ?></li>
        <li>Jenis Barang = <?= $_GET["jenis_brg"]; ?></li>
        <li>Jumlah Barang = <?= $_GET["jml_brg"]; ?></li>
    </ul>
    <a href="latihan1.php">Sebelumnya</a>
</body>
</html>