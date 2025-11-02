<?php
$umur = 20; // silakan ubah untuk uji coba

if (isset($umur) && $umur >= 18) {
    echo "Anda sudah dewasa.<br>";
} else {
    echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan.<br>";
}
// Tambahan langkah 5
$data = array("nama" => "Fanani", "usia" => 25);

if (isset($data["nama"])) {
    echo "Nama: " . $data["nama"] . "<br>";
} else {
    echo "Variabel 'nama' tidak ditemukan dalam array.<br>";
}