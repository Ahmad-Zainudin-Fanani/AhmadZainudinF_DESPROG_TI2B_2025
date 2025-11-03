<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Valid credential contoh sesuai panduan
$validUser = 'admin';
$validPass = '1234';

if ($username === $validUser && $password === $validPass) {
    // set session
    $_SESSION['login']    = true;
    $_SESSION['username'] = $username;

    // arahkan ke halaman home
    header('Location: homeSession.php');
    exit;
} else {
    // gagal login
    echo 'Login gagal. Silakan login lagi di <a href="sessionLoginForm.html">sessionLoginForm.html</a>';
}
