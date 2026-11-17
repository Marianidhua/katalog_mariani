<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Kasir Ende</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { margin: 0; background-color: #f3f4f6; color: #1f2937; }
        
        /* Navbar Atas */
        .navbar { background-color: #2563eb; padding: 14px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .navbar-container { max-width: 960px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; gap: 24px; }
        .navbar a { color: #ffffff; text-decoration: none; font-size: 15px; }
        .navbar a.brand { font-size: 19px; font-weight: bold; }
        .navbar a:hover { text-decoration: underline; }

        /* Container & Kartu Utama */
        .container { max-width: 960px; margin: 30px auto; padding: 0 20px; }
        .card { background: #ffffff; border-radius: 10px; padding: 28px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        
        /* Judul */
        h1 { margin: 0 0 6px 0; font-size: 26px; color: #111827; }
        .subtitle { margin: 0 0 24px 0; color: #6b7280; font-size: 14px; }

        /* Form Pencarian */
        .search-form { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-bottom: 24px; }
        .search-form label { font-weight: 600; font-size: 14px; }
        .search-form input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; width: 250px; }
        .search-form input:focus { outline: none; border-color: #2563eb; }
        .btn { padding: 8px 16px; border: none; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; text-decoration: none; }
        .btn-primary { background-color: #2563eb; color: #ffffff; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-reset { background-color: #e5e7eb; color: #374151; }
        .btn-reset:hover { background-color: #d1d5db; }

        /* Tabel Produk */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        thead { background-color: #eff6ff; border-bottom: 2px solid #bfdbfe; }
        th { text-align: left; padding: 12px 15px; font-size: 14px; color: #1e40af; }
        td { padding: 12px 15px; border-bottom: 1px solid #e5e7eb; font-size: 14px; }
        tbody tr:hover { background-color: #f9fafb; }
        
        /* Link Produk & Badge */
        .product-link { color: #2563eb; font-weight: 600; text-decoration: none; }
        .product-link:hover { text-decoration: underline; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .badge-kategori { background-color: #f3f4f6; color: #374151; }
        .badge-tersedia { background-color: #dcfce7; color: #166534; }
        .badge-habis { background-color: #fee2e2; color: #991b1b; }
        .empty-state { text-align: center; padding: 30px; color: #6b7280; }
    </style>
</head>
<body>
    <!-- Navbar Atas -->
    <nav class="navbar">
        <div class="navbar-container">
            <a class="brand" href="/katalog">Kasir Ende</a>
            <a href="/katalog">Katalog</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <div class="card">
            <h1>Katalog Produk</h1>
            <p class="subtitle">Harga dan stok toko</p>

            <!-- Form Pencarian -->
            <form action="{{ url()->current() }}" method="GET" class="search-form">
                <label for="search">Nama produk</label>
                <input type="text" id="search" name="search" placeholder="Cari nama produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
                @if(request('search'))
                    <a href="{{ url()->current() }}" class="btn btn-reset">Reset</a>
                @endif
            </form>

            <!-- Tabel Produk -->
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $item)
                        <tr>
                            <td>
                                <a href="{{ url()->current() }}/{{ $item['id'] }}" class="product-link">
                                    {{ $item['nama'] }}
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-kategori">{{ $item['kategori'] ?? 'Umum' }}</span>
                            </td>
                            <td style="font-weight: 600;">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </td>
                            <td>
                                @if ($item['stok'] > 0)
                                    <span class="badge badge-tersedia">Tersedia ({{ $item['stok'] }})</span>
                                @else
                                    <span class="badge badge-habis">Habis</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">
                                @if(request('search'))
                                    Produk "{{ request('search') }}" tidak ditemukan.
                                @else
                                    Belum ada produk.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
