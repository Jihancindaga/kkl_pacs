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

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

    <div class="container">
        <h1>Edit Admin</h1>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('POST')

            <!-- Form Group for Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $admin->nama }}" required>
            </div>

            <!-- Form Group for NIP -->
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" value="{{ $admin->nip }}" required>
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
                <select id="jenis_kelamin" name="jenis_kelamin" required>
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