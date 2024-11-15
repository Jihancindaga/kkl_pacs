<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Kenaikan Pangkat</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px; /* Ukuran font lebih kecil */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px; /* Ukuran font heading lebih besar */
        }
        table { 
            width: 80%; /* Lebar tabel di tengah */
            margin: 0 auto; /* Agar tabel berada di tengah halaman */
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 6px; /* Padding lebih kecil */
            text-align: left; 
            font-size: 12px; /* Ukuran font untuk tabel lebih kecil */
        }
        th { 
            background-color: #f2f2f2; 
            text-align: center; /* Agar teks header lebih teratur */
        }
        td {
            text-align: center; /* Teks di dalam tabel rata tengah */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Warna baris ganjil lebih ringan */
        }
    </style>
</head>
<body>
    <h2>Report Kenaikan Pangkat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tahun Pengajuan</th>
                <th>Kategori</th>
                <th>Bagian</th>
                <th>Pangkat Terakhir</th>
                <th>Pangkat yang Diajukan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($kpo as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->karyawan->nip }}</td>
                <td>{{ $data->karyawan->nama }}</td>
                <td>{{ $data->tahun_pengajuan }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->karyawan->bagian }}</td>
                <td>{{ $data->karyawan->pangkat }}</td>
                <td>{{ $data->pangkat }}</td>
            </tr>
            @endforeach
            @foreach ($struktural as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->karyawan->nip }}</td>
                <td>{{ $data->karyawan->nama }}</td>
                <td>{{ $data->tahun_pengajuan }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->karyawan->bagian }}</td>
                <td>{{ $data->karyawan->pangkat }}</td>
                <td>{{ $data->pangkat }}</td>
            </tr>
            @endforeach
            @foreach ($penyesuaianIjazah as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->karyawan->nip }}</td>
                <td>{{ $data->karyawan->nama }}</td>
                <td>{{ $data->tahun_pengajuan }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->karyawan->bagian }}</td>
                <td>{{ $data->karyawan->pangkat }}</td>
                <td>{{ $data->pangkat }}</td>
            </tr>
            @endforeach
            @foreach ($fungsional as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->karyawan->nip }}</td>
                <td>{{ $data->karyawan->nama }}</td>
                <td>{{ $data->tahun_pengajuan }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->karyawan->bagian }}</td>
                <td>{{ $data->karyawan->pangkat }}</td>
                <td>{{ $data->pangkat }}</td>
            </tr>
            @endforeach
            @foreach ($tugasBelajar as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->karyawan->nip }}</td>
                <td>{{ $data->karyawan->nama }}</td>
                <td>{{ $data->tahun_pengajuan }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->karyawan->bagian }}</td>
                <td>{{ $data->karyawan->pangkat }}</td>
                <td>{{ $data->pangkat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
