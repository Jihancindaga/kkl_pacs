<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .navbar {
            width: 100%; /* Membuat navbar lebar penuh */
            padding: 10px 15px; /* Menambah padding vertikal */
        }

        .navbar .logo img {
        height: 40px;
        position: relative;
        left: -10px; /* Ubah nilainya sesuai kebutuhan */
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .form-control-file {
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .checkbox-label {
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .back-icon {
            font-size: 24px;
            color: white; /* Mengubah warna ikon menjadi putih */
            text-decoration: none;
        }

        .back-icon:hover {
            color: #e0e0e0; /* Warna saat hover */
        }

        /* Tambahan untuk menyesuaikan konten di bawah navbar */
        body {
            padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }
    </style>
</head>
<body>
    <!-- Navbar hanya dengan ikon panah kembali -->
    <nav class="navbar navbar-light bg-primary fixed-top">
        <a href="{{ route('pajak') }}" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
        
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">
        <h2>Edit Data Kendaraan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.update', $vehicle->plat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                <input type="text" name="jenis_kendaraan" class="form-control" 
                    value="{{ old('jenis_kendaraan', $vehicle->jenis_kendaraan) }}" required readonly>
            </div>

            <div class="form-group">
                <label for="merk_kendaraan">Merk Kendaraan</label>
                <input type="text" name="merk_kendaraan" class="form-control" 
                    value="{{ old('merk_kendaraan', $vehicle->merk_kendaraan) }}" required readonly>
            </div>

            <div class="form-group">
                <label for="pengguna">Pengguna</label>
                <input type="text" name="pengguna" class="form-control" 
                    value="{{ old('pengguna', $vehicle->pengguna) }}" required>
            </div>

            <div class="form-group">
                <label for="plat">Plat</label>
                <input type="text" name="plat" class="form-control" 
                    value="{{ old('plat', $vehicle->plat) }}" required>
            </div>

            <div class="form-group">
                <label for="waktu_pajak">Waktu Pajak</label>
                <input type="date" name="waktu_pajak" class="form-control" 
                    value="{{ old('waktu_pajak', $vehicle->waktu_pajak) }}" required>
            </div>

            <div class="form-group">
                <label for="ganti_plat">Ganti Plat (Mendatang) </label>
                <input type="date" name="ganti_plat" class="form-control" 
                    value="{{ old('ganti_plat', $vehicle->ganti_plat) }}" required>
            </div>

            <div class="form-group">
                <label for="usia_kendaraan">Usia Kendaraan (Tahun) </label>
                <input type="number" name="usia_kendaraan" class="form-control" 
                    value="{{ old('usia_kendaraan', $vehicle->usia_kendaraan) }}" required>
            </div>

            <div class="form-group">
                <label for="cc">CC Kendaraan</label>
                <input type="number" name="cc" class="form-control" 
                    value="{{ old('cc', $vehicle->cc) }}" required>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" 
                    value="{{ old('nomor_telepon', $vehicle->nomor_telepon) }}">
            </div>

            <div class="form-group d-flex justify-content-start">
                <button type="submit" class="btn btn-primary mx-1">Update</button>
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary mx-1">Batal</a>
            </div>
        </form>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
