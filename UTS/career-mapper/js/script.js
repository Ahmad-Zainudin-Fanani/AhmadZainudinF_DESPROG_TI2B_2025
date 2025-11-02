// js/script.js - Logika JQuery untuk Interaksi dan AJAX

$(document).ready(function() {
    
    // Variabel dan Cache Element
    const totalSoal = 30;
    const appContainer = $('#app-container');
    const hasilDiv = $('#hasil-rekomendasi');
    const header = $('header');
    
    // FUNGSI 1: Memuat Form SBC dari PHP saat tombol diklik
    function loadSbcForm() {
        // Sembunyikan Landing Page dan tampilkan container aplikasi
        header.hide();
        appContainer.html('<p style="text-align:center;">Memuat formulir tes...</p>').show(); 

        $.ajax({
            type: "GET", // Memanggil PHP untuk mendapatkan markup HTML
            url: "engine_core.php", 
            success: function(html_content) {
                // Sisipkan HTML form yang dikembalikan PHP ke dalam container
                appContainer.html(html_content); 
                setupFormSubmitListener(); // Pasang listener setelah form dimuat
            },
            error: function() {
                appContainer.html('<p class="error-message">Gagal memuat formulir tes dari server.</p>');
            }
        });
    }

    // LISTENER UNTUK TOMBOL "MULAI AKSIMU SEKARANG"
    $('#start-test-btn').on('click', function() {
        loadSbcForm();
    });

    // FUNGSI 2: SETUP LISTENER SUBMIT FORM (AJAX POST)
    function setupFormSubmitListener() {
        $('#sbc-form').on('submit', function(e) {
            e.preventDefault(); 

            // Validasi: Cek semua soal sudah dijawab
            if ($('input[type="radio"]:checked').length < totalSoal) {
                alert('Mohon lengkapi semua ' + totalSoal + ' skenario sebelum melanjutkan.');
                return; 
            }

            const formData = $(this).serialize(); 
            const submitBtn = $('#submit-btn');

            submitBtn.text('Memproses Data, Tunggu Sebentar...').prop('disabled', true);
            
            // AJAX POST ke PHP Engine
            $.ajax({
                type: "POST",
                url: "engine_core.php", // File PHP yang memproses skor
                data: formData,
                dataType: "json", // Respons yang diharapkan adalah JSON
                
                success: function(response) {
                    if (response.status === 'success') {
                        displayResult(response);
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert("Terjadi kesalahan koneksi saat memproses data.");
                },
                complete: function() {
                    submitBtn.text('Cek Peta Karir Saya').prop('disabled', false);
                }
            });
        });
    }

    // FUNGSI 3: MENAMPILKAN HASIL DARI JSON
    function displayResult(data) {
        
        const rekomendasi = data.rekomendasi.rekomendasi_jalur;
        const skorP5 = data.skor_p5;
        const p5Dominan = data.rekomendasi.p5_dominan;
        
        let htmlContent = '';
        
        if (rekomendasi) {
            // Konten untuk hasil yang DITEMUKAN (sesuai Sheet 4)
            htmlContent = `
                <h2>Peta Karir Anda: Hasil Analisis Karakter</h2>
                <div class="result-card result-card--main">
                    <h3>⭐ Kekuatan Inti Anda: ${p5Dominan[0]} dan ${p5Dominan[1]}</h3>
                    <h1 class="rekomendasi-profesi">🎯 ${rekomendasi.profesi_tujuan}</h1>
                    <p><em>${rekomendasi.keterangan_logika}</em></p>
                </div>
                
                <div class="result-card">
                    <h3>📚 Pelajaran Pilihan Wajib Anda</h3>
                    <p>Untuk menempuh jalur ini, fokus pada: <strong>${rekomendasi.pelajaran_kunci}</strong></p>
                </div>

                <div class="result-card">
                    <h3>📖 Analisis Skor P5</h3>
                    ${buildSkorTable(skorP5)}
                </div>
                
                <p class="mt-4"><button onclick="location.reload()" class="btn-refresh">Ulangi Tes / Cek Opsi Lain</button></p>
            `;
            
        } else {
            // Konten jika tidak ditemukan jalur korelasi
             htmlContent = `
                <h2>Analisis Karakter Selesai!</h2>
                <div class="result-card error-card">
                    <p>P5 terkuat Anda adalah **${p5Dominan[0]}** dan **${p5Dominan[1]}**.</p>
                    <p>Mohon maaf, jalur korelasi untuk kombinasi ini belum tersedia di database kami.</p>
                </div>
                ${buildSkorTable(skorP5)}
             `;
        }

        // Tampilkan hasil dan sembunyikan container utama
        hasilDiv.html(htmlContent);
        hasilDiv.show();
        appContainer.hide();
        $('html, body').animate({ scrollTop: 0 }, 'slow'); 
    }
    
    // Fungsi pembantu untuk membuat tabel skor P5
    function buildSkorTable(skorP5) {
        let tableHtml = '<table class="skor-table"><tr><th>Dimensi P5</th><th>Skor Total</th></tr>';
        const skorArray = Object.keys(skorP5).map(key => [key, skorP5[key]]);
        skorArray.sort((a, b) => b[1] - a[1]); // Urutkan skor tertinggi ke terendah
        
        skorArray.forEach(item => {
            const [dimensi, skor] = item;
            tableHtml += `<tr><td>${dimensi}</td><td>${skor}</td></tr>`;
        });
        
        tableHtml += '</table>';
        return tableHtml;
    }
});