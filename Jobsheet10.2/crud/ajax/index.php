<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo $_SESSION['csrf_token']; ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          crossorigin="anonymous">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Data Anggota</title>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php" style="color:#fff;">
        CRUD Dengan Ajax
    </a>
</nav>

<div class="container mt-4">
    <h2 class="text-center" style="margin:30px;">Data Anggota</h2>

    <!-- FORM -->
    <form method="post" class="form-data" id="form-data">
        <div class="row">
            <div class="col-sm-9">

                <div class="form-group">
                    <label>Nama:</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="nama" id="nama"
                           class="form-control" required="true">
                    <p class="text-danger" id="err_nama"></p>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="jenis_kelamin"
                               id="jenkel1" value="L"
                               class="form-check-input" required="true">
                        <label class="form-check-label" for="jenkel1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="jenis_kelamin"
                               id="jenkel2" value="P"
                               class="form-check-input" required="true">
                        <label class="form-check-label" for="jenkel2">Perempuan</label>
                    </div>
                    <p class="text-danger" id="err_jenis_kelamin"></p>
                </div>

                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="alamat" id="alamat"
                              class="form-control" required="true"></textarea>
                    <p class="text-danger" id="err_alamat"></p>
                </div>

                <div class="form-group">
                    <label>No Telepon:</label>
                    <input type="number" name="no_telp" id="no_telp"
                           class="form-control" required="true">
                    <p class="text-danger" id="err_no_telp"></p>
                </div>

                <div class="form-group">
                    <button type="button" name="simpan" id="simpan"
                            class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>

            </div>
        </div>
        <hr>
    </form>

    <!-- TABEL AKAN DI-LOAD DARI data.php -->
    <div class="data"></div>

    <div class="text-center">
        &copy; <?php echo date('Y'); ?> Copyright:
        <a href="https://google.com"> Desain Dan Pemrograman Web</a>
    </div>
</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    // Kirim token CSRF di setiap Ajax
    $.ajaxSetup({
        headers: {
            'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ===== FUNGSI UNTUK ME-RELOAD TABEL TANPA REFRESH HALAMAN =====
    function loadData() {
        let ts = new Date().getTime();   // anti cache

        // kalau #example sudah pernah jadi DataTable, hancurkan dulu
        if ($.fn.DataTable.isDataTable('#example')) {
            $('#example').DataTable().destroy();
        }

        // load ulang HTML dari data.php
        $('.data').load('data.php?ts=' + ts, function () {
            // setelah HTML masuk, aktifkan DataTable
            $('#example').DataTable();
        });
    }

    // pertama kali
    loadData();

    // Reset pesan error
    function resetError() {
        $('#err_nama').html('');
        $('#err_jenis_kelamin').html('');
        $('#err_alamat').html('');
        $('#err_no_telp').html('');
    }

    // ===== SIMPAN (INSERT / UPDATE) =====
    $('#simpan').click(function () {
        var data    = $('.form-data').serialize();
        var nama    = $('#nama').val();
        var alamat  = $('#alamat').val();
        var no_telp = $('#no_telp').val();
        var jenkel1 = $('#jenkel1').prop('checked');
        var jenkel2 = $('#jenkel2').prop('checked');

        resetError();

        if (nama === '')   $('#err_nama').html('Nama Harus Diisi');
        if (alamat === '') $('#err_alamat').html('Alamat Harus Diisi');
        if (!jenkel1 && !jenkel2)
            $('#err_jenis_kelamin').html('Jenis Kelamin Harus Dipilih');
        if (no_telp === '') $('#err_no_telp').html('No Telepon Harus Diisi');

        if (nama !== '' && alamat !== '' && no_telp !== '' && (jenkel1 || jenkel2)) {
            $.ajax({
                type: 'POST',
                url: 'form_action.php',
                data: data,
                success: function (res) {
                    // kosongkan form
                    $('#id').val('');
                    $('#form-data')[0].reset();
                    // reload tabel agar data baru langsung kelihatan
                    loadData();
                },
                error: function (r) {
                    console.log(r.responseText);
                }
            });
        }
    });

    // ===== EDIT DATA (delegasi event) =====
    $(document).on('click', '.edit_data', function () {
        var id = $(this).attr('id');

        $('html, body').animate({scrollTop: 0}, 'slow');

        $.ajax({
            type: 'POST',
            url: 'get_data.php',
            data: {id: id},
            dataType: 'json',
            success: function (response) {
                resetError();
                $('html, body').animate({scrollTop: 30}, 'slow');

                $('#id').val(response.id);
                $('#nama').val(response.nama);
                $('#alamat').val(response.alamat);
                $('#no_telp').val(response.no_telp);

                if (response.jenis_kelamin === 'L') {
                    $('#jenkel1').prop('checked', true);
                } else {
                    $('#jenkel2').prop('checked', true);
                }
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    });

    // ===== HAPUS DATA (delegasi event) =====
    $(document).on('click', '.hapus_data', function () {
        var id = $(this).attr('id');

        $.ajax({
            type: 'POST',
            url: 'hapus_data.php',
            data: {id: id},
            success: function () {
                loadData();   // reload tabel setelah hapus
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    });

});
</script>

</body>
</html>
