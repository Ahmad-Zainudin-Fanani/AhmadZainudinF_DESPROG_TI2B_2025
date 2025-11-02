<?php
const DATA_FILE = __DIR__.'/../data/surveys.json';

function ensure_storage(){
  if (!file_exists(dirname(DATA_FILE))) mkdir(dirname(DATA_FILE),0777,true);
  if (!file_exists(DATA_FILE)) file_put_contents(DATA_FILE, json_encode([]));
}
function load_all(){
  ensure_storage();
  $raw = file_get_contents(DATA_FILE);
  $arr = json_decode($raw,true);
  return is_array($arr)?$arr:[];
}
function save_all($arr){
  ensure_storage();
  file_put_contents(DATA_FILE, json_encode($arr, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
}
function uid(){ return bin2hex(random_bytes(6)); }

function save_survey($payload){
  $all = load_all();
  $payload['id'] = uid();
  $payload['created_date'] = date('c');
  $all[] = $payload;
  save_all($all);
  return $payload;
}
function get_survey($id){
  foreach(load_all() as $r){ if (($r['id']??'')===$id) return $r; }
  return null;
}
function get_all_surveys($limit=null){
  $arr = load_all();
  usort($arr, fn($a,$b)=>strcmp($b['created_date'],$a['created_date']));
  if ($limit!==null) $arr = array_slice($arr,0,$limit);
  return $arr;
}
function count_all_surveys(){ return count(load_all()); }
function delete_survey($id){
  $arr = load_all();
  $arr = array_values(array_filter($arr, fn($r)=>($r['id']??'')!==$id));
  save_all($arr);
}
function count_recommendation_buckets(){
  $c=['ptn'=>0,'kedinasan'=>0,'polisi'=>0];
  foreach(load_all() as $r){
    $j = strtolower($r['rekomendasi_jalur'] ?? '');
    if (strpos($j,'ptn')!==false) $c['ptn']++;
    elseif (strpos($j,'dinas')!==false) $c['kedinasan']++;
    elseif (strpos($j,'polisi')!==false) $c['polisi']++;
  }
  return $c;
}

/* === Ruleset rekomendasi (mengganti LLM) === */
function compute_recommendation($d){
  $nilai = $d['nilai_rata_rata'] ?? '';
  $fisik = $d['kemampuan_fisik'] ?? '';
  $ekonomi = $d['kondisi_ekonomi'] ?? '';
  $mental = $d['kesiapan_mental'] ?? '';
  $minat = $d['minat_bidang'] ?? [];

  $score = ['ptn'=>0,'kedinasan'=>0,'polisi'=>0];

  // Nilai
  if (strpos($nilai,'90')!==false) { $score['ptn']+=3; $score['kedinasan']+=3; }
  elseif (strpos($nilai,'80')!==false){ $score['ptn']+=2; $score['kedinasan']+=2; }
  elseif (strpos($nilai,'70')!==false){ $score['ptn']+=1; }
  else { $score['polisi']+=1; }

  // Fisik & mental
  if (stripos($fisik,'Sangat Baik')!==false) { $score['polisi']+=3; $score['kedinasan']+=2; }
  elseif (stripos($fisik,'Baik')!==false) { $score['polisi']+=2; $score['kedinasan']+=1; }
  elseif (stripos($fisik,'Kurang')!==false) { $score['ptn']+=1; }

  if (stripos($mental,'Sangat siap')!==false) { $score['polisi']+=2; $score['kedinasan']+=2; }
  elseif (stripos($mental,'Siap')!==false) { $score['kedinasan']+=1; $score['ptn']+=1; }

  // Ekonomi
  if (stripos($ekonomi,'Kurang')!==false) { $score['kedinasan']+=3; $score['ptn']+=1; }
  elseif (stripos($ekonomi,'Cukup')!==false) { $score['ptn']+=2; $score['kedinasan']+=1; }
  else { $score['ptn']+=2; }

  // Minat → pengaruh jalur
  $mapMinatJalur = [
    'Teknologi & IT'=>'ptn', 'Kesehatan'=>'ptn', 'Ekonomi & Bisnis'=>'ptn', 'Hukum'=>'ptn', 'Pendidikan'=>'ptn', 'Teknik'=>'ptn', 'Seni & Desain'=>'ptn',
    'Olahraga'=>'ptn', 'Pertahanan & Keamanan'=>'polisi', 'Administrasi Publik'=>'kedinasan'
  ];
  foreach($minat as $m){ $t = $mapMinatJalur[$m] ?? 'ptn'; $score[$t] += 2; }

  arsort($score);
  $primary = array_key_first($score);
  $sum = array_sum($score); if ($sum<=0) $sum = 1;
  $pct = (int) round($score[$primary]/$sum*100);

  $kampus = recommend_campuses($primary, $minat, $d['jurusan'] ?? '');
  $alternatif = array_values(array_filter(array_keys($score), fn($k)=>$k!==$primary));

  return [
    'pilihan_utama' => strtoupper($primary==='ptn'?'PTN':($primary==='kedinasan'?'KEDINASAN':'POLISI')),
    'alasan' => build_reason($primary,$d),
    'pilihan_alternatif' => array_map(fn($x)=>strtoupper($x), $alternatif),
    'rekomendasi_kampus' => $kampus,
    'langkah_persiapan' => build_steps($primary),
    'tips_khusus' => build_tips($primary),
    'persentase_kecocokan' => $pct
  ];
}

function recommend_campuses($jalur,$minat,$jurusanSekolah){
  $PTN = [
    ['nama_kampus'=>'Universitas Indonesia (UI)','jurusan'=>'Teknik Informatika / Sistem Informasi','tag'=>'Teknologi & IT'],
    ['nama_kampus'=>'Institut Teknologi Bandung (ITB)','jurusan'=>'Teknik Mesin / Elektro / Industri','tag'=>'Teknik'],
    ['nama_kampus'=>'Universitas Gadjah Mada (UGM)','jurusan'=>'Kedokteran / Farmasi / Hukum','tag'=>'Kesehatan'],
    ['nama_kampus'=>'Institut Teknologi Sepuluh Nopember (ITS)','jurusan'=>'Data Science / AI / Informatika','tag'=>'Teknologi & IT'],
    ['nama_kampus'=>'Universitas Airlangga (UNAIR)','jurusan'=>'Manajemen / Akuntansi','tag'=>'Ekonomi & Bisnis'],
  ];
  $DINAS = [
    ['nama_kampus'=>'STIS (Politeknik Statistika)','jurusan'=>'Statistika / Komputasi Statistik','tag'=>'Teknologi & IT'],
    ['nama_kampus'=>'IPDN','jurusan'=>'Kebijakan Publik / Pemerintahan','tag'=>'Administrasi Publik'],
    ['nama_kampus'=>'PKN STAN','jurusan'=>'Akuntansi / Pajak / Kepabeanan','tag'=>'Ekonomi & Bisnis'],
    ['nama_kampus'=>'STIN','jurusan'=>'Intelijen / Keamanan Siber','tag'=>'Pertahanan & Keamanan'],
    ['nama_kampus'=>'STMKG','jurusan'=>'Meteorologi / Klimatologi','tag'=>'Teknik'],
  ];
  $POLISI = [
    ['nama_kampus'=>'AKPOL','jurusan'=>'Pendidikan Perwira Polri','tag'=>'Pertahanan & Keamanan'],
    ['nama_kampus'=>'SIPSS','jurusan'=>'Perwira Sumber Sarjana','tag'=>'Pertahanan & Keamanan'],
    ['nama_kampus'=>'Bintara Polri','jurusan'=>'Pendidikan Bintara','tag'=>'Pertahanan & Keamanan'],
  ];

  $pool = $jalur==='ptn' ? $PTN : ($jalur==='kedinasan' ? $DINAS : $POLISI);

  if (!empty($minat)){
    $pool = array_values(array_filter($pool, function($row) use ($minat){
      return in_array($row['tag'], $minat);
    })) ?: $pool;
  }

  $out = [];
  foreach(array_slice($pool,0,5) as $r){
    $out[] = [
      'nama_kampus' => $r['nama_kampus'],
      'jurusan' => $r['jurusan'],
      'alasan' => 'Selaras dengan minat dan latar '.$r['tag'].($jurusanSekolah? (', cocok untuk siswa jurusan '.$jurusanSekolah):''),
      'prospek_karir' => $jalur==='ptn' ? 'Software engineer, analis data, profesional bidang '.$r['tag'] : ($jalur==='kedinasan' ? 'ASN sesuai instansi, stabil dengan jenjang karir jelas' : 'Perwira/anggota Polri dengan jalur karir operasional/strategis'),
    ];
  }
  return $out;
}

function build_reason($jalur,$d){
  $base = [
    'ptn' => 'Profil akademik dan minatmu menunjukkan kesiapan kuat untuk jalur perguruan tinggi negeri. Jalur ini memberi fleksibilitas jurusan, akses riset dan kompetisi, serta jaringan alumni besar. Dengan skema beasiswa/UKT, jalur PTN tetap terjangkau.',
    'kedinasan' => 'Kondisi ekonomi dan motivasi stabilitas karir selaras dengan keunggulan sekolah kedinasan: biaya relatif ringan/ditanggung, pendidikan terarah, dan peluang penempatan kerja. Disiplin belajar serta kesiapan seleksi berjenjang adalah kuncinya.',
    'polisi' => 'Kesiapan fisik dan mentalmu cocok untuk jalur kepolisian. Profesi ini menuntut disiplin, integritas, dan daya tahan tinggi. Menawarkan pengabdian, jenjang karir jelas, serta kesejahteraan dan fasilitas yang baik.',
  ];
  $extra = [];
  if (!empty($d['minat_bidang'])) $extra[] = 'Minat: '.implode(', ',$d['minat_bidang']).'.';
  if (!empty($d['nilai_rata_rata'])) $extra[] = 'Rerata nilai: '.$d['nilai_rata_rata'].'.';
  if (!empty($d['kemampuan_fisik'])) $extra[] = 'Kondisi fisik: '.$d['kemampuan_fisik'].'.';
  if (!empty($d['kondisi_ekonomi'])) $extra[] = 'Kondisi ekonomi: '.$d['kondisi_ekonomi'].'.';
  if (!empty($d['kesiapan_mental'])) $extra[] = 'Kesiapan mental: '.$d['kesiapan_mental'].'.';
  if (!empty($d['motivasi_utama'])) $extra[] = 'Motivasi: '.$d['motivasi_utama'].'.';
  return $base[$jalur]."\n\n".implode(' ', $extra);
}
function build_steps($jalur){
  if ($jalur==='ptn') return [
    'Mapping jurusan sesuai minat & kekuatan akademik.',
    'Target SNBP/SNBT; latihan tryout minimal mingguan.',
    'Bangun portofolio (lomba/proyek).',
    'Riset kampus: kuota, passing grade historis, akreditasi.',
    'Rencanakan beasiswa (KIP, beasiswa kampus, dll).',
    'Jaga konsistensi belajar & manajemen waktu.',
  ];
  if ($jalur==='kedinasan') return [
    'Pahami alur seleksi (STIS, IPDN, PKN STAN, dsb).',
    'Latihan SKD/TPA/TIU/TWK/TEU periodik.',
    'Perkuat fisik dasar (lari, push-up, sit-up).',
    'Siapkan berkas administrasi lebih awal.',
    'Ikuti komunitas belajar/seminar kedinasan.',
    'Buat timeline H-90 menuju seleksi.',
  ];
  return [
    'Bangun rutinitas fisik (lari, kekuatan, fleksibilitas).',
    'Pelajari materi psikologi & akademik seleksi Polri.',
    'Simulasi rikes, renang, dan ketahanan.',
    'Asah integritas, etika, wawasan kebangsaan.',
    'Konsultasi dengan alumni/bimbel Polri.',
  ];
}
function build_tips($jalur){
  if ($jalur==='ptn') return 'Fokus konsistensi latihan soal & perkuat konsep dasar. Pantau info resmi SNPMB & kampus. Jaga keseimbangan belajar–istirahat.';
  if ($jalur==='kedinasan') return 'Disiplin adalah kunci. Jadwal harian untuk SKD dan fisik ringan. Cek pengumuman resmi instansi secara berkala.';
  return 'Pertahankan kebugaran & pola hidup sehat. Latihan bertahap aman bagi tubuh. Pahami nilai Tribrata & Catur Prasetya.';
}
