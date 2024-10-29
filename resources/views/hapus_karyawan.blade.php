<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Karyawan</title>
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
            margin-left: 10px;
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
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        .container h2 {
            margin-bottom: 40px;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 40px;
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

        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
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
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Hapus Data Karyawan</h2>

            <!-- Button group navigasi -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                    <button class="btn btn-2" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan</button>
                    <a href="/hapus-karyawan" class="btn btn-danger">Hapus Karyawan</a>
                    <a href="/riwayat_karyawan_nonaktif" class="btn btn-success">Riwayat Karyawan Non-aktif</a>
                </div>
            </div>

            <hr>

            <form action="{{ route('karyawan.hapus') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nip">Pilih NIP Karyawan:</label>
                    <select class="form-control" id="nip" name="nip" required>
                        <option value="">Pilih NIP</option>
                        @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->nip }}">{{ $karyawan->nip }} - {{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan Penghapusan:</label>
                    <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Penghapusan:</label>
                    <input type="date" class="form-control" id="tanggal_penghapusan" name="tanggal_penghapusan" required>
                </div>
                <button type="submit" class="btn btn-danger">Hapus Karyawan</button>
                <a href="{{ route('datakaryawan') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }

        $('#nip').change(function() {
            var selectedNIP = $(this).val();
            var nama = $(this).find(':selected').text().split(' - ')[1];
            $('#nama').val(nama || '');
        });
    </script>
</body>

</html>