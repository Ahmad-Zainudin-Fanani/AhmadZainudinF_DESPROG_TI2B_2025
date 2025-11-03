<?php
// if (isset($_FILES['file'])) {
//     $errors    = array();
//     $file_name = $_FILES['file']['name'];
//     $file_size = $_FILES['file']['size'];
//     $file_tmp  = $_FILES['file']['tmp_name'];
//     $file_type = $_FILES['file']['type'];
//     $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
//     $extensions = array('pdf','doc','docx','txt'); // ekstensi yang diizinkan

//     if (in_array($file_ext, $extensions) === false) {
//         $errors[] = 'Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.';
//     }

//     if ($file_size > 2097152) { // 2 MB
//         $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB.';
//     }

//     if (empty($errors) === true) {
//         if (!is_dir('documents')) { mkdir('documents', 0777, true); }
//         move_uploaded_file($file_tmp, 'documents/' . $file_name);
//         echo 'File berhasil diunggah.';
//     } else {
//         echo implode('<br>', $errors);
//     }
// }

// DEBUG: tampilkan error PHP saat pengembangan
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Normalisasi: kalau form kirim single file dengan name="file",
 * ubah ke struktur "files[]" agar loop di bawah tetap bisa dipakai.
 */
if (isset($_FILES['file']) && !isset($_FILES['files'])) {
    $f = $_FILES['file'];
    $_FILES['files'] = [
        'name'     => [$f['name']],
        'type'     => [$f['type']],
        'tmp_name' => [$f['tmp_name']],
        'error'    => [$f['error']],
        'size'     => [$f['size']],
    ];
}

if (!isset($_FILES['files'])) {
    http_response_code(400);
    echo 'Tidak ada file yang diterima. Pastikan input name="file" atau name="files[]", enctype="multipart/form-data", dan AJAX mengirim FormData.';
    exit;
}

// Folder tujuan
$targetDir = 'images';
if (!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }

// Validasi
$allowedExt = ['jpg','jpeg','png','gif','webp'];
$maxSize    = 4 * 1024 * 1024; // 4 MB per file

// Validasi MIME (butuh ekstensi fileinfo aktif)
$finfo = function_exists('finfo_open') ? new finfo(FILEINFO_MIME_TYPE) : null;

$messages = [];

foreach ($_FILES['files']['name'] as $idx => $origName) {
    $errCode  = $_FILES['files']['error'][$idx];
    $tmpPath  = $_FILES['files']['tmp_name'][$idx];
    $fileSize = $_FILES['files']['size'][$idx];
    $ext      = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
    $mime     = $finfo ? $finfo->file($tmpPath) : $_FILES['files']['type'][$idx];

    $errs = [];

    // Cek error upload bawaan PHP
    if ($errCode !== UPLOAD_ERR_OK) {
        $phpErr = [
          UPLOAD_ERR_INI_SIZE   => 'Melebihi upload_max_filesize php.ini',
          UPLOAD_ERR_FORM_SIZE  => 'Melebihi batas ukuran form',
          UPLOAD_ERR_PARTIAL    => 'Hanya sebagian yang terunggah',
          UPLOAD_ERR_NO_FILE    => 'Tidak ada file yang diunggah',
          UPLOAD_ERR_NO_TMP_DIR => 'Folder tmp hilang',
          UPLOAD_ERR_CANT_WRITE => 'Gagal menulis ke disk',
          UPLOAD_ERR_EXTENSION  => 'Dihentikan ekstensi PHP'
        ];
        $errs[] = $phpErr[$errCode] ?? ('Error kode '.$errCode);
    }

    // Validasi ekstensi & MIME
    if (!in_array($ext, $allowedExt)) {
        $errs[] = 'Ekstensi tidak diizinkan (hanya: jpg, jpeg, png, gif, webp).';
    }
    if ($finfo && strpos((string)$mime, 'image/') !== 0) {
        $errs[] = 'Tipe MIME tidak valid (harus image/*).';
    }

    // Validasi ukuran
    if ($fileSize > $maxSize) {
        $errs[] = 'Ukuran melebihi 4 MB.';
    }

    if (empty($errs)) {
        // Nama aman + timestamp untuk hindari bentrok
        $safeName = time().'_'.preg_replace('/[^A-Za-z0-9._-]/', '_', $origName);
        if (move_uploaded_file($tmpPath, $targetDir.'/'.$safeName)) {
            $messages[] = $origName.' → berhasil diunggah sebagai '.$safeName;
        } else {
            $messages[] = $origName.' → gagal dipindahkan (cek permission folder "images").';
        }
    } else {
        $messages[] = $origName.' → '.implode('; ', $errs);
    }
}

echo implode('<br>', $messages);
