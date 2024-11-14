<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Tugas Belajar - {{ $karyawan->nama }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            display: flex;
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
            margin-right: auto;
        }
        .container {
            margin-top: 80px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
            max-width: 90%;
        }
        h3 {
            text-align: center;
            color: #343a40;
            font-size: 24px;
        }
        .table-section {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/riwayat-kenaikan')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="container">
        <h3>Riwayat Upload Tugas Belajar</h3>
       
        <div class="info-section">
            <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
            <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>
        </div>

        @foreach ($tugasBelajar as $index => $item)
        <div class="table-section">
            <table class="table table-bordered">
                <thead>
                    <!-- Judul Riwayat dengan Latar Belakang Biru Penuh -->
                    <tr style="background-color: #84b0df; color: white;">
                        <th colspan="6" class="text-center">Riwayat {{ $index + 1 }}</th>
                    </tr>
                    <!-- Tabel Kolom -->
                    <tr>
                        <th>Bagian</th>
                        <th>Golongan Lama</th>
                        <th>Golongan Baru</th>
                        <th>Pangkat Lama</th>
                        <th>Pangkat Baru</th>
                        <th>Tahun Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $karyawan->bagian }}</td>
                        <td>{{ $karyawan->golongan }}</td>
                        <td>{{ $item->golongan }}</td>
                        <td>{{ $karyawan->pangkat }}</td>
                        <td>{{ $item->pangkat }}</td>
                        <td>{{ $item->tahun_pengajuan }}</td>
                    </tr>
                </tbody>
            </table>
            
            </table>

            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Berkas</th>
                            <th>Link Lihat Berkas</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([
                            'SK Kenaikan Pangkat Terakhir' => $item->sk_kenaikan_pangkat_terakhir,
                            'Surat Tugas Belajar' => $item->surat_tugas_belajar,
                            'Penilaian Kinerja' => $item->penilaian_kinerja,
                            'Ijazah Terakhir' => $item->ijazah_terakhir,
                            'Transkrip Nilai' => $item->transkrip_nilai,
                            'SK Pemberhentian Jabatan' => $item->sk_pemberhentian_jabatan
                        ] as $namaBerkas => $filePath)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $namaBerkas }}</td>
                            <td>
                                @if ($filePath)
                                <a href="{{ Storage::url($filePath) }}" class="btn btn-primary btn-sm" target="_blank">Lihat Berkas</a>
                                @else
                                <span class="text-danger">Belum diunggah</span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal_upload ?? 'Belum diunggah' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>

</html>
