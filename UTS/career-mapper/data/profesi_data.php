<?php
// data/profesi_data.php
// Berisi data Pelajaran Pilihan (Sheet 2) dan Profesi Tujuan (Sheet 3)

// --- DATA PELAJARAN PILIHAN DAN SKILL YANG DIASAH (SHEET 2) ---
const PELAJARAN_SKILLS = [
    'Informatika' => ['Logika Pemrograman', 'Struktur Data', 'Analisis Algoritma'],
    'Matematika Lanjutan' => ['Numerasi Lanjut', 'Pemodelan Matematis', 'Analisis Kuantitatif'],
    'Fisika' => ['Pemodelan Sistem', 'Penalaran Deduktif', 'Eksperimen dan Pengukuran'],
    'Sosiologi' => ['Riset Sosial', 'Analisis Interaksi Kelompok', 'Teori Pembangunan'],
    'Ekonomi Lanjutan' => ['Perencanaan Keuangan', 'Analisis Pasar', 'Pengambilan Keputusan Ekonomi'],
    'Geografi' => ['Pemetaan Spasial', 'Analisis Lingkungan dan Wilayah', 'Sistem Informasi Geografis (GIS)'],
    'Bahasa Inggris Lanjutan' => ['Komunikasi Global (Verbal & Tulisan)', 'Pemahaman Teks Akademik'],
    'Prakarya & Kewirausahaan' => ['Operasional Bisnis', 'Manajemen Proyek', 'Desain Produk Sederhana'],
    'Sastra dan Budaya' => ['Storytelling (Naratif)', 'Analisis Kritis Teks', 'Komunikasi Persuasif'],
];

// --- DATA PROFESI MODERN DAN KETERAMPILAN UTAMA (SHEET 3) ---
const PROFESI_LIST = [
    [
        'nama' => 'Pakar Kebijakan Publik (Policy Analyst)',
        'jurusan' => 'Ilmu Politik, Hukum, Administrasi Publik, Sosiologi.',
        'skills' => ['Analisis Kebijakan', 'Bernalar Kritis', 'Negosiasi', 'Komunikasi Antarbudaya', 'Etika Kerja']
    ],
    [
        'nama' => 'Perencana Kota / Urban Designer',
        'jurusan' => 'Arsitektur, Planologi, Geografi.',
        'skills' => ['Pemetaan Spasial (GIS)', 'Sistem Thinking', 'Kolaborasi Tim', 'Kreatif', 'Pemecahan Masalah Kompleks']
    ],
    [
        'nama' => 'Kreator Konten Edukasi/Penulis Naskah',
        'jurusan' => 'Sastra, Komunikasi, Jurnalistik.',
        'skills' => ['Storytelling (Naratif)', 'Kreatif', 'Komunikasi Global', 'Literasi Digital', 'Manajemen Waktu']
    ],
    [
        'nama' => 'Wirausaha Sosial (Social Entrepreneur)',
        'jurusan' => 'Kewirausahaan, Ekonomi, Teknik Industri.',
        'skills' => ['Inisiatif', 'Manajemen Proyek', 'Bergotong Royong', 'Perencanaan Keuangan', 'Disiplin Diri']
    ],
    [
        'nama' => 'Manajer Sumber Daya Manusia (HR Manager)',
        'jurusan' => 'Psikologi, Manajemen.',
        'skills' => ['Kematangan Emosi', 'Empati', 'Kepemimpinan Etis', 'Negosiasi', 'Komunikasi Antarbudaya']
    ],
    [
        'nama' => 'Teknisi Elektromedik',
        'jurusan' => 'Teknik Elektro, Teknologi Rekayasa Biomedis.',
        'skills' => ['Pemecahan Masalah Kompleks', 'Logika & Penalaran', 'Ketekunan', 'Tanggung Jawab Moral']
    ],
    [
        'nama' => 'Data Analyst / Data Scientist',
        'jurusan' => 'Statistika, Teknik Informatika, Matematika, Teknik Industri, Sistem Informasi.',
        'skills' => ['Analisis Data', 'Logika Pemrograman (Python/R)', 'Bernalar Kritis', 'Pemecahan Masalah Kompleks']
    ]
    // Tambahkan data Profesi lain jika ada di Sheet 3 Anda yang tidak terlihat di cuplikan.
];