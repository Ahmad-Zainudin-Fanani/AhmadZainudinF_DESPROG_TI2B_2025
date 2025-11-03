<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
  <h2>Halaman Home</h2>

  <?php if (!empty($_SESSION['login'])): ?>
    <p>Halo <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>, selamat datang.</p>
    <p><a href="sessionLogout.php">Logout</a></p>
  <?php else: ?>
    <p>Anda belum login.</p>
    <p><a href="sessionLoginForm.html">Login di sini</a></p>
  <?php endif; ?>
</body>
</html>
