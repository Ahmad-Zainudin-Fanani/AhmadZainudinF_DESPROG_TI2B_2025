<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>Array Terindeks</h2>
    <?php
        $Listdosen=["Elok Nur Hamdana","Unggul Pamenang", "Bagas Nugraha"];

        // Output Asli Anda (Memanggil indeks satu per satu, tidak berurutan)
        echo "<h3>Output Manual Indexing:</h3>";
        echo $Listdosen[2] . "<br>";
        echo $Listdosen[0] . "<br>";
        echo $Listdosen[1] . "<br>";

        echo "<hr>";
        
        // Mulai Penambahan Perulangan FOR
        echo "<h3>Output Menggunakan Perulangan FOR:</h3>";
        
        // Hitung jumlah elemen untuk batas perulangan
        $jumlahDosen = count($Listdosen);
        
        // Loop FOR: Mulai dari 0, berlanjut selama i kurang dari total elemen
        for ($i = 0; $i < $jumlahDosen; $i++) {
            echo $Listdosen[$i] . "<br>";
        }
    ?>
    </body>
</html>