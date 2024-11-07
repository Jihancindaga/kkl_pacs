<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Pangkat Pilihan Struktural</title>
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
            <img src="/images/pacs.png" alt="Logo PACS">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman">
        </div>
    </div>

    <div class="container">
        <h3>Kenaikan Pangkat Pilihan Struktural</h3>
        <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
        <p><strong>NIP:</strong> {{ $karyawan->nip }}</p>
        <form action="{{ route('pilihan-struktural.store', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dokumen</th>
                        <th>Unggah Berkas</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([
                        'SK Kenaikan Pangkat terakhir',
                        'Ijasah terakhir',
                        'Transkrip nilai terakhir',
                        'SK Jabatan & SPMT',
                        'Berita Acara Pelantikan',
                        'Surat Pernyataan Pelantikan',
                        'Penilaian Kinerja Pegawai selama 2 (dua) tahun terakhir',
                        'Surat Pencantuman Gelar (Peningkatan Pendidikan) dari BKN bagi yang memperoleh ijazah lebih tinggi',
                        'STTPP DIKLATPIM III',
                        'Rekomendasi Kepala Instansi'
                    ] as $index => $dokumen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dokumen }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <input type="file" name="file{{ $index + 1 }}" class="form-control file-input" required style="flex: 1;" id="file{{ $index + 1 }}" {{ $index > 0 ? 'disabled' : '' }}>
                                <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile({{ $index + 1 }})" {{ $index > 0 ? 'disabled' : '' }}>Upload</button>
                            </div>
                        </td>
                        <td>
                            <input type="date" name="tanggal_upload{{ $index + 1 }}" class="form-control" id="tanggal_upload{{ $index + 1 }}" required {{ $index > 0 ? 'disabled' : '' }}>
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
            // Simulate file upload and enable checkbox and next input
            alert('File ' + fileNumber + ' berhasil diunggah!');
            const checkbox = document.getElementById('checkbox' + fileNumber);
            checkbox.checked = true;
            checkbox.disabled = false; // Enable checkbox

            // Enable the next file input and button if it exists
            const nextFileInput = document.getElementById('file' + (fileNumber + 1));
            const nextUploadButton = document.querySelector('#file' + (fileNumber + 1) + ' + .btn-upload'); // Corrected selector
            const nextDateInput = document.getElementById('tanggal_upload' + (fileNumber + 1)); // Next date input
            if (nextFileInput) {
                nextFileInput.disabled = false;
                nextUploadButton.disabled = false; // Enable the next upload button
                nextDateInput.disabled = false; // Enable the next date input
            }

            checkAllFilesUploaded(); // Check if all files have been uploaded
        }

        function checkAllFilesUploaded() {
            const checkboxes = Array.from(document.querySelectorAll('input[type="checkbox"]'));
            const allUploaded = checkboxes.every(checkbox => checkbox.checked);
            document.getElementById('saveButton').disabled = !allUploaded; // Enable or disable the save button
        }

        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>
