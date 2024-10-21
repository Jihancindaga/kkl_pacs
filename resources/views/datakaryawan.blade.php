<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
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
        .table-container {
            margin-top: 20px;
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
        .btn-1 { background-color: #17a2b8; }
        .btn-2 { background-color: #665cc0; }
        .btn-3 { background-color: #aa1c9e; }
        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
        .table thead th {
            background-color: #007bff;
            color: rgb(253, 251, 251);
            border: 1px solid #dee2e6;
            font-size: 12px; /* Reduced font size */
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            font-size: 12px; /* Reduced font size */
            padding: 8px; /* Reduced padding */
            white-space: nowrap; /* Prevent content from wrapping */
        }
        .table td {
            word-break: break-word;
        }
        .table-responsive {
            max-height: none; /* Remove height limit for full-page layout */
            overflow: visible;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
                margin: 0 10px;
            }
            .container {
                padding: 10px;
                width: 100%;
            }
            .container h2 {
                font-size: 28px;
            }
            .button-group {
                flex-direction: column;
            }
            .button-group .btn {
                margin-bottom: 10px;
            }
            .table th, .table td {
                font-size: 0.75rem;
            }
            .search-box input {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .table th, .table td {
                font-size: 0.7rem;
                padding: 5px;
            }
            .button-group {
                flex-direction: column;
                gap: 5px;
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
            <img src="/images/pacs.png" alt="Logo PACS">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Data Karyawan</h2>

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1">Data Pokok Karyawan </button>
                    <button class="btn btn-2" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3">Upload Berkas Pengajuan</button>
                    <a href="/hapus-data-karyawan" class="btn btn-danger">Hapus Karyawan</a>
                    <a href="/daftar-hapus-karyawan" class="btn btn-success">Riwayat Karyawan Non-aktif</a>
                </div>
            </div>

            <!-- Box Pencarian -->
            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data karyawan...">
            </div>

            <!-- Tabel Data Karyawan -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Pangkat</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawans as $index => $karyawan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->golongan }}</td>
                                    <td>{{ $karyawan->pangkat }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('edit_karyawan', $karyawan->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <!-- Aksi lainnya -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
