<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo img {
            height: 40px;
            position: relative;
            left: -5px;
        }

        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        .content {
            margin-top: 70px;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1400px;
            /* Mengubah dari 1200px ke 1400px */
            margin: auto;
        }

        .container h2 {
            margin-bottom: 40px;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 40px;
            color: #0056b3;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group .btn {
            flex: 1;
            padding: 8px;
            font-size: 12px;
            color: white;
            transition: transform 0.3s, background-color 0.3s;
            border: none;
        }

        .button-group .btn.active {
            background-color: #0056b3;
            /* Warna gelap untuk tombol aktif */
            color: white;
            /* Warna teks tetap putih */
            border: 1px solid black;
            /* Tambahkan border hitam */
            transform: scale(1.05);
            /* Sedikit memperbesar tombol aktif */
        }

        /* Specific Button Colors */
        /* Specific Button Colors */
        .btn-1 {
            background-color: #808080;
            /* Teal */
        }

        .btn-2 {
            background-color: #808080;
            /* Ungu */
        }

        .btn-3 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-4 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-5 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-warning {
            color: white;
            /* Set warna teks tombol */
        }

        /* Button Hover Effects */
        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
            /* Efek hover: sedikit memperbesar tombol */
        }

        /* Active Button Styles */
        .btn.active {
            background-color: #0056b3;
            /* Ubah warna tombol aktif */
            color: white;
            transform: scale(1.1);
            /* Sedikit memperbesar tombol aktif */
        }

        h2 {
            text-align: center;
        }

        .form-group label {
            font-weight: bold;
        }

        .input-group-text {
            background-color: #f4f4f4;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/datakaryawan')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Tambah Karyawan</h2>

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1 {{ Request::is('datakaryawan') ? 'active' : '' }}" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                    <button class="btn btn-2 {{ Request::is('tambah-karyawan') ? 'active' : '' }}" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3 {{ Request::is('riwayat-kenaikan') ? 'active' : '' }}" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan Pangkat</button>
                    <button class="btn btn-5 {{ Request::is('riwayat_karyawan_nonaktif') ? 'active' : '' }}" onclick="navigateTo('/riwayat_karyawan_nonaktif')">Riwayat Karyawan Non-aktif</button>
                    <button class="btn btn-4 {{ Request::is('report') ? 'active' : '' }}" onclick="navigateTo('/report')">Report</button>
                </div>

                <hr>

                <form action="{{ route('karyawan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Nomor Induk Pegawai" required>
                        <span id="nip-error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kenaikan_gaji">Tanggal Kenaikan Gaji</label>
                        <input type="date" class="form-control" id="tanggal_kenaikan_gaji" name="tanggal_kenaikan_gaji" placeholder="Tanggal Kenaikan Gaji" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kenaikan_pangkat">Tanggal Kenaikan Pangkat</label>
                        <input type="date" class="form-control" id="tanggal_kenaikan_pangkat" name="tanggal_kenaikan_pangkat" placeholder="Tanggal Kenaikan Pangkat" required>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat">Pangkat</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="bagian">Bagian</label>
                        <select class="form-control" id="bagian" name="bagian" required>
                            <option value="" disabled selected>Pilih Bagian</option>
                            <option value="Kesekretariatan">Kesekretariatan</option>
                            <option value="atlas">atlas</option>
                            <option value="sbsp">sbsp</option>
                            <option value="uptd">uptd</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Tambah Karyawan</button>
                </form>
            </div>
        </div>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- Include Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function navigateTo(url) {
                window.location.href = url;
            }

            $(document).ready(function() {
                $('#nip').on('blur', function() {
                    let nip = $(this).val();

                    $.ajax({
                        url: '{{ route("karyawan.checkNip") }}', // Ganti dengan route untuk pengecekan NIP
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            nip: nip
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#nip-error').text('NIP sudah digunakan, silahkan menggunakan NIP yang belum terdaftar.');
                                $('#submit-btn').attr('disabled', true);
                            } else {
                                $('#nip-error').text('');
                                $('#submit-btn').attr('disabled', false);
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            // Fungsi untuk mengatur tombol aktif
            function setActive(button, url) {
                // Mengambil semua tombol dalam grup tombol
                const buttons = document.querySelectorAll('.button-group .btn');

                // Menghapus kelas 'active' dari semua tombol
                buttons.forEach(btn => {
                    btn.classList.remove('active');
                });

                // Menambahkan kelas 'active' ke tombol yang dipilih
                button.classList.add('active');

                // Mengarahkan ke URL yang ditentukan
                navigateTo(url);
            }

            // Fungsi untuk navigasi ke halaman lain
            function navigateTo(page) {
                window.location.href = page;
            }

            // Fungsi untuk menampilkan atau menyembunyikan detail (Jika diperlukan)
            function toggleDetails(id) {
                const detailsRow = document.getElementById('details-' + id);
                detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
            }
        </script>
</body>

</html>