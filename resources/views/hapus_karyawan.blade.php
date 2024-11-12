<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Karyawan</title>
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
            max-width: 600px;
            /* Perkecil ukuran container */
            margin: auto;
        }

        .container h2 {
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            color: #0056b3;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            font-size: 16px;
            align-items: center;
            /* Pusatkan form di tengah */
        }

        form div {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        form label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="date"],
        form textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="date"]:focus,
        form textarea:focus {
            border-color: #007bff;
            height: 100px;
            resize: vertical;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }


        button[type="submit"],
        .btn-secondary {
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        button[type="submit"]:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
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

    <div class="content">
        <div class="container">
            <h2>Hapus Data Karyawan</h2>

            <hr>

            <form action="{{ route('karyawan.hapus', $karyawan->id) }}" method="POST">
                @csrf
                <div>
                    <label for="nip">NIP:</label>
                    <input type="text" id="nip" name="nip" value="{{ $karyawan->nip }}" readonly>
                </div>
                <div>
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="{{ $karyawan->nama }}" readonly>
                </div>
                <div>
                    <label for="alasan">Alasan Penghapusan:</label>
                    <textarea type="text" id="alasan" name="alasan" required></textarea>
                </div>
                <div>
                    <label for="tanggal_penghapusan">Tanggal Penghapusan:</label>
                    <input type="date" id="tanggal_penghapusan" name="tanggal_penghapusan" required>
                </div>
                <button type="submit">Hapus</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }

        $('#nip').change(function() {
            var selectedNIP = $(this).val();
            var nama = $(this).find(':selected').text().split(' - ')[1];
            $('#nama').val(nama || '');
        });
    </script>
    <script>
        // Fungsi untuk mengatur tombol aktif
        function setActive(button, url) {
            // Mengambil semua tombol dalam grup tombol
            const buttons = document.querySelectorAll('.button-group .btn');

            // Menghapus kelas 'active' dari semua tombol
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Menambahkan kelas 'active' ke tombol yang dipilih
            button.classList.add('active');

            // Mengarahkan ke URL yang ditentukan
            navigateTo(url);
        }

        // Fungsi untuk navigasi ke halaman lain
        function navigateTo(page) {
            window.location.href = page;
        }

        // Fungsi untuk menampilkan atau menyembunyikan detail (Jika diperlukan)
        function toggleDetails(id) {
            const detailsRow = document.getElementById('details-' + id);
            detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
</body>

</html>