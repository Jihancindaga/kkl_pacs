<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penghapusan Kendaraan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #225fb9b7;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            display: inline-block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            th, td {
                padding: 10px;
                font-size: 14px;
            }
            
            a {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

    <h2>Daftar Kendaraan yang Dihapus</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Kendaraan</th>
                <th>Alasan</th>
                <th>Tanggal Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kode_kendaraan }}</td>
                    <td>{{ $item->alasan }}</td>
                    <td>{{ $item->tanggal_hapus }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="/pajak">Kembali ke Form Penghapusan</a>

</body>
</html>
