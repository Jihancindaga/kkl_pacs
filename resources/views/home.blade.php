<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: all 0.3s;
            position: relative;
            /* Tambahkan posisi relatif */
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/batik_megamendung.jpg');
            /* Ganti dengan path gambar batik parijoto Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.05;
            /* Opacity 50% */
            z-index: -1;
            /* Membuat background di belakang konten */
        }

        .navbar {
            background-color: #007bff;
            /* Blue */
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logout {
            background-color: #f44336;
            /* Red */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 40px;
        }

        .navbar .hamburger {
            margin-left: 20px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background: #003366;
            /* Dark Blue */
            color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 20px;
            z-index: 1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 36px;
            color: #fff;
            cursor: pointer;
        }

        .sidebar .admin-info {
            text-align: center;
            padding: 15px;
            background-color: #002244;
            /* Even Darker Blue */
            margin-bottom: 20px;
            border-radius: 5px;
            border-bottom: 2px solid #001a33;
            /* Darkest Blue */
        }

        .sidebar .admin-info img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            border: 4px solid #fff;
        }

        .sidebar .admin-info h4 {
            margin: 10px 0;
            font-size: 22px;
            color: #fff;
        }

        .sidebar .admin-info p {
            font-size: 14px;
            color: #ddd;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #ddd;
            display: flex;
            align-items: center;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #002244;
            /* Even Darker Blue */
            color: #fff;
        }

        .sidebar .icon {
            margin-right: 15px;
            font-size: 20px;
        }

        .sub-buttons {
            display: none;
            padding-left: 20px;
        }

        .sub-buttons.show {
            display: block;
        }

        .sub-buttons a {
            display: block;
            background-color: #003366;
            /* Dark Blue */
            color: white;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .sub-buttons a:hover {
            background-color: #002244;
            /* Even Dark Blue */
        }

        /* Content styles */
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px);
            /* Fullscreen minus navbar height */
            gap: 20px;
            transition: margin-left 0.5s;
            padding: 20px;
        }

        .content.sidebar-open {
            margin-left: 250px;
            /* Same as sidebar width */
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            /* Larger width */
            transition: transform 0.3s;
        }

        .container:hover {
            transform: translateY(-10px);
            /* Add hover effect */
        }

        .container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .container button {
            background-color: #007bff;
            /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .container button:hover {
            background-color: #0056b3;
            /* Darker Blue */
        }

        #addAdminModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 15px 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1000;
            width: 320px;
            max-width: 90%;
            animation: fadeIn 0.3s ease;
        }

        #addAdminModal h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

        #addAdminForm {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 10px;
        }

        #addAdminForm label {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 2px;
            /* Jarak antara teks label dan kotak input */
            color: #444;
        }

        #addAdminForm input {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 13px;
            transition: all 0.2s;
            width: 100%;
        }

        #addAdminForm input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
            outline: none;
        }


        #addAdminForm input:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        #addAdminForm input,
        select {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 13px;
            transition: all 0.2s;
            width: 100%;
        }

        #addAdminForm .input-container {
            position: relative;
        }

        #addAdminForm i {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            transition: color 0.2s;
        }


        .container button:hover {
            background-color: #0056b3;
            /* Darker blue */
        }

        .container button:active {
            background-color: #000d1a !important;
            /* Lebih gelap untuk kontras */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.6);
            /* Bayangan lebih kuat */
            transform: scale(0.92);
            /* Sedikit mengecil */
        }

        #addAdminForm .error-message {
            color: #f44336;
            margin-top: -5px;
            margin-bottom: 5px;
            font-size: 12px;
            display: none;
            text-align: center;
        }

        #addAdminForm button {
            padding: 8px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
            margin-top: 6px;
        }

        #addAdminForm button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .container button:active {
            background-color: #001a33;
            /* Warna lebih gelap dari sidebar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            /* Efek bayangan lebih kuat */
            transform: scale(0.95);
            /* Efek sedikit mengecil */
        }



        #addAdminForm button[type="button"] {
            background-color: #f44336;
            margin-top: 4px;
        }

        #addAdminForm button[type="button"]:hover {
            background-color: #d32f2f;
        }

        /* Spacing for form elements and container */
        #addAdminForm {
            margin-bottom: 12px;
            /* Space between form fields and container */
        }

        /* Animation for modal fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -40%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        /* Responsive Design */
        @media (max-width: 400px) {
            #addAdminModal {
                width: 90%;
                padding: 10px 20px;
            }

            #addAdminForm button {
                font-size: 12px;
                padding: 7px;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <div class="hamburger" onclick="openNav()">&#9776;</div>
            <img src="/images/logo_sleman.jpeg" alt="Logo Sleman" style="height: 40px; margin-right: 5px; margin-left: 15px;"> <!-- Logo Sleman -->
            <img src="/images/logo_kundha_kabudayan.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 10px;">
            <img src="/images/logo_amikom.png" alt="Logo Kundha Kabudayan" style="height: 40px; margin-right: 5px; margin-left: 10px;">
            <img src="/images/pacs.png" alt="Logo PACS" style="height: 40px; margin-left: 470px;"> <!-- Logo PACS -->
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </div>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <span class="closebtn" onclick="closeNav()">&times;</span>

        <!-- Admin Biodata -->
        <div class="admin-info">
            <i class="fas fa-user-circle" style="font-size: 100px; color: #007bff;"></i> <!-- Ikon orang -->
            <h4>Admin</h4>
            <p>Administrator</p>
        </div>

        <a href="#" onclick="toggleSubMenu('subMenu1')"><span class="icon">&#128100;</span>Kelola Pengguna</a>
        <div class="sub-buttons" id="subMenu1">
            <a href="/tambahadmin">Tambah Admin</a>
            <a href="{{ route('admin.list') }}">Daftar Pengguna</a>
        </div>
    </div>

    </div>
    </div>

    <!-- Overlay background -->
    <div id="modalOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:999;"></div>

    <div id="mainContent" class="content">
        <!-- Container 1 -->
        <div class="container">
            <img src="/images/logo_kendaraan.jpg" alt="Image 1">
            <button onclick="navigateTo('/pajak')">Pemeliharaan Pajak Kendaraan</button>
        </div>

        <!-- Container 2 -->
        <div class="container">
            <img src="/images/logo_pegawai.jpg" alt="Image 2">
            <button onclick="navigateTo('/datakaryawan')">Kenaikan Gaji dan Pangkat Pegawai</button>
        </div>
    </div>

    <script>
        /* Open the sidebar */
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("mainContent").classList.add("sidebar-open");
        }

        /* Close the sidebar */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("mainContent").classList.remove("sidebar-open");
        }

        /* Toggle sub-menu visibility */
        function toggleSubMenu(subMenuId) {
            var subMenu = document.getElementById(subMenuId);
            if (subMenu.classList.contains('show')) {
                subMenu.classList.remove('show');
            } else {
                subMenu.classList.add('show');
            }
        }

        /* Navigate to a different page */
        function navigateTo(url) {
            window.location.href = url;
        }

        // Open the modal
        function openModal() {
            document.getElementById('addAdminModal').style.display = 'block';
            document.getElementById('modalOverlay').style.display = 'block';
        }

        // Close the modal
        function closeModal() {
            document.getElementById('addAdminModal').style.display = 'none';
            document.getElementById('modalOverlay').style.display = 'none';
        }
    </script>


</body>

</html>