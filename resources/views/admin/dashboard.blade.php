<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container-wrapper {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            overflow: hidden;
        }
        .logo-container {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40%;
        }
        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* memastikan gambar mengisi seluruh container tanpa terdistorsi */
        }
        .form-container {
            padding: 30px;
            width: 60%;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <!-- Container Kiri: Logo -->
        <div class="logo-container">
            <img src="{{ asset('/images/logo_pacs.jpg') }}" alt="Logo" class="img-fluid">
        </div>

        <!-- Container Kanan: Form Login -->
        <div class="form-container">
            <h2>Admin Login</h2>
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <p>NIP</p>
                    <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                </div>
                <div class="form-group">
                    <p>KATA SANDI</p>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Katasandi" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
