use Illuminate\Database\Seeder;
use App\Models\LandHistory;

class LandHistorySeeder extends Seeder
{
    public function run()
    {
        LandHistory::create([
            'land_id' => 1, // Ganti dengan ID lahan yang sesuai
            'soil_condition' => 'Baik',
            'humidity' => 60,
        ]);

        LandHistory::create([
            'land_id' => 1, // Ganti dengan ID lahan yang sesuai
            'soil_condition' => 'Sedang',
            'humidity' => 55,
        ]);
    }
} 