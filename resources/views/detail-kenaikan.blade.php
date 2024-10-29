{{-- resources/views/pilihan.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jenis Kenaikan Pangkat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; /* Warna latar belakang yang lebih lembut */
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
            margin: 0 5px;
        }

        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        .container {
            margin-top: 80px; /* Menambahkan jarak atas untuk memberi ruang dari navbar */
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }

        table {
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .soft-button {
            background-color: #d1e7dd; /* Warna tombol yang lebih soft */
            color: #0f5132;
            border: none;
            transition: background-color 0.3s;
        }

        .soft-button:hover {
            background-color: #c3e6cb; /* Warna saat hover */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/datakaryawan')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman">
        </div>
    </div>

    <!-- Container Pilihan -->
    <div class="container">
        <h3>Pilih Jenis Kenaikan Pangkat</h3>

        <!-- Tabel Nama dan NIP Statis -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td> <!-- Ganti dengan nama karyawan -->
                    <td>123456789</td> <!-- Ganti dengan NIP karyawan -->
                </tr>
            </tbody>
        </table>

        <!-- Pilihan Kenaikan Pangkat -->
        <a href="#" class="btn soft-button">1) Kenaikan Pangkat Reguler (KPO)</a>
        <a href="#" class="btn soft-button">2) Kenaikan Pangkat Pilihan Struktural</a>
        <a href="#" class="btn soft-button">3) Kenaikan Pangkat Pilihan Penyesuaian Ijasah</a>
        <a href="#" class="btn soft-button">4) Kenaikan Pangkat Pilihan Fungsional</a>
        <a href="#" class="btn soft-button">5) Kenaikan Pangkat Karena Sedang Menjalankan Tugas Belajar</a>

    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page; // Navigasi ke halaman yang ditentukan
        }
    </script>

</body>
</html>