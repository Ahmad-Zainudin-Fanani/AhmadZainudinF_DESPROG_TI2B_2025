<?php
// Validasi CSRF token untuk request Ajax
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$headers = function_exists('apache_request_headers') ? apache_request_headers() : [];

// Nama header disamakan dengan yang dipakai di jQuery: 'Csrf-Token'
if (!isset($headers['Csrf-Token'])) {
    echo json_encode(['error' => 'No CSRF token']); 
    exit;
}

if (!hash_equals($_SESSION['csrf_token'], $headers['Csrf-Token'])) {
    echo json_encode(['error' => 'Wrong CSRF token']);
    exit;
}
?>
