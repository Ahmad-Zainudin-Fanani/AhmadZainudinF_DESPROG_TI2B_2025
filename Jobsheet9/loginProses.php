<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query  = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($connect, $query);
$cek    = mysqli_num_rows($result);

if ($cek) {
  echo "Anda berhasil login. silahkan menuju : ";
  echo '<a href="homeAdmin.html">Halaman HOME</a>';
} else {
  echo "Anda gagal login. silahkan : ";
  echo '<a href="loginForm.html">Login kembali</a>';
}

echo mysqli_error($connect);
