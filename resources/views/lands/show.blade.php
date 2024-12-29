@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('locations.show', $land->location_id) }}" class="btn btn-link" style="position: absolute; top: 10px; left: 10px; font-size: 14px; color: inherit; text-decoration: none;">Kembali</a>
    
    <h1>Detail Lahan: {{ $land->name }}</h1>
    <p><strong>Luas:</strong> {{ $land->area }} m²</p>
    <p><strong>Lokasi ID:</strong> {{ $land->location_id }}</p>

    <h3>Pilih Jenis Tumbuhan</h3>
    <select id="plantType" onchange="showPlantForm()">
        <option value="">-- Pilih Tumbuhan --</option>
        <option value="sawi">Sawi</option>
        <option value="sawit">Sawit</option>
    </select>

    <div id="plantForm" style="display: none; margin-top: 20px;">
        <h4>Form untuk <span id="selectedPlantType"></span></h4>
        <form id="formSawi" style="display: none;" action="{{ route('land.histories.store', $land->id) }}" method="POST">
            @csrf
            <input type="hidden" name="plant_type" value="sawi">
            <div class="mb-3">
                <label for="sawiSoilCondition" class="form-label">Kondisi Tanah (pH)</label>
                <input type="text" class="form-control" id="sawiSoilCondition" name="soil_condition" required>
            </div>
            <div class="mb-3">
                <label for="sawiHumidity" class="form-label">Kelembapan (%)</label>
                <input type="number" class="form-control" id="sawiHumidity" name="humidity" required>
            </div>
            <button type="submit" class="btn btn-success">Kirim Sawi</button>
        </form>

        <form id="formSawit" style="display: none;" action="{{ route('land.histories.store', $land->id) }}" method="POST">
            @csrf
            <input type="hidden" name="plant_type" value="sawit">
            <div class="mb-3">
                <label for="sawitSoilCondition" class="form-label">Kondisi Tanah (pH)</label>
                <input type="text" class="form-control" id="sawitSoilCondition" name="soil_condition" required>
            </div>
            <div class="mb-3">
                <label for="sawitHumidity" class="form-label">Kelembapan (%)</label>
                <input type="number" class="form-control" id="sawitHumidity" name="humidity" required>
            </div>
            <button type="submit" class="btn btn-success">Kirim Sawit</button>
        </form>
    </div>

    <h3>Histori Kondisi Lahan</h3>
    <div class="row">
        @foreach($histories as $history)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kondisi Tanah: {{ $history->soil_condition }}</h5>
                        <p class="card-text">Kelembapan: {{ $history->humidity }}%</p>
                        <p class="card-text"><small class="text-muted">Dibuat pada: {{ $history->created_at->format('d-m-Y H:i') }}</small></p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $history->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $history->id }})">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal{{ $history->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $history->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $history->id }}">Edit Histori Kondisi Lahan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('land.histories.update', $history->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="soil_condition" class="form-label">Kondisi Tanah</label>
                                <input type="text" class="form-control" id="soil_condition" name="soil_condition" value="{{ $history->soil_condition }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="humidity" class="form-label">Kelembapan (%)</label>
                                <input type="number" class="form-control" id="humidity" name="humidity" value="{{ $history->humidity }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Update Histori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function showPlantForm() {
        const plantType = document.getElementById('plantType').value;
        const plantForm = document.getElementById('plantForm');
        const selectedPlantType = document.getElementById('selectedPlantType');
        const formSawi = document.getElementById('formSawi');
        const formSawit = document.getElementById('formSawit');

        // Reset form visibility
        formSawi.style.display = 'none';
        formSawit.style.display = 'none';
        plantForm.style.display = 'none';

        if (plantType === 'sawi') {
            selectedPlantType.innerText = 'Sawi';
            formSawi.style.display = 'block';
            plantForm.style.display = 'block';
        } else if (plantType === 'sawit') {
            selectedPlantType.innerText = 'Sawit';
            formSawit.style.display = 'block';
            plantForm.style.display = 'block';
        }
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus histori ini?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
@endsection 