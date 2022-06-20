<?php
require 'functions.php';

if (isset($_POST["daftar"])) {

    if (registrasi($_POST) > 0) {
        echo "
                <script>
                    alert('Registrasi Berhasil!');
                    document.location.href = 'login.php';
                </script>
            ";
    } else {
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>

    <h1>Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required>
            </li>
            <br>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required>
            </li>
            <br>
            <li>
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <br>
            <li>
                <label for="nama_user">Nama Lengkap : </label>
                <input type="text" name="nama_user" id="nama_user" required>
            </li>
            <br>
            <li>
                <label for="nohp_user">Nomor HP : </label>
                <input type="text" name="nohp_user" id="nohp_user" required>
            </li>
            <br>
            <li>
                <label for="email_user">E-mail : </label>
                <input type="email" name="email_user" id="email_user" required autocomplete="off">
            </li>
            <br>
            <li>
                <label for="tipe_user">Kategori Pengguna : </label>
                <input type="text" name="tipe_user" id="tipe_user" required>
            </li>
        </ul>
        <button type="submit" name="daftar" required>Daftar</button>
    </form>

</body>

</html>