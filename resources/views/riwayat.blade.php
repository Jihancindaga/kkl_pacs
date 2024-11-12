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
            background-color: #007bff;
            /* Biru */
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
            font-size: 24px;
            /* Ukuran font untuk panah */
            color: white;
            /* Warna panah */
            background: none;
            /* Menghilangkan latar belakang */
            border: none;
            /* Menghilangkan border */
            cursor: pointer;
            /* Menampilkan pointer saat hover */
        }

        .navbar .logo {
            margin-left: auto;
            /* Memindahkan logo ke kanan */
        }

        .navbar .logo img {
            height: 40px;
            /* Ukuran logo */
        }

        .content {
            margin-top: 70px;
            /* Adjust based on navbar height */
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 2000px;
            /* Atur lebar maksimum */
            width: 90%;
            /* Atur lebar menjadi 90% dari viewport */
            margin: auto;
            /* Pusatkan kontainer */
        }

        .container h2 {
            margin-bottom: 40px;
            /* Jarak lebih jauh dari tombol */
            text-align: center;
            /* Pusatkan teks */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            /* Font tebal */
            font-size: 50px;
            /* Ukuran font lebih besar */
            color: #0056b3;
            /* Opsional: ubah warna font */
        }

        .btn-container {
            margin-bottom: 20px;
        }

        /* Kelas untuk tombol */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group .btn {
            flex: 1;
            padding: 8px;
            /* Mengurangi padding untuk tombol */
            font-size: 12px;
            /* Ukuran font lebih kecil */
            color: white;
            /* Set warna teks menjadi putih */
            transition: transform 0.3s, background-color 0.3s;
            border: none;
            /* Hapus border default */
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

        .btn-1 {
            background-color: #808080;
        }

        .btn-2 {
            background-color: #808080;
        }

        .btn-3 {
            background-color: #808080;
        }

        .btn-4 {
            background-color: #808080;
        }

        .btn-5 {
            background-color: #808080;
        }

        .btn-warning {
            color: white;
            /* Set warna teks tombol */
        }

        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
            /* Efek hover: sedikit memperbesar tombol */
        }

        .btn.active {
            background-color: #0056b3;
            /* Ubah warna tombol aktif */
            color: white;
            /* Set warna teks tombol aktif menjadi putih */
            transform: scale(1.1);
            /* Sedikit memperbesar tombol aktif */
        }

        /* Style for table */
        .table thead {
            background-color: #007bff;
            /* Biru untuk header tabel */
            color: white;
            /* Warna teks header tabel */
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
        <button class="back-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left" style="font-weight: bold;"></i> <!-- Panah tebal -->
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
            <h2>Riwayat Pembayaran Pajak</h2>

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1 {{ Request::is('pajak') ? 'active' : '' }}" onclick="setActive(this, '/pajak')">Data Pokok Kendaraan</button>
                    <button class="btn btn-2 {{ Request::is('riwayat') ? 'active' : '' }}" onclick="setActive(this, '/riwayat')">Riwayat Pembayaran Pajak</button>
                    <button class="btn btn-3 {{ Request::is('vehicles/create') ? 'active' : '' }}" onclick="setActive(this, '{{ route('vehicles.create') }}')">Tambah Kendaraan</button>
                    <button class="btn btn-4 {{ Request::is('hapus-kendaraan') ? 'active' : '' }}" onclick="setActive(this, '/hapus-kendaraan')">Hapus Kendaraan</button>
                    <button class="btn btn-5 {{ Request::is('daftar-hapus-kendaraan') ? 'active' : '' }}" onclick="setActive(this, '/daftar-hapus-kendaraan')">Riwayat Kendaraan Non-aktif</button>
                </div>
            </div>

            <!-- Box Pencarian -->
            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data kendaraan...">
            </div>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <table class="table table-bordered" id="vehiclesTable">
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
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Fungsi untuk mengatur tombol aktif
        function setActive(button, url) {
            // Mengambil semua tombol dalam grup tombol
            const buttons = document.querySelectorAll('.button-group .btn');

            // Menghapus kelas 'active' dari semua tombol
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Menambahkan kelas 'active' ke tombol yang dipilih
            button.classList.add('active');

            // Mengarahkan ke URL yang ditentukan
            navigateTo(url);
        }

        // Fungsi untuk navigasi ke halaman lain
        function navigateTo(page) {
            window.location.href = page;
        }

        // Fungsi untuk menampilkan atau menyembunyikan detail
        function toggleDetails(id) {
            const detailsRow = document.getElementById('details-' + id);
            detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
        }

        // Pencarian
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#vehiclesTable tbody tr');

            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let found = false;

                // Loop through each cell in the row
                for (let i = 0; i < cells.length - 1; i++) { // Exclude the last cell (Aksi)
                    if (cells[i].innerText.toLowerCase().includes(searchValue)) {
                        found = true;
                        break;
                    }
                }

                // Show or hide the row based on the search
                row.style.display = found ? '' : 'none';
            });
        });
    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>