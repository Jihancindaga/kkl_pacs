<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Karyawan Nonaktif</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            margin: 0 10px;
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
            max-width: 1200px;
            margin: auto;
        }

        .container h2 {
            margin-bottom: 40px;
            text-align: center;
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

        .table thead th {
            background-color: #007bff;
            color: white;
            border: 1px solid #dee2e6;
            font-size: 12px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            font-size: 12px;
            padding: 5px;
            white-space: normal;
            word-break: break-word;
        }

        .table .jabatan {
            max-width: 150px;
            word-wrap: break-word;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .btn-sm {
            font-size: 0.75rem;
            padding: 5px 10px;
        }

        .search-box {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .navbar .logo img {
                height: 30px;
            }

            .container {
                padding: 10px;
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

            .table th,
            .table td {
                font-size: 0.75rem;
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
            <h2>Riwayat Karyawan Nonaktif</h2>
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                    <button class="btn btn-2" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3">Riwayat Kenaikan</button>
                    <a href="/hapus-karyawan" class="btn btn-danger">Hapus Karyawan</a>
                    <a href="/riwayat_karyawan_nonaktif" class="btn btn-success">Riwayat Karyawan Non-aktif</a>
                </div>
            </div>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Alasan Penghapusan</th>
                            <th>Tanggal Penghapusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatKaryawans as $riwayat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $riwayat->nip }}</td>
                            <td>{{ $riwayat->nama }}</td>
                            <td>{{ $riwayat->jabatan }}</td>
                            <td>{{ $riwayat->alasan }}</td>
                            <td>{{ $riwayat->tanggal_penghapusan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script>
    function navigateTo(page) {
        window.location.href = page;
    }

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchValue = this.value.toLowerCase();
        let rows = document.querySelectorAll('#karyawanTableBody tr');

        rows.forEach(function(row) {
            let rowData = row.innerText.toLowerCase();
            row.style.display = rowData.includes(searchValue) ? '' : 'none';
        });
    });
</script>

</html>