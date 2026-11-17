<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Ende')</title>
    <!-- Memanggil Bootstrap 5 agar tampilan modern dan rapi -->
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar Atas -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/katalog">Kasir Ende</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="/katalog">Katalog</a>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container pb-5">
        @yield('content')
    </div>
</body>
</html>
