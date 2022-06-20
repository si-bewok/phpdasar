<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol sudah diklik/belum
if (isset($_POST["submit"])) {
    // cek apakah data penambahan data berhasil/gagal
    if (tambah($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'index.php';
                </script>
            "; // syntax pop up dari javascript
    } else {
        echo "
            <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'tambah.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Stok Barang</title>
</head>

<body>

    <h1>Tambah Data Stok Barang</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_brg">Nama Barang : </label>
                <input type="text" name="nama_brg" id="nama_brg" required>
                <!-- required => harus diisi -->
            </li>
            <li>
                <label for="jenis_brg">Jenis Barang : </label>
                <input type="text" name="jenis_brg" id="jenis_brg" required>
            </li>
            <li>
                <label for="jml_brg">Jumlah Barang : </label>
                <input type="text" name="jml_brg" id="jml_brg" required>
            </li>
            <li>
                <label for="foto_brg">Foto Barang : </label>
                <input type="file" name="foto_brg" id="foto_brg" required>
            </li>
        </ul>
        <button type="submit" name="submit">Simpan</button>
    </form>

</body>

</html>