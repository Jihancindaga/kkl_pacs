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
            margin-top: 70px; /* Sesuaikan berdasarkan tinggi navbar */
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
            max-width: 2000px; /* Atur lebar maksimum */
            width: 90%; /* Atur lebar menjadi 90% dari viewport */
            margin: auto; /* Pusatkan kontainer */
        }

        .container h2 {
            margin-bottom: 40px; /* Jarak lebih jauh dari tombol */
            text-align: center; /* Pusatkan teks */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold; /* Font tebal */
            font-size: 50px; /* Ukuran font lebih besar */
            color: #0056b3; /* Opsional: ubah warna font */
        }

        /* Kelas untuk tombol */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group .btn {
            flex: 1;
            padding: 8px; /* Mengurangi padding untuk tombol */
            font-size: 12px; /* Ukuran font lebih kecil */
            color: white; /* Set warna teks menjadi putih */
            transition: transform 0.3s, background-color 0.3s;
            border: none; /* Hapus border default */
        }

        .btn-1 {
            background-color: #17a2b8; /* Teal */
        }

        .btn-2 {
            background-color: #665cc0; /* Ungu */
        }

        .btn-3 {
            background-color: #aa1c9e; /* Oranye */
        }

        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05); /* Efek hover: sedikit memperbesar tombol */
        }

        .btn.active {
            background-color: #0056b3; /* Ubah warna tombol aktif */
            color: white; /* Set warna teks tombol aktif menjadi putih */
            transform: scale(1.1); /* Sedikit memperbesar tombol aktif */
        }

        /* Style untuk tabel */
        .table thead th {
            background-color: #007bff; /* Biru */
            color: rgb(253, 251, 251);
            border: 1px solid #dee2e6; /* Garis tepi pada header tabel */
            font-size: 16px; /* Ukuran font untuk header tabel */
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6; /* Garis tepi pada sel tabel */
            font-size: 16px; /* Ukuran font tabel lebih besar */
        }

        /* Search Box */
        .search-box {
            margin: 20px 0; /* Jarak atas dan bawah box pencarian */
        }

        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%; /* Lebar input pencarian */
            transition: border-color 0.3s ease;
        }

        .search-box input[type="text"]:focus {
            border-color: #ff0022;
            outline: none;
        }

        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }

            .container {
                padding: 10px;
                width: 100%; /* Sesuaikan untuk layar lebih kecil */
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
            <img src="/images/pacs.png" alt="Logo">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Daftar Kendaraan yang Dihapus</h2>

            @if(session('success'))
            <div class="alert alert-success success-message">{{ session('success') }}</div>
            @endif

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1" data-page="data-kendaraan" onclick="setActive(this); navigateTo('/pajak')">Data Pokok Kendaraan</button>
                    <button class="btn btn-2" data-page="riwayat" onclick="setActive(this); navigateTo('/riwayat')">Riwayat Pembayaran Pajak</button>
                    <button class="btn btn-3" data-page="masukkan-data" onclick="setActive(this); navigateTo('/form_data')">Tambah Data Kendaraan</button>
                    <a href="/hapus-kendaraan" class="btn btn-danger" data-page="hapus-kendaraan" onclick="setActive(this);">Hapus Kendaraan</a>
                    <a href="/daftar-hapus-kendaraan" class="btn btn-success" data-page="riwayat-non-aktif" onclick="setActive(this);">Riwayat Kendaraan Non-aktif</a>
                </div>
            </div>

            <!-- Box Pencarian -->
            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data kendaraan...">
            </div>

            <table class="table table-bordered table-custom" id="vehiclesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Kendaraan</th>
                        <th>Jenis Kendaraan</th>
                        <th>Plat</th>
                        <th>Alasan</th>
                        <th>Tanggal Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->kode_kendaraan }}</td>
                        <td>{{ $item->vehicle->jenis_kendaraan }}</td>
                        <td>{{ $item->vehicle->plat }}</td>
                        <td>{{ $item->alasan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_hapus)->format('j F Y') }}</td>
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

        function setActive(btn) {
            const buttons = document.querySelectorAll('.button-group .btn');
            buttons.forEach(button => button.classList.remove('active'));
            btn.classList.add('active');
        }

        document.getElementById('searchInput').addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const rows = document.querySelectorAll('#vehiclesTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(value)) {
                        match = true;
                    }
                });

                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
