<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Tambah Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar styles */
        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar h1 {
            font-size: 20px;
            margin: 0;
        }

        .navbar .logout {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .navbar .back-button {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .navbar .back-button i {
            margin-right: 5px;
        }

        /* Container for form */
        .form-container {
            background-color: white;
            max-width: 600px; /* Meningkatkan ukuran container */
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-container label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-container input,
        .form-container select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container input:focus,
        .form-container select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .form-container button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .cancel-button {
            background-color: #f44336;
        }

        .form-container .cancel-button:hover {
            background-color: #d32f2f;
        }
    </style>
    <script>
        function showAlert() {
            // Tampilkan alert
            alert("Admin baru berhasil ditambahkan.");
            // Alihkan ke halaman daftar admin setelah menekan OK
            window.location.href = "{{ route('admin.list') }}"; // Ganti dengan route ke daftar admin
        }
    </script>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <button class="back-button" onclick="history.back()">
            <i class="fas fa-arrow-left"></i> Kembali
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
            <h1>Dashboard Admin</h1>
        </div>
        <button class="logout">Logout</button>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <h2>Tambah Admin Baru</h2>
        <form action="{{ route('admin.store') }}" method="POST" onsubmit="showAlert()">
            @csrf
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" required>
            
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="no_telp">Nomor Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Konfirmasi Password:</label>
            <input type="password" id="confirm_password" required>

            <div class="error-message" id="error-message" style="color:red; display:none;">Password tidak cocok.</div>

            <button type="submit">Simpan</button>
            <button type="button" class="cancel-button" onclick="history.back()">Batal</button>
        </form>
    </div>

</body>

</html>
