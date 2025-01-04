@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Keranjang Belanja</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($cart) && !empty($cart))
        <div class="row">
            <div class="col-md-8">
                <h4>Daftar Produk</h4>
                <div class="row">
                    @foreach($cart as $id => $product)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ Storage::url($product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text">Harga: Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                                    <p class="card-text">Jumlah: <span id="quantity-{{ $id }}">{{ $product['quantity'] }}</span></p>
                                    <p class="card-text">Stok Tersedia: {{ $product['stock'] }}</p>
                                    <a href="{{ route('carts.remove', $id) }}" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-4 bg-light shadow-sm">
                    <h4 class="mb-4">Detail Pengiriman</h4>
                    <form method="POST" action="{{ route('checkout.process') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group">
                            <label for="address">Alamat:</label>
                            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan:</label>
                            <textarea id="message" name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="payment_method">Metode Pembayaran:</label>
                            <select id="payment_method" name="payment_method" class="form-control" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="transfer">Transfer Bank</option>
                                <option value="cod">Cash on Delivery</option>
                                <option value="credit_card">Kartu Kredit</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="shipping_method">Metode Pengiriman:</label>
                            <select id="shipping_method" name="shipping_method" class="form-control" required>
                                <option value="">Pilih Metode Pengiriman</option>
                                <option value="jne">JNE</option>
                                <option value="pos">Pos Indonesia</option>
                                <option value="gojek">Gojek</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-4">Checkout</button>
                    </form>

                    <h4 class="mt-4">Total Harga</h4>
                    <ul class="list-group" id="total-price-list">
                        @php
                            $total = 0;
                        @endphp
                        @foreach($cart as $id => $product)
                            @php
                                $total += $product['price'] * $product['quantity'];
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center" id="product-{{ $id }}">
                                {{ $product['name'] }} ({{ $product['quantity'] }}) 
                                <span id="price-{{ $id }}">Rp {{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Total</strong>
                            <strong id="total-price">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">Keranjang Anda kosong.</div>
    @endif
</div>

<script>
function validateForm() {
    return true; 
}
</script>
@endsection 