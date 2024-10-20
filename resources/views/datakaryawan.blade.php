<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Gaji Berkala</title>
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
            transition: all 0.3s;
        }
        .navbar {
            background-color: #007bff; /* Blue */
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
        }
        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }
        .content {
            margin-top: 70px; /* Adjust based on navbar height */
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .table thead th {
            background-color: #007bff; /* Blue */
            color: white;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-custom {
            margin: 5px;
        }
        .btn-primary-custom {
            background-color: #007bff; /* Blue */
            border-color: #007bff;
        }
        .btn-success-custom {
            background-color: #28a745; /* Green */
            border-color: #28a745;
        }
        .btn-warning-custom {
            background-color: #ffc107; /* Yellow */
            border-color: #ffc107;
        }
        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }
            .container {
                padding: 10px;
            }
            .table td, .table th {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow-left icon -->
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 500px;"> <!-- Logo PACS -->
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;"> <!-- Logo Sleman -->
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;"> <!-- Logo Sleman -->
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>DATA KENAIKAN GAJI BERKALA</h2>
            <!-- Tombol-tombol di atas tabel -->
            <div class="mb-3">
                <button class="btn btn-primary btn-custom">Tombol Biru</button>
                <button class="btn btn-success btn-custom">Tombol Hijau</button>
                <button class="btn btn-warning btn-custom">Tombol Kuning</button>
            </div>
            <!-- Tabel Kenaikan Gaji Berkala -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Pangkat/Jabatan</th>
                                <th>Gaji Pokok Lama (Rp)</th>
                                <th>Gaji Pokok Baru (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data statis -->
                            <tr>
                                <td>1</td>
                                <td>Ruslaini, SS</td>
                                <td>196607041999032003</td>
                                <td>Penata Tingkat I, III/d</td>
                                <td>3.469.100</td>
                                <td>3.793.100</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ambar Widiyawati</td>
                                <td>198004052010012005</td>
                                <td>Pengatur Muda Tingkat I, II/b</td>
                                <td>2.246.200</td>
                                <td>2.456.000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Suparyati, S.Ant</td>
                                <td>197802231998032002</td>
                                <td>Penata Muda Tingkat I, III/b</td>
                                <td>2.791.500</td>
                                <td>3.181.300</td>
                            </tr>
                            <!-- Tambahkan lebih banyak data di sini jika diperlukan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
