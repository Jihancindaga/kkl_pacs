<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Kenaikan Pangkat</title>
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
            max-width: 1400px;
            /* Mengubah dari 1200px ke 1400px */
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

        .filter-section {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-section input[name="year"] {
        border: 1px solid #b0b0b0; 
        padding: 5px;
        font-size: 16px;
        border-radius: 5px;
        width: 230px; 
        box-sizing: border-box;
        }

        .filter-section select,
        .filter-section button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .filter-section button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-section button:hover {
            background-color: #0056b3;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid #ddd; /* Menambahkan garis tepi pada tabel */
    }

    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd; /* Garis tepi pada setiap sel */
        font-size: 14px; /* Ukuran font yang lebih kecil */
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-info {
            color: #fff;
            background-color: #17a2b8;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #138496;
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
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Report Kenaikan Pangkat</h2>

            <!-- Button group navigasi -->
            <div class="button-group">
                <button class="btn btn-1 {{ Request::is('datakaryawan') ? 'active' : '' }}" onclick="navigateTo('/datakaryawan')">Data Pokok Karyawan</button>
                <button class="btn btn-2 {{ Request::is('tambah-karyawan') ? 'active' : '' }}" onclick="navigateTo('/tambah-karyawan')">Tambah Karyawan Baru</button>
                <button class="btn btn-3 {{ Request::is('riwayat-kenaikan') ? 'active' : '' }}" onclick="navigateTo('/riwayat-kenaikan')">Riwayat Kenaikan Pangkat</button>
                <button class="btn btn-5 {{ Request::is('riwayat_karyawan_nonaktif') ? 'active' : '' }}" onclick="navigateTo('/riwayat_karyawan_nonaktif')">Riwayat Karyawan Non-aktif</button>
                <button class="btn btn-4 {{ Request::is('report') ? 'active' : '' }}" onclick="navigateTo('/report')">Report</button>
            </div>

            <hr>

            <!-- Filter Section -->
            <div class="filter-section">
                <form method="GET" action="{{ route('riwayat-kenaikan-pangkat.index') }}">
                    <input type="text" name="year" value="{{ request('year') }}" placeholder="Masukkan tahun kenaikan">
                    <select name="bagian">
                        <option value="">Pilih Bagian</option>
                        <option value="Kesekretariatan" {{ request('bagian') == 'Kesekretariatan' ? 'selected' : '' }}>Kesekretariatan</option>
                        <option value="ATLAS" {{ request('bagian') == 'ATLAS' ? 'selected' : '' }}>ATLAS</option>
                        <option value="SBSP" {{ request('bagian') == 'SBSP' ? 'selected' : '' }}>SBSP</option>
                        <option value="UPTD" {{ request('bagian') == 'UPTD' ? 'selected' : '' }}>UPTD</option>
                        <option value="Warisan Budaya" {{ request('bagian') == 'Warisan Budaya' ? 'selected' : '' }}>Warisan Budaya</option>                    </select>
                    </select>
                    <select name="pangkat">
                        <option value="">Pilih Pangkat Terakhir</option>
                        <optgroup label="Golongan I (Juru)">
                            <option value="Juru Muda" {{ request('pangkat') == 'Juru Muda' ? 'selected' : '' }}>Juru Muda</option>
                            <option value="Juru Muda Tingkat I" {{ request('pangkat') == 'Juru Muda Tingkat I' ? 'selected' : '' }}>Juru Muda Tingkat I</option>
                            <option value="Juru" {{ request('pangkat') == 'Juru' ? 'selected' : '' }}> Juru</option>
                            <option value="Juru Tingkat I" {{ request('pangkat') == 'Juru Tingkat I' ? 'selected' : '' }}>Juru Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan II (Pengatur)">
                            <option value="Pengatur Muda" {{ request('pangkat') == 'Pengatur Muda' ? 'selected' : '' }}> Pengatur Muda</option>
                            <option value="Pengatur Muda Tingkat I" {{ request('pangkat') == 'Pengatur Muda Tingkat I' ? 'selected' : '' }}> Pengatur Muda Tingkat I</option>
                            <option value="Pengatur" {{ request('pangkat') == 'Pengatur' ? 'selected' : '' }}> Pengatur</option>
                            <option value="Pengatur Tingkat I" {{ request('pangkat') == 'Pengatur Tingkat I' ? 'selected' : '' }}> Pengatur Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan III (Penata)">
                            <option value="Penata Muda" {{ request('pangkat') == 'Penata Muda' ? 'selected' : '' }}> Penata Muda</option>
                            <option value="Penata Muda Tingkat I" {{ request('pangkat') == 'Penata Muda Tingkat I' ? 'selected' : '' }}> Penata Muda Tingkat I</option>
                            <option value="Penata" {{ request('pangkat') == 'Penata' ? 'selected' : '' }}>Penata</option>
                            <option value="Penata Tingkat I" {{ request('pangkat') == 'Penata Tingkat I' ? 'selected' : '' }}> Penata Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan IV (Pembina)">
                            <option value="Pembina" {{ request('pangkat') == 'Pembina' ? 'selected' : '' }}> Pembina</option>
                            <option value="Pembina Tingkat I" {{ request('pangkat') == 'Pembina Tingkat I' ? 'selected' : '' }}> Pembina Tingkat I</option>
                            <option value="Pembina Muda" {{ request('pangkat') == 'Pembina Muda' ? 'selected' : '' }}> Pembina Muda</option>
                            <option value="Pembina Madya" {{ request('pangkat') == 'Pembina Madya' ? 'selected' : '' }}>Pembina Madya</option>
                        </optgroup>
                    </select>
                    <select name="pangkatpengajuan">
                        <option value="">Pilih Pangkat yang Diajukan</option>
                        <optgroup label="Golongan I (Juru)">
                            <option value="Juru Muda" {{ request('pangkatpengajuan') == 'Juru Muda' ? 'selected' : '' }}>Juru Muda</option>
                            <option value="Juru Muda Tingkat I" {{ request('pangkatpengajuan') == 'Juru Muda Tingkat I' ? 'selected' : '' }}>Juru Muda Tingkat I</option>
                            <option value="Juru" {{ request('pangkatpengajuan') == 'Juru' ? 'selected' : '' }}>Juru</option>
                            <option value="Juru Tingkat I" {{ request('pangkatpengajuan') == 'Juru Tingkat I' ? 'selected' : '' }}>Juru Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan II (Pengatur)">
                            <option value="Pengatur Muda" {{ request('pangkatpengajuan') == 'Pengatur Muda' ? 'selected' : '' }}>Pengatur Muda</option>
                            <option value="Pengatur Muda Tingkat I" {{ request('pangkatpengajuan') == 'Pengatur Muda Tingkat I' ? 'selected' : '' }}>Pengatur Muda Tingkat I</option>
                            <option value="Pengatur" {{ request('pangkatpengajuan') == 'Pengatur' ? 'selected' : '' }}>Pengatur</option>
                            <option value="Pengatur Tingkat I" {{ request('pangkatpengajuan') == 'Pengatur Tingkat I' ? 'selected' : '' }}>Pengatur Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan III (Penata)">
                            <option value="Penata Muda" {{ request('pangkatpengajuan') == 'Penata Muda' ? 'selected' : '' }}>Penata Muda</option>
                            <option value="Penata Muda Tingkat I" {{ request('pangkatpengajuan') == 'Penata Muda Tingkat I' ? 'selected' : '' }}>Penata Muda Tingkat I</option>
                            <option value="Penata" {{ request('pangkatpengajuan') == 'Penata' ? 'selected' : '' }}>Penata</option>
                            <option value="Penata Tingkat I" {{ request('pangkatpengajuan') == 'Penata Tingkat I' ? 'selected' : '' }}>Penata Tingkat I</option>
                        </optgroup>
                        <optgroup label="Golongan IV (Pembina)">
                            <option value="Pembina" {{ request('pangkatpengajuan') == 'Pembina' ? 'selected' : '' }}>Pembina</option>
                            <option value="Pembina Tingkat I" {{ request('pangkatpengajuan') == 'Pembina Tingkat I' ? 'selected' : '' }}>Pembina Tingkat I</option>
                            <option value="Pembina Muda" {{ request('pangkatpengajuan') == 'Pembina Muda' ? 'selected' : '' }}>Pembina Muda</option>
                            <option value="Pembina Madya" {{ request('pangkatpengajuan') == 'Pembina Madya' ? 'selected' : '' }}>Pembina Madya</option>
                        </optgroup>
                    </select>
                    
                        <button type="submit" class="btn btn-primary btn-sm" style="padding: 6px 12px;">Filter</button>
                        <a href="{{ route('riwayat-kenaikan-pangkat.index') }}" class="btn btn-warning">Reset</a> <!-- Button Reset -->
                </form>
            </div>


            <!-- Table Section -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tahun Pengajuan</th>
                            <th>Bagian</th>
                            <th>Kategori Kenaikan</th>
                            <th>Pangkat Terakhir</th>
                            <th>Pangkat yang Diajukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kpo as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->karyawan->nip }}</td>
                            <td>{{ $data->karyawan->nama }}</td>
                            <td>{{ $data->tahun_pengajuan }}</td>
                            <td>{{ $data->karyawan->bagian }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->karyawan->pangkat }}</td>
                            <td>{{ $data->pangkat }}</td>
                        </tr>
                        @endforeach
                        @foreach ($struktural as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->karyawan->nip }}</td>
                            <td>{{ $data->karyawan->nama }}</td>
                            <td>{{ $data->tahun_pengajuan }}</td>
                            <td>{{ $data->karyawan->bagian }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->karyawan->pangkat }}</td>
                            <td>{{ $data->pangkat }}</td>
                        </tr>
                        @endforeach
                        @foreach ($penyesuaianIjazah as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $karyawan->nip }}</td>
                            <td>{{ $data->data->karyawan->nama }}</td>
                            <td>{{ $data->tahun_pengajuan }}</td>
                            <td>{{ $data->karyawan->bagian }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->karyawan->pangkat }}</td>
                            <td>{{ $data->pangkat }}</td>
                        </tr>
                        @endforeach
                        @foreach ($fungsional as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->karyawan->nip }}</td>
                            <td>{{ $data->karyawan->nama }}</td>
                            <td>{{ $data->tahun_pengajuan }}</td>
                            <td>{{ $data->karyawan->bagian }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->karyawan->pangkat }}</td>
                            <td>{{ $data->pangkat }}</td>
                        </tr>
                        @endforeach
                        @foreach ($tugasBelajar as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->karyawan->nip }}</td>
                            <td>{{ $data->karyawan->nama }}</td>
                            <td>{{ $data->tahun_pengajuan }}</td>
                            <td>{{ $data->karyawan->bagian }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->karyawan->pangkat }}</td>
                            <td>{{ $data->pangkat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    
        document.getElementById('filterButton').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah form melakukan submit secara normal
    
            const tahun = document.getElementById('tahun').value;
            const bagian = document.getElementById('bagian').value;
            const pangkat = document.getElementById('pangkat').value;  // Mendapatkan nilai input pangkat
            const pangkatterakhir = document.getElementById('pangkatterakhir').value; // Mendapatkan nilai input pangkatterakhir

            // Membuat URL dinamis berdasarkan input yang dipilih
            const url = new URL(window.location.href);
    
            if (tahun) url.searchParams.set('tahun', tahun);
            else url.searchParams.delete('tahun'); // Hapus jika kosong
    
            if (bagian) url.searchParams.set('bagian', bagian);
            else url.searchParams.delete('bagian'); // Hapus jika kosong

            // Menambahkan filter untuk 'pangkat' jika ada input pangkat terakhit
            if (pangkat) url.searchParams.set('pangkat', pangkat);
            else url.searchParams.delete('pangkat'); // Hapus jika kosong

            // Menambahkan filter untuk 'pangkatterakhir' jika ada input diajukam
            if (pangkatPengajuan) url.searchParams.set('pangkatPengajuan', pangkatPengajuan);
            else url.searchParams.delete('pangkatPengajuan'); // Hapus jika kosong
    
    
            window.location.href = url.toString(); // Arahkan ke URL yang telah diperbarui
        });
    </script>
    
    

</body>

</html>