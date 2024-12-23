<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajak</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        .navbar .logout {
            background-color: #f44336;
            /* Merah */
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
            /* Sesuaikan berdasarkan tinggi navbar */
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

        /* Tombol yang aktif akan mendapatkan frame hitam */
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

        .table thead th {
            background-color: #007bff;
            /* Biru */
            color: rgb(253, 251, 251);
            border: 1px solid #dee2e6;
            /* Garis tepi pada header tabel */
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            /* Garis tepi pada sel tabel */
            font-size: 12px;
            /* Ukuran font tabel lebih kecil */

        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }

            .container {
                padding: 10px;
                width: 100%;
                /* Sesuaikan untuk layar lebih kecil */
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
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>

    </div>

    <div class="content">
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <h2>Data Kendaraan</h2>

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

            <!-- Tabel Pajak -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped" id="vehiclesTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kendaraan</th>
                                <th>Plat</th>
                                <th>Jenis Kendaraan</th>
                                <th>Merk Kendaraan</th>
                                <th>Pengguna</th>
                                <th>Waktu Pajak (Mendatang)</th>
                                <th>Ganti Plat (Mendatang)</th>
                                <th>Usia Kendaraan</th>
                                <th>CC Kendaraan</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $index => $vehicle)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vehicle->kode_kendaraan}}</td>
                                <td>{{ $vehicle->plat }}</td>
                                <td>{{ $vehicle->jenis_kendaraan }}</td>
                                <td>{{ $vehicle->merk_kendaraan }}</td>
                                <td>{{ $vehicle->pengguna }}</td>
                                <td>{{ $vehicle->waktu_pajak }}</td>
                                <td>{{ $vehicle->ganti_plat }}</td>
                                <td>{{ $vehicle->usia_kendaraan }}</td>
                                <td>{{ $vehicle->cc }}</td>
                                <td>{{ $vehicle->nomor_telepon }}</td>
                                <td>
                                    <div style="display: flex; gap: 5px; justify-content: center;">
                                        <a href="{{ route('bayar.create', ['id' => $vehicle->id]) }}" class="btn btn-success btn-sm">
                                            Bayar
                                        </a>
                                        <a href="{{ route('vehicles.edit', $vehicle->plat) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

        // Fungsi Pencarian
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#vehiclesTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(filter)) {
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

        $(document).ready(function () {
        $('.alert-dismissible').alert();
    });
    </script>
</body>

</html>