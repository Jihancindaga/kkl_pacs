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
            color: #007bff;
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
            background-color: #e9ecef; /* Warna lebih gelap untuk kolom readonly */
            border: 1px solid #ced4da; /* Border yang konsisten */
        }
        /* Navbar customization */
        .navbar-custom {
            background-color: #0d6efd; /* Biru Bootstrap */
        }
        .navbar-custom .navbar-brand {
            color: #ffffff;
        }
        .navbar-custom .navbar-brand:hover {
            color: #d1d1d1;
        }
        /* Icon customization */
        .navbar-custom .bi-arrow-left {
            font-size: 1.8rem;
            color: #ffffff;
            transition: color 0.3s ease, transform 0.3s ease;
            transform: scale(1.3); /* Memperbesar ikon untuk tampak lebih tebal */
        }
        .navbar-custom .bi-arrow-left:hover {
            color: #d1d1d1;
            transform: scale(1.4);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('pajak') }}" aria-label="Kembali ke halaman Pajak" title="Kembali">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
    </nav>
    
    <div class="container">
        <div class="form-container">
            <!-- Header -->
            <div class="form-header">
                <h3>Form Pembayaran Pajak Kendaraan</h3>
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
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
            <form action="{{ route('bayar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Menyembunyikan id_vehicles -->
                <input type="hidden" name="id_vehicles" value="{{ $vehicle->id }}">

                <!-- Data Kendaraan Readonly -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kode_kendaraan" class="form-label">Kode Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="kode_kendaraan" name="kode_kendaraan" value="{{ $vehicle->kode_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="plat" class="form-label">Plat</label>
                        <input type="text" class="form-control readonly-field" id="plat" value="{{ $vehicle->plat }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="jenis_kendaraan" value="{{ $vehicle->jenis_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pengguna" class="form-label">Pengguna</label>
                        <input type="text" class="form-control readonly-field" id="pengguna" value="{{ $vehicle->pengguna }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="waktu_pajak" class="form-label">Waktu Pajak (Mendatang)</label>
                        <input type="text" class="form-control readonly-field" id="waktu_pajak" value="{{ $vehicle->waktu_pajak }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="ganti_plat" class="form-label">Ganti Plat</label>
                        <input type="text" class="form-control readonly-field" id="ganti_plat" value="{{ $vehicle->ganti_plat }}" readonly>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="usia_kendaraan" class="form-label">Usia Kendaraan (Tahun)</label>
                        <input type="text" class="form-control readonly-field" id="usia_kendaraan" value="{{ $vehicle->usia_kendaraan }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="cc" class="form-label">CC Kendaraan</label>
                        <input type="text" class="form-control readonly-field" id="cc" value="{{ $vehicle->cc }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control readonly-field" id="nomor_telepon" value="{{ $vehicle->nomor_telepon }}" readonly>
                    </div>
                </div>

                <hr>

                <!-- Detail Pembayaran -->
                <h5 class="mb-3">Detail Pembayaran</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="{{ old('tanggal_bayar') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="total_bayar" class="form-label">Total Bayar (Rp)</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" value="{{ old('total_bayar') }}" required>
                    </div>
                </div>

                <hr> 
                <div class="form-group">
                    <label for="waktu_pajak">Waktu Pajak Berikutnya</label>
                    <input type="date" name="waktu_pajak" class="form-control" value="{{ old('waktu_pajak', $vehicle->waktu_pajak) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept=".pdf, .jpg, .jpeg, .png" required>
                    <div class="form-text">Format yang diperbolehkan: PDF, JPG, JPEG, PNG. Maksimal ukuran file: 2MB.</div>
                    <!-- Preview File -->
                    <div class="file-preview" id="file-preview"></div>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="konfirmasi_pembayaran" name="konfirmasi_pembayaran" {{ old('konfirmasi_pembayaran') ? 'checked' : '' }} required>
                    <label class="form-check-label" for="konfirmasi_pembayaran">Saya mengkonfirmasi bahwa semua informasi yang diberikan adalah benar.</label>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preview file
        document.getElementById('bukti_pembayaran').addEventListener('change', function() {
            const filePreview = document.getElementById('file-preview');
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;
                    filePreview.innerHTML = ''; // Clear previous preview
                    filePreview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
