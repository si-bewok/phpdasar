<?php
session_start();
session_unset(); // hapus session
session_destroy(); // hapus session

setcookie('id_user', '', time() - 3600); // hapus cookie
setcookie('username', '', time() - 3600); // hapus cookie

header("Location: login.php"); //redirect ke halaman login
exit;
