<?php
require_once __DIR__.'/../app/data.php';

$id = $_GET['id'] ?? '';
if ($id !== '') {
  delete_survey($id);
}

// balik ke riwayat
header('Location: history.php');
exit;
