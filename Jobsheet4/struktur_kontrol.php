<?php
$nilaiNumerik = 92;

echo "<h2>1. Penentuan Nilai Huruf (Nilai: $nilaiNumerik)</h2>";

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

echo "<h2>2. Perhitungan Jarak Atlet (Target: 500 km)</h2>";

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

echo "<h2>3. Perhitungan Hasil Panen dengan For Loop</h2>";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah lahan yang diproses: $jumlahLahan lahan<br>";
echo "Total buah yang akan dipanen adalah: $jumlahBuah";

echo "<h2>4. Perhitungan Total Skor Ujian dengan Foreach Loop</h2>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "Daftar Skor: " . implode(", ", $skorUjian) . "<br>";
echo "Total skor ujian adalah: $totalSkor";

echo "<h2>5. Penentuan Kelulusan Siswa dengan Continue</h2>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus)<br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus)<br>";
}

echo "<h2>6. Soal Cerita: Total Nilai Setelah Drop Nilai Ekstrem</h2>";

$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$totalNilai = 0;

sort($nilaiSiswa);

array_shift($nilaiSiswa);
array_shift($nilaiSiswa);

array_pop($nilaiSiswa);
array_pop($nilaiSiswa);

foreach ($nilaiSiswa as $nilai) {
    $totalNilai += $nilai;
}

echo "Daftar Nilai Awal: 85, 92, 78, 64, 90, 75, 88, 79, 70, 96 <br>";
echo "Nilai yang Digunakan untuk Rata-rata: " . implode(", ", $nilaiSiswa) . "<br>";
echo "Jumlah Nilai Siswa yang Digunakan (Setelah drop 4): " . count($nilaiSiswa) . "<br>";
echo "Total nilai yang digunakan untuk rata-rata adalah: $totalNilai";

echo "<h2>7. Soal Cerita: Perhitungan Diskon</h2>";

$hargaProduk = 120000;
$batasDiskon = 100000;
$persentaseDiskon = 0.20;
$hargaAkhir = $hargaProduk; 
$diskonDiterima = 0;

if ($hargaProduk > $batasDiskon) {
    $diskonDiterima = $hargaProduk * $persentaseDiskon;
    $hargaAkhir = $hargaProduk - $diskonDiterima;
    $statusDiskon = "Dapat Diskon";
} else {
    $statusDiskon = "Tidak Dapat Diskon";
}

echo "Harga Produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Batas Diskon: Rp " . number_format($batasDiskon, 0, ',', '.') . "<br>";
echo "Status Diskon: $statusDiskon<br><br>";
echo "Jumlah Diskon Diterima (20%): Rp " . number_format($diskonDiterima, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar adalah: <b>Rp " . number_format($hargaAkhir, 0, ',', '.') . "</b>";

echo "<h2>8. Soal Cerita: Penentuan Hadiah Game</h2>";

$skorPemain = 650;
$batasHadiah = 500;
$statusHadiah = "TIDAK";

if ($skorPemain > $batasHadiah) {
    $statusHadiah = "YA";
}

echo "Total skor pemain adalah: $skorPemain<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? ($statusHadiah)";
?>