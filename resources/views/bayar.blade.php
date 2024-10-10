<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran Pajak Kendaraan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 70px;
            /* Sesuaikan dengan tinggi navbar */
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            padding: 10px 15px;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }
        .navbar .logo img {
            height: 40px;
            position: relative;
            left: -10px; /* Ubah nilainya sesuai kebutuhan */
        }

        .back-icon {
            font-size: 30px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .back-icon:hover {
            color: #e0e0e0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto;
        }

        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-header h3 {
            color: #000000;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .alert-custom {
            border-radius: 5px;
        }

        .file-preview img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }

        .readonly-field {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top">
        <a href="{{ route('pajak') }}" class="back-icon">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div class="logo">
            <img src="/images/pacs.png" alt="Logo">
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <!-- Header -->
            <div class="form-header">
                <h3>Form Pembayaran Pajak Kendaraan</h3>
            </div>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Pesan Error Validasi -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Pembayaran -->
            <form action="{{ route('bayar.store', $vehicle->id) }}" method="POST" enctype="multipart/form-data" id="bayarForm">
                @csrf
                <input type="hidden" name="id_vehicles" value="{{ $vehicle->id }}">

                <!-- Data Kendaraan Readonly -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kode_kendaraan" class="form-label">Kode Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="kode_kendaraan"
                            name="kode_kendaraan" value="{{ $vehicle->kode_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="plat" class="form-label">Plat</label>
                        <input type="text" class="form-control readonly-field" id="plat"
                            value="{{ $vehicle->plat }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="jenis_kendaraan"
                            value="{{ $vehicle->jenis_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pengguna" class="form-label">Pengguna</label>
                        <input type="text" class="form-control readonly-field" id="pengguna"
                            value="{{ $vehicle->pengguna }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="waktu_pajak" class="form-label">Waktu Pajak (Mendatang)</label>
                        <input type="text" class="form-control readonly-field" id="waktu_pajak"
                            value="{{ $vehicle->waktu_pajak }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="ganti_plat" class="form-label">Ganti Plat</label>
                        <input type="text" class="form-control readonly-field" id="ganti_plat"
                            value="{{ $vehicle->ganti_plat }}" readonly>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="usia_kendaraan" class="form-label">Usia Kendaraan (Tahun)</label>
                        <input type="text" class="form-control readonly-field" id="usia_kendaraan"
                            value="{{ $vehicle->usia_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="cc" class="form-label">CC Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="cc"
                            value="{{ $vehicle->cc }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control readonly-field" id="nomor_telepon"
                            value="{{ $vehicle->nomor_telepon }}" readonly>
                    </div>
                </div>

                <hr>

                <!-- Detail Pembayaran -->
                <h5 class="mb-3">Detail Pembayaran</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar"
                            value="{{ old('tanggal_bayar') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="total_bayar" class="form-label">Total Bayar (Rp)</label>
                        <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                            value="{{ old('total_bayar') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                        accept=".pdf, .jpg, .jpeg, .png" required>
                    <div class="form-text">Format yang diperbolehkan: PDF, JPG, JPEG, PNG. Maksimal ukuran file: 5MB.
                    </div>
                    <div class="file-preview" id="file-preview"></div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="confirmation" name="confirmation" required>
                    <label class="form-check-label" for="confirmation">Saya menyatakan bahwa data di atas adalah benar.</label>
                </div>

                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Menampilkan preview file
        document.getElementById('bukti_pembayaran').addEventListener('change', function (event) {
            const filePreview = document.getElementById('file-preview');
            filePreview.innerHTML = '';

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    filePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
