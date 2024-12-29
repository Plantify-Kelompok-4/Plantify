<?php

namespace App\Http\Controllers;

use App\Models\LandHistory;
use Illuminate\Http\Request;

class LandHistoryController extends Controller
{
    public function store(Request $request, $landId)
    {
        $request->validate([
            'soil_condition' => 'required|string',
            'humidity' => 'required|integer',
        ]);

        LandHistory::create([
            'land_id' => $landId,
            'soil_condition' => $request->soil_condition,
            'humidity' => $request->humidity,
        ]);

        return redirect()->back()->with('success', 'Histori kondisi lahan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $history = LandHistory::findOrFail($id);
        return view('land_histories.edit', compact('history'));
    }

    public function destroy($id)
    {
        $history = LandHistory::findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Histori kondisi lahan berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'soil_condition' => 'required|string',
            'humidity' => 'required|integer',
        ]);

        $history = LandHistory::findOrFail($id);
        $history->update([
            'soil_condition' => $request->soil_condition,
            'humidity' => $request->humidity,
        ]);

        return redirect()->back()->with('success', 'Histori kondisi lahan berhasil diperbarui.');
    }
}
