<?php
/*
function perkenalan(){
    echo "Assalamu'alaikum, <br>";
    echo "Perkenalkan, nama saya Elok<br>"; 
    echo "Senang berkenalan dengan Anda<br>";
}

// PEMANGGILAN PERTAMA
perkenalan(); 
echo "<hr>";

// PEMANGGILAN KEDUA (Menghasilkan output ganda)
perkenalan(); 
?>
*/

/*
//membuat fungsi
function perkenalan($nama, $salam){
    echo $salam. ", ";
    echo "Perkenalkan, nama saya " .$nama. "<br>";
    echo "Senang berkenalan dengan Anda<br>";
}

//memanggil fungsi yang sudah dibuat
perkenalan("Hamdana", "Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan($saya, $ucapanSalam);
?>
*/

//membuat fungsi
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam. ", ";
    echo "Perkenalkan, nama saya " .$nama. "<br>";
    echo "Senang berkenalan dengan Anda<br>";
}

//memanggil fungsi yang sudah dibuat
perkenalan("Hamdana", "Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi tanpa mengisi parameter salam
perkenalan($saya);
?>