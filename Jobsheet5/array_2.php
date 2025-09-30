<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Dosen Asosiatif</title> 
        
        <link rel="stylesheet" href="style_2.css">
    </head>
    <body>
        <h1>Profil Data Dosen</h1>
        
        <?php
            // Array Asosiatif
            $Dosen = [
                'nama' => 'Elok Nur Hamdana',
                'domisili' => 'Malang',
                'jenis_kelamin' => 'Perempuan' 
            ]; 
        ?>

        <table>
            <thead>
                <tr>
                    <th>Atribut</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Menggunakan foreach untuk iterasi Key dan Value
                foreach ($Dosen as $key => $value) {
                    echo "<tr>";
                    // Menampilkan Key/Atribut. Menggunakan str_replace untuk 'jenis_kelamin'
                    echo "<td>" . ucwords(str_replace('_', ' ', $key)) . "</td>";
                    // Menampilkan Value/Nilai Data
                    echo "<td>" . $value . "</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>

        </body>
</html>