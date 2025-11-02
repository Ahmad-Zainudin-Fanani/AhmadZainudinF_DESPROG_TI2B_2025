<!DOCTYPE html>
<html>
<head>
  <title>Form Input PHP</title>
</head>
<body>
  <h2>Form Input PHP</h2>

<?php
$namaErr = "";
$nama    = "";
$email   = "";

// Cek submit dari form yang sama (bukan kosong)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validasi sederhana: nama wajib diisi
    if (empty($_POST['nama'])) {
        $namaErr = "Nama harus diisi!";
    } else {
        $nama  = $_POST['nama'];
        $email = $_POST['email'] ?? "";
        echo "Data berhasil disimpan!";
    }
}
?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>"><br>
    <span style="color:red;"><?php echo $namaErr; ?></span><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>

    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
