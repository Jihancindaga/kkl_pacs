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

        .navbar .logo img {
            height: 40px;
            position: relative;
            left: -5px;
            /* Ubah nilainya sesuai kebutuhan */
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
        <button class="home-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow-left icon -->
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
            <h2>Masukkan Data Kendaraan</h2>

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
            <hr>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('vehicles.store') }}" method="POST">
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
                    <label for="merk_kendaraan">Merk Kendaraan</label>
                    <input type="text" class="form-control" id="merk_kendaraan" name="merk_kendaraan" placeholder="Merk Kendaraan" required>
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
                    <label for="usia_kendaraan">Usia Kendaraan (Tahun) </label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="usia_kendaraan" name="usia_kendaraan" placeholder="Usia Kendaraan" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cc">CC Kendaraan</label>
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
    </script>
</body>

</html>