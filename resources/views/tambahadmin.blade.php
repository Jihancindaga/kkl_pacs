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
            max-width: 600px;
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

        .form-container .error-message {
            color: red;
            display: none;
        }

        /* Pop-Up styles */
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 300px;
        }

        .popup-content button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validatePassword() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var errorMessage = document.getElementById('error-message');

            if (password !== confirmPassword) {
                errorMessage.style.display = 'block';
                return false; // Jangan kirim form jika password tidak cocok
            } else {
                errorMessage.style.display = 'none';
                return true; // Lanjutkan pengiriman form
            }
        }

        function showPopup() {
            var popup = document.getElementById('success-popup');
            popup.style.display = 'flex'; // Tampilkan pop-up
        }

        function hidePopup() {
            var popup = document.getElementById('success-popup');
            popup.style.display = 'none'; // Sembunyikan pop-up
            window.location.href = "{{ route('admin.list') }}"; // Alihkan ke halaman daftar admin
        }

        async function handleSubmit(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            if (validatePassword()) {
                const form = event.target;

                // Mengirim data ke server
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Menyertakan token CSRF
                    },
                });

                if (response.ok) {
                    // Jika data berhasil ditambahkan
                    showPopup();
                } else {
                    // Menangani kesalahan jika diperlukan
                    alert("Terjadi kesalahan saat menambahkan admin.");
                }
            }
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <button class="back-button" onclick="history.back()">
            <i class="fas fa-arrow-left"></i> 
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
        </div>
        <button class="logout">Logout</button>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <h2>Tambah Admin Baru</h2>
        <form action="{{ route('admin.store') }}" method="POST" onsubmit="handleSubmit(event)">
            @csrf
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" required>
            @if($errors->has('nip'))
                <div style="color:red;">
                    {{ $errors->first('nip') }}
                </div>
            @endif

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

            <div class="error-message" id="error-message">Password tidak cocok.</div>

            <button type="submit">Simpan</button>
            <button type="button" class="cancel-button" onclick="history.back()">Kembali</button>
        </form>
    </div>

    <!-- Pop-Up -->
    <div class="popup" id="success-popup">
        <div class="popup-content">
            <h3>Admin Baru Berhasil Ditambahkan!</h3>
            <button onclick="hidePopup()">OK</button>
        </div>
    </div>
    
</body>

</html>