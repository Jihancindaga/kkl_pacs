<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kenaikan Pangkat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
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
            margin: 0 5px;
        }

        .navbar .back-btn {
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
            margin-bottom: 20px;
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
            text-align: center;
            vertical-align: middle;
            background-color: #007bff;
            color: rgb(253, 251, 251);
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
            white-space: nowrap;
            word-break: break-word;
        }

        .table td.jabatan {
            white-space: normal;
            /* Memungkinkan teks pada kolom jabatan untuk di-break */
        }

        .table th.jabatan,
        .table td.jabatan {
            width: 200px;
            /* Atur lebar kolom jabatan sesuai kebutuhan */
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

            .table th,
            .table td {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="back-btn" onclick="navigateTo('/datakaryawan')">
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
            <h2>Riwayat Kenaikan Pangkat</h2>
            <div class="button-group">
                <button class="btn btn-1" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                <button class="btn btn-2" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                <button class="btn btn-3" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan</button>
                <a href="/hapus-karyawan" class="btn btn-danger">Hapus Karyawan</a>
                <a href="/riwayat_karyawan_nonaktif" class="btn btn-success">Riwayat Karyawan Non-aktif</a>
            </div>
            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data karyawan...">
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Berkas</th>
                    </tr>
                </thead>
                <tbody id="karyawanTableBody">
                    @foreach($karyawans as $index => $karyawan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $karyawan->nip }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->golongan }}</td>
                        <td>{{ $karyawan->pangkat }}</td>
                        <td class="jabatan">{{ $karyawan->jabatan }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $loop->index }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Berkas
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton{{ $loop->index }}">
                                    <a class="dropdown-item" href="{{ route('kpo.show', $karyawan->id) }}">1) Kenaikan Pangkat Reguler (KPO)</a>
                                    <a class="dropdown-item" href="{{ route('pilihan-struktural.show', $karyawan->id) }}">2) Kenaikan Pangkat Pilihan Struktural</a>
                                    <a class="dropdown-item" href="{{ route('penyesuaian-ijazah.show', $karyawan->id) }}">3) Kenaikan Pangkat Pilihan Penyesuaian Ijasah</a>
                                    <a class="dropdown-item" href="{{ route('fungsional.show', $karyawan->id) }}">4) Kenaikan Pangkat Pilihan Fungsional</a>
                                    <a class="dropdown-item" href="{{ route('tugas-belajar.show', $karyawan->id) }}">5) Kenaikan Pangkat Karena Sedang Menjalankan Tugas Belajar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- Include Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</body>

</html>