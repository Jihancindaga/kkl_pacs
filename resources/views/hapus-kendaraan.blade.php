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
            padding: 20px;
        }

        nav {
            background-color: #0d6efd;
            color: white;
            padding: 10px; /* Padding hanya di atas dan bawah */
            display: flex;
            align-items: center;
            position: fixed; /* Agar tetap di atas saat di-scroll */
            width: 100%; /* Agar memenuhi lebar halaman */
            top: 0; /* Menempatkan navbar di bagian atas */
            z-index: 1000; /* Menjaga navbar di atas elemen lain */
        }

        .back-icon {
            font-size: 20px;
            cursor: pointer;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 80px; /* Tambahkan margin top untuk memberi ruang setelah navbar */
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            transition: box-shadow 0.3s ease;
        }

        form:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        select,
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        select:focus,
        textarea:focus,
        input[type="date"]:focus {
            border-color: #ff0022;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #ff0022;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #f70b2a;
            transform: translateY(-2px);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="back-icon">
            <a href="/pajak"><i class="fas fa-arrow-left" style="color: white;"></i></a>
        </div>
    </nav>

    <h2>Form Penghapusan Kendaraan</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('hapus.kendaraan.store') }}" method="POST">
        @csrf
        <div>
            <label for="kode_kendaraan">Pilih Kendaraan</label>
            <select id="kode_kendaraan" name="kode_kendaraan" required>
                <option value="">-- Pilih Kendaraan --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->kode_kendaraan }}">{{ $vehicle->kode_kendaraan }} | {{ $vehicle->jenis_kendaraan }} | {{ $vehicle->plat }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="alasan">Alasan Penghapusan</label>
            <textarea id="alasan" name="alasan" placeholder="Masukkan alasan penghapusan kendaraan..." required></textarea>
        </div>
        {{-- <div>
            <label for="tanggal-hapus">Tanggal Penghapusan</label>
            <input type="date" id="tanggal-hapus" name="tanggal_hapus" required>
        </div> --}}
        <button type="submit">Hapus</button>
    </form>
    
    <a href="{{ route('daftar.hapus.kendaraan') }}">Lihat Daftar Kendaraan yang Dihapus</a>

</body>
</html>
