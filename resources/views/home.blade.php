<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: all 0.3s;
        }
        .navbar {
            background-color: #007bff; /* Blue */
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logout {
            background-color: #f44336; /* Red */
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
            background: #003366; /* Dark Blue */
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
            background-color: #002244; /* Even Darker Blue */
            margin-bottom: 20px;
            border-radius: 5px;
            border-bottom: 2px solid #001a33; /* Darkest Blue */
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
            background-color: #004080; /* Medium Blue */
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
            background-color: #002244; /* Even Darker Blue */
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
            background-color: #003366; /* Dark Blue */
        }

        /* Content styles */
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px); /* Fullscreen minus navbar height */
            gap: 20px;
            transition: margin-left 0.5s;
            padding: 20px;
        }
        .content.sidebar-open {
            margin-left: 250px; /* Same as sidebar width */
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px; /* Larger width */
            transition: transform 0.3s;
        }
        .container:hover {
            transform: translateY(-10px); /* Add hover effect */
        }
        .container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .container button {
            background-color: #007bff; /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .container button:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <div class="hamburger" onclick="openNav()">&#9776;</div>
            <img src="/images/pacs.png" alt="Logo">
        </div>
        <button class="logout">Logout</button>
    </div>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <span class="closebtn" onclick="closeNav()">&times;</span>

        <!-- Admin Biodata -->
        <div class="admin-info">
            <img src="https://via.placeholder.com/100" alt="Admin Photo">
            <h4>Admin Name</h4>
            <p>Administrator</p>
        </div>

        <a href="#" onclick="toggleSubMenu('subMenu1')"><span class="icon">&#128100;</span>Kelola Pengguna</a>
        <div class="sub-buttons" id="subMenu1">
            <a href="#">Tambah</a>
        </div>
    </div>

    <div id="mainContent" class="content">
        <!-- Container 1 -->
        <div class="container">
            <img src="/images/logo_kendaraan.jpg" alt="Image 1">
            <button onclick="navigateTo('/pajak')">Pemeliharaan Pajak Kendaraan</button>
        </div>

        <!-- Container 2 -->
        <div class="container">
            <img src="/images/logo_pegawai.jpg" alt="Image 2">
            <button onclick="alert('Kenaikan Gaji dan Pangkat Pegawai')">Kenaikan Gaji dan Pangkat Pegawai</button>
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
    </script>

</body>
</html>
