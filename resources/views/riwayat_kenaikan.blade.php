<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kenaikan Pangkat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .navbar .back-btn {
            font-size: 24px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }

        .navbar .logo {
            margin-left: auto;
        }

        .navbar .logo img {
            height: 40px;
        }

        .content {
            margin-top: 70px;
            padding: 20px;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 2000px;
            width: 90%;
            margin: auto;
        }

        .container h2 {
            margin-bottom: 40px;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            font-size: 50px;
            color: #0056b3;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <button class="back-btn" onclick="navigateTo('/datakaryawan')">
            <i class="fas fa-arrow-left" style="font-weight: bold;"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px;">
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h2>Riwayat Kenaikan Pangkat</h2>

            <!-- <div class="btn-container">
                <a href="/tambah-kenaikan" class="btn btn-primary">Tambah Kenaikan Pangkat</a>
            </div> -->

            <table class="table table-bordered">
                <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tahun Kenaikan</th>
                            <th>Golongan</th>
                            <th>Pangkat</th>
                            <th>Jabatan</th>
                            <th>Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr data-id="1">
                            <td>19661212 199403 1 008</td>
                            <td>Edy Winarya, S.Sn., M.Si</td>
                            <td>-</td>
                            <td>IV/c</td>
                            <td>Pembina Utama Muda</td>
                            <td>Kepala Dinas Kebudayaan (Kundha Kabudayan)</td>
                            <td>
            <a href="#" class="btn btn-info btn-sm" onclick="navigateTo('/detail-kenaikan')">Lihat Berkas</a>
        </td>
                        </tr>
                        <tr>
                            <td>987654321</td>
                            <td>Jane Smith</td>
                            <td>2023</td>
                            <td>III/c</td>
                            <td>Pengatur</td>
                            <td>Manager</td>
                            <td>  <a href="#" class="btn btn-info btn-sm" onclick="navigateTo('/detail-kenaikan')">Lihat Berkas</a></td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>