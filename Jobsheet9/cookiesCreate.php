<?php
// Membuat cookie bernama "user" berisi "Polinema" yang berlaku 1 jam
setcookie("user", "Polinema", time() + 3600);
echo "Cookie dibuat.";
