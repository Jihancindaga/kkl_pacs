<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Kenaikan Pangkat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            transition: all 0.3s;
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
            margin-left: 10px;
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

        .btn-container {
            margin-bottom: 20px;
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

        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-section select,
        .filter-section button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .filter-section button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-section button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-info {
            color: #fff;
            background-color: #17a2b8;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #138496;
        }
    </style>

</head>

<body>

    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/home')">
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
            <h2>Report Kenaikan Pangkat</h2>

            <!-- Button group navigasi -->
            <div class="button-group">
                <button class="btn btn-1 {{ Request::is('datakaryawan') ? 'active' : '' }}" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                <button class="btn btn-2 {{ Request::is('tambah-karyawan') ? 'active' : '' }}" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                <button class="btn btn-3 {{ Request::is('riwayat-kenaikan') ? 'active' : '' }}" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan Pangkat</button>
                <button class="btn btn-5 {{ Request::is('riwayat_karyawan_nonaktif') ? 'active' : '' }}" onclick="navigateTo('/riwayat_karyawan_nonaktif')">Riwayat Karyawan Non-aktif</button>
                <button class="btn btn-4 {{ Request::is('report') ? 'active' : '' }}" onclick="navigateTo('/report')">Report</button>
            </div>

            <hr>

            <!-- Filter Section -->
            <div class="filter-section">
                <select name="tahun" id="tahun">
                    <option value="">Pilih Tahun</option>
                </select>
                <select name="bagian" id="bagian">
                    <option value="">Pilih Bagian</option>
                </select>
                <select name="pangkat" id="pangkat">
                    <option value="">Pilih Pangkat sebelumnya</option>
                </select>
                <select name="pangkat" id="pangkat">
                    <option value="">Pilih Pangkat yang Diajukan</option>
                </select>
                <button type="button">Cari</button>
                <button type="button" onclick="window.location.reload()">Reset</button>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tahun Kenaikan</th>
                            <th>Bagian</th>
                            <th>Pangkat Terakhir</th>
                            <th>Pangkat yang Diajukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123456</td>
                            <td>Jane Doe</td>
                            <td>2023</td>
                            <td>Keuangan</td>
                            <td>IV/a</td>
                            <td>IV/a</td>
                        </tr>
                        <!-- More rows -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>

</body>

</html>