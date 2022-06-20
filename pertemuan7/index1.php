<?php 
// Langkah 1 Membuat koneksi ke database
// Menggunakan fungsi => mysqli_connect("nama host", "nama user", "pwd user", "nama database");
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// Langkah 2 Query data dari database
// Menggunakan fungsi => mysqli_query("nama koneksi"/nama variabel, "perintah sql + nama tabel");
// Masukkan fungsi ke dalam variabel, agar dapat melihat hasil query apakah berhasil atau gagal
$result = mysqli_query($db, "SELECT * FROM stok_barang");

    // Cara 1 : dapat menggunakan var_dump
    // var_dump($result);

    // Cara 2 : menggunakan pengkondisian (if)
    if (!$result) {
        echo mysqli_error($db);
    }

// Langkah 3 Fetch data/ambil data dari objek result/hasil query

// Cara 1 mysqli_fetch_row = mengembalikan array numerik
// $a = mysqli_fetch_row($result);
// var_dump($a[2]);

// Cara 2
// mysqli_fetch_assoc = mengembalikan array associative
// $a = mysqli_fetch_assoc($result);
// var_dump($a["jml_brg"]);

// Cara 3
// mysqli_fetch_array = mengembalikan array multidimensi (numerik & associative)
// $a = mysqli_fetch_array($result);
// var_dump($a[1]);
// var_dump($a["nama_brg"]);

// Cara 4
// mysqli_fetch_object = mengembalikan objek
// $a = mysqli_fetch_object($result);
// var_dump($a->nama_brg);

// Kemudian, agar semua data tersaji, gunakan pengulangan!
// while ($a = mysqli_fetch_assoc($result)) {
//     var_dump($a);
// }
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

        <?php $i = 1;?>
        <?php while ( $data = mysqli_fetch_assoc($result) ) :?>
        <tr>
            <td align="center"><?= $i; ?></td>
            <td align="center"><img src="img/<?= $data["foto_brg"]; ?>" width="70" height="70"></td>
            <td align="center"><?= $data["id_brg"]; ?></td>
            <td align="center"><?= $data["nama_brg"]; ?></td>
            <td align="center"><?= $data["jenis_brg"]; ?></td>
            <td align="center"><?= $data["jml_brg"]; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
        </tr>
        <?php $i++?>
        <?php endwhile;?>


    </table>

</body>
</html>