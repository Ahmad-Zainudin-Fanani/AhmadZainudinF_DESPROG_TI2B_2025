<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Input dengan Validasi (AJAX)</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>.err{color:#c00;font-size:.9rem}</style>
</head>
<body>
  <h1>Form Input dengan Validasi (AJAX)</h1>

  <form id="vform" method="post">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <span id="nama-error" class="err"></span><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <span id="email-error" class="err"></span><br>

    <!-- Tambahan password (langkah 10) -->
    <label for="password">Password (≥ 8 karakter):</label><br>
    <input type="password" id="password" name="password"><br>
    <span id="pass-error" class="err"></span><br>

    <input type="submit" value="Submit">
  </form>

  <hr>
  <div id="hasil"><em>Respons server tampil di sini…</em></div>

<script>
$(document).ready(function(){
  $('#vform').on('submit', function(e){
    e.preventDefault(); // selalu cegah reload (AJAX)
    let ok = true;

    const nama  = $('#nama').val().trim();
    const email = $('#email').val().trim();
    const pass  = $('#password').val();
    const reMail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // reset pesan
    $('#nama-error, #email-error, #pass-error').text('');

    if(!nama){ $('#nama-error').text('Nama harus diisi.'); ok=false; }
    if(!email){ $('#email-error').text('Email harus diisi.'); ok=false; }
    else if(!reMail.test(email)){ $('#email-error').text('Format email tidak valid.'); ok=false; }

    // Langkah 10: validasi password
    if(pass.length < 8){ $('#pass-error').text('Password minimal 8 karakter.'); ok=false; }

    if(!ok) return; // jangan kirim jika invalid

    // AJAX kirim ke server
    $.ajax({
      url: 'proses_validasi.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(res){ $('#hasil').html(res); },
      error: function(){ $('#hasil').text('Gagal mengirim data.'); }
    });
  });
});
</script>
</body>
</html>
