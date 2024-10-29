<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Tugas Belajar</title>
</head>
<style>
    /* CSS untuk halaman Riwayat Karyawan */

.container {
    margin-top: 20px;
    padding: 15px;
    border-radius: 8px;
    background-color: #f8f9fa; /* Warna latar belakang yang lebih lembut */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #343a40; /* Warna judul */
}

.table {
    width: 100%;
    border-collapse: collapse; /* Menghilangkan jarak antara sel tabel */
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6; /* Garis batas bawah */
}

.table th {
    background-color: #007bff; /* Warna latar belakang header */
    color: white; /* Warna teks header */
}

.table tr:hover {
    background-color: #e9ecef; /* Warna latar belakang saat hover */
}

.btn {
    background-color: #007bff; /* Warna tombol */
    color: white; /* Warna teks tombol */
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    text-decoration: none;
}

.btn:hover {
    background-color: #0056b3; /* Warna tombol saat hover */
}

</style>
<body>
<div class="container">
    <h1>Riwayat Karyawan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $index => $karyawan)
            <tr>
                <td>{{ $karyawan->nip }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>
                    <a href="{{ route('karyawan.show', $karyawan->nip) }}" class="btn btn-primary">Detail Riwayat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
