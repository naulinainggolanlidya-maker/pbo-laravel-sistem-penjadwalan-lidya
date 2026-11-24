
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - UKM Paduan Suara</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            color: #333;
        }

        header {
            background: #263b65;
            color: white;
            padding: 22px 7%;
        }

        header h2 {
            margin: 0;
        }

        nav {
            background: #fff;
            padding: 15px 7%;
            box-shadow: 0 2px 5px #ddd;
        }

        nav a {
            text-decoration: none;
            color: #263b65;
            margin-right: 22px;
            font-weight: bold;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }

        h2 {
            color: #263b65;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #263b65;
            color: white;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #263b65;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .success {
            padding: 12px;
            background: #d1fae5;
            color: #065f46;
            margin-bottom: 15px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <h2>UKM PADUAN SUARA</h2>
    <p>Sistem Informasi Penjadwalan Latihan</p>
</header>

<nav>
    <a href="{{ route('jadwal-latihan.index') }}">Beranda</a>
    <a href="{{ route('jadwal-latihan.create') }}">Tambah Jadwal</a>
</nav>

<main>
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

<footer>
    Sistem Penjadwalan UKM Paduan Suara
    &copy; {{ date('Y') }}
</footer>

</body>
</html>
