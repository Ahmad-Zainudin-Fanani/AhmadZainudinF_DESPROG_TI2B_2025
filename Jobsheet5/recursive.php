<?php
// function tampilkanHaloDunia(){
//     echo "Halo dunia! <br>";
//     tampilkanHaloDunia();
// }
//
// tampilkanHaloDunia();

echo "<h3>Versi Loop For</h3>";
for ($i = 1; $i <= 25; $i++) {
    echo "Perulangan ke-{$i} <br>";
}

echo "<hr>";

echo "<h3>Versi Rekursif</h3>";
function tampilkanAngka(int $jumlah, int $indeks = 1) {
    echo "Perulangan ke-{$indeks} <br>";
    if ($indeks < $jumlah) {
        tampilkanAngka($jumlah, $indeks + 1);
    }
}

tampilkanAngka(25);
?>
