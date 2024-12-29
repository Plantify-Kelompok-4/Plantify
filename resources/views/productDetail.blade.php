@extends('layouts.app')

@section('content')
<div class="container py-2">
    <h1 class="text-center mb-5">{{ $alat->nama_alat }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2" style="width: 75%;">
                <img src="{{ Storage::url($alat->gambar) }}" class="card-img-top" alt="{{ $alat->nama_alat }}">
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($alat->harga, 0, ',', '.') }}</h5>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p class="mb-1"><strong>Stok:</strong> {{ $alat->stok }}</p>
            <p class="mb-1"><strong>Deskripsi:</strong> {{ $alat->deskripsi }}</p>
            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="{{ $alat->stok }}" value="1" class="form-control" style="width: 100px;">
            </div>
        </div>
    </div>
</div>
@endsection