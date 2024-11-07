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
            text-align: center;
            vertical-align: middle;
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
            white-space: normal;
            word-break: break-word;
        }

        .table .jabatan {
            white-space: normal;
            /* Memungkinkan teks melanjutkan ke baris berikutnya */
            word-wrap: break-word;
            /* Memecah kata jika terlalu panjang */
            max-width: 150px;
            /* Membatasi lebar kolom jabatan */
        }

        .table .nama,
        .table .nip {
            max-width: 150px;
            /* Lebar maksimum untuk kolom nama */
            white-space: normal;
            /* Memungkinkan teks melanjutkan ke baris berikutnya */
            word-wrap: break-word;
            /* Memecah kata jika terlalu panjang */
        }

        .table .tanggal {
            width: 120px;
            /* Lebar kolom yang lebih kecil */
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
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

            .search-box input {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {

            .table th,
            .table td {
                font-size: 0.7rem;
                padding: 5px;
            }

            .button-group {
                flex-direction: column;
                gap: 5px;
            }
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: fadeInModal 0.3s ease-out;
        }

        .modal-header {
            background-color: #0056b3;
            color: white;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h5 {
            font-size: 20px;
            font-weight: bold;
        }

        .modal-header .close {
            color: white;
            opacity: 0.9;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 20px;
            background-color: #f7f7f7;
        }

        .modal-footer {
            background-color: #f1f1f1;
            padding: 15px;
            border-top: 1px solid #dee2e6;
        }

        .list-group-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }

        .list-group-item-action {
            text-align: center;
            font-size: 14px;
            padding: 10px;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Animasi Modal */
        @keyframes fadeInModal {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 10px;
            }

            .modal-header h5 {
                font-size: 16px;
            }

            .list-group-item-action {
                font-size: 12px;
                padding: 8px;
            }

            .modal-footer .btn-secondary {
                font-size: 14px;
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

    <div class="content">
        <div class="container">
            <h2>Data Karyawan</h2>

            <!-- Tombol Navigasi dan Aksi dalam satu baris -->
            <div class="btn-container">
                <div class="button-group">
                    <button class="btn btn-1" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                    <button class="btn btn-2" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                    <button class="btn btn-3" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan</button>
                    <a href="/hapus-karyawan" class="btn btn-danger">Hapus Karyawan</a>
                    <a href="/riwayat_karyawan_nonaktif" class="btn btn-success">Riwayat Karyawan Non-aktif</a>
                </div>
            </div>

            <!-- Box Pencarian -->
            <div class="search-box mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari data karyawan...">
            </div>

            <!-- Tabel Data Karyawan -->
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th class="tanggal">Tanggal Kenaikan Gaji</th>
                            <th class="tanggal">Tanggal Kenaikan Pangkat</th>
                            <th>Gol</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="karyawanTableBody">
                        @foreach ($karyawans as $index => $karyawan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $karyawan->nip }}</td>
                            <td class="nama">{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->tanggal_kenaikan_gaji }}</td>
                            <td>{{ $karyawan->tanggal_kenaikan_pangkat }}</td>
                            <td>{{ $karyawan->golongan }}</td>
                            <td>{{ $karyawan->pangkat }}</td>
                            <td class="jabatan">{{ $karyawan->jabatan }}</td>
                            <td>{{ $karyawan->no_telp }}</td>
                            <td class="action-buttons">
                                <div style="display: flex; gap: 5px; justify-content: center;">
                                    <a href="{{ route('kenaikan.pangkat', ['id' => $karyawan->id]) }}" class="btn btn-success btn-sm">
                                        upload
                                    </a>
                                    <a href="{{ route('edit_karyawan', $karyawan->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Berkas Pengajuan Kenaikan Pangkat</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="employee-info mb-4">
                        <h6>Informasi Karyawan</h6>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td><strong>NIP:</strong></td>
                                    <td><input type="text" class="form-control" id="nipInput" disabled /></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama:</strong></td>
                                    <td><input type="text" class="form-control" id="namaInput" disabled /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mb-3">Pilih Jenis Kenaikan Pangkat:</h6>
                    <div class="list-group">
                        <a href="/upload/kpo" class="list-group-item list-group-item-action list-group-item-primary">Kenaikan Pangkat Reguler (KPO)</a>
                        <a href="/upload/struktural" class="list-group-item list-group-item-action list-group-item-success">Kenaikan Pangkat Pilihan Struktural</a>
                        <a href="/upload/penyesuaian-ijasah" class="list-group-item list-group-item-action list-group-item-warning">Kenaikan Pangkat Pilihan Penyesuaian Ijazah</a>
                        <a href="/upload/fungsional" class="list-group-item list-group-item-action list-group-item-info">Kenaikan Pangkat Pilihan Fungsional</a>
                        <a href="/upload/tugas-belajar" class="list-group-item list-group-item-action list-group-item-danger">Kenaikan Pangkat Karena Sedang Menjalankan Tugas Belajar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.upload-btn').on('click', function() {
                var nip = $(this).data('nip');
                var nama = $(this).data('nama');
                // Menampilkan data karyawan yang dipilih di modal
                $('#uploadModalLabel').text('Upload Berkas untuk ');
                $('.employee-info').html('<strong>NIP:</strong> ' + nip + '<br><strong>Nama:</strong> ' + nama);
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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