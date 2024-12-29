@extends('layouts.app')

@section('content')
<div class="container py-2">
    <h1 class="text-center mb-5">{{ $pupuk->nama_pupuk }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2" style="width: 75%;">
                <img src="{{ Storage::url($pupuk->gambar) }}" class="card-img-top" alt="{{ $pupuk->nama_pupuk }}">
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($pupuk->harga, 0, ',', '.') }}</h5>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p class="mb-1"><strong>Stok:</strong> {{ $pupuk->stok }}</p>
            <p class="mb-1"><strong>Deskripsi:</strong> {{ $pupuk->deskripsi }}</p>
            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="{{ $pupuk->stok }}" value="1" class="form-control" style="width: 100px;">
            </div>
        </div>
    </div>
</div>
@endsection 