@extends('layouts.app')

@section('content')
<style>
    .btn-primary {
        background-color: #28a745;
        color: white;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #218838;
    }
</style>
<div class="container py-2">
    <h1 class="text-center mb-5">{{ $pupuk->nama_pupuk }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-2" style="width: 75%;">
                <img src="{{ Storage::url($pupuk->gambar) }}" class="card-img-top" alt="{{ $pupuk->nama_pupuk }}">
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($pupuk->harga, 0, ',', '.') }}</h5>
                    <form action="{{ route('carts.add', ['type' => 'pupuk', 'id' => $pupuk->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="{{ $pupuk->stok }}" value="1" class="form-control" style="width: 100px;">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p class="mb-1"><strong>Stok:</strong> {{ $pupuk->stok }}</p>
            <p class="mb-1"><strong>Deskripsi:</strong> {{ $pupuk->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection 