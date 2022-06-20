<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id_brg"];
// query data untuk di tampilkan pada form
$brg = query("SELECT * FROM stok_barang WHERE id_brg = $id")[0];

// cek apakah tombol sudah diklik/belum
if (isset($_POST["submit"])) {
    // cek apakah perubahan data berhasil/gagal
    if (ubah($_POST) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'index.php';
                </script>
            "; // syntax pop up dari javascript
    } else {
        echo "
            <script>
                    alert('Data Gagal Diubah');
                    document.location.href = 'index.php';
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
    <title>Ubah Data Stok Barang</title>
</head>

<body>

    <h1>Ubah Data Stok Barang</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_brg" value="<?= $brg["id_brg"]; ?>">
        <input type="hidden" name="foto_brg_lama" value="<?= $brg["foto_brg"]; ?>">
        <ul>
            <li>
                <label for="nama_brg">Nama Barang : </label>
                <input type="text" name="nama_brg" id="nama_brg" required value="<?= $brg["nama_brg"]; ?>">
                <!-- required => harus diisi -->
            </li>
            <li>
                <label for="jenis_brg">Jenis Barang : </label>
                <input type="text" name="jenis_brg" id="jenis_brg" required value="<?= $brg["jenis_brg"]; ?>">
            </li>
            <li>
                <label for="jml_brg">Jumlah Barang : </label>
                <input type="text" name="jml_brg" id="jml_brg" required value="<?= $brg["jml_brg"]; ?>">
            </li>
            <li>
                <label for="foto_brg">Foto Barang : </label> <br>
                <img src="img/<?= $brg["foto_brg"]; ?>" width="70" height="70"> <br>
                <input type="file" name="foto_brg" id="foto_brg">
            </li>
        </ul>
        <button type="submit" name="submit" onclick="return confirm('Ubah Data?');">Simpan</button>
    </form>

</body>

</html>