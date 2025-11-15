<?php
header('Content-Type: application/json');
session_start();
include 'koneksi.php';
include 'csrf.php';

$id            = $_POST['id'] ?? '';
$nama          = trim($_POST['nama'] ?? '');
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$alamat        = trim($_POST['alamat'] ?? '');
$no_telp       = trim($_POST['no_telp'] ?? '');

if ($id === '') {
    // INSERT
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp)
              VALUES (?, ?, ?, ?)";
    $sql   = $db1->prepare($query);
    $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);
} else {
    // UPDATE
    $query = "UPDATE anggota
              SET nama=?, jenis_kelamin=?, alamat=?, no_telp=?
              WHERE id=?";
    $sql   = $db1->prepare($query);
    $sql->bind_param("ssssi", $nama, $jenis_kelamin, $alamat, $no_telp, $id);
}

if ($sql->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $db1->error]);
}

$db1->close();
?>
