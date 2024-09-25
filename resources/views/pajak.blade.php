<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajak</title>
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
        .navbar .logout {
            background-color: #f44336; /* Red */
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
            margin-top: 70px; /* Adjust based on navbar height */
            padding: 20px;
        }
        .btn-container {
            margin-bottom: 20px;
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
        .container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .container button {
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px 0;
        }
        .container button.btn-1 {
            background-color: #17a2b8; /* Teal */
        }
        .container button.btn-2 {
            background-color: #28a745; /* Green */
        }
        .container button.btn-3 {
            background-color: #e09a17; /* Orange */
        }
        .container button:hover {
            opacity: 0.8;
        }
        .table thead th {
            background-color: #007bff; /* Blue */
            color: white;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table-container .btn {
            margin-right: 5px; /* Atur jarak antar tombol */
            display: inline-block; /* Pastikan tombol dalam satu baris */
        }

        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }
            .container {
                padding: 10px;
            }
            .container button {
                padding: 8px 16px;
                font-size: 0.875rem;
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
            <img src="/images/pacs.png" alt="Logo">
        </div>
        <button type="button" class="logout" onclick="window.location.href='{{ url('admin/dashboard') }}'">Logout</button>
    </div>

    <div class="content">
        <div class="container">
            <h2>DATA KENDARAAN</h2>
            <!-- Tombol -->
            <div class="btn-container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <button class="btn btn-1 btn-block" onclick="navigateTo('/pajak')">Data Pokok Kendaraan</button>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <button class="btn btn-2 btn-block" onclick="navigateTo('/riwayat')">Riwayat Pembayaran Pajak</button>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-3">
                        <button class="btn btn-3 btn-block" onclick="navigateTo('/form_data')">Masukkan Data Kendaraan</button>
                    </div>
                </div>
            </div>

            <!-- Tabel Pajak -->
            <div class="table-container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Kendaraan</th>
                    <th>Plat</th>
                    <th>Jenis Kendaraan</th>
                    <th>Pengguna</th>
                    <th>Waktu Pajak</th>
                    <th>Ganti Plat</th>
                    <th>Usia Kendaraan</th>
                    <th>CC</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $index => $vehicle)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $vehicle->kode_kendaraan }}</td>
                        <td>{{ $vehicle->plat }}</td>
                        <td>{{ $vehicle->jenis_kendaraan }}</td>
                        <td>{{ $vehicle->pengguna }}</td>
                        <td>{{ $vehicle->waktu_pajak }}</td>
                        <td>{{ $vehicle->ganti_plat }}</td>
                        <td>{{ $vehicle->usia_kendaraan }}</td>
                        <td>{{ $vehicle->cc }}</td>
                        <td>{{ $vehicle->nomor_telepon }}</td>
                        <td>
                        <div style="display: flex; gap: 5px;">
                        <a href="{{ route('vehicles.edit', $vehicle->plat) }}" class="btn btn-success btn-sm" style="flex: 1; text-align: center; width: 100%; font-size: 0.875rem; padding: 0.375rem 0.75rem; box-sizing: border-box; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                            Bayar
                        </a>
                        <a href="{{ route('vehicles.edit', $vehicle->plat) }}" class="btn btn-warning btn-sm" style="flex: 1; text-align: center; width: 100%; font-size: 0.875rem; padding: 0.375rem 0.75rem; box-sizing: border-box; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                            Edit
                        </a>
                        <form action="{{ route('vehicles.destroy', $vehicle->plat) }}" method="POST" style="flex: 1; margin: 0; padding: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="width: 100%; font-size: 0.875rem; padding: 0.375rem 0.75rem; box-sizing: border-box; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                Hapus
                            </button>
                    </form>
                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
