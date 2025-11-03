<?php
// // tampilkan error biar tidak blank
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// if (isset($_POST['submit'])) {
//   $dir = __DIR__ . '/uploads/';
//   if (!is_dir($dir)) mkdir($dir, 0777, true);

//   if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
//     exit('Upload error code: '.($_FILES['myfile']['error'] ?? 'unknown'));
//   }

//   $name   = basename($_FILES['myfile']['name']);
//   $target = $dir . $name;
//   $ext    = strtolower(pathinfo($target, PATHINFO_EXTENSION));
//   $okExt  = ['jpg','jpeg','png','gif'];

//   if (!in_array($ext, $okExt)) exit('Hanya jpg/jpeg/png/gif.');
//   if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) exit('Gagal mengunggah file.');

//   echo "File berhasil diunggah.<br>";

//   // === Thumbnail 200px ===
//   if (!extension_loaded('gd')) {
//     exit('Ekstensi GD belum aktif. Aktifkan extension=gd di php.ini, lalu restart Laragon.');
//   }

//   $thumbDir = $dir . 'thumbs/';
//   if (!is_dir($thumbDir)) mkdir($thumbDir, 0777, true);
//   $thumb = $thumbDir . 'thumb_' . $name;

//   [$w,$h] = getimagesize($target);
//   $nw = 200; $nh = (int)($h * ($nw/$w));

//   switch ($ext) {
//     case 'jpg': case 'jpeg': $src=imagecreatefromjpeg($target); break;
//     case 'png': $src=imagecreatefrompng($target); break;
//     case 'gif': $src=imagecreatefromgif($target); break;
//   }
//   $dst = imagecreatetruecolor($nw,$nh);
//   imagecopyresampled($dst,$src,0,0,0,0,$nw,$nh,$w,$h);

//   switch ($ext) {
//     case 'jpg': case 'jpeg': imagejpeg($dst,$thumb,90); break;
//     case 'png': imagepng($dst,$thumb); break;
//     case 'gif': imagegif($dst,$thumb); break;
//   }
//   imagedestroy($src); imagedestroy($dst);

//   echo '<p>Thumbnail:</p><img src="uploads/thumbs/'.htmlspecialchars('thumb_'.$name,ENT_QUOTES,'UTF-8').'" alt="thumb">';
// } else {
//   // kalau file ini dibuka langsung tanpa submit, kasih info
//   echo 'Buka <a href="form_upload.php">form_upload.php</a> untuk mengunggah.';
// }


if (isset($_POST['submit'])) {
  $dir = __DIR__ . '/uploads/';
  if (!is_dir($dir)) mkdir($dir, 0777, true);

  if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
    exit('Upload error code: '.($_FILES['myfile']['error'] ?? 'unknown'));
  }

  $name   = basename($_FILES['myfile']['name']);
  $target = $dir . $name;
  $ext    = strtolower(pathinfo($target, PATHINFO_EXTENSION));
  $okExt  = ['txt','pdf','doc','docx'];
  $max    = 3 * 1024 * 1024; // 3 MB

  if (in_array($ext,$okExt) && $_FILES['myfile']['size'] <= $max) {
    echo move_uploaded_file($_FILES['myfile']['tmp_name'],$target)
      ? 'File berhasil diunggah.'
      : 'Gagal mengunggah file.';
  } else {
    echo 'File tidak valid atau melebihi ukuran maksimum yang diizinkan.';
  }
}
