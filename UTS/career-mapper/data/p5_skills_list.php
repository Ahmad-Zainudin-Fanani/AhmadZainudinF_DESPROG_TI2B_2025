<?php
// data/p5_skills_list.php
// Berisi daftar 6 dimensi P5 dan Keterampilan Inti (Sheet 1)

// Daftar 6 Dimensi P5 (Digunakan untuk inisialisasi skor di engine_core.php)
const P5_DIMENSI = [
    'Beriman/Berakhlak Mulia',
    'Berkebinekaan Global',
    'Bergotong Royong',
    'Mandiri',
    'Bernalar Kritis',
    'Kreatif',
];

// Keterampilan Inti dari setiap dimensi P5 (Digunakan untuk deskripsi hasil akhir)
const P5_KETERAMPILAN_INTI = [
    'Beriman/Berakhlak Mulia' => [
        'Integritas', 'Etika Kerja', 'Kematangan Emosi', 'Kepemimpinan Etis', 'Tanggung Jawab Moral'
    ],
    'Berkebinekaan Global' => [
        'Komunikasi Antarbudaya', 'Empati', 'Keterbukaan Diri', 'Adaptasi Sosial', 'Negosiasi Lintas Budaya'
    ],
    'Bergotong Royong' => [
        'Kolaborasi Tim', 'Pembagian Tugas', 'Kerja Sama Jarak Jauh', 'Kepemimpinan Partisipatif', 'Kecerdasan Sosial'
    ],
    'Mandiri' => [
        'Manajemen Waktu', 'Disiplin Diri', 'Inisiatif', 'Self-Reflection (Introspeksi)', 'Ketekunan'
    ],
    'Bernalar Kritis' => [
        'Logika & Penalaran', 'Analisis Data', 'Sistem Thinking', 'Identifikasi Bias', 'Pemecahan Masalah Kompleks'
    ],
    'Kreatif' => [
        'Brainstorming', 'Prototyping', 'Desain Thinking', 'Inovasi Konsep', 'Fleksibilitas Kognitif'
    ],
];