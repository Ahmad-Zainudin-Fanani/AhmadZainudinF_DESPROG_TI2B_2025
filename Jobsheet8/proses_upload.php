<?php
// Simpan ke folder 'documents' (dibuat otomatis)
$targetDirectory = __DIR__ . '/documents/';
if (!is_dir($targetDirectory)) {
  mkdir($targetDirectory, 0777, true);
}

if (!empty($_FILES['files']['name'][0])) {
  $totalFiles = count($_FILES['files']['name']);

  for ($i = 0; $i < $totalFiles; $i++) {
    $fileName   = basename($_FILES['files']['name'][$i]);
    $targetFile = $targetDirectory . $fileName;

    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
      echo "File <b>{$fileName}</b> berhasil diunggah.<br>";
    } else {
      echo "Gagal mengunggah file <b>{$fileName}</b>.<br>";
    }
  }
} else {
  echo "Tidak ada file yang diunggah.";
}
