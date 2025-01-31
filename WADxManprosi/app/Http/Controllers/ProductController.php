<?php

namespace App\Http\Controllers;

use App\Models\AlatPertanian;
use App\Models\Pupuk;
use App\Models\Sewa;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductBuy()
    {
        $alatPertanian = AlatPertanian::all();
        $pupuk = Pupuk::all();
        $sewa = Sewa::all();

        return view('productBuy', compact('alatPertanian', 'pupuk', 'sewa'));
    }

    public function showProductPupuk()
    {
        $alatPertanian = AlatPertanian::all();
        $pupuk = Pupuk::all();
        $sewa = Sewa::all();

        return view('productPupuk', compact('alatPertanian', 'pupuk', 'sewa'));
    }
    
    public function showProductSewa()
    {
        $alatPertanian = AlatPertanian::all();
        $pupuk = Pupuk::all();
        $sewa = Sewa::all();

        return view('productSewa', compact('alatPertanian', 'pupuk', 'sewa'));
    }

    public function show($id)
    {
        $alat = AlatPertanian::findOrFail($id);
        return view('productDetail', compact('alat'));
    }

    public function showSewa($id)
    {
        $sewa = Sewa::findOrFail($id);
        return view('productSewaDetail', compact('sewa'));
    }

    public function showPupuk($id)
    {
        $pupuk = Pupuk::findOrFail($id);
        return view('productPupukDetail', compact('pupuk'));
    }

    public function index(Request $request)
    {
        $query = $request->get('search');
        $alatPertanian = AlatPertanian::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('nama_alat', 'like', "%{$query}%");
        })->get();
        
        return view('productBuy', compact('alatPertanian'));
    }

    public function searchSewa(Request $request)
    {
        $query = $request->get('search');
        $sewa = Sewa::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('nama_sewa', 'like', "%{$query}%");
        })->get();
        
        return view('productSewa', compact('sewa'));
    }

    public function searchPupuk(Request $request)
    {
        $query = $request->get('search');
        $pupuk = Pupuk::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('nama_pupuk', 'like', "%{$query}%");
        })->get();

        return view('productPupuk', compact('pupuk'));
    }
}
