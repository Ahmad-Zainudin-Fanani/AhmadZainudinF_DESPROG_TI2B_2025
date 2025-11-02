<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contoh Form dengan jQuery</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Form Contoh</h2>

  <form id="myForm">
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

  <hr>
  <div id="hasil"><em>Hasil akan ditampilkan di sini …</em></div>

<script>
$(document).ready(function () {
  $("#myForm").submit(function (e) {
    e.preventDefault();                           // cegah reload
    var formData = $(this).serialize();           // ambil semua nilai form

    $.ajax({
      url: "proses_lanjut.php",                   // endpoint PHP
      type: "POST",
      data: formData,
      success: function (response) {
        $("#hasil").html(response);               // tampilkan balasan server
      },
      error: function () {
        $("#hasil").text("Gagal mengirim data.");
      }
    });
  });
});
</script>
</body>
</html>
