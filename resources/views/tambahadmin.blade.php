<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Styles Navbar */
        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .back-button {
            background: none;
            border: none;
            color: white;
            font-size: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        /* Styles Form Container */
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
            outline: none;
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

        /* Styles Pop-Up */
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .popup-content h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .popup-content button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .popup-content button:hover {
            background-color: #0056b3;
        }
        .container {
            padding: 20px;
            position: relative;
            max-width: 1000px;
            /* Membatasi lebar maksimum kontainer */
            margin: 80px auto 20px;
            /* Menambahkan margin atas untuk menghindari konflik dengan navbar */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

                /* Styles for Table */
        .table-container {
            max-width: 1000px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            text-align: left;
        }

        thead {
            background-color: #007bff;
            color: white;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
            text-align: center;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #eaeaea;
        }

        .table-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
                width: 100%;
            }
            
            thead {
                display: none;
            }

            tr {
                margin-bottom: 10px;
                border-bottom: 2px solid #ddd;
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 10px 5px;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #333;
                flex: 1;
                text-align: left;
            }
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <button class="back-button" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
    </div>
    <div class="table-container">
        <h2>Daftar Admin</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Kelamin</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->jabatan }}</td>
                    <td>{{ $admin->alamat }}</td>
                    <td>{{ $admin->no_telp }}</td>
                    <td>{{ $admin->jenis_kelamin }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Form Container -->
    <div class="form-container">
        <h2>Tambah Admin Baru</h2>
        <form action="{{ route('admin.store') }}" method="POST" onsubmit="handleSubmit(event)">
            @csrf
            <!-- NIP -->
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" required oninput="checkNIP()">
            <div id="nip-message" style="color:red; display:none;"></div>

            <!-- Nama -->
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <!-- Jabatan -->
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required>

            <!-- Alamat -->
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <!-- Nomor Telepon -->
            <label for="no_telp">Nomor Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" required>

            <!-- Jenis Kelamin -->
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <!-- Password -->
            <label for="password">Password: <span style="font-weight: lighter;">(Minimal 6 karakter)</span></label>
            <input type="password" id="password" name="password" required minlength="6">

            <!-- Konfirmasi Password -->
            <label for="confirm_password">Konfirmasi Password: <span style="font-weight: lighter;">(Minimal 6 karakter)</span></label>
            <input type="password" id="confirm_password" required minlength="6">

            <!-- Error Message -->
            <div class="error-message" id="error-message">Password tidak cocok.</div>

            <!-- Tombol Submit dan Cancel -->
            <button type="submit">Simpan</button>
            <button type="button" class="cancel-button" onclick="history.back()">Kembali</button>
        </form>
    </div>
  
    <!-- Pop-up Sukses -->
    <div class="popup" id="success-popup">
        <div class="popup-content">
            <h3>Admin Baru Berhasil Ditambahkan!</h3>
            <button onclick="hidePopup()">OK</button>
        </div>
    </div>

    <script>
        let nipExists = false; // Variabel untuk mengecek apakah NIP sudah ada

        // Fungsi untuk memvalidasi password
        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorMessage = document.getElementById('error-message');

            if (password !== confirmPassword) {
                errorMessage.style.display = 'block';
                return false;
            } else {
                errorMessage.style.display = 'none';
                return true;
            }
        }

        // Fungsi untuk menampilkan popup
        function showPopup() {
            const popup = document.getElementById('success-popup');
            popup.style.display = 'flex';
        }

        // Fungsi untuk menyembunyikan popup dan mengarahkan ke halaman daftar admin
        function hidePopup() {
            const popup = document.getElementById('success-popup');
            popup.style.display = 'none';
            // Gantilah URL di bawah ini sesuai dengan rute daftar admin Anda
            setTimeout(function () {
                window.location.href = "{{ route('admin.list') }}";
            }, 500);
        }

        // Fungsi untuk menangani submit form
        async function handleSubmit(event) {
            event.preventDefault(); // Mencegah form submit secara default

            if (nipExists) {
                alert("NIP ini sudah terdaftar. Harap gunakan NIP lain.");
                return;
            }

            if (validatePassword()) {
                const form = event.target;
                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });

                    if (response.ok) {
                        showPopup(); // Memunculkan popup ketika berhasil
                    } else {
                        const errorData = await response.json();
                        alert("Terjadi kesalahan: " + (errorData.message || "Tidak dapat menambahkan admin."));
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan saat menghubungi server.");
                }
            }
        }

        // Fungsi untuk memeriksa apakah NIP sudah terdaftar
        async function checkNIP() {
            const nip = document.getElementById('nip').value.trim();
            const message = document.getElementById('nip-message');

            if (nip.length === 0) {
                nipExists = false;
                message.style.display = 'none';
                return;
            }

            try {
                const response = await fetch(`/check-nip?nip=${encodeURIComponent(nip)}`, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.exists) {
                        nipExists = true;
                        message.style.display = 'block';
                        message.textContent = 'NIP ini sudah terdaftar sebagai admin. Harap gunakan NIP lain.';
                    } else {
                        nipExists = false;
                        message.style.display = 'none';
                    }
                } else {
                    console.error('Gagal memeriksa NIP.');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>
</body>

</html>
