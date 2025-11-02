<?php
// FINAL (langkah 2 + 6 + rapi)
$input = $_POST['input'] ?? '';
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8'); // cegah injeksi HTML

$email    = $_POST['email'] ?? '';
$emailMsg = null;
if ($email !== '') {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailMsg = "Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    } else {
        $emailMsg = "Input email tidak valid.";
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>HTML Aman (Final)</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;max-width:640px;margin:32px auto;line-height:1.5}
    label{font-weight:600}
  </style>
</head>
<body>
  <h2>Demo Input Aman</h2>
  <form method="post">
    <label>Input teks (coba masukkan &lt;script&gt;alert(1)&lt;/script&gt;):</label><br>
    <input type="text" name="input" value=""><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value=""><br><br>

    <button type="submit">Kirim</button>
  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <hr>
    <p>Hasil teks (aman): <strong><?= $input ?></strong></p>
    <?php if ($email !== ''): ?>
      <p><?= $emailMsg ?></p>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>
