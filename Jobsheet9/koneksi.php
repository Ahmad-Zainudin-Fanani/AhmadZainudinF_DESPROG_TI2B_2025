<?php
$connect = mysqli_connect("localhost","root","","prakwebdb");
if (mysqli_connect_errno()) {
  die("Gagal koneksi: " . mysqli_connect_error());
}
