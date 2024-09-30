<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penghapusan Kendaraan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #007bff; /* Warna biru */
            color: #fff;
            padding: 15px 30px; 
            display: flex;
            justify-content: flex-start; /* Mengatur posisi konten ke kiri */
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo img {
            height: 40px;
        }

        .navbar .home-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .navbar .home-btn i {
            margin-right: 10px;
        }

        .navbar .home-btn:hover {
            color: #0056b3; /* Biru tua saat di-hover */
        }

        /* Form Container Styling */
        .form-container {
            background-color: #fff;
            padding: 30px; /* Menambah padding */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Membuat container lebih besar */
            width: 100%;
            margin: 100px auto 0 auto; /* Adjust margin to consider the fixed navbar */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px; /* Padding lebih besar */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: none;
            height: 120px; /* Lebih tinggi */
        }

        .form-group button {
            width: 100%;
            padding: 15px; /* Tombol lebih besar */
            background-color: #ff0022;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px; /* Font lebih besar */
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #f70b2a;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 10px 15px;
            }

            .navbar .logo img {
                height: 30px;
            }

            .form-container {
                margin: 80px auto 0 auto; /* Adjust form position for smaller screens */
                max-width: 90%; /* Sesuaikan dengan layar kecil */
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/pajak')">
            <i class="fas fa-arrow-left"></i>  <!-- Font Awesome arrow-left icon -->
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
        </div>
    </div>

    <!-- Form Penghapusan Kendaraan -->
    <div class="form-container">
        <h2>Penghapusan Kendaraan</h2>
        <form>
            <div class="form-group">
                <label for="alasan">Alasan Penghapusan</label>
                <textarea id="alasan" name="alasan" placeholder="Masukkan alasan penghapusan kendaraan..." required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal-hapus">Tanggal Penghapusan</label>
                <input type="date" id="tanggal-hapus" name="tanggal-hapus" required>
            </div>
            <div class="form-group" >
                <button type="submit">Hapus</button>
            </div>
        </form>
    </div>

    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>

</body>
</html>
