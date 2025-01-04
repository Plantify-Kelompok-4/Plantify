<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\alatPertanian;
use App\Models\pupuk;
use App\Models\sewa;

class CartController extends Controller
{
    public function index()
    {
        // Ambil data keranjang
        $cart = session('cart');

        // Cek apakah keranjang ada
        if (is_null($cart) || empty($cart)) {
            return view('Carts.index')->with('error', 'Keranjang Anda kosong. Silakan tambahkan produk sebelum checkout.');
        }

        return view('Carts.index', compact('cart'));
    }

    public function add($type, $id, Request $request)
    {
        $product = null;
        $quantity = $request->input('quantity', 1); // Ambil jumlah dari input, default 1

        // Cek jenis produk dan ambil data dari model yang sesuai
        if ($type === 'alatPertanian') {
            $product = alatPertanian::find($id);
            $uniqueId = 'alat_' . $id; // Format ID unik
        } elseif ($type === 'pupuk') {
            $product = pupuk::find($id);
            $uniqueId = 'pupuk_' . $id; // Format ID unik
        } elseif ($type === 'sewa') {
            $product = sewa::find($id);
            $uniqueId = 'sewa_' . $id; // Format ID unik
        }

        if ($product) {
            // Simpan produk ke session atau database
            $cart = session()->get('cart', []);
            
            // Cek apakah produk sudah ada di keranjang
            if (isset($cart[$uniqueId])) {
                // Jika produk sudah ada, tambahkan jumlahnya
                $cart[$uniqueId]['quantity'] += $quantity; // Tambahkan jumlah
            } else {
                // Jika produk belum ada, tambahkan sebagai entri baru
                $cart[$uniqueId] = [
                    "name" => $product->nama_alat ?? $product->nama_pupuk ?? $product->nama_sewa,
                    "quantity" => $quantity,
                    "price" => $product->harga,
                    "image" => $product->gambar,
                    "stock" => $product->stok, // Menyimpan stok produk
                    "type" => $type // Menyimpan jenis produk
                ];
            }
            
            session()->put('cart', $cart); // Simpan kembali ke session
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }

    public function update($id, $quantity)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            if ($quantity < 1) {
                $quantity = 1; // Minimum quantity is 1
            }
            $cart[$id]['quantity'] = $quantity; // Update quantity
            session()->put('cart', $cart); // Simpan kembali ke session
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}