@extends('layouts.app')

@section('content')

<style>
    .btn-primary {
        background-color: #28a745;
        color: white;
    }
</style>
<div class="container">
    <h1>Detail Lahan: {{ $land->name }}</h1>
    <p><strong>Luas:</strong> {{ $land->area }} m²</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Pilih Jenis Tumbuhan</h3>
    <form id="plantTypeForm" action="{{ route('land.histories.store', $land->id) }}" method="POST">
        @csrf
        <select id="plantType" name="plant_type" onchange="showPlantForm()">
            <option value="">-- Pilih Tumbuhan --</option>
            <option value="sawi">Sawi</option>
            <option value="sawit">Sawit</option>
        </select>

        <div id="plantForm" style="display: none; margin-top: 20px;">
            <h4>Form untuk <span id="selectedPlantType"></span></h4>
            <div class="mb-3">
                <label for="soilCondition" class="form-label">Kondisi Tanah (pH)</label>
                <input type="text" class="form-control" id="soilCondition" name="soil_condition" required>
            </div>
            <div class="mb-3">
                <label for="humidity" class="form-label">Kelembapan (%)</label>
                <input type="number" class="form-control" id="humidity" name="humidity" required>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </div>
    </form>

    <div style="margin: 40px 0;"> 
        <h3>Histori Kondisi Lahan</h3>
    </div>

    <div class="row">
        @foreach($histories as $history)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kondisi Tanah: {{ $history->soil_condition }}</h5>
                        <p class="card-text">Kelembapan: {{ $history->humidity }}%</p>
                        <p class="card-text">Jenis Tumbuhan: {{ $history->plant_type }}</p>
                        <p class="card-text">Rekomendasi: {{ $history->recommendation }}</p>
                        <p class="card-text"><small class="text-muted">Dibuat pada: {{ $history->created_at->format('d-m-Y H:i') }}</small></p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $history->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $history->id }})">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal untuk Edit Lahan -->
    @foreach($histories as $history)
        <div class="modal fade" id="editModal{{ $history->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $history->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $history->id }}">Edit Histori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('land.histories.update', $history->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="soilCondition" class="form-label">Kondisi Tanah (pH)</label>
                                <input type="text" class="form-control" name="soil_condition" value="{{ $history->soil_condition }}" required oninput="updateRecommendation({{ $history->id }})">
                            </div>
                            <div class="mb-3">
                                <label for="humidity" class="form-label">Kelembapan (%)</label>
                                <input type="number" class="form-control" name="humidity" value="{{ $history->humidity }}" required oninput="updateRecommendation({{ $history->id }})">
                            </div>
                            <div class="mb-3">
                                <label for="plantType" class="form-label">Jenis Tumbuhan</label>
                                <select class="form-control" name="plant_type" required>
                                    <option value="sawi" {{ $history->plant_type === 'sawi' ? 'selected' : '' }}>Sawi</option>
                                    <option value="sawit" {{ $history->plant_type === 'sawit' ? 'selected' : '' }}>Sawit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recommendation" class="form-label">Rekomendasi</label>
                                <textarea class="form-control" id="recommendation{{ $history->id }}" readonly>{{ $history->recommendation }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="createdAt" class="form-label">Waktu Dibuat</label>
                                <input type="text" class="form-control" value="{{ $history->created_at->format('d-m-Y H:i') }}" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mb-3">
        <a href="{{ route('land.histories.pdf', $land->id) }}" class="btn btn-primary">Download PDF Histori</a>
    </div>
</div>

<script>
    function showPlantForm() {
        const plantType = document.getElementById('plantType').value;
        const plantForm = document.getElementById('plantForm');
        const selectedPlantType = document.getElementById('selectedPlantType');

        // Reset form visibility
        plantForm.style.display = 'none';

        if (plantType) {
            selectedPlantType.innerText = plantType.charAt(0).toUpperCase() + plantType.slice(1); 
            plantForm.style.display = 'block'; 
        }
    }

    function closeEditLandModal() {
        document.getElementById('editLandModal').style.display = 'none'; 
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus histori ini?')) {
            // Menggunakan form untuk menghapus
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/land-histories/${id}`;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(methodInput);
            form.appendChild(csrfInput);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function updateRecommendation(historyId) {
        const soilCondition = parseFloat(document.querySelector(`input[name="soil_condition"]`).value);
        const humidity = parseFloat(document.querySelector(`input[name="humidity"]`).value);
        const plantType = document.querySelector(`select[name="plant_type"]`).value;
        const recommendationTextArea = document.getElementById(`recommendation${historyId}`);
    }
</script>
@endsection 