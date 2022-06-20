<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// pagination
$jml_data_tampil = 5;
$result = mysqli_query($db, "SELECT * FROM stok_barang");
$row = mysqli_num_rows($result);
$jml_halaman = ceil($row / $jml_data_tampil); // pembulatan ke atas

if (isset($_GET["halaman"])) {
    $halaman_aktif = $_GET["halaman"];
} else {
    $halaman_aktif = 1;
}
$indeks = ($jml_data_tampil * $halaman_aktif) - $jml_data_tampil;
    
$barang = query("SELECT * FROM stok_barang LIMIT $indeks, $jml_data_tampil");

// tombol pencarian
if (isset($_POST["cari"])) {
    $barang = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>

    <h1>Daftar Stok Barang</h1>

    <a href="tambah.php">
        <button>Tambah</button>
    </a>

    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="20" placeholder="Masukkan Keyword..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>

    <?php //for ($i = 1, $i <=$jml_halaman, $i++) : ?>
        <!-- <a href="?halaman= <?= $i; ?>"><?= $i; ?></a> -->
    <?php //endfor ;?> -->

    <br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Foto Barang</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Barang</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($barang as $data) : ?>
            <tr>
                <td align="center"><?= $i; ?></td>
                <td align="center"><img src="img/<?= $data["foto_brg"]; ?>" width="70" height="70"></td>
                <td align="center"><?= $data["id_brg"]; ?></td>
                <td align="center"><?= $data["nama_brg"]; ?></td>
                <td align="center"><?= $data["jenis_brg"]; ?></td>
                <td align="center"><?= $data["jml_brg"]; ?></td>
                <td>
                    <a href="ubah.php?id_brg=<?= $data["id_brg"]; ?>">ubah</a> |
                    <a href="hapus.php?id_brg=<?= $data["id_brg"]; ?>" onclick="return confirm('Hapus Data?');">hapus</a>
                    <!-- onclick => tampilkan konfirmasi hapus data dengan javascript -->
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>


    </table>
    <br>
    <a href="logout.php">
        <button type="submit">Logout</button>
    </a>
</body>

</html>