<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => 'required|string',
            'area' => 'required|numeric',
        ]);

        $land = new Land();
        $land->location_id = $request->location_id;
        $land->name = $request->name;
        $land->area = $request->area;
        $land->save();

        return redirect()->route('locations.show', $request->location_id)->with('success', 'Lahan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area' => 'required|numeric',
        ]);

        $land = Land::findOrFail($id);
        $land->name = $request->name;
        $land->area = $request->area;
        $land->save();

        return redirect()->route('locations.show', $land->location_id)->with('success', 'Lahan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        $locationId = $land->location_id;
        $land->delete();

        return redirect()->route('locations.show', $locationId)->with('success', 'Lahan berhasil dihapus.');
    }

    public function edit($id)
    {
        $land = Land::findOrFail($id);
        return view('lands.edit', compact('land'));
    }

    public function show($id)
    {
        $land = Land::findOrFail($id);
        $histories = $land->histories;

        return view('lands.show', compact('land', 'histories'));
    }
}
