@extends('layouts.app')

@section('title', 'Detail Produk')
@section('header', 'Detail Produk')

@section('content')
    @if ($product)
        <div class="card shadow-sm" style="max-width: 500px;">
            <div class="card-body p-4">
                <h3 class="card-title fw-bold mb-3">{{ $product['nama'] }}</h3>
                <p class="fs-4 text-primary fw-bold mb-2">
                    Rp{{ number_format($product['harga'], 0, ',', '.') }}
                </p>
                <p class="mb-3">
                    @if ($product['stok'] > 0)
                        <span class="badge bg-success">Stok tersedia ({{ $product['stok'] }})</span>
                    @else
                        <span class="badge bg-danger">Status: HABIS</span>
                    @endif
                </p>
                <p class="text-muted mb-4">{{ $product['deskripsi'] }}</p>
                <a href="/products" class="btn btn-secondary">Kembali ke Katalog</a>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            Produk dengan ID tersebut tidak ditemukan.
            <br><a href="/products" class="btn btn-sm btn-outline-danger mt-2">Kembali ke Katalog</a>
        </div>
    @endif
@endsection
