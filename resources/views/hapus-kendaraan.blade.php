<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penghapusan Kendaraan</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif; /* Sesuaikan font dengan file contoh */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 10px; /* Sesuai dengan file contoh */
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
            left: -5px; /* Sesuaikan posisi logo jika diperlukan */
        }

        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px; /* Sesuai dengan file contoh */
            cursor: pointer;
            padding: 0; /* Hilangkan padding default */
        }

        /* Content Styles */
        .content {
            margin-top: 70px; /* Sesuaikan berdasarkan tinggi navbar */
            padding: 20px;
        }

        /* Container Styles */
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 2000px; /* Sesuai dengan file contoh */
            width: 90%;
            margin: auto;
        }

        /* Heading Styles */
        .container h2 {
            margin-bottom: 40px; /* Jarak lebih jauh dari tombol */
            text-align: center; /* Pusatkan teks */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 50px; /* Sesuai dengan file contoh */
            color: #0056b3;
        }

        /* Button Container Styles */
        .btn-container {
            margin-bottom: 20px;
        }

        /* Button Group Styles */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group .btn {
            flex: 1; /* Agar semua tombol memiliki lebar yang sama */
            padding: 8px; /* Sesuai dengan file contoh */
            font-size: 12px; /* Sesuai dengan file contoh */
            color: white;
            transition: transform 0.3s, background-color 0.3s;
            border: none;
            text-align: center;
            text-decoration: none;
            border-radius: 4px; /* Tambahkan border-radius agar tombol lebih lembut */
            cursor: pointer;
            display: inline-block;
        }

        /* Specific Button Colors */
        .btn-1 {
            background-color: #17a2b8; /* Teal */
        }
        .btn-2 {
            background-color: #665cc0; /* Ungu */
        }
        .btn-3 {
            background-color: #aa1c9e; /* Oranye */
        }
        .btn-danger {
            background-color: #dc3545; /* Warna Bootstrap untuk danger */
        }
        .btn-success {
            background-color: #28a745; /* Warna Bootstrap untuk success */
        }

        /* Button Hover Effects */
        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05); /* Efek hover: sedikit memperbesar tombol */
        }

        /* Active Button Styles */
        .btn.active {
            background-color: #0056b3; /* Ubah warna tombol aktif */
            color: white;
            transform: scale(1.1); /* Sedikit memperbesar tombol aktif */
        }

        /* Success Message Styles */
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Form Styles */
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            transition: box-shadow 0.3s ease;
        }

        form:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        select,
        textarea,
        input[type="date"],
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        select:focus,
        textarea:focus,
        input[type="date"]:focus,
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #ff0022;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #ff0022;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #f70b2a;
            transform: translateY(-2px);
        }

        /* Link Styles */
        a.form-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff; /* Sesuaikan warna link */
            font-weight: bold;
        }

        a.form-link:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .button-group .btn {
                flex: 1 1 calc(33.333% - 10px); /* Tiga tombol per baris */
            }
        }

        @media (max-width: 768px) {
            .button-group .btn {
                flex: 1 1 calc(50% - 10px); /* Dua tombol per baris */
            }
        }

        @media (max-width: 576px) {
            .button-group .btn {
                flex: 1 1 100%; /* Satu tombol per baris */
            }

            form {
                padding: 20px;
            }

            button[type="submit"] {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow-left icon -->
        </button>
        <div class="logo">
        <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 500px;"> <!-- Logo PACS -->
        <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;"> <!-- Logo Sleman -->
        <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;"> <!-- Logo Sleman -->
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container">
            <h2>Form Penghapusan Kendaraan</h2>

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1" data-page="data-kendaraan" onclick="setActive(this); navigateTo('/pajak')">Data Pokok Kendaraan</button>
                    <button class="btn btn-2" data-page="riwayat" onclick="setActive(this); navigateTo('/riwayat')">Riwayat Pembayaran Pajak</button>
                    <a href="{{ route('vehicles.create') }}" class="btn btn-3">Tambah Kendaraan</a>
                    <a href="/hapus-kendaraan" class="btn btn-danger" data-page="hapus-kendaraan" onclick="setActive(this);">Hapus Kendaraan</a>
                    <a href="/daftar-hapus-kendaraan" class="btn btn-success" data-page="riwayat-non-aktif" onclick="setActive(this);">Riwayat Kendaraan Non-aktif</a>
                </div>
            </div>

            <!-- Garis Pembatas -->
            <hr>

            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif

            <!-- Form Penghapusan Kendaraan -->
            <form action="{{ route('hapus.kendaraan.store') }}" method="POST">
                @csrf
                <div>
                    <label for="kode_kendaraan">Pilih Kendaraan</label>
                    <select id="kode_kendaraan" name="kode_kendaraan" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->kode_kendaraan }}">{{ $vehicle->kode_kendaraan }} | {{ $vehicle->jenis_kendaraan }} | {{ $vehicle->plat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alasan">Alasan Penghapusan</label>
                    <textarea id="alasan" name="alasan" placeholder="Masukkan alasan penghapusan kendaraan..." required></textarea>
                </div>
                {{-- <div>
                    <label for="tanggal-hapus">Tanggal Penghapusan</label>
                    <input type="date" id="tanggal-hapus" name="tanggal_hapus" required>
                </div> --}}
                <button type="submit">Hapus</button>
            </form>
            
            <a href="{{ route('daftar.hapus.kendaraan') }}" class="form-link">Lihat Daftar Kendaraan yang Dihapus</a>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }

        // Fungsi untuk mengatur tombol aktif
        function setActive(button) {
            const buttons = document.querySelectorAll('.button-group .btn');
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');
        }

        // Fungsi untuk menampilkan atau menyembunyikan detail (Jika diperlukan)
        function toggleDetails(id) {
            const detailsRow = document.getElementById('details-' + id);
            detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
    
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
