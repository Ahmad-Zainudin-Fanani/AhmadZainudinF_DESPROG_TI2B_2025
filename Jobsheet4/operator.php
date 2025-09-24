<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali   = $a * $b;
$hasilBagi   = $a / $b;
$sisaBagi    = $a % $b;
$pangkat     = $a ** $b;

echo "<h2>1. Hasil Operator Aritmatika</h2>";
echo "Nilai \$a = $a, Nilai \$b = $b <br><br>";

echo "Hasil Tambah: $hasilTambah <br>";
echo "Hasil Kurang: $hasilKurang <br>";
echo "Hasil Kali: $hasilKali <br>";
echo "Hasil Bagi: $hasilBagi <br>";
echo "Sisa Bagi (modulus): $sisaBagi <br>";
echo "Pangkat: $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<hr>";
echo "<h2>2. Hasil Operator Perbandingan</h2>";
echo "Nilai \$a = $a, Nilai \$b = $b <br><br>";

echo "Apakah a SAMA DENGAN b (a == b): " . (int)$hasilSama . "<br>";
echo "Apakah a TIDAK SAMA DENGAN b (a != b): " . (int)$hasilTidakSama . "<br>";
echo "Apakah a LEBIH KECIL dari b (a < b): " . (int)$hasilLebihKecil . "<br>";
echo "Apakah a LEBIH BESAR dari b (a > b): " . (int)$hasilLebihBesar . "<br>";
echo "Apakah a LEBIH KECIL SAMA dari b (a <= b): " . (int)$hasilLebihKecilSama . "<br>";
echo "Apakah a LEBIH BESAR SAMA dari b (a >= b): " . (int)$hasilLebihBesarSama . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<hr>";
echo "<h2>3. Hasil Operator Logika</h2>";
echo "Nilai awal: a = $a, b = $b (Dianggap TRUE karena bukan 0) <br><br>";

echo "Hasil Operator AND (a && b): " . (int)$hasilAnd . "<br>";
echo "Hasil Operator OR (a || b): " . (int)$hasilOr . "<br>";
echo "Hasil Operator NOT a (!a): " . (int)$hasilNotA . "<br>";
echo "Hasil Operator NOT b (!b): " . (int)$hasilNotB . "<br>";

echo "<hr>";
echo "<h2>4. Hasil Operator Penugasan</h2>";
echo "Catatan: Nilai \$a diubah setelah setiap operasi. <br><br>";

$a = 10;
$b = 5;
echo "Sebelum: \$a = $a, \$b = $b <br>";
$a += $b;
echo "Setelah \$a += \$b: \$a = $a <br><br>";

$a = 10;
$b = 5;
echo "Sebelum: \$a = $a, \$b = $b <br>";
$a -= $b;
echo "Setelah \$a -= \$b: \$a = $a <br><br>";

$a = 10;
$b = 5;
echo "Sebelum: \$a = $a, \$b = $b <br>";
$a *= $b;
echo "Setelah \$a *= \$b: \$a = $a <br><br>";

$a = 10;
$b = 5;
echo "Sebelum: \$a = $a, \$b = $b <br>";
$a /= $b;
echo "Setelah \$a /= \$b: \$a = $a <br><br>";

$a = 10;
$b = 5;
echo "Sebelum: \$a = $a, \$b = $b <br>";
$a %= $b;
echo "Setelah \$a %= \$b: \$a = $a <br><br>";

$x = 10;
$y = "10"; 

$hasilIdentik = $x === $y;
$hasilTidakIdentik = $x !== $y;

echo "<hr>";
echo "<h2>5. Hasil Operator Identitas</h2>";
echo "Demonstrasi: Nilai x = $x (integer), Nilai y = \"$y\" (string) <br><br>";

echo "Hasil Identik (x === y): " . (int)$hasilIdentik . "<br>";
echo "Hasil Tidak Identik (x !== y): " . (int)$hasilTidakIdentik . "<br>";

$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;

$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

echo "<hr>";
echo "<h2>6. Soal Cerita: Persentase Kursi Kosong</h2>";
echo "Total Kursi: $totalKursi kursi <br>";
echo "Kursi Terisi: $kursiTerisi kursi <br><br>";

echo "Jumlah Kursi Kosong: $kursiKosong kursi <br>";
echo "Persentase Kursi Kosong: " . number_format($persentaseKosong, 2) . " %";
?>