<?php

// data/sbc_data.php
// Berisi 30 Skenario (Scenario-Based Challenge) untuk mengukur 6 dimensi P5
const SBC_QUESTIONS = [
    [
        'id' => 'P5-KRIT-01',
        'dimensi' => 'Bernalar Kritis',
        'skenario' => 'Di media sosial, Anda menemukan sebuah klaim ilmiah yang mengejutkan tentang makanan.',
        'pilihan' => [
            'A' => ['teks' => 'Langsung share ke IG Story dan bertanya, "Ini beneran, gak, sih?"', 'bobot' => 0],
            'B' => ['teks' => 'Mencari satu sumber berita lain di Google untuk konfirmasi cepat.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari data studi ilmiah asli dan menganalisis metodologinya di balik klaim tersebut.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KRIT-02',
        'dimensi' => 'Bernalar Kritis',
        'skenario' => 'Saat review produk gadget, Anda melihat banyak review yang saling bertentangan.',
        'pilihan' => [
            'A' => ['teks' => 'Hanya membaca review dari channel favorit Anda yang selalu Anda setujui.', 'bobot' => 0],
            'B' => ['teks' => 'Membaca beberapa review dari berbagai channel dan membandingkan poin-poin kesamaannya.', 'bobot' => 1],
            'C' => ['teks' => 'Membuat matriks perbandingan fitur dan menimbang sendiri kelebihan/kekurangan masing-masing gadget secara logis.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KRIT-03',
        'dimensi' => 'Bernalar Kritis',
        'skenario' => 'Anda diberi soal yang belum pernah muncul di buku, tapi prinsip dasarnya sudah diajarkan.',
        'pilihan' => [
            'A' => ['teks' => 'Menyerah dan berharap guru akan memberi kunci jawaban.', 'bobot' => 0],
            'B' => ['teks' => 'Mencari contoh soal online yang serupa agar bisa meniru solusinya.', 'bobot' => 1],
            'C' => ['teks' => 'Menganalisis rumus atau prinsip dasar yang mungkin berlaku untuk memecahkan soal tersebut dari awal.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KRIT-04',
        'dimensi' => 'Bernalar Kritis',
        'skenario' => 'Tugas Anda membuat review sebuah film.',
        'pilihan' => [
            'A' => ['teks' => 'Hanya mendeskripsikan ulang alur ceritanya.', 'bobot' => 0],
            'B' => ['teks' => 'Menjelaskan bagian mana yang Anda suka dan tidak suka dari alur ceritanya.', 'bobot' => 1],
            'C' => ['teks' => 'Menganalisis pesan tersembunyi, sinematografi, dan dampaknya terhadap isu sosial saat ini.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KRIT-05',
        'dimensi' => 'Bernalar Kritis',
        'skenario' => 'Anda mendengar desas-desus kebijakan baru sekolah.',
        'pilihan' => [
            'A' => ['teks' => 'Langsung percaya dan mengeluh kepada teman-teman Anda.', 'bobot' => 0],
            'B' => ['teks' => 'Mencari tahu siapa yang pertama kali menyebarkan informasi tersebut.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari dokumen resmi atau pengumuman dari sekolah untuk memverifikasi kebenarannya.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KREA-06',
        'dimensi' => 'Kreatif',
        'skenario' => 'Tugas kelompok Anda adalah membuat presentasi yang unik. Tim Anda hanya ingin menggunakan template bawaan PowerPoint.',
        'pilihan' => [
            'A' => ['teks' => 'Mengikuti keputusan tim agar cepat selesai, Anda tidak mau ribet.', 'bobot' => 0],
            'B' => ['teks' => 'Mengusulkan penambahan satu atau dua gambar/animasi baru di template itu.', 'bobot' => 1],
            'C' => ['teks' => 'Membuat seluruh desain presentasi dari nol dengan konsep narasi visual yang berbeda (misalnya infografis interaktif).', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KREA-07',
        'dimensi' => 'Kreatif',
        'skenario' => 'Anda perlu ide untuk proyek kewirausahaan di sekolah (misal: event pameran).',
        'pilihan' => [
            'A' => ['teks' => 'Menjual produk yang sudah umum dijual di event lain.', 'bobot' => 0],
            'B' => ['teks' => 'Menjual produk unik, tetapi dengan konsep pemasaran yang standar.', 'bobot' => 1],
            'C' => ['teks' => 'Membuat konsep event yang menyelesaikan masalah atau memberikan pengalaman baru kepada pengunjung.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KREA-08',
        'dimensi' => 'Kreatif',
        'skenario' => 'Anda memiliki barang bekas yang sudah tidak terpakai (misalnya, tumpukan koran lama).',
        'pilihan' => [
            'A' => ['teks' => 'Langsung membuangnya ke tempat sampah.', 'bobot' => 0],
            'B' => ['teks' => 'Memberikannya kepada orang lain yang mungkin membutuhkannya.', 'bobot' => 1],
            'C' => ['teks' => 'Mengubah barang bekas tersebut menjadi produk baru yang memiliki fungsi atau nilai estetika (misalnya tas atau kerajinan).', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KREA-09',
        'dimensi' => 'Kreatif',
        'skenario' => 'Anda mendapat tugas menulis cerita pendek.',
        'pilihan' => [
            'A' => ['teks' => 'Menulis cerita dengan alur yang sudah sering Anda baca di novel atau komik.', 'bobot' => 0],
            'B' => ['teks' => 'Menggabungkan alur yang sudah ada dengan karakter yang berbeda.', 'bobot' => 1],
            'C' => ['teks' => 'Merancang tokoh, latar, dan ending yang sama sekali tidak terduga dan orisinal.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KREA-10',
        'dimensi' => 'Kreatif',
        'skenario' => 'Ada masalah yang perlu solusi cepat di kelas Anda (misal: kehabisan spidol).',
        'pilihan' => [
            'A' => ['teks' => 'Mengeluh dan menanyakan ke kelas sebelah.', 'bobot' => 0],
            'B' => ['teks' => 'Mencoba mencari spidol pinjaman di ruang guru.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari cara agar masalah ini tidak terulang (misalnya membuat sistem tracking spidol kelas).', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-MAND-11',
        'dimensi' => 'Mandiri',
        'skenario' => 'Anda mendapat tugas proyek besar yang batas waktunya dua minggu.',
        'pilihan' => [
            'A' => ['teks' => 'Berharap guru akan memberikan perpanjangan waktu karena Anda kesulitan memulai.', 'bobot' => 0],
            'B' => ['teks' => 'Membuat timeline kasar dan mulai mengerjakannya seminggu sebelum deadline.', 'bobot' => 1],
            'C' => ['teks' => 'Memecah proyek menjadi checklist harian terperinci dan memulai hari ini juga, tanpa harus disuruh.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-MAND-12',
        'dimensi' => 'Mandiri',
        'skenario' => 'Anda mendapat nilai jelek pada ujian yang sulit.',
        'pilihan' => [
            'A' => ['teks' => 'Menyalahkan soalnya yang terlalu sulit dan mengeluh di media sosial.', 'bobot' => 0],
            'B' => ['teks' => 'Menganalisis sebentar letak kesalahan Anda, lalu pindah ke mata pelajaran lain.', 'bobot' => 1],
            'C' => ['teks' => 'Menganalisis detail kegagalan Anda, membuat rencana belajar baru yang spesifik, dan mencari tutor/sumber belajar tambahan.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-MAND-13',
        'dimensi' => 'Mandiri',
        'skenario' => 'Anda sedang belajar skill baru secara mandiri di rumah (coding atau bahasa asing).',
        'pilihan' => [
            'A' => ['teks' => 'Berhenti saat menemukan kesulitan yang terlalu besar.', 'bobot' => 0],
            'B' => ['teks' => 'Mencari solusi bug di internet dan mencoba mengaplikasikannya.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari solusi, menganalisis mengapa bug itu terjadi, dan mendokumentasikan proses penyelesaiannya.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-MAND-14',
        'dimensi' => 'Mandiri',
        'skenario' => 'Anda memiliki uang saku yang cukup besar dari orang tua.',
        'pilihan' => [
            'A' => ['teks' => 'Menghabiskannya untuk membeli barang yang Anda inginkan saat ini juga.', 'bobot' => 0],
            'B' => ['teks' => 'Menyimpan sebagian kecil di celengan dan menghabiskan sisanya.', 'bobot' => 1],
            'C' => ['teks' => 'Membuat anggaran bulanan, menabung untuk tujuan jangka panjang, dan mencatat semua pengeluaran di aplikasi finance pribadi.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-MAND-15',
        'dimensi' => 'Mandiri',
        'skenario' => 'Anda perlu keputusan sulit tentang pilihan ekstrakurikuler.',
        'pilihan' => [
            'A' => ['teks' => 'Meminta orang tua atau teman yang menentukan.', 'bobot' => 0],
            'B' => ['teks' => 'Menulis daftar pro dan kontra, tetapi tetap bingung.', 'bobot' => 1],
            'C' => ['teks' => 'Meriset feedback dari senior, mencoba kedua ekskul dalam seminggu, dan mengambil keputusan sendiri.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-ROY-16',
        'dimensi' => 'Bergotong Royong',
        'skenario' => 'Ada anggota tim yang selalu terlambat mengirimkan bagiannya, dan ini merusak alur kerja.',
        'pilihan' => [
            'A' => ['teks' => 'Menyelesaikan bagiannya diam-diam, lalu mengeluh kepada teman lain.', 'bobot' => 0],
            'B' => ['teks' => 'Melaporkannya ke guru atau ketua tim.', 'bobot' => 1],
            'C' => ['teks' => 'Menghubunginya secara pribadi, mencari tahu masalahnya, dan menawarkan solusi bersama, bukan hanya komplain.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-ROY-17',
        'dimensi' => 'Bergotong Royong',
        'skenario' => 'Saat brainstorming, ide Anda ditolak oleh mayoritas anggota tim.',
        'pilihan' => [
            'A' => ['teks' => 'Berdiam diri dan tidak mau berkontribusi lagi karena merasa diremehkan.', 'bobot' => 0],
            'B' => ['teks' => 'Membela ide Anda mati-matian dan menolak semua ide lain.', 'bobot' => 1],
            'C' => ['teks' => 'Meminta feedback mengapa ide Anda kurang cocok, lalu menggunakan feedback itu untuk menyempurnakan ide tim yang baru.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-ROY-18',
        'dimensi' => 'Bergotong Royong',
        'skenario' => 'Anda sedang bekerja dalam tim jarak jauh (online).',
        'pilihan' => [
            'A' => ['teks' => 'Hanya mengirimkan hasil kerja Anda di grup tanpa berkomunikasi dengan anggota lain.', 'bobot' => 0],
            'B' => ['teks' => 'Mengirimkan hasil kerja dan bertanya apakah ada yang butuh bantuan.', 'bobot' => 1],
            'C' => ['teks' => 'Membuat video call singkat secara berkala untuk memastikan semua anggota tim sinkron dan memahami tujuan.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-ROY-19',
        'dimensi' => 'Bergotong Royong',
        'skenario' => 'Anda melihat teman kesulitan membawa barang berat/banyak di sekolah.',
        'pilihan' => [
            'A' => ['teks' => 'Menghindari kontak mata agar tidak perlu membantu.', 'bobot' => 0],
            'B' => ['teks' => 'Bertanya apakah ia membutuhkan bantuan, tetapi hanya sekali.', 'bobot' => 1],
            'C' => ['teks' => 'Secara proaktif mengambil sebagian barang tanpa perlu diminta dan menemaninya sampai tujuan.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-ROY-20',
        'dimensi' => 'Bergotong Royong',
        'skenario' => 'Anda adalah ketua kelompok.',
        'pilihan' => [
            'A' => ['teks' => 'Mendikte semua tugas dan cara mengerjakannya tanpa menerima masukan.', 'bobot' => 0],
            'B' => ['teks' => 'Memberi tugas, lalu mengecek di akhir.', 'bobot' => 1],
            'C' => ['teks' => 'Mengajak setiap anggota berdiskusi tentang minat dan kekuatan mereka sebelum menentukan tugas, agar semua terlibat.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KEBI-21',
        'dimensi' => 'Berkebinekaan Global',
        'skenario' => 'Dalam diskusi, ada teman yang memiliki pandangan yang sangat berbeda dengan nilai budaya Anda.',
        'pilihan' => [
            'A' => ['teks' => 'Menghentikan diskusi dan fokus pada tugas Anda sendiri.', 'bobot' => 0],
            'B' => ['teks' => 'Mendengarkan, tetapi menyatakan bahwa pandangan Anda adalah yang paling benar dan menolak kompromi.', 'bobot' => 1],
            'C' => ['teks' => 'Mengajukan pertanyaan terbuka untuk memahami mengapa ia memiliki pandangan itu dan mencari common ground (kesamaan nilai).', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KEBI-22',
        'dimensi' => 'Berkebinekaan Global',
        'skenario' => 'Anda harus bekerja sama dengan orang dari kota/provinsi lain yang gaya komunikasinya sangat berbeda.',
        'pilihan' => [
            'A' => ['teks' => 'Menganggap gaya komunikasi mereka aneh dan menyulitkan.', 'bobot' => 0],
            'B' => ['teks' => 'Mencoba berbicara dengan cara mereka agar mereka nyaman, meskipun terasa canggung.', 'bobot' => 1],
            'C' => ['teks' => 'Menganalisis gaya komunikasi mereka, menyesuaikan cara bicara Anda, dan mencari tahu cara komunikasi yang paling efektif untuk tim.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KEBI-23',
        'dimensi' => 'Berkebinekaan Global',
        'skenario' => 'Anda melihat stereotip negatif tentang kelompok tertentu di internet.',
        'pilihan' => [
            'A' => ['teks' => 'Langsung membagikan konten yang mendukung stereotip tersebut.', 'bobot' => 0],
            'B' => ['teks' => 'Mengkritik konten tersebut di kolom komentar.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari data dan informasi yang membantah stereotip tersebut, lalu berbagi informasi yang benar.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KEBI-24',
        'dimensi' => 'Berkebinekaan Global',
        'skenario' => 'Anda ditugaskan presentasi tentang budaya asing yang belum Anda kenal.',
        'pilihan' => [
            'A' => ['teks' => 'Hanya membaca dari satu sumber Wikipedia.', 'bobot' => 0],
            'B' => ['teks' => 'Mencari beberapa fakta unik tentang makanan dan pakaiannya.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari video atau wawancara dengan penutur asli untuk memahami nilai-nilai, perspektif, dan konteks budayanya.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-KEBI-25',
        'dimensi' => 'Berkebinekaan Global',
        'skenario' => 'Anda sedang berada di negara asing dan melihat tradisi yang terasa aneh bagi Anda.',
        'pilihan' => [
            'A' => ['teks' => 'Membuat komentar sinis di media sosial tentang tradisi tersebut.', 'bobot' => 0],
            'B' => ['teks' => 'Mengabaikan tradisi tersebut dan fokus pada tujuan wisata Anda.', 'bobot' => 1],
            'C' => ['teks' => 'Berusaha mencari tahu sejarah dan alasan di balik tradisi tersebut dari penduduk lokal.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-AKHLAK-26',
        'dimensi' => 'Beriman/Berakhlak Mulia',
        'skenario' => 'Anda melihat ponsel teman Anda tertinggal di kantin, padahal tidak ada yang melihat.',
        'pilihan' => [
            'A' => ['teks' => 'Mengambilnya dan menyimpannya sampai ada yang bertanya.', 'bobot' => 0],
            'B' => ['teks' => 'Mengembalikannya ke satpam atau guru, tanpa memberitahu siapa pun.', 'bobot' => 1],
            'C' => ['teks' => 'Mencari teman Anda secara langsung, mengembalikannya, dan memastikan ia tahu Anda menemukannya.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-AKHLAK-27',
        'dimensi' => 'Beriman/Berakhlak Mulia',
        'skenario' => 'Anda membuat kesalahan besar dalam proyek sekolah yang merugikan tim.',
        'pilihan' => [
            'A' => ['teks' => 'Menyalahkan teman tim yang lain karena tidak mengecek kerjaan Anda.', 'bobot' => 0],
            'B' => ['teks' => 'Diam-diam memperbaikinya dan berharap tidak ada yang sadar.', 'bobot' => 1],
            'C' => ['teks' => 'Mengakui kesalahan tersebut secara terbuka di hadapan tim dan meminta maaf, lalu menawarkan solusi perbaikan.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-AKHLAK-28',
        'dimensi' => 'Beriman/Berakhlak Mulia',
        'skenario' => 'Anda berjanji akan membantu seorang teman setelah pulang sekolah. Tiba-tiba ada acara lain yang lebih menarik.',
        'pilihan' => [
            'A' => ['teks' => 'Mengirim pesan singkat untuk membatalkan janji tanpa alasan jelas.', 'bobot' => 0],
            'B' => ['teks' => 'Memberikan alasan yang dibuat-buat agar teman tidak marah.', 'bobot' => 1],
            'C' => ['teks' => 'Jujur tentang adanya acara lain, meminta maaf, dan segera menjadwalkan ulang bantuan di hari lain.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-AKHLAK-29',
        'dimensi' => 'Beriman/Berakhlak Mulia',
        'skenario' => 'Anda memiliki kesempatan untuk mendapatkan nilai yang lebih tinggi dengan menyalin tugas dari internet.',
        'pilihan' => [
            'A' => ['teks' => 'Menyalin tugas tersebut tanpa ragu-ragu.', 'bobot' => 0],
            'B' => ['teks' => 'Menyalin tugas, tetapi mengubah sedikit kata-katanya agar terlihat berbeda.', 'bobot' => 1],
            'C' => ['teks' => 'Mengerjakan tugas dari awal hingga selesai sendiri, menggunakan internet hanya sebagai referensi bahan ajar.', 'bobot' => 3],
        ]
    ],
    [
        'id' => 'P5-AKHLAK-30',
        'dimensi' => 'Beriman/Berakhlak Mulia',
        'skenario' => 'Anda diminta memimpin kelompok untuk menyelesaikan tugas yang Anda kuasai.',
        'pilihan' => [
            'A' => ['teks' => 'Mendikte semua pekerjaan dan mengabaikan ide teman yang lain.', 'bobot' => 0],
            'B' => ['teks' => 'Menerima masukan tim, tetapi mengambil keputusan akhir berdasarkan keuntungan pribadi Anda.', 'bobot' => 1],
            'C' => ['teks' => 'Mendengarkan semua masukan, dan mengambil keputusan yang paling adil dan etis untuk seluruh anggota tim.', 'bobot' => 3],
        ]
    ],
];