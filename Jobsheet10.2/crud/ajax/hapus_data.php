<?php
header('Content-Type: application/json');
session_start();
include 'koneksi.php';
include 'csrf.php';

$id = $_POST['id'] ?? '';

if ($id !== '') {
    $query = "DELETE FROM anggota WHERE id=?";
    $sql   = $db1->prepare($query);
    $sql->bind_param("i", $id);
    $ok = $sql->execute();
    echo json_encode(['success' => $ok]);
} else {
    echo json_encode(['success' => false, 'error' => 'ID kosong']);
}

$db1->close();
?>
