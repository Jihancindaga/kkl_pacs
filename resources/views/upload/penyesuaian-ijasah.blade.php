<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Pangkat Pilihan Penyesuaian Ijasah</title>
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

        .btn-upload {
            margin-left: 5px;
            font-size: 12px;
        }

        .checkbox-label {
            margin-left: 5px;
            font-size: 12px;
        }

        .form-control {
            font-size: 12px;
            padding: 5px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .btn-success:disabled {
            background-color: #c0c0c0;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/datakaryawan')">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>

    <div class="container">
        <h3>Kategori Kenaikan Pangkat Pilihan Penyesuaian Ijasah</h3>
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>

        <!-- Form untuk mengupload berkas -->
        <form action="{{ route('penyesuaian-ijazah.store', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="Penyesuaian Ijazah" readonly>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bagian</th>
                        <th>Golongan Saat Ini</th>
                        <th>Golongan yang Akan Diajukan</th>
                        <th>Pangkat Saat Ini</th>
                        <th>Pangkat yang Akan Diajukan</th>
                        <th>Tahun Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $karyawan->bagian }}</td>
                        <td>{{ $karyawan->golongan }}</td>
                        <td><input type="text" name="golongan" class="form-control" required placeholder="Masukkan Golongan yang Diajukan"></td>
                        <td>{{ $karyawan->pangkat }}</td>
                        <td>
                            <select name="pangkat" class="form-control" required>
                                <option value="">Pilih Pangkat yang Diajukan</option>
                                <optgroup label="Golongan I (Juru)">
                                    <option value="Juru Muda" {{ request('pangkat') == 'Juru Muda' ? 'selected' : '' }}>Juru Muda</option>
                                    <option value="Juru Muda Tingkat I" {{ request('pangkat') == 'Juru Muda Tingkat I' ? 'selected' : '' }}>Juru Muda Tingkat I</option>
                                    <option value="Juru" {{ request('pangkat') == 'Juru' ? 'selected' : '' }}>Juru</option>
                                    <option value="Juru Tingkat I" {{ request('pangkat') == 'Juru Tingkat I' ? 'selected' : '' }}>Juru Tingkat I</option>
                                </optgroup>
                                <optgroup label="Golongan II (Pengatur)">
                                    <option value="Pengatur Muda" {{ request('pangkat') == 'Pengatur Muda' ? 'selected' : '' }}>Pengatur Muda</option>
                                    <option value="Pengatur Muda Tingkat I" {{ request('pangkat') == 'Pengatur Muda Tingkat I' ? 'selected' : '' }}>Pengatur Muda Tingkat I</option>
                                    <option value="Pengatur" {{ request('pangkat') == 'Pengatur' ? 'selected' : '' }}>Pengatur</option>
                                    <option value="Pengatur Tingkat I" {{ request('pangkat') == 'Pengatur Tingkat I' ? 'selected' : '' }}>Pengatur Tingkat I</option>
                                </optgroup>
                                <optgroup label="Golongan III (Penata)">
                                    <option value="Penata Muda" {{ request('pangkat') == 'Penata Muda' ? 'selected' : '' }}>Penata Muda</option>
                                    <option value="Penata Muda Tingkat I" {{ request('pangkat') == 'Penata Muda Tingkat I' ? 'selected' : '' }}>Penata Muda Tingkat I</option>
                                    <option value="Penata" {{ request('pangkat') == 'Penata' ? 'selected' : '' }}>Penata</option>
                                    <option value="Penata Tingkat I" {{ request('pangkat') == 'Penata Tingkat I' ? 'selected' : '' }}>Penata Tingkat I</option>
                                </optgroup>
                                <optgroup label="Golongan IV (Pembina)">
                                    <option value="Pembina" {{ request('pangkat') == 'Pembina' ? 'selected' : '' }}>Pembina</option>
                                    <option value="Pembina Tingkat I" {{ request('pangkat') == 'Pembina Tingkat I' ? 'selected' : '' }}>Pembina Tingkat I</option>
                                    <option value="Pembina Muda" {{ request('pangkat') == 'Pembina Muda' ? 'selected' : '' }}>Pembina Muda</option>
                                    <option value="Pembina Madya" {{ request('pangkat') == 'Pembina Madya' ? 'selected' : '' }}>Pembina Madya</option>
                                </optgroup>
                            </select>
                        </td>
                        <td><input type="number" name="tahun_pengajuan" class="form-control" required placeholder="Masukkan Tahun Pengajuan"></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dokumen</th>
                        <th>Unggah Berkas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                    'SK Kenaikan Pangkat Terakhir',
                    'SK Jabatan Terakhir',
                    'Ijazah Terakhir',
                    'Transkrip Nilai',
                    'Surat Akreditasi',
                    'Surat Ijin Belajar',
                    'STL Ujian Kenaikan',
                    'Penilaian Kinerja',
                    'Surat Uraian Tugas',
                    'Rekomendasi Kepala Instansi'
                    ] as $index => $dokumen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dokumen }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <input type="file" name="file{{ $index + 1 }}" class="form-control" required style="flex: 1;" id="file{{ $index + 1 }}" onchange="showPreview({{ $index + 1 }})">
                                <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile({{ $index + 1 }})">Upload</button>
                            </div>
                            <div class="preview" id="preview{{ $index + 1 }}"></div>
                        </td>
                        <td>
                            <input type="checkbox" id="checkbox{{ $index + 1 }}" disabled>
                            <label for="checkbox{{ $index + 1 }}" class="checkbox-label">Syarat ini telah diunggah</label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" class="btn btn-success" id="saveButton" disabled>Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function uploadFile(fileNumber) {
            // Simulasi pengunggahan file
            alert('File ' + fileNumber + ' berhasil diunggah!');
            const checkbox = document.getElementById('checkbox' + fileNumber);
            checkbox.checked = true;
            checkbox.disabled = false;

            checkAllFilesUploaded(); // Memeriksa apakah semua file telah diunggah
        }

        function checkAllFilesUploaded() {
            const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
            const allUploaded = checkboxes.every(checkbox => checkbox.checked);
            document.getElementById('saveButton').disabled = !allUploaded; // Aktifkan tombol simpan jika semua file sudah diunggah
        }

        function showPreview(fileNumber) {
            const fileInput = document.getElementById('file' + fileNumber);
            const preview = document.getElementById('preview' + fileNumber);

            if (fileInput.files && fileInput.files[0]) {
                const fileURL = URL.createObjectURL(fileInput.files[0]);
                const fileName = fileInput.files[0].name;
                preview.innerHTML = `<strong>Pratinjau:</strong> <a href="${fileURL}" target="_blank">${fileName}</a>`;
            }
        }

        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>