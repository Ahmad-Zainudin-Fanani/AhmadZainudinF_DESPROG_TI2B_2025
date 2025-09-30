<!DOCTYPE html>
<html>
<head>
    <title>Perbandingan Metode Integrasi</title>
</head>
<body>

    <h1>Metode 1: PHP di dalam HTML</h1>
    <p>Tanggal Hari Ini (Metode 1) : 
        <?php echo date('d M Y'); ?>
    </p>

    <hr>
    
    <h1>Metode 2: HTML di dalam PHP</h1>
    <?php
    echo '<html>';
    echo '<head>';
    echo '<title>Cara 02</title>';
    echo '</head>';
    echo '<body>';
    echo '<p>Tanggal Hari Ini : ';
    echo date('d M Y');
    echo '</p>';
    echo '</body>';
    echo '</html>';
?>
</body>
</html>