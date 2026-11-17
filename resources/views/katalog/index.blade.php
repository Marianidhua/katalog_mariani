<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Kasir Ende</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        /* Header Gelap Elegan */
        .header {
            background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
            color: #ffffff;
            padding: 20px 0;
            box-shadow: 0 4px 12px rgba(6, 78, 59, 0.15);
        }

        .header-inner {
            max-width: 1050px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.5px;
            color: #ffffff;
            text-decoration: none;
        }

        .nav-link {
            color: #d1fae5;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.12);
            padding: 6px 14px;
            border-radius: 20px;
        }

        /* Kontainer Utama */
        .container {
            max-width: 1050px;
            margin: 32px auto;
            padding: 0 20px;
        }

        /* Bagian Judul & Pencarian */
        .top-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 28px;
        }

        .title-area h1 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .title-area p {
            color: #64748b;
            font-size: 14px;
            margin-top: 4px;
        }

        .search-box {
            display: flex;
            gap: 8px;
        }

        .search-box input {
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            width: 240px;
            font-size: 14px;
            background: #ffffff;
        }

        .search-box input:focus {
            outline: 2px solid #059669;
            border-color: #059669;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-cari {
            background-color: #059669;
            color: #ffffff;
        }

        .btn-cari:hover {
            background-color: #047857;
        }

        .btn-reset {
            background-color: #e2e8f0;
            color: #334155;
        }

        /* Grid Kartu Produk (Beda dari Tabel Biasa) */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .category-tag {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background-color: #f1f5f9;
            color: #475569;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .stock-badge {
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .in-stock {
            background-color: #dcfce7;
            color: #166534;
        }

        .out-stock {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .product-name {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .product-price {
            font-size: 20px;
            font-weight: 800;
            color: #059669;
            margin-bottom: 18px;
        }

        .btn-detail {
            display: block;
            text-align: center;
            padding: 9px;
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.15s;
        }

        .btn-detail:hover {
            background-color: #059669;
            border-color: #059669;
            color: #ffffff;
        }

        .empty-box {
            grid-column: 1 / -1;
            background: #ffffff;
            padding: 48px;
            text-align: center;
            border-radius: 12px;
            border: 1px dashed #cbd5e1;
            color: #64748b;
            font-size: 15px;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="header-inner">
            <a href="/katalog" class="brand">KASIR ENDE</a>
            <a href="/katalog" class="nav-link">Katalog Toko</a>
        </div>
    </header>

    <main class="container">
        <div class="top-bar">
            <div class="title-area">
                <h1>Katalog Produk</h1>
                <p>Daftar harga dan ketersediaan stok barang terkini</p>
            </div>

            <form action="{{ url()->current() }}" method="GET" class="search-box">
                <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-cari">Cari</button>
                @if(request('search'))
                    <a href="{{ url()->current() }}" class="btn btn-reset">Reset</a>
                @endif
            </form>
        </div>

        <div class="product-grid">
            @forelse ($produk as $item)
                <div class="product-card">
                    <div>
                        <div class="card-top">
                            <span class="category-tag">{{ $item['kategori'] ?? 'Umum' }}</span>
                            @if ($item['stok'] > 0)
                                <span class="stock-badge in-stock">Tersedia ({{ $item['stok'] }})</span>
                            @else
                                <span class="stock-badge out-stock">Habis</span>
                            @endif
                        </div>
                        <h2 class="product-name">{{ $item['nama'] }}</h2>
                        <div class="product-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                    </div>

                    <a href="{{ url()->current() }}/{{ $item['id'] }}" class="btn-detail">
                        Lihat Detail Produk →
                    </a>
                </div>
            @empty
                <div class="empty-box">
                    @if(request('search'))
                        Produk dengan kata kunci <strong>"{{ request('search') }}"</strong> tidak ditemukan.
                    @else
                        Belum ada produk yang tersedia di katalog.
                    @endif
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>
