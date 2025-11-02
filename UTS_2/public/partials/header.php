<?php
  // tandai menu aktif berdasar file yang dibuka
  $current = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
  $is = fn($file) => $current === $file ? ' is-active' : '';
?>
<header class="topbar">
  <div class="container between vcenter">
    <a class="brand" href="index.html">
      <div class="logo">🎓</div>
      <div>
        <div class="brand__title">KarirPTN.id</div>
        <div class="brand__sub">Navigasi Karir Cerdas</div>
      </div>
    </a>

    <nav class="nav">
      <a class="nav__link<?= $is('index.php') ?><?= $is('index.html') ?>" href="index.html">Dashboard</a>
      <a class="nav__link<?= $is('survey.php') ?>" href="survey.php">Mulai Survey</a>
      <a class="nav__link<?= $is('history.php') ?>" href="history.php">Riwayat</a>
    </nav>
  </div>
</header>
