<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Styling for readonly inputs */
        input[readonly] {
            background-color: #e9ecef; /* Light gray background */
            color: #495057; /* Darker text color */
            cursor: not-allowed; /* Indicate that it’s not editable */
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .back-icon {
            font-size: 24px;
            color: white; /* Mengubah warna ikon menjadi putih */
            text-decoration: none;
        }

        .back-icon:hover {
            color: #e0e0e0; /* Warna saat hover */
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .fa-arrow-left {
            margin-right: 5px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-light bg-primary fixed-top">
        <a href="{{ route('admin.list') }}" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-right: 520px;">
            <img src="/images/logo_amikom.png" alt="Logo AMIKOM" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 5px;">
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 10px;">
        </div>
        
    </nav>

    <div class="container">
        <h1>Edit Admin</h1>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('POST')
            <!-- Form Group for NIP -->
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" value="{{ $admin->nip }}" required readonly>
            </div>

            <!-- Form Group for Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $admin->nama }}" required>
            </div>

            <!-- Form Group for Jabatan -->
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" id="jabatan" name="jabatan" value="{{ $admin->jabatan }}" required>
            </div>

            <!-- Form Group for Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required>{{ $admin->alamat }}</textarea>
            </div>

            <!-- Form Group for No Telp -->
            <div class="form-group">
                <label for="no_telp">No. Telp:</label>
                <input type="tel" id="no_telp" name="no_telp" value="{{ $admin->no_telp }}" required>
            </div>

            <!-- Form Group for Jenis Kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required >
                    <option value="Laki-laki" {{ $admin->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $admin->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit"><i class="fas fa-save"></i> Update</button>
        </form>

        <!-- Back to List Link -->
        <a href="{{ route('admin.list') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

</body>
</html>