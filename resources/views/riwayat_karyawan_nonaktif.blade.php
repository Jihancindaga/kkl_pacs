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
            width: 100%;
            max-width: 1400px;
            /* Mengubah dari 1200px ke 1400px */
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
            /* Warna gelap untuk tombol aktif */
            color: white;
            /* Warna teks tetap putih */
            border: 1px solid black;
            /* Tambahkan border hitam */
            transform: scale(1.05);
            /* Sedikit memperbesar tombol aktif */
        }

        /* Specific Button Colors */
        .btn-1 {
            background-color: #808080;
            /* Teal */
        }

        .btn-2 {
            background-color: #808080;
            /* Ungu */
        }

        .btn-3 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-4 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-5 {
            background-color: #808080;
            /* Oranye */
        }

        .btn-warning {
            color: white;
            /* Set warna teks tombol */
        }

        /* Button Hover Effects */
        .btn:hover {
            opacity: 0.8;
            transform: scale(1.05);
            /* Efek hover: sedikit memperbesar tombol */
        }

        /* Active Button Styles */
        .btn.active {
            background-color: #0056b3;
            /* Ubah warna tombol aktif */
            color: white;
            transform: scale(1.1);
            /* Sedikit memperbesar tombol aktif */
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
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Riwayat Karyawan Nonaktif</h2>
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1 {{ Request::is('datakaryawan') ? 'active' : '' }}" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                    <button class="btn btn-2 {{ Request::is('tambah-karyawan') ? 'active' : '' }}" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3 {{ Request::is('riwayat-kenaikan') ? 'active' : '' }}" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan Pangkat</button>
                    <button class="btn btn-5 {{ Request::is('riwayat_karyawan_nonaktif') ? 'active' : '' }}" onclick="navigateTo('/riwayat_karyawan_nonaktif')">Riwayat Karyawan Non-aktif</button>
                    <button class="btn btn-4 {{ Request::is('report') ? 'active' : '' }}" onclick="navigateTo('/report')">Report</button>
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

    // Fungsi untuk menampilkan atau menyembunyikan detail (Jika diperlukan)
    function toggleDetails(id) {
        const detailsRow = document.getElementById('details-' + id);
        detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
    }
</script>

</html>