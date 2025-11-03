<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>File Upload (Langkah 10)</title>
</head>
<body>
  <h2>Upload Dokumen (txt, pdf, doc, docx)</h2>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <!-- Opsi A: filter hanya dokumen -->
    <input type="file" name="myfile" accept=".txt,.pdf,.doc,.docx">
    <!-- Opsi B (alternatif): hapus 'accept' bila ingin bebas pilih -->
    <!-- <input type="file" name="myfile"> -->
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>
