<?php
require_once __DIR__.'/../app/data.php';

// Jika POST dari survey: hitung & simpan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $payload = [
    'nama_lengkap'     => trim($_POST['nama_lengkap'] ?? ''),
    'kelas'            => trim($_POST['kelas'] ?? ''),
    'jurusan'          => trim($_POST['jurusan'] ?? ''),
    'nilai_rata_rata'  => trim($_POST['nilai_rata_rata'] ?? ''),
    'minat_bidang'     => isset($_POST['minat_bidang']) ? (array)$_POST['minat_bidang'] : [],
    'kemampuan_fisik'  => trim($_POST['kemampuan_fisik'] ?? ''),
    'kondisi_ekonomi'  => trim($_POST['kondisi_ekonomi'] ?? ''),
    'kesiapan_mental'  => trim($_POST['kesiapan_mental'] ?? ''),
    'motivasi_utama'   => trim($_POST['motivasi_utama'] ?? ''),
  ];
  if ($payload['nama_lengkap'] === '') { header('Location: survey.php'); exit; }

  $detail = compute_recommendation($payload);
  $payload['rekomendasi_jalur'] = $detail['pilihan_utama'];
  $payload['detail_rekomendasi'] = $detail;

  $saved = save_survey($payload);
  if ($saved) {
    $id = $saved['id'];
    header('Location: result.php?id='.$id);
    exit;
  }
}

$id = $_GET['id'] ?? '';
$record = $id ? get_survey($id) : null;
if (!$record) { header('Location: survey.php'); exit; }

$jalur = strtolower($record['rekomendasi_jalur']);
$color = 'blue';
if (strpos($jalur,'kedinasan')!==false) $color='purple';
if (strpos($jalur,'polisi')!==false) $color='green';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hasil — ArahKarirku</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css" /> <!-- ← relatif -->
</head>
<body>
  <?php include __DIR__.'/partials/header.php'; ?>

  <main class="container narrow">
    <div class="card card--lift">
      <div class="bar bar--<?= $color ?>"></div>
      <div class="card__inner">
        <div class="center">
          <div class="circle circle--<?= $color ?> bigicon">🎓</div>
          <h1>Selamat, <?= htmlspecialchars($record['nama_lengkap']) ?>! 🎉</h1>
          <p class="muted">Kami telah menganalisis profil kamu</p>
        </div>
        <div class="pill pill--<?= $color ?>"><?= (int)($record['detail_rekomendasi']['persentase_kecocokan'] ?? 0) ?>% Cocok</div>
        <h2 class="center">Rekomendasi Jalur Karir</h2>
        <div class="jumbotron">
          <div class="title-lg"><?= htmlspecialchars(strtoupper($record['detail_rekomendasi']['pilihan_utama'])) ?></div>
          <div class="muted">adalah pilihan terbaik untukmu</div>
        </div>
        <div class="note note--blue">
          <div class="note__title">Mengapa jalur ini cocok?</div>
          <p><?= nl2br(htmlspecialchars($record['detail_rekomendasi']['alasan'])) ?></p>
        </div>
      </div>
    </div>

    <?php if (!empty($record['detail_rekomendasi']['rekomendasi_kampus'])): ?>
      <div class="card">
        <div class="card__head">🏫 Rekomendasi Kampus & Jurusan</div>
        <div class="list">
          <?php foreach ($record['detail_rekomendasi']['rekomendasi_kampus'] as $i=>$k): ?>
            <div class="list__item list__item--panel">
              <div class="rank"><?= $i+1 ?></div>
              <div class="flex1">
                <div class="bold"><?= htmlspecialchars($k['nama_kampus']) ?></div>
                <div class="chip"><?= htmlspecialchars($k['jurusan']) ?></div>
                <div class="muted"><b>Mengapa cocok:</b> <?= htmlspecialchars($k['alasan']) ?></div>
                <div class="muted"><b>Prospek Karir:</b> <?= htmlspecialchars($k['prospek_karir']) ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($record['detail_rekomendasi']['langkah_persiapan'])): ?>
      <div class="card">
        <div class="card__head">✅ Langkah Persiapan</div>
        <ol class="steps">
          <?php foreach ($record['detail_rekomendasi']['langkah_persiapan'] as $l): ?>
            <li><?= htmlspecialchars($l) ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
    <?php endif; ?>

    <?php if (!empty($record['detail_rekomendasi']['pilihan_alternatif'])): ?>
      <div class="grid grid--2">
        <?php foreach ($record['detail_rekomendasi']['pilihan_alternatif'] as $alt): ?>
          <div class="card"><div class="card__inner"><b>Pilihan Alternatif:</b> <?= htmlspecialchars($alt) ?></div></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($record['detail_rekomendasi']['tips_khusus'])): ?>
      <div class="note note--yellow">
        <div class="note__title">💡 Tips Khusus Untukmu</div>
        <p><?= nl2br(htmlspecialchars($record['detail_rekomendasi']['tips_khusus'])) ?></p>
      </div>
    <?php endif; ?>

    <div class="actions">
      <a class="btn btn--primary" href="survey.php">Coba Survey Lagi →</a>   <!-- ← relatif -->
      <a class="btn" href="history.php">Lihat Riwayat</a>                   <!-- ← relatif -->
    </div>
  </main>

  <?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
