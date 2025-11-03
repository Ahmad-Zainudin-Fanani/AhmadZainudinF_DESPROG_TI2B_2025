// $(document).ready(function () {
//   $('#upload-form').submit(function (e) {
//     e.preventDefault();

//     var formData = new FormData(this);

//     $.ajax({
//       type: 'POST',
//       url: 'upload_ajax.php',
//       data: formData,
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function (response) {
//         $('#status').html(response);
//       },
//       error: function () {
//         $('#status').html('Terjadi kesalahan saat mengunggah file.');
//       }
//     });
//   });
// });

// $(document).ready(function () {
//   $('#upload-form').submit(function (e) {
//     e.preventDefault();

//     var fd = new FormData();
//     var files = $('#files')[0].files;

//     for (var i = 0; i < files.length; i++) {
//       fd.append('files[]', files[i]);
//     }

//     $.ajax({
//       type: 'POST',
//       url: 'upload_ajax.php',
//       data: fd,
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function (response) {
//         $('#status').html(response);
//       },
//       error: function () {
//         $('#status').html('Terjadi kesalahan saat mengunggah file.');
//       }
//     });
//   });
// });

$(document).ready(function(){
  // enable/disable tombol saat ada file
  $('#file').change(function(){
    if (this.files.length > 0) {
      $('#upload-button').prop('disabled', false).css('opacity', 1);
    } else {
      $('#upload-button').prop('disabled', true).css('opacity', 0.5);
    }
  });

  // submit via AJAX (sesuai panduan Bagian 3 & 4)
  $('#upload-form').submit(function(e){
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'upload_ajax.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){
        $('#status').html(response);
      },
      error: function(){
        $('#status').html('Terjadi kesalahan saat mengunggah file.');
      }
    });
  });
});
