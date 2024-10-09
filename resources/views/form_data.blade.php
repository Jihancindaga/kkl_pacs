<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Data Kendaraan</title>
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
        .navbar .logout {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
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
            margin-top: 70px;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 600px; /* Menambahkan max-width untuk mengecilkan ukuran container */
            margin-left: auto; /* Menjaga agar container tetap berada di tengah */
            margin-right: auto; /* Menjaga agar container tetap berada di tengah */
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
    </style>
</head>
<body>
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/pajak')">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow-left icon -->
        </button>
    </div>
    <div class="content">
        <div class="container">
            <h2>Masukkan Data Kendaraan</h2>
            <form action="{{ route('form_data.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="pengguna">Pengguna</label>
                    <input type="text" class="form-control" id="pengguna" name="pengguna" placeholder="Nama Pengguna" required>
                </div>
                <div class="form-group">
                    <label for="plat">Plat</label>
                    <input type="text" class="form-control" id="plat" name="plat" placeholder="Nomor Plat Kendaraan" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
                        <option value="">--- Pilih Jenis Kendaraan ---</option>
                        <option value="Motor">Motor</option>
                        <option value="Mobil">Mobil</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_pajak">Waktu Pajak (Mendatang)</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="waktu_pajak" name="waktu_pajak" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ganti_plat">Ganti Plat (Mendatang)</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="ganti_plat" name="ganti_plat">
                    </div>
                </div>
                <div class="form-group">
                    <label for="usia_kendaraan">Usia Kendaraan</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="usia_kendaraan" name="usia_kendaraan" placeholder="Usia Kendaraan" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cc">CC</label>
                    <input type="number" class="form-control" id="cc" name="cc" placeholder="Kapasitas Mesin (CC)" required>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
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
