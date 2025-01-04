<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $location = Location::where('id', $id)->where('user_id', auth()->id())->first();

        if ($location) {
            $location->delete();
            return redirect()->back()->with('success', 'Lokasi berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Lokasi tidak ditemukan atau Anda tidak memiliki akses.');
    }

    public function index()
    {
        $locations = Location::where('user_id', auth()->id())->get();

        return view('monitoring', compact('locations'));
    }


    public function show($id)
    {
        $location = Location::where('id', $id)->where('user_id', auth()->id())->firstOrFail(); 
        return view('locations.show', compact('location'));
    }

    public function edit($id)
    {

        $location = Location::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$location) {
            return redirect()->back()->with('error', 'Lokasi tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('monitoring', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $location = Location::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$location) {
            return redirect()->back()->with('error', 'Lokasi tidak ditemukan atau Anda tidak memiliki akses.');
        }

        $location->name = $request->name;
        $location->save();

        return redirect()->route('locations.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $locations = Location::where('user_id', auth()->id());

        if ($request->search) {
            $locations = $locations->where('name', 'like', '%' . $request->search . '%');
        }

        $locations = $locations->get();

        return view('monitoring', compact('locations'));
    }
}
