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
        .navbar .logo {
            display: flex;
            align-items: center;
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
            width: 100%; /* Full width */
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
        /* Style for table */
        .table thead th {
            background-color: #007bff; /* Blue */
            color: white;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table-container .btn {
            margin: 2px;
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
        <button class="logout">Logout</button>
    </div>


<div class="content">
<div class="container">
<div class="container">
    <h2>Detail Riwayat Pembayaran Pajak - {{ $vehicle->pengguna }}</h2>
    
    <!-- Form Pencarian -->
    <form action="{{ route('riwayat.detail', $vehicle->plat) }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan waktu pajak...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <!-- Tabel Riwayat Pembayaran -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Pajak</th>
                <th>Ganti Plat</th>
                <th>Usia Kendaraan</th>
                <th>CC</th>
                <th>Nomor Telepon</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatPembayaran as $index => $riwayat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $riwayat->waktu_pajak }}</td>
                    <td>{{ $riwayat->ganti_plat }}</td>
                    <td>{{ $riwayat->usia_kendaraan }}</td>
                    <td>{{ $riwayat->cc }}</td>
                    <td>{{ $riwayat->nomor_telepon }}</td>
                    <td>
                        @if ($riwayat->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $riwayat->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                        @else
                            Belum Ada
                        @endif
                    </td>
                    <td>{{ $riwayat->sudah_bayar ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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


