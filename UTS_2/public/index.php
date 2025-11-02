<?php
require_once __DIR__.'/../app/data.php'; //1
$surveys = get_all_surveys(10);
$count = count_all_surveys();
$counts = count_recommendation_buckets();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard — ArahKarirku</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body>
  <?php include __DIR__.'/partials/header.php'; ?>

  <!-- Hero -->
  <section class="hero">
    <div class="hero__inner">
      <div class="pill"><span class="icon">✨</span> Platform #1 Navigasi Karir Indonesia</div>
      <h1>Temukan Jalur Karir <br><span class="grad-text">Terbaik Untukmu</span></h1>
      <p class="hero__tagline">Bingung pilih PTN, Kedinasan, atau Polisi? Ruleset kami bantu kamu menentukan! 🎯</p>
      <div class="hero__cta">
        <a class="btn btn--primary" href="/survey.php">✨ Mulai Survey Gratis →</a>
        <a class="btn btn--ghost" href="/history.php">🕒 Lihat Riwayat</a>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="container stats">
    <div class="stat">
      <div class="stat__icon blue">✔</div>
      <div class="stat__title">Survey Diselesaikan</div>
      <div class="stat__value"><?= (int)$count ?></div> 
      <div class="badge badge--up">+12%</div>
    </div>
    <div class="stat">
      <div class="stat__icon green">🎯</div>
      <div class="stat__title">Rekomendasi Akurat</div>
      <div class="stat__value">95%</div>
      <div class="badge badge--up">+5%</div>
    </div>
    <div class="stat">
      <div class="stat__icon purple">👥</div>
      <div class="stat__title">Pengguna Aktif</div>
      <div class="stat__value">1.240+</div>
      <div class="badge badge--up">+18%</div>
    </div>
    <div class="stat">
      <div class="stat__icon amber">⭐</div>
      <div class="stat__title">Rating Pengguna</div>
      <div class="stat__value">4.9/5</div>
      <div class="badge">+0.2</div>
    </div>
  </section>

  <!-- Jalur Karir -->
  <section class="container">
    <div class="section-head">
      <h2>Jalur Karir Tersedia</h2>
      <p>Tiga pilihan jalur karir yang bisa kamu tempuh setelah lulus</p>
    </div>
    <div class="grid grid--3">
      <?php
        $paths = [
          ['title'=>'PTN (Perguruan Tinggi Negeri)','desc'=>'Jalur kuliah di universitas negeri terbaik Indonesia','color'=>'blue','count'=>$counts['ptn']??0,'benefits'=>['Biaya terjangkau dengan beasiswa','Kualitas pendidikan terakreditasi','Networking luas & fasilitas lengkap','Jalur masuk: SNBP, SNBT, Mandiri']],
          ['title'=>'Sekolah Kedinasan','desc'=>'Pendidikan dengan ikatan dinas & jaminan kerja','color'=>'purple','count'=>$counts['kedinasan']??0,'benefits'=>['Biaya pendidikan gratis/subsidi','Langsung dapat pekerjaan','Gaji & tunjangan terjamin','Jenjang karir jelas & terstruktur']],
          ['title'=>'Kepolisian','desc'=>'Mengabdi sebagai anggota Polri untuk negara','color'=>'green','count'=>$counts['polisi']??0,'benefits'=>['Pengabdian untuk negara','Prestige & kehormatan tinggi','Kesejahteraan terjamin','Fasilitas lengkap (rumah, kendaraan)']],
        ];
        foreach ($paths as $p):
      ?>
      <div class="card card--lift">
        <div class="bar bar--<?= $p['color'] ?>"></div>
        <div class="card__inner">
          <div class="chip chip--<?= $p['color'] ?>">Jumlah: <?= (int)$p['count'] ?> survey</div>
          <h3><?= htmlspecialchars($p['title']) ?></h3>
          <p><?= htmlspecialchars($p['desc']) ?></p>
          <ul class="ticks">
            <?php foreach ($p['benefits'] as $b): ?>
              <li>✔ <?= htmlspecialchars($b) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Aktivitas Terbaru -->
  <?php if (!empty($surveys)): ?>
  <section class="container">
    <div class="card">
      <div class="card__head between">
        <div class="title-inline">📊 Aktivitas Terbaru</div>
        <a class="btn btn--ghost" href="/history.php">Lihat Semua →</a>
      </div>
      <div class="list">
        <?php foreach ($surveys as $s): ?>
          <div class="list__item">
            <div class="avatar">🎓</div>
            <div class="flex1">
              <div class="bold"><?= htmlspecialchars($s['nama_lengkap']) ?></div>
              <div class="muted">Rekomendasi: <b><?= strtoupper(htmlspecialchars($s['rekomendasi_jalur'])) ?></b></div>
            </div>
            <span class="badge badge--blue"><?= (int)($s['detail_rekomendasi']['persentase_kecocokan'] ?? 0) ?>% cocok</span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CTA -->
  <section class="cta">
    <h2>Siap Temukan Jalur Karirmu? 🚀</h2>
    <p>Survey hanya 5 menit dan hasilnya langsung tersedia!</p>
    <a href="/survey.php" class="btn btn--light">Mulai Survey Sekarang →</a>
    <div class="mini">💯 Gratis • 🔒 Aman & Rahasia • ⚡ Hasil Instan</div>
  </section>

  <?php include __DIR__.'/partials/footer.php'; ?>
</body>
</html>
