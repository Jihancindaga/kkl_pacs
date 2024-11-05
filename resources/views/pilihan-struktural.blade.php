<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kenaikan Pangkat Struktural - {{ $karyawan->nama }}</title>
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
        <h3>Detail Upload Kenaikan Pangkat Struktural</h3>
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>

        @if($pilihanStruktural)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Link Berkas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SK Kenaikan Pangkat Terakhir</td>
                    <td>
                        @if($pilihanStruktural->sk_kenaikan_pangkat_terakhir)
                        <a href="{{ asset('storage/' . $pilihanStruktural->sk_kenaikan_pangkat_terakhir) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ijazah Terakhir</td>
                    <td>
                        @if($pilihanStruktural->ijazah_terakhir)
                        <a href="{{ asset('storage/' . $pilihanStruktural->ijazah_terakhir) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Transkrip Nilai</td>
                    <td>
                        @if($pilihanStruktural->transkrip_nilai)
                        <a href="{{ asset('storage/' . $pilihanStruktural->transkrip_nilai) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>SK Jabatan SPMT</td>
                    <td>
                        @if($pilihanStruktural->sk_jabatan_spmt)
                        <a href="{{ asset('storage/' . $pilihanStruktural->sk_jabatan_spmt) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Berita Acara Pelantikan</td>
                    <td>
                        @if($pilihanStruktural->berita_acara_pelantikan)
                        <a href="{{ asset('storage/' . $pilihanStruktural->berita_acara_pelantikan) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Surat Pernyataan Pelantikan</td>
                    <td>
                        @if($pilihanStruktural->surat_pernyataan_pelantikan)
                        <a href="{{ asset('storage/' . $pilihanStruktural->surat_pernyataan_pelantikan) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Penilaian Kinerja</td>
                    <td>
                        @if($pilihanStruktural->penilaian_kinerja)
                        <a href="{{ asset('storage/' . $pilihanStruktural->penilaian_kinerja) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Surat Gelar BKN</td>
                    <td>
                        @if($pilihanStruktural->surat_gelar_bkn)
                        <a href="{{ asset('storage/' . $pilihanStruktural->surat_gelar_bkn) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>STTPP Diklatpim III</td>
                    <td>
                        @if($pilihanStruktural->sttpp_diklatpim_iii)
                        <a href="{{ asset('storage/' . $pilihanStruktural->sttpp_diklatpim_iii) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Rekomendasi Kepala Instansi</td>
                    <td>
                        @if($pilihanStruktural->rekomendasi_kepala_instansi)
                        <a href="{{ asset('storage/' . $pilihanStruktural->rekomendasi_kepala_instansi) }}" class="btn btn-primary" target="_blank">Lihat</a>
                        @else
                        Belum diunggah
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <p>Data Kenaikan Pangkat Struktural tidak ditemukan.</p>
        @endif
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>