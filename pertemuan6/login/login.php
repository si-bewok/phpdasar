<?php 
// Cek apakah tombol sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    // Cek username/password
    if ( $_POST["username"] == "admin" && $_POST["password"] == "12345" ) {
        // Jika benar, redirect ke halaman admin
        header("Location: admin.php");
        exit;
    }  else {
        // Jika salah, tampilkan pop up notifikasi
        $error = true;
    }
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
    <h1>Login Admin</h1>

    <?php if ( isset($error) ) :?>
    <p style="color: red; font-style: italic;">Username atau Password salah!</p>
    <?php endif;?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
    </ul>
</body>
</html>