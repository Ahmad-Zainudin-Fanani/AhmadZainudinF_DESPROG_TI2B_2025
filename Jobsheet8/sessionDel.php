<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
session_unset();   // menghapus semua variabel di $_SESSION
session_destroy(); // menghentikan/menghapus sesi aktif

echo "All session variables are now removed, and the session is destroyed.";
?>
</body>
</html>
    