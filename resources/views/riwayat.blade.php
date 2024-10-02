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
            text-align: center; /* Center text alignment */
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
            <h3>Riwayat Pembayaran Pajak</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode Kendaraan</th>
                        <th>Plat</th>
                        <th>Jenis Kendaraan</th>
                        <th>Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $riwayat)
                    <tr>
                        <td>{{ $riwayat->kode_kendaraan }}</td>
                        <td>{{ $riwayat->plat }}</td>
                        <td>{{ $riwayat->jenis_kendaraan }}</td>
                        <td>{{ $riwayat->pengguna }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" onclick="toggleDetails({{ $riwayat->id }})">Lihat Detail</button>
                        </td>
                    </tr>
                    <tr id="details-{{ $riwayat->id }}" style="display:none;">
                        <td colspan="5">
                            <strong>Waktu Pajak:</strong> {{ $vehicle->waktu_pajak }}<br>
                            <strong>Tanggal Bayar:</strong> {{ $riwayat->tanggal_bayar }}<br>
                            <strong>Total Bayar:</strong> Rp {{ number_format($riwayat->total_bayar, 2) }}<br>
                            <strong>Bukti Pembayaran:</strong> 
                            <a href="{{ asset('storage/'.$riwayat->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleDetails(id) {
            var detailsRow = document.getElementById('details-' + id);
            if(detailsRow.style.display === 'none') {
                detailsRow.style.display = 'table-row';
            } else {
                detailsRow.style.display = 'none';
            }
        }

        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
