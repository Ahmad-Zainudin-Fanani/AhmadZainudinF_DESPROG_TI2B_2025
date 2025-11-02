<?php
// engine_core.php - ENGINE UTAMA LOGIKA PEMROGRAMAN PHP ARRAY

// 1. IMPOR SEMUA DATA ARRAY (Pastikan file-file ini ada di folder /data/)
require_once 'data/sbc_data.php';        // Berisi SBC_QUESTIONS (Logika Sheet 5) dan KORELASI_PATHS (Logika Sheet 4)
require_once 'data/p5_skills_list.php'; // Berisi P5_DIMENSI
require_once 'data/profesi_data.php';   // Berisi PROFESI_LIST dan PELAJARAN_SKILLS

// --- FUNGSI 1: MENGHITUNG SKOR P5 DARI JAWABAN (Logika Sheet 5) ---
function hitungSkorP5($jawaban_array) {
    global $SBC_QUESTIONS;
    global $P5_DIMENSI;
    
    // Inisialisasi skor semua dimensi P5 ke 0 menggunakan array_fill_keys
    $skor_p5 = array_fill_keys(P5_DIMENSI, 0); 
    
    // Bobot pilihan: A=0, B=1, C=3
    $bobot_pilihan = ['A' => 0, 'B' => 1, 'C' => 3];

    // Mengolah setiap jawaban yang dikirim JQuery
    foreach ($jawaban_array as $id_soal => $pilihan) {
        
        // Cari data SBC di array untuk mendapatkan dimensi P5 yang diukur
        $sbc_info = array_filter(SBC_QUESTIONS, function($q) use ($id_soal) {
            return $q['id'] === $id_soal;
        });

        if (!empty($sbc_info)) {
            $sbc = reset($sbc_info); // Ambil data SBC yang cocok
            $dimensi = $sbc['dimensi'];
            
            // Tambahkan bobot skor ke dimensi P5 yang sesuai
            if (isset($bobot_pilihan[$pilihan])) {
                $skor_p5[$dimensi] += $bobot_pilihan[$pilihan];
            }
        }
    }

    return $skor_p5; // Output: Array skor P5 total siswa
}


// --- FUNGSI 2: MENCARI REKOMENDASI JALUR KARIER (Logika Sheet 4) ---
function cariRekomendasi($skor_p5) {
    global $KORELASI_PATHS;
    
    // 1. Cari Dua P5 Dominan (Skor Tertinggi)
    // arsort(): Mengurutkan array skor dari yang terbesar (sesuai value)
    arsort($skor_p5); 
    
    // array_keys(): Mengambil kunci (nama P5) dari array yang sudah terurut
    $p5_dominan = array_keys($skor_p5);
    $top_p5_1 = $p5_dominan[0]; // P5 terkuat
    $top_p5_2 = $p5_dominan[1]; // P5 terkuat kedua

    // 2. Korelasi ke Jalur Karier (Mencari di KORELASI_PATHS)
    foreach (KORELASI_PATHS as $path) {
        // Cek dua kondisi: urutan normal atau urutan terbalik
        $cocok_normal = ($path['p5_dominan_1'] === $top_p5_1 && $path['p5_dominan_2'] === $top_p5_2);
        $cocok_terbalik = ($path['p5_dominan_1'] === $top_p5_2 && $path['p5_dominan_2'] === $top_p5_1);
        
        if ($cocok_normal || $cocok_terbalik) {
            // Ditemukan jalur yang cocok!
            return [
                'p5_dominan' => [$top_p5_1, $top_p5_2],
                'rekomendasi_jalur' => $path
            ]; 
        }
    }
    
    // Jika tidak ada jalur yang cocok, kembalikan data P5 dominan saja
    return [
        'p5_dominan' => [$top_p5_1, $top_p5_2],
        'rekomendasi_jalur' => null
    ]; 
}


// --- APLIKASI UTAMA (Dipanggil oleh JQUERY AJAX) ---

// Pastikan request datang dari form submit (metode POST) dan ada data jawaban
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jawaban'])) {
    
    // Ambil data jawaban yang dikirim JQuery
    $jawaban_user = $_POST['jawaban']; 
    
    // JALUR 1: Hitung Skor
    $skor_akhir = hitungSkorP5($jawaban_user);
    
    // JALUR 2: Cari Rekomendasi
    $hasil_rekomendasi = cariRekomendasi($skor_akhir);

    // Header untuk JQuery AJAX (Mengirim data dalam format JSON)
    header('Content-Type: application/json');

    // Kembalikan hasil yang akan dibaca oleh JQuery untuk ditampilkan
    echo json_encode([
        'status' => 'success',
        'skor_p5' => $skor_akhir,
        'rekomendasi' => $hasil_rekomendasi
    ]);
    exit; 

} else {
    // Jika diakses tanpa POST (misalnya langsung di browser)
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak valid. Tes harus dikirim melalui formulir.']);
}