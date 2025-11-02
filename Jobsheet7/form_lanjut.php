<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contoh Form dengan PHP</title>
</head>
<body>
  <h2>Form Contoh</h2>

  <form method="POST" action="proses_lanjut.php">
    <label for="buah">Pilih Buah:</label><br>
    <select name="buah" id="buah">
      <option value="apel">Apel</option>
      <option value="pisang">Pisang</option>
      <option value="mangga">Mangga</option>
      <option value="jeruk">Jeruk</option>
    </select>
    <br><br>

    <label>Pilih Warna Favorit:</label><br>
    <input type="checkbox" name="warna[]" value="Merah"> Merah<br>
    <input type="checkbox" name="warna[]" value="Biru"> Biru<br>
    <input type="checkbox" name="warna[]" value="Hijau"> Hijau<br>
    <br>

    <label>Pilih Jenis Kelamin:</label><br>
    <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki<br>
    <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan<br>
    <br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
