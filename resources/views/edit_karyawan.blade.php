<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Tambahkan Font Awesome -->
</head>
<style>
    .navbar {
        width: 100%;
        /* Navbar lebar penuh */
        padding: 10px 15px;
        /* Padding vertikal navbar */
    }

    .navbar .logo img {
        height: 40px;
        position: relative;
        left: -10px;
        /* Menyesuaikan posisi logo */
    }

    .container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        margin-top: 50px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #007bff;
        margin-bottom: 20px;
    }

    .back-icon {
        font-size: 24px;
        color: white;
        text-decoration: none;
    }

    .back-icon:hover {
        color: #e0e0e0;
        /* Warna saat hover */
    }

    body {
        padding-top: 70px;
        /* Menyesuaikan konten di bawah navbar */
    }
</style>

<body>
    <!-- Navbar hanya dengan ikon panah kembali -->
    <nav class="navbar navbar-light bg-primary fixed-top">
        <a href="{{ route('datakaryawan') }}" class="back-icon">
            <i class="fas fa-arrow-left"></i> <!-- Menambahkan ikon panah kiri -->
        </a>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>

        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">
        <h2>Edit Data Karyawan</h2>

        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $karyawan->nip) }}" required readonly>
            </div>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_kenaikan_gaji">Tahun Kenaikan Gaji:</label>
                <input type="date" class="form-control" id="tanggal_kenaikan_gaji" name="tanggal_kenaikan_gaji" value="{{ old('tanggal_kenaikan_gaji', $karyawan->tanggal_kenaikan_gaji) }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_kenaikan_pangkat">Tahun Kenaikan Pangkat:</label>
                <input type="date" class="form-control" id="tanggal_kenaikan_pangkat" name="tanggal_kenaikan_pangkat" value="{{ old('tanggal_kenaikan_pangkat', $karyawan->tanggal_kenaikan_pangkat) }}" required>
            </div>

            <div class="form-group">
                <label for="golongan">Golongan:</label>
                <input type="text" class="form-control" id="golongan" name="golongan" value="{{ old('golongan', $karyawan->golongan) }}" required>
            </div>

            <div class="form-group">
                <label for="pangkat">Pangkat:</label>
                <input type="text" class="form-control" id="pangkat" name="pangkat" value="{{ old('pangkat', $karyawan->pangkat) }}" required>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}" required>
            </div>
            <div class="form-group">
                <label for="bagian">Bagian</label>
                <select class="form-control" id="bagian" name="bagian" required>
                    <option value="" disabled selected>Pilih Bagian</option>
                    <option value="Kesekretariatan">Kesekretariatan</option>
                    <option value="atlas">ATLAS</option>
                    <option value="sbsp">SBSP</option>
                    <option value="uptd">UPTD</option>
                    <option value="warisanbudaya">Warisan Budaya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_telp">Nomor Telepon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp', $karyawan->no_telp) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>