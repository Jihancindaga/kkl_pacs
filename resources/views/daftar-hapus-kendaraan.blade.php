<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghapusan Kendaraan</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
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
            max-width: 2000px;
            width: 90%;
            margin: auto;
        }

        .container h2 {
            margin-bottom: 40px;
            text-align: center;
            font-family: 'Trebuchet MS', sans-serif;
            font-weight: bold;
            font-size: 50px;
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
            color: white;
            border: 1px solid black;
            transform: scale(1.05);
        }

        .btn-1 {
            background-color: #17a2b8;
        }

        .btn-2 {
            background-color: #665cc0;
        }

        .btn-3 {
            background-color: #aa1c9e;
        }

        .btn-4 {
            background-color: #ec2300;
        }

        .btn-5 {
            background-color: #26eb0c;
        }

        .table thead th {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #dee2e6;
            font-size: 16px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            font-size: 16px;
        }

        .search-box {
            margin: 20px 0;
        }

        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            transition: border-color 0.3s ease;
        }

        .search-box input[type="text"]:focus {
            border-color: #ff0022;
            outline: none;
        }

        .alasan-row {
            background-color: #f9f9f9;
            padding: 10px 15px;
        }

        .alasan-box {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            background-color: #e9f5ff;
            border-left: 4px solid #007bff;
        }

        .alasan-icon {
            font-size: 20px;
            color: #007bff;
            margin-right: 10px;
        }

        .alasan-text {
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }

            .container {
                padding: 10px;
                width: 100%;
            }

            .table td,
            .table th {
                font-size: 0.75rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 500px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Daftar Kendaraan yang Dihapus</h2>

            @if(session('success'))
            <div class="alert alert-success success-message">{{ session('success') }}</div>
            @endif

            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1 {{ Request::is('pajak') ? 'active' : '' }}" onclick="setActive(this, '/pajak')">Data Pokok Kendaraan</button>
                    <button class="btn btn-2 {{ Request::is('riwayat') ? 'active' : '' }}" onclick="setActive(this, '/riwayat')">Riwayat Pembayaran Pajak</button>
                    <button class="btn btn-3 {{ Request::is('vehicles/create') ? 'active' : '' }}" onclick="setActive(this, '{{ route('vehicles.create') }}')">Tambah Kendaraan</button>
                    <button class="btn btn-4 {{ Request::is('hapus-kendaraan') ? 'active' : '' }}" onclick="setActive(this, '/hapus-kendaraan')">Hapus Kendaraan</button>
                    <button class="btn btn-5 {{ Request::is('daftar-hapus-kendaraan') ? 'active' : '' }}" onclick="setActive(this, '/daftar-hapus-kendaraan')">Riwayat Kendaraan Non-aktif</button>
                </div>
            </div>

            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data kendaraan...">
            </div>

            <table class="table table-bordered table-custom" id="vehiclesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Kendaraan</th>
                        <th>Plat</th>
                        <th>Nama</th>
                        <th>Jenis Kendaraan</th>
                        <th>Tanggal Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kode_kendaraan }}</td>
                        <td>{{ $item->vehicle->plat }}</td>
                        <td>{{ $item->vehicle->pengguna }}</td>
                        <td>{{ $item->vehicle->jenis_kendaraan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_hapus)->format('j F Y') }}</td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="6" class="alasan-row">
                            <div class="alasan-box">
                                <i class="fas fa-info-circle alasan-icon"></i>
                                <span class="alasan-text"><strong>Alasan Penghapusan:</strong> {{ $item->alasan }}</span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function setActive(button, url) {
            const buttons = document.querySelectorAll('.button-group .btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            navigateTo(url);
        }

        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>

</html>
