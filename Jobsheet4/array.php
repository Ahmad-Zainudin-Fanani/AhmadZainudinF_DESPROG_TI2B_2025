<?php
echo "<h2>1. Filtering Nilai Lulus dengan Foreach dan If</h2>";
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];
$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}

echo "Daftar nilai siswa yang lulus: " . implode(', ', $nilaiLulus);

echo "<h2>2. Filtering Karyawan dengan Pengalaman Lebih dari 5 Tahun</h2>";

$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "Daftar karyawan yang memiliki pengalaman kerja lebih dari 5 tahun: " . implode(', ', $karyawanPengalamanLimaTahun);

echo "<h2>3. Menampilkan Nilai Mahasiswa dari Array Multidimensi</h2>";

$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

$mataKuliah = 'Fisika';

echo "Daftar nilai mahasiswa dalam mata kuliah <b>$mataKuliah</b>:<br>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]}<br>";
}

echo "<h2>4. Soal Cerita: Siswa dengan Nilai di Atas Rata-Rata</h2>";

$dataSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90]
];

$totalNilai = 0;
$jumlahSiswa = count($dataSiswa);
$siswaDiAtasRata = [];

// Langkah 1: Hitung Total Nilai
foreach ($dataSiswa as $siswa) {
    $totalNilai += $siswa[1];
}

// Langkah 2: Hitung Rata-Rata
$rataRata = $totalNilai / $jumlahSiswa;

// Langkah 3: Filter Siswa di Atas Rata-Rata
foreach ($dataSiswa as $siswa) {
    if ($siswa[1] > $rataRata) {
        $siswaDiAtasRata[] = "{$siswa[0]} ({$siswa[1]})";
    }
}

echo "Total Nilai Kelas: $totalNilai<br>";
echo "Jumlah Siswa: $jumlahSiswa<br>";
echo "Nilai Rata-Rata Kelas: " . number_format($rataRata, 2) . "<br><br>";
echo "Daftar siswa yang nilainya di atas rata-rata (" . number_format($rataRata, 2) . "):<br>";
echo implode('<br>', $siswaDiAtasRata);
?>