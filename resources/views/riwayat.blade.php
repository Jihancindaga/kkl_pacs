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
            background-color: #007bff; /* Biru */
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

        .navbar .back-btn {
            font-size: 24px; /* Ukuran font untuk panah */
            color: white; /* Warna panah */
            background: none; /* Menghilangkan latar belakang */
            border: none; /* Menghilangkan border */
            cursor: pointer; /* Menampilkan pointer saat hover */
        }

        .navbar .logo {
            margin-left: auto; /* Memindahkan logo ke kanan */
        }

        .navbar .logo img {
            height: 40px; /* Ukuran logo */
        }

        .content {
            margin-top: 70px; /* Adjust based on navbar height */
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%; /* Full width */
            text-align: center; /* Center text alignment */
        }

        /* Style for table */
        .table thead {
            background-color: #007bff; /* Biru untuk header tabel */
            color: white; /* Warna teks header tabel */
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="back-btn" onclick="navigateTo('/pajak')">
            <i class="fas fa-arrow-left" style="font-weight: bold;"></i> <!-- Panah tebal -->
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h3>Riwayat Pembayaran Pajak</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kendaraan</th>
                        <th>Plat</th>
                        <th>Jenis Kendaraan</th>
                        <th>Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->kode_kendaraan }}</td>
                            <td>{{ $vehicle->plat }}</td>
                            <td>{{ $vehicle->jenis_kendaraan }}</td>
                            <td>{{ $vehicle->pengguna }}</td>
                            <td>
                                <a href="{{ route('riwayat.detail', ['id' => $vehicle->id]) }}" class="btn btn-info btn-sm" onclick="toggleDetails({{ $vehicle->id }})">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr id="details-{{ $vehicle->id }}" style="display:none;">
                            <td colspan="5">
                                <strong>Waktu Pajak:</strong> {{ optional($vehicle->riwayat)->waktu_pajak ? \Carbon\Carbon::parse($vehicle->riwayat->waktu_pajak)->format('j F Y') : '-' }}<br>
                                <strong>Tanggal Bayar:</strong> {{ optional($vehicle->riwayat)->tanggal_bayar ? \Carbon\Carbon::parse($vehicle->riwayat->tanggal_bayar)->format('j F Y') : '-' }}<br>
                                <strong>Total Bayar:</strong> Rp {{ optional($vehicle->riwayat)->total_bayar ? number_format($vehicle->riwayat->total_bayar, 2) : '-' }}<br>
                                <strong>Bukti Pembayaran:</strong>
                                <a href="{{ optional($vehicle->riwayat)->bukti_pembayaran ? asset('storage/' . $vehicle->riwayat->bukti_pembayaran) : '#' }}" target="_blank">Lihat Bukti</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</body>

</html>
