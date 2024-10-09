<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #007bff;
            /* Blue */
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

        .navbar .logout {
            background-color: #f44336;
            /* Red */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 15%;
            /* Lebar kolom NIP */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #007bff;
            /* Blue */
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            z-index: 1;
        }

        .home-button i {
            font-size: 20px;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        h1 {
            margin-top: 0;
            /* Menghilangkan margin atas */
            text-align: center;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            /* Menyelaraskan tombol ke kiri */
            gap: 10px;
            /* Jarak antar tombol */
        }

        .action-buttons button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 5px 10px;
            /* Padding tombol */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 12px;
            /* Font size lebih kecil */
            display: flex;
            align-items: center;
            gap: 5px;
            /* Jarak antara ikon dan teks */
        }

        .action-buttons form button {
            background-color: #dc3545;
            /* Warna merah */
        }

        .action-buttons form button:hover {
            background-color: #c82333;
        }

        .action-buttons button i {
            font-size: 14px;
            /* Ukuran ikon lebih kecil */
        }

        /* Box Pencarian */
        .search-box {
            display: flex;
            justify-content: center;
            /* Menyelaraskan box pencarian di tengah */
            margin-bottom: 20px;
            /* Jarak bawah box pencarian */
        }

        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            /* Lebar input pencarian */
        }
    </style>
</head>

<body>

    <div class="navbar">
        <button class="home-btn" onclick="navigateTo('/home')">
            <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow-left icon -->
        </button>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
        </div>
        <button type="button" class="logout"
            onclick="window.location.href='{{ url('admin/dashboard') }}'">Logout</button>
    </div>
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <h1>Daftar Pengguna</h1>

        <!-- Box Pencarian -->
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari pengguna...">
        </div>

        <table id="usersTable">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th> <!-- Kolom baru untuk tombol aksi -->
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
                        <td class="action-buttons">
                            <button onclick="window.location.href='{{ route('admin.edit', $admin->id) }}'">
                                <i class="fas fa-user-edit"></i> Edit Data Pokok
                            </button>
                            <button onclick="window.location.href='{{ route('admin.change_password', $admin->id) }}'">
                                <i class="fas fa-key"></i> Ubah Password
                            </button>
                            <form action="{{ route('admin.delete', $admin->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }

        // Fungsi Pencarian
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#usersTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(filter)) {
                        match = true;
                    }
                });
                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
