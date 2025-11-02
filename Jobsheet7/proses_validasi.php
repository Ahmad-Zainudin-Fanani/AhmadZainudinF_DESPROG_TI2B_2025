<?php
$nama  = $_POST['nama']  ?? '';
$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';
$errors = [];

// Validasi server-side
if ($nama === '')  $errors[] = "Nama harus diisi.";
if ($email === '') $errors[] = "Email harus diisi.";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Format email tidak valid.";
if (strlen($pass) < 8) $errors[] = "Password minimal 8 karakter.";

// Keluarkan hasil
if ($errors) {
  foreach ($errors as $e) echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8') . "<br>";
} else {
  echo "Validasi BERHASIL.<br>";
  echo "Nama: "  . htmlspecialchars($nama,  ENT_QUOTES, 'UTF-8') . "<br>";
  echo "Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
  // (opsional) jangan tampilkan password; ini hanya demo validasi
}
