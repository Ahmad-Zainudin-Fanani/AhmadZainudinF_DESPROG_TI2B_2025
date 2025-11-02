<?php
$pattern = '/[a-z]/';   // Cocokkan huruf kecil
$text    = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}

$pattern = '/[0-9]+/';   // Cocokkan satu atau lebih digit
$text    = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "<br>Cocokkan: " . $matches[0];
} else {
    echo "<br>Tidak ada yang cocok!";
}

$pattern     = '/apple/';
$replacement = 'banana';
$text        = 'I like apple pie.';

$new_text = preg_replace($pattern, $replacement, $text);
echo "<br>" . $new_text;  // Output: I like banana pie.

$pattern = '/go*d/';   // Cocokkan "god", "good", "goood", dst.
$text    = 'god is good.';

if (preg_match($pattern, $text, $matches)) {
    echo "<br>Cocokkan: " . $matches[0];
} else {
    echo "<br>Tidak ada yang cocok!";
}

echo "<h3>Langkah 17: pola /go?d/</h3>";

$pattern = '/go?d/';   // huruf 'o' boleh 0 atau 1 kali
$text    = 'gd god good goood goooood goooooood';

if (preg_match_all($pattern, $text, $matches)) {
    echo "Cocokkan: " . implode(', ', $matches[0]);
} else {
    echo "Tidak ada yang cocok!";
}

echo "<h3>Langkah 18: pola /go{1,3}d/</h3>";

$pattern = '/go{1,3}d/';
$text    = 'gd god good goood goooood';

if (preg_match_all($pattern, $text, $matches)) {
    echo "Cocokkan: " . implode(', ', $matches[0]);
} else {
    echo "Tidak ada yang cocok!";
}
?>