<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function processPlantData(Request $request)
    {
        $request->validate([
            'plantType' => 'required|string',
            'soilCondition' => 'required|numeric',
            'humidity' => 'required|numeric',
            'temperature' => 'required|numeric',
        ]);
    
        $plantType = $request->input('plantType');
        $soilCondition = $request->input('soilCondition');
        $humidity = $request->input('humidity');
        $temperature = $request->input('temperature');
    
        $advice = '';
    
        if ($plantType === 'sawit') {
            $advice = $this->getSawitAdvice($soilCondition, $humidity, $temperature);
        } elseif ($plantType === 'sawi') {
            $advice = $this->getSawiAdvice($soilCondition, $humidity, $temperature);
        } else {
            $advice = "Tidak ada saran khusus untuk tanaman ini.";
        }
    
        return view('advice', ['advice' => $advice]);
    }

    private function getSawitAdvice($soilCondition, $humidity, $temperature)
    {
        $advice = "<h3>Saran untuk Sawit:</h3>";

        // Rekomendasi pH tanah
        if ($soilCondition >= 5.5 && $soilCondition <= 7.0) {
            $advice .= "<p><strong>Kondisi Tanah:</strong> pH tanah berada dalam kisaran ideal. Gunakan analisis laboratorium untuk memastikan kecukupan nutrisi makro seperti nitrogen dan fosfor.</p>";
        } else {
            $advice .= "<p><strong>Kondisi Tanah:</strong> pH tanah tidak ideal. Idealnya adalah antara 5.5 dan 7.0. Pertimbangkan menambahkan kapur dolomit untuk menaikkan pH atau sulfur untuk menurunkannya, disertai pemantauan rutin.</p>";
        }

        // Rekomendasi kelembapan
        if ($humidity >= 60 && $humidity <= 80) {
            $advice .= "<p><strong>Kelembapan:</strong> Kelembapan optimal untuk sawit. Gunakan sensor kelembapan tanah otomatis untuk memastikan kondisi tetap stabil sepanjang tahun.</p>";
        } else {
            $advice .= "<p><strong>Kelembapan:</strong> Kelembapan tidak ideal. Idealnya adalah antara 60% dan 80%. Implementasikan sistem irigasi cerdas berbasis IoT untuk menjaga kelembapan tanah secara real-time.</p>";
        }

        // Rekomendasi suhu
        if ($temperature >= 24 && $temperature <= 28) {
            $advice .= "<p><strong>Suhu:</strong> Suhu berada dalam kisaran ideal. Pertahankan dengan penanaman pohon peneduh untuk mencegah kenaikan suhu lokal.</p>";
        } else {
            $advice .= "<p><strong>Suhu:</strong> Suhu tidak ideal. Gunakan penutup tanah (mulsa) untuk menjaga suhu tanah tetap stabil dan minimalisir efek perubahan iklim.</p>";
        }

        // Rekomendasi tambahan
        $advice .= "<p><strong>Faktor Lain:</strong> Terapkan rotasi tanaman dengan leguminosa untuk memperbaiki struktur tanah dan meminimalkan risiko penyakit. Tambahkan pupuk hayati untuk meningkatkan aktivitas mikroba tanah.</p>";
        $advice .= "<p>Gunakan drone untuk pemantauan lahan, mendeteksi area bermasalah, dan memetakan kebutuhan pupuk secara presisi.</p>";

        return $advice;
    }

    private function getSawiAdvice($soilCondition, $humidity, $temperature)
    {
        $advice = "<h3>Saran untuk Sawi:</h3>";

        // Rekomendasi pH tanah
        if ($soilCondition >= 6.0 && $soilCondition <= 7.5) {
            $advice .= "<p><strong>Kondisi Tanah:</strong> pH tanah dalam kisaran ideal. Pastikan tanah memiliki kandungan bahan organik yang cukup dengan menambahkan kompos berkualitas tinggi.</p>";
        } else {
            $advice .= "<p><strong>Kondisi Tanah:</strong> pH tanah tidak ideal. Idealnya adalah antara 6.0 dan 7.5. Gunakan biochar untuk meningkatkan kapasitas tukar kation (CEC) dan menyesuaikan pH tanah.</p>";
        }

        // Rekomendasi kelembapan
        if ($humidity >= 70 && $humidity <= 85) {
            $advice .= "<p><strong>Kelembapan:</strong> Kelembapan optimal untuk sawi. Lakukan pemantauan kelembapan secara berkala menggunakan sensor digital.</p>";
        } else {
            $advice .= "<p><strong>Kelembapan:</strong> Kelembapan tidak ideal. Idealnya adalah antara 70% dan 85%. Gunakan irigasi tetes untuk mempertahankan kelembapan tanah yang konsisten.</p>";
        }

        // Rekomendasi suhu
        if ($temperature >= 18 && $temperature <= 24) {
            $advice .= "<p><strong>Suhu:</strong> Suhu ideal untuk sawi. Pastikan lokasi mendapatkan sirkulasi udara yang baik.</p>";
        } else {
            $advice .= "<p><strong>Suhu:</strong> Suhu tidak ideal. Gunakan jaring naungan untuk melindungi tanaman dari suhu tinggi dan terik matahari langsung.</p>";
        }

        // Rekomendasi tambahan
        $advice .= "<p><strong>Faktor Lain:</strong> Terapkan pengelolaan hama terpadu (IPM) untuk mengurangi ketergantungan pada pestisida kimia. Tambahkan mikroba tanah seperti Trichoderma untuk meningkatkan ketahanan tanaman terhadap penyakit akar.</p>";
        $advice .= "<p>Manfaatkan analitik data berbasis AI untuk memprediksi kebutuhan pupuk dan irigasi berdasarkan kondisi cuaca lokal.</p>";

        return $advice;
    }
}
