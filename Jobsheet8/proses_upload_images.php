<?php
// === proses_upload_images.php ===
// versi ringkas & lengkap: multi upload khusus gambar (Langkah 9)

// Tampilkan pesan error saat pengujian
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Tentukan folder penyimpanan (khusus gambar)
$targetDirectory = __DIR__ . '/images/';
if (!is_dir($targetDirectory)) {
  mkdir($targetDirectory, 0777, true); // otomatis buat folder jika belum ada
}

// 2. Cek apakah ada file yang diunggah
if (!empty($_FILES['files']['name'][0])) {

  // 3. Batasi ekstensi & ukuran file (perubahan utama dari langkah 3)
  $allowed = ['jpg','jpeg','png','gif'];    // hanya file gambar
  $maxSize = 5 * 1024 * 1024;               // 5 MB per file (opsional batas)

  // 4. Looping untuk memproses tiap file
  $totalFiles = count($_FILES['files']['name']);
  for ($i = 0; $i < $totalFiles; $i++) {
    $name = basename($_FILES['files']['name'][$i]);
    $tmp  = $_FILES['files']['tmp_name'][$i];
    $size = $_FILES['files']['size'][$i];
    $err  = $_FILES['files']['error'][$i];
    $ext  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $dest = $targetDirectory . $name;

    // 5. Validasi error upload bawaan PHP
    if ($err !== UPLOAD_ERR_OK) {
      echo "Lewati <b>{$name}</b> (error kode {$err}).<br>";
      continue;
    }

    // 6. Filter: hanya gambar dengan ukuran ≤ 5 MB
    if (!in_array($ext, $allowed)) {
      echo "Lewati <b>{$name}</b> (bukan file gambar).<br>";
      continue;
    }
    if ($size > $maxSize) {
      echo "Lewati <b>{$name}</b> (ukuran > 5 MB).<br>";
      continue;
    }

    // 7. Pindahkan file yang lolos filter ke folder tujuan
    if (move_uploaded_file($tmp, $dest)) {
      echo "Gambar <b>{$name}</b> berhasil diunggah.<br>";
    } else {
      echo "Gagal mengunggah gambar <b>{$name}</b>.<br>";
    }
  }

} else {
  echo "Tidak ada file yang diunggah.";
}
