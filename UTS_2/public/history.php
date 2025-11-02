<?php
require_once __DIR__.'/../app/data.php';

/* Tangani aksi hapus (POST dari tombol Hapus) */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['id'] !== '') {
  delete_survey($_POST['id']);
  header('Location: history.php');
  exit;
}

$results = get_all_surveys();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat — ArahKarirku</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
  <?php include __DIR__.'/partials/header.php'; ?>

  <main class="container">  
    <h1 class="page-title">Riwayat Survey</h1>

    <?php if (empty($results)): ?>
      <div class="card center">
        <div class="circle">🎓</div>
        <h3>Belum Ada Riwayat</h3>
        <p class="muted">Kamu belum pernah mengisi survey</p>
        <a class="btn btn--primary" href="survey.php">Mulai Survey Sekarang</a>
      </div>
    <?php else: ?>
      <div class="grid grid--3">
        <?php foreach ($results as $r):
          $jalur = strtolower($r['rekomendasi_jalur'] ?? 'ptn');
          $color = 'blue';
          if (strpos($jalur,'kedinasan')!==false) $color='purple';
          if (strpos($jalur,'polisi')!==false) $color='green';
        ?>
        <div class="card card--lift">
          <div class="bar bar--<?= $color ?>"></div>
          <div class="card__inner">
            <div class="between">
              <div class="chip chip--<?= $color ?>"><?= (int)($r['detail_rekomendasi']['persentase_kecocokan'] ?? 0) ?>%</div>
              <form method="post" action="history.php" onsubmit="return confirm('Yakin ingin menghapus hasil survey ini?');">
                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
                <button class="btn btn--link danger" type="submit">🗑 Hapus</button>
              </form>
            </div>
            <h3><?= htmlspecialchars($r['nama_lengkap']) ?></h3>
            <div class="muted">Rekomendasi: <b><?= strtoupper(htmlspecialchars($r['rekomendasi_jalur'])) ?></b></div>
            <a class="btn btn--soft" href="result.php?id=<?= urlencode($r['id']) ?>">Lihat Detail →</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

  <?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
