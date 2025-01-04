<!DOCTYPE html>
<html>
<head>
    <title>Histori Kondisi Lahan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        .logo { position: absolute; top: 10px; right: 10px; }
    </style>
</head>
<body>
    <h1>Histori Kondisi Lahan</h1>
    <h2>Nama User: {{ $user->name }}</h2>
    <h3>Lokasi: {{ $land->location->name }}</h3>
    <h3>Lahan: {{ $land->name }}</h3>

    <table>
        <thead>
            <tr>
                <th>Kondisi Tanah</th>
                <th>Kelembapan</th>
                <th>Jenis Tumbuhan</th>
                <th>Rekomendasi</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $history->soil_condition }}</td>
                    <td>{{ $history->humidity }}%</td>
                    <td>{{ $history->plant_type }}</td>
                    <td>{{ $history->recommendation }}</td>
                    <td>{{ $history->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 