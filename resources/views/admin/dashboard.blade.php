<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            background-image: url('/images/batik_megamendung.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.05;
            z-index: -1;
        }

        .container-wrapper {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            display: flex;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .logo-container {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35%;
            height: auto;
            padding: 10px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .form-container {
            padding: 40px;
            width: 65%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #12457c;
            font-weight: bold;
        }

        .form-container p {
            margin-bottom: 5px;
            font-weight: bold;
            color: #12457c;
        }

        .form-control {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .password-container {
            position: relative;
        }

        .password-container input[type="password"],
        .password-container input[type="text"] {
            padding-right: 45px;
        }

        .password-container .toggle-password {
            position: absolute;
            top: 70%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #5b065e;
            transition: color 0.3s ease;
        }

        .password-container .toggle-password:hover {
            color: #b849a0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px;
            border-radius: 25px;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container-wrapper">
        <div class="logo-container">
            <img src="{{ asset('/images/logo_pacs.jpg') }}" alt="Logo" class="img-fluid">
        </div>

        <div class="form-container">
            <h2>Admin Login</h2>

            <!-- Menampilkan pesan error -->
            @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first('nip') }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <p>NIP</p>
                    <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                </div>
                <div class="form-group password-container">
                    <p>KATA SANDI</p>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.querySelector('.toggle-password i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>