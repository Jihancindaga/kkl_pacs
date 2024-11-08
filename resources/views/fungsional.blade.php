<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kenaikan Pangkat Fungsional - {{ $karyawan->nama }}</title>
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
            margin-top: 80px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
            max-width: 95%;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
            font-size: 24px;
        }

        .info-section {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .table {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #dee2e6;
        }

        .table-header {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 8px;
            font-size: 18px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            font-size: 14px;
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .btn-primary {
            font-size: 14px;
            padding: 4px 10px;
        }

        .not-uploaded {
            color: #dc3545;
            font-weight: bold;
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
        <h3>Detail Upload Kenaikan Pangkat Fungsional</h3>

        <div class="info-section">
            <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
            <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>
        </div>

        @if($kenaikanPangkatFungsional->isNotEmpty())
        @php
        $uploads = [
        ['name' => 'SK CPNS', 'file' => 'sk_cpns'],
        ['name' => 'SK PNS', 'file' => 'sk_pns'],
        ['name' => 'SK Plotting Terakhir', 'file' => 'sk_ploting_terakhir'],
        ['name' => 'SK Pengangkatan Jabatan Fungsional', 'file' => 'sk_pengangkatan_jabatan_fungsional'],
        ['name' => 'SK Kenaikan Pangkat Terakhir', 'file' => 'sk_kenaikan_pangkat_terakhir'],
        ['name' => 'Ijazah Terakhir', 'file' => 'ijazah_terakhir'],
        ['name' => 'Transkrip Nilai', 'file' => 'transkrip_nilai'],
        ['name' => 'SK PMK', 'file' => 'sk_pmk', 'date' => 'tanggal_upload_sk_pmk'],
        ['name' => 'Penilaian Kinerja', 'file' => 'penilaian_kinerja'],
        ['name' => 'Sertifikat Uji Kompetensi', 'file' => 'sertifikat_uji_kompetensi'],
        ['name' => 'PAK', 'file' => 'pak'],
        ['name' => 'PAK Integrasi', 'file' => 'pak_integrasi'],
        ['name' => 'SK Pengangkatan Pertama Fungsional', 'file' => 'sk_pengangkatan_pertama_fungsional'],
        ['name' => 'SK Kenaikan Jabatan Fungsional', 'file' => 'sk_kenaikan_jabatan_fungsional'],
        ['name' => 'Rekomendasi Kepala Instansi', 'file' => 'rekomendasi_kepala_instansi'],
        ];
        @endphp

        @foreach($uploads as $upload)
        <div class="table">
            <div class="table-header">{{ $upload['name'] }}</div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Link Berkas</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kenaikanPangkatFungsional as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($data->{$upload['file']})
                            <a href="{{ asset('storage/' . $data->{$upload['file']}) }}" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
                            @else
                            <span class="not-uploaded">Belum diunggah</span>
                            @endif
                        </td>
                        <td>{{ $data->tanggal_upload ?? 'Belum diunggah' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

        @else
        <p>Data upload kenaikan pangkat fungsional tidak ditemukan.</p>
        @endif
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>