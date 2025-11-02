  <?php require_once __DIR__.'/../app/data.php'; ?>
  <!doctype html>
  <html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Survey — ArahKarirku</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  </head>
  <body class="bg-grad">
    <?php include __DIR__.'/partials/header.php'; ?>

    <div class="progress">
      <div class="progress__bar" id="progressBar" style="width:10%"></div>
      <div class="progress__meta"><span id="progText">Pertanyaan 1 dari 9</span><span id="progPct">10%</span></div>
    </div>

    <main class="container narrow">
      <form id="surveyForm" class="wizard" action="./result.php" method="post">
        <!-- 1 -->
        <section class="step active" data-step="1">
          <div class="iconbox">👤</div>
          <h1>Halo! Siapa nama kamu?</h1>
          <p>Kami ingin mengenalmu lebih dekat 😊</p>
          <input type="text" name="nama_lengkap" class="input" placeholder="Masukkan nama lengkap kamu" required />
        </section>

        <!-- 2 -->
        <section class="step" data-step="2">
          <div class="iconbox">🎓</div>
          <h1>Kamu sekarang kelas berapa?</h1>
          <p>Pilih kelas yang sesuai</p>
          <div class="options">
            <label class="opt"><input type="radio" name="kelas" value="Kelas 10" required /> <span>📚 Kelas 10</span></label>
            <label class="opt"><input type="radio" name="kelas" value="Kelas 11" /> <span>📖 Kelas 11</span></label>
            <label class="opt"><input type="radio" name="kelas" value="Kelas 12" /> <span>🎓 Kelas 12</span></label>
          </div>
        </section>

        <!-- 3 -->
        <section class="step" data-step="3">
          <div class="iconbox">🎯</div>
          <h1>Apa jurusan kamu di sekolah?</h1>
          <p>Tulis jurusan yang kamu ambil</p>
          <input type="text" name="jurusan" class="input" placeholder="Contoh: IPA, IPS, TKJ, Multimedia, dll" required />
        </section>

        <!-- 4 -->
        <section class="step" data-step="4">
          <div class="iconbox">⭐</div>
          <h1>Berapa rata-rata nilai rapormu?</h1>
          <p>Jujur aja ya, untuk rekomendasi terbaik 🎯</p>
          <div class="options">
            <label class="opt"><input type="radio" name="nilai_rata_rata" value="90-100 (Sangat Baik)" required /> <span>🌟 90-100 (Sangat Baik)</span></label>
            <label class="opt"><input type="radio" name="nilai_rata_rata" value="80-89 (Baik)" /> <span>⭐ 80-89 (Baik)</span></label>
            <label class="opt"><input type="radio" name="nilai_rata_rata" value="70-79 (Cukup)" /> <span>✨ 70-79 (Cukup)</span></label>
            <label class="opt"><input type="radio" name="nilai_rata_rata" value="< 70 (Kurang)" /> <span>💫 &lt; 70 (Kurang)</span></label>
          </div>
        </section>

        <!-- 5 -->
        <section class="step" data-step="5">
          <div class="iconbox">❤️</div>
          <h1>Bidang apa yang kamu minati?</h1>
          <p>Pilih minimal 1, boleh lebih dari 1! ✨</p>
          <div class="grid grid--2">
            <?php
              $minat = [
                ['Teknologi & IT','💻','Pemrograman, AI, siber, data, pengembangan aplikasi'],
                ['Kesehatan','⚕️','Kedokteran, keperawatan, farmasi, kesehatan masyarakat'],
                ['Ekonomi & Bisnis','💼','Manajemen, akuntansi, perbankan, marketing, bisnis digital'],
                ['Hukum','⚖️','Ilmu hukum, advokat, notaris, hakim'],
                ['Pendidikan','👨‍🏫','Guru, dosen, pengembang kurikulum'],
                ['Teknik','🔧','Sipil, mesin, elektro, industri, arsitektur'],
                ['Seni & Desain','🎨','DKV, desain grafis, seni rupa, musik, broadcasting'],
                ['Olahraga','⚽','Penjas, kepelatihan, sport science'],
                ['Pertahanan & Keamanan','🛡️','TNI, Polri, intelijen, keamanan siber'],
                ['Administrasi Publik','🏛️','Administrasi negara, kebijakan, pelayanan publik'],
              ];
              foreach ($minat as $m):
            ?>
            <label class="opt opt--block">
              <input type="checkbox" name="minat_bidang[]" value="<?= htmlspecialchars($m[0]) ?>">
              <span class="opt__inner">
                <span class="big"><?= $m[1] ?></span>
                <span class="bold"><?= htmlspecialchars($m[0]) ?></span>
                <small class="muted"><?= htmlspecialchars($m[2]) ?></small>
              </span>
            </label>
            <?php endforeach; ?>
          </div>
          <div class="hint">* Minimal pilih 1 minat</div>
        </section>

        <!-- 6 -->
        <section class="step" data-step="6">
          <div class="iconbox">⚡</div>
          <h1>Bagaimana kondisi fisikmu?</h1>
          <p>Ini penting untuk beberapa jalur karir 💪</p>
          <div class="options">
            <label class="opt"><input type="radio" name="kemampuan_fisik" value="Sangat Baik (Sering olahraga, tidak ada masalah kesehatan)" required /> <span>💪 Sangat Baik</span></label>
            <label class="opt"><input type="radio" name="kemampuan_fisik" value="Baik (Sesekali olahraga)" /> <span>🏃 Baik</span></label>
            <label class="opt"><input type="radio" name="kemampuan_fisik" value="Cukup (Jarang olahraga)" /> <span>🚶 Cukup</span></label>
            <label class="opt"><input type="radio" name="kemampuan_fisik" value="Kurang (Ada masalah kesehatan)" /> <span>🩺 Kurang</span></label>
          </div>
        </section>

        <!-- 7 -->
        <section class="step" data-step="7">
          <div class="iconbox">📈</div>
          <h1>Bagaimana kondisi ekonomi keluargamu?</h1>
          <p>Jangan khawatir, ini rahasia dan untuk membantu 🤝</p>
          <div class="options">
            <label class="opt"><input type="radio" name="kondisi_ekonomi" value="Berkecukupan (Mampu biaya kuliah)" required /> <span>💰 Berkecukupan</span></label>
            <label class="opt"><input type="radio" name="kondisi_ekonomi" value="Cukup (Perlu beasiswa)" /> <span>💵 Cukup</span></label>
            <label class="opt"><input type="radio" name="kondisi_ekonomi" value="Kurang (Sangat perlu beasiswa/gratis)" /> <span>🎓 Kurang</span></label>
          </div>
        </section>

        <!-- 8 -->
        <section class="step" data-step="8">
          <div class="iconbox">🎯</div>
          <h1>Seberapa siap mental kamu menghadapi tantangan?</h1>
          <p>Jujur aja, ga ada jawaban salah kok! 🌈</p>
          <div class="options">
            <label class="opt"><input type="radio" name="kesiapan_mental" value="Sangat siap (Suka tantangan dan kompetisi)" required /> <span>🔥 Sangat Siap</span></label>
            <label class="opt"><input type="radio" name="kesiapan_mental" value="Siap (Bersedia belajar)" /> <span>💯 Siap</span></label>
            <label class="opt"><input type="radio" name="kesiapan_mental" value="Cukup (Perlu adaptasi)" /> <span>🌟 Cukup</span></label>
            <label class="opt"><input type="radio" name="kesiapan_mental" value="Kurang (Lebih suka zona nyaman)" /> <span>😌 Kurang</span></label>
          </div>
        </section>

        <!-- 9 -->
        <section class="step" data-step="9">
          <div class="iconbox">💡</div>
          <h1>Apa motivasi utamamu melanjutkan pendidikan?</h1>
          <p>Ceritakan apa yang membuatmu semangat ✨</p>
          <textarea class="input" name="motivasi_utama" rows="6" placeholder="Contoh: Ingin membanggakan orang tua, mengembangkan diri, mencapai cita-cita..." required></textarea>
        </section>

        <div class="wizard__nav">
          <button type="button" class="btn" id="btnPrev">← Kembali</button>
          <button type="button" class="btn btn--primary" id="btnNext">Lanjut →</button>
          <button type="submit" class="btn btn--accent" id="btnSubmit" style="display:none">Lihat Rekomendasi 🎉</button>
        </div>
      </form>
    </main>

    <?php include __DIR__.'/partials/footer.php'; ?>
    <script src="./assets/js/survey.js"></script>
  </body>
  </html>
