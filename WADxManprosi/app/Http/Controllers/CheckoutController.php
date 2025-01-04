<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Checkout;
use App\Models\alatPertanian;
use App\Models\pupuk;
use App\Models\sewa;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Validasi input
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // Ambil keranjang pengguna
        $cart = Cart::where('user_id', auth()->id())->first();

        // Buat pembayaran
        $payment = Payment::create([
            'cart_id' => $cart->id,
            'amount' => $this->calculateTotal($cart->items),
            'payment_method' => $request->payment_method,
        ]);

        // Kosongkan keranjang setelah pembayaran
        $cart->items = json_encode([]);
        $cart->save();

        return response()->json(['message' => 'Checkout berhasil', 'payment' => $payment]);
    }

    public function process(Request $request)
    {
        // Validasi data
        $request->validate([
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'shipping_method' => 'required|string',
        ]);

        // Ambil data keranjang
        $cart = session('cart');

        // Cek apakah keranjang ada
        if (is_null($cart) || empty($cart)) {
            return redirect()->route('carts.index')->with('error', 'Keranjang Anda kosong. Silakan tambahkan produk sebelum checkout.');
        }

        // Simpan data checkout ke database
        $checkout = new Checkout();
        $checkout->address = $request->address;
        $checkout->message = $request->message;
        $checkout->payment_method = $request->payment_method;
        $checkout->shipping_method = $request->shipping_method;
        $checkout->products = json_encode($cart); // Simpan produk sebagai JSON
        $checkout->save();

        // Kurangi stok produk
        foreach ($cart as $key => $product) {
            // Ambil ID produk dari key
            $id = explode('_', $key)[1]; // Mengambil ID dari uniqueId

            // Pastikan produk ada di database
            if ($product['stock'] >= $product['quantity']) {
                if (strpos($key, 'alat_') === 0) {
                    $alat = alatPertanian::find($id);
                    if ($alat) {
                        $alat->stok -= $product['quantity'];
                        $alat->save();
                    }
                } elseif (strpos($key, 'pupuk_') === 0) {
                    $pupuk = pupuk::find($id);
                    if ($pupuk) {
                        $pupuk->stok -= $product['quantity'];
                        $pupuk->save();
                    }
                } elseif (strpos($key, 'sewa_') === 0) {
                    $sewa = sewa::find($id);
                    if ($sewa) {
                        $sewa->stok -= $product['quantity'];
                        $sewa->save();
                    }
                }
            }
        }

        // Hapus keranjang setelah checkout
        session()->forget('cart');

        return redirect()->route('carts.index')->with('success', 'Checkout berhasil! Terima kasih.');
    }

    private function calculateTotal($items)
    {
        $items = json_decode($items, true);
        $total = 0;

        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}
