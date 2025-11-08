<?php
require "koneksi.php";
$sql = "INSERT INTO user (username,password) VALUES ('admin', MD5('123'))";
echo mysqli_query($connect, $sql) ? "OK" : mysqli_error($connect);
