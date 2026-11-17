<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $item['nama'] ?? 'Produk' }} - Kasir Ende</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body {
            background-color: #f3f6f8;
            color: #1e293b;
        }
        /* Navbar Hijau */
        .navbar {
            background-color: #0b6e4f;
            color: white;
            padding: 16px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            color: white;
            text-decoration: none;
        }
        .navbar-badge {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            color: white;
            text-decoration: none;
        }
        /* Container Utama */
        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 0 20px;
        }
        /* Kartu Detail Produk */
        .detail-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
            border: 1px solid #e2e8f0;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        .category-badge {
            background-color: #f1f5f9;
            color: #475569;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .stock-badge {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 5px 12px;
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
        .product-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }
        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0b6e4f;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        /* Tabel Informasi Spesifikasi */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 30px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
        }
        .info-label {
            color: #64748b;
            font-weight: 500;
        }
        .info-value {
            color: #1e293b;
            font-weight: 600;
        }
        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 12px 20px;
            background-color: white;
            color: #334155;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }
        .btn-back:hover {
            background-color: #f8fafc;
            border-color: #94a3b8;
            color: #0f172a;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/katalog') }}" class="navbar-brand">KASIR ENDE</a>
        <a href="{{ url('/katalog') }}" class="navbar-badge">Katalog Toko</a>
    </nav>

    <main class="container">
        <div class="detail-card">
            <div class="card-header">
                <span class="category-badge">{{ $item['kategori'] ?? 'UMUM' }}</span>
                
                @if (($item['stok'] ?? 0) > 0)
                    <span class="stock-badge in-stock">Tersedia ({{ $item['stok'] }})</span>
                @else
                    <span class="stock-badge out-stock">Habis</span>
                @endif
            </div>

            <h1 class="product-title">{{ $item['nama'] }}</h1>
            <div class="product-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>

            <div class="info-list">
                <div class="info-row">
                    <span class="info-label">Kategori Produk</span>
                    <span class="info-value">{{ $item['kategori'] ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status Ketersediaan</span>
                    <span class="info-value">
                        {{ ($item['stok'] ?? 0) > 0 ? $item['stok'] . ' unit tersedia' : 'Stok sedang kosong' }}
                    </span>
                </div>
            </div>

            <a href="{{ url('/katalog') }}" class="btn-back">&larr; Kembali ke Katalog</a>
        </div>
    </main>

</body>
</html>
