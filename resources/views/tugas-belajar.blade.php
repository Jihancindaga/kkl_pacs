<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas Belajar - {{ $karyawan->nama }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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

        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        .container {
            margin-top: 70px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
            font-size: 24px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .btn-primary {
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/datakaryawan')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman">
        </div>
    </div>

    <div class="container">
        <h3>Detail Upload Tugas Belajar</h3>
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>

        @if($tugasBelajar)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Link Berkas</th>
                    <th>Tanggal Upload</th> <!-- Kolom tanggal upload -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SK Kenaikan Pangkat Terakhir</td>
                    <td>
                        @if($tugasBelajar->sk_kenaikan_pangkat_terakhir)
                        <a href="{{ asset('storage/' . $tugasBelajar->sk_kenaikan_pangkat_terakhir) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                    <td>{{ $tugasBelajar->tanggal_upload_sk_kenaikan_pangkat ?? 'Belum diunggah' }}</td> <!-- Tanggal upload -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Surat Tugas Belajar</td>
                    <td>
                        @if($tugasBelajar->surat_tugas_belajar)
                        <a href="{{ asset('storage/' . $tugasBelajar->surat_tugas_belajar) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                    <td>{{ $tugasBelajar->tanggal_upload_surat_tugas_belajar ?? 'Belum diunggah' }}</td> <!-- Tanggal upload -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Penilaian Kinerja</td>
                    <td>
                        @if($tugasBelajar->penilaian_kinerja)
                        <a href="{{ asset('storage/' . $tugasBelajar->penilaian_kinerja) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                    <td>{{ $tugasBelajar->tanggal_upload_penilaian_kinerja ?? 'Belum diunggah' }}</td> <!-- Tanggal upload -->
                </tr>
                <tr>
                    <td>4</td>
                    <td>Ijazah Terakhir</td>
                    <td>
                        @if($tugasBelajar->ijazah_terakhir)
                        <a href="{{ asset('storage/' . $tugasBelajar->ijazah_terakhir) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                    <td>{{ $tugasBelajar->tanggal_upload_ijazah_terakhir ?? 'Belum diunggah' }}</td> <!-- Tanggal upload -->
                </tr>
                <tr>
                    <td>5</td>
                    <td>SK Pemberhentian dari Jabatan</td>
                    <td>
                        @if($tugasBelajar->sk_pemberhentian_jabatan)
                        <a href="{{ asset('storage/' . $tugasBelajar->sk_pemberhentian_jabatan) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                    <td>{{ $tugasBelajar->tanggal_upload_sk_pemberhentian_jabatan ?? 'Belum diunggah' }}</td> <!-- Tanggal upload -->
                </tr>
            </tbody>
        </table>
        @else
        <p>Data upload tugas belajar tidak ditemukan.</p>
        @endif
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>