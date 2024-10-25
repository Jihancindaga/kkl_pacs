<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenaikan Pangkat Reguler</title>
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
            margin-top: 70px; /* Menambahkan margin atas untuk memberi jarak dari navbar */
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

        .table th, .table td {
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
                <tr>
                    <td>1</td>
                    <td>SK Kenaikan Pangkat Terakhir</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file1" class="form-control" required style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(1)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox1" disabled>
                        <label for="checkbox1" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ijazah dan Transkrip Nilai Terakhir</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file2" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(2)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox2" disabled>
                        <label for="checkbox2" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>SK Jabatan & SPMT</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file3" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(3)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox3" disabled>
                        <label for="checkbox3" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Berita Acara Pelantikan dan Surat Pernyataan Pelantikan</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file4" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(4)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox4" disabled>
                        <label for="checkbox4" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Penilaian Kinerja Pegawai selama 2 tahun terakhir (2022 dan 2023)</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file5" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(5)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox5" disabled>
                        <label for="checkbox5" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Surat Pencantuman Gelar dari BKN</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file6" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(6)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox6" disabled>
                        <label for="checkbox6" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>STTPP DIKLATPIM III</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file7" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(7)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox7" disabled>
                        <label for="checkbox7" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Rekomendasi Kepala Instansi</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file8" class="form-control" style="flex: 1;">
                            <button type="button" class="btn btn-primary btn-upload" onclick="uploadFile(8)">Upload</button>
                        </div>
                    </td>
                    <td>
                        <input type="checkbox" id="checkbox8" disabled>
                        <label for="checkbox8" class="checkbox-label">Syarat ini telah diunggah</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function uploadFile(fileNumber) {
            // Simulasi pengunggahan file
            const checkbox = document.getElementById(`checkbox${fileNumber}`);
            checkbox.checked = true; // Menandai checkbox sebagai tercentang setelah pengunggahan
            alert(`File untuk syarat ${fileNumber} telah diunggah.`);
        }

        function navigateTo(page) {
            window.location.href = page;
        }
    </script>

</body>
</html>
