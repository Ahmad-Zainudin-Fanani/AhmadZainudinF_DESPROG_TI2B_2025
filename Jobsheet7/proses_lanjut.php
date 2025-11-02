<?php
// proses_lanjut.php
// Ambil semua input (POST)
$selectedBuah = $_POST['buah'] ?? '';

if (isset($_POST['warna'])) {
  $selectedWarna = $_POST['warna'];       // array checkbox
} else {
  $selectedWarna = [];                     // tidak dicentang apa pun
}

$selectedJenisKelamin = $_POST['jenis_kelamin'] ?? '';

echo "Anda memilih buah: " . htmlspecialchars($selectedBuah, ENT_QUOTES, 'UTF-8') . "<br>";

if (!empty($selectedWarna)) {
  echo "Warna favorit Anda: " . htmlspecialchars(implode(", ", $selectedWarna), ENT_QUOTES, 'UTF-8') . "<br>";
} else {
  echo "Anda tidak memilih warna favorit.<br>";
}

echo "Jenis kelamin Anda: " . htmlspecialchars($selectedJenisKelamin, ENT_QUOTES, 'UTF-8');
