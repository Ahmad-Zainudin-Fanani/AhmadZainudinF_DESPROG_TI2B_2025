<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Multiupload Dokumen</title>
</head>
<body>
  <h2>Unggah Dokumen</h2>

<!-- <form action="proses_upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple accept=".pdf,.doc,.docx,.txt">
    <input type="submit" value="Unggah">
  </form> -->

  <form action="proses_upload_images.php" method="post" enctype="multipart/form-data">
  <input type="file" name="files[]" multiple accept=".jpg,.jpeg,.png,.gif">
  <input type="submit" value="Unggah">
</form>

</body>
</html>
