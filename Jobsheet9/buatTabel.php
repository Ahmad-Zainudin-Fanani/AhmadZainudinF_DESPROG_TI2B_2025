<?php
require "koneksi.php";
$sql = "CREATE TABLE IF NOT EXISTS user (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL
)";
echo mysqli_query($connect, $sql) ? "OK" : mysqli_error($connect);
