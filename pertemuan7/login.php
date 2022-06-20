<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id_user']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id_user'];
    $uname = $_COOKIE['username'];

    // langkah 1 : ambil username berdasarkan id_user
    $result = mysqli_query($db, "SELECT username FROM user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // langkah 2 : cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username di db
    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        // cek password di db
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me (cookie)
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id_user']);
                setcookie('username', hash('sha256', $row['username']), time() + 60);
            }


            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">Username atau Password Salah!</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <br>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat Saya?</label>
            </li>
        </ul>
        <button type="submit" name="login">Masuk</button>
    </form>
</body>

</html>