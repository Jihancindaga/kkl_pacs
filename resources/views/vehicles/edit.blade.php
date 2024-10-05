<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .form-control-file {
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .checkbox-label {
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .back-icon {
            font-size: 24px;
            color: #007bff;
            text-decoration: none;
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .back-icon:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('vehicles.index') }}" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h2>Edit Data Kendaraan</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.update', $vehicle->plat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                <input type="text" name="jenis_kendaraan" class="form-control" value="{{ old('jenis_kendaraan', $vehicle->jenis_kendaraan) }}" required readonly>
            </div>

            <div class="form-group">
                <label for="pengguna">Pengguna</label>
                <input type="text" name="pengguna" class="form-control" value="{{ old('pengguna', $vehicle->pengguna) }}" required>
            </div>

            <div class="form-group">
                <label for="plat">Plat</label>
                <input type="text" name="plat" class="form-control" value="{{ old('plat', $vehicle->plat) }}" required >
            </div>

            <div class="form-group">
                <label for="waktu_pajak">Waktu Pajak</label>
                <input type="date" name="waktu_pajak" class="form-control" value="{{ old('waktu_pajak', $vehicle->waktu_pajak) }}" required>
            </div>

            <div class="form-group">
                <label for="ganti_plat">Ganti Plat</label>
                <input type="date" name="ganti_plat" class="form-control" value="{{ old('ganti_plat', $vehicle->ganti_plat) }}" required>
            </div>

            <div class="form-group">
                <label for="usia_kendaraan">Usia Kendaraan</label>
                <input type="number" name="usia_kendaraan" class="form-control" value="{{ old('usia_kendaraan', $vehicle->usia_kendaraan) }}" required>
            </div>

            <div class="form-group">
                <label for="cc">CC</label>
                <input type="number" name="cc" class="form-control" value="{{ old('cc', $vehicle->cc) }}" required>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $vehicle->nomor_telepon) }}">
            </div>

            <div class="form-group d-flex justify-content-start">
    <form action="{{ route('vehicles.update', $vehicle->plat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary mx-1">Update</button>
    </form>
    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary mx-1">Batal</a>
</div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
