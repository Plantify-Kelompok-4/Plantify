<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\LandHistory;
use Illuminate\Http\Request;
use PDF;

class LandHistoryController extends Controller
{
    public function store(Request $request, $landId)
    {
        $request->validate([
            'plant_type' => 'required|string',
            'soil_condition' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        $recommendation = $this->generateRecommendation($request->plant_type, $request->soil_condition, $request->humidity);

        $history = new LandHistory();
        $history->land_id = $landId;
        $history->plant_type = $request->plant_type;
        $history->soil_condition = $request->soil_condition;
        $history->humidity = $request->humidity;
        $history->recommendation = $recommendation;
        $history->save();

        return redirect()->route('lands.show', $landId)->with('success', 'Histori berhasil ditambahkan. Rekomendasi: ' . $recommendation);
    }

    private function generateRecommendation($plantType, $soilCondition, $humidity)
    {
        if ($plantType === 'sawi') {
            if ($soilCondition >= 6.0 && $humidity >= 70) {
                return "Kondisi ideal untuk sawi. Pertahankan kelembapan dan pH tanah. Disarankan menggunakan pupuk NPK dengan dosis 200 kg/ha untuk meningkatkan pertumbuhan.";
            } else {
                return "Perbaiki kondisi tanah dan kelembapan untuk hasil optimal. Pertimbangkan penggunaan pupuk organik seperti kompos atau pupuk hijau untuk meningkatkan kesuburan tanah.";
            }
        } elseif ($plantType === 'sawit') {
            if ($soilCondition >= 5.5 && $humidity >= 60) {
                return "Kondisi ideal untuk sawit. Pastikan kelembapan tanah terjaga. Gunakan pupuk kandang dengan dosis 5 ton/ha dan pupuk NPK untuk hasil terbaik.";
            } else {
                return "Perbaiki pH tanah dan kelembapan untuk hasil optimal. Disarankan menggunakan pupuk NPK dengan pemupukan rutin setiap 3 bulan untuk meningkatkan hasil panen.";
            }
        }

        return "Tidak ada rekomendasi untuk jenis tanaman ini.";
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
            'soil_condition' => 'required|numeric',
            'humidity' => 'required|numeric',
            'plant_type' => 'required|string',
        ]);

        $history = LandHistory::findOrFail($id);
        $history->soil_condition = $request->soil_condition;
        $history->humidity = $request->humidity;
        $history->plant_type = $request->plant_type;
        $history->recommendation = $this->generateRecommendation($request->plant_type, $request->soil_condition, $request->humidity);
        $history->save();

        return redirect()->route('lands.show', $history->land_id)->with('success', 'Histori berhasil diperbarui.');
    }

    public function downloadPdf($id)
    {
        $land = Land::findOrFail($id);
        $histories = $land->histories; // Ambil histori dari lahan
        $user = auth()->user(); // Ambil informasi user yang sedang login

        $pdf = PDF::loadView('pdf.land_histories', compact('land', 'histories', 'user'));
        return $pdf->download('histori_kondisi_lahan.pdf');
    }
}
