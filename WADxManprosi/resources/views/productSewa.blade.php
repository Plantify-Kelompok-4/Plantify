@extends('layouts.app')

@section('content')
<style>
    .card {
        transition: transform 0.2s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        border-bottom: 1px solid #eee;
    }
    .btn-primary:hover {
        background-color: #218838; 
    }
</style>
<div class="container py-2">
    <h1 class="text-center mb-5">Produk Sewa Kami</h1>
    
    <form method="GET" action="{{ route('sewa.search') }}" class="mb-4">
        <div class="input-group">
            <input type="text" id="searchSewa" name="search" class="form-control" placeholder="Cari produk sewa..." value="{{ request()->get('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    <div id="resultsSewa" class="row row-cols-1 row-cols-md-3 g-4">
        @if($sewa->isEmpty())
            <div class="col-12 text-center">
                <p>Tidak ada hasil ditemukan untuk pencarian "<strong>{{ request()->get('search') }}</strong>".</p>
            </div>
        @else
            @foreach($sewa as $s)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ Storage::url($s->gambar) }}" class="card-img-top" alt="{{ $s->nama_sewa }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $s->nama_sewa }}</h5>
                        <p class="card-text">Rp {{ number_format($s->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('sewa.show', $s->id) }}" class="btn btn-primary" style="background-color: #28a745;">Lihat Detail</a>
                        <a href="{{ route('carts.add', ['type' => 'sewa', 'id' => $s->id]) }}" class="btn btn-primary" style="background-color: #28a745;">Tambahkan ke Keranjang</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
