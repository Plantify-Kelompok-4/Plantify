@extends('layouts.app')

@section('content')
<div class="container py-2">
    <h1 class="text-center mb-5">Detail Lokasi: {{ $location->name }}</h1>

    <h3 class="mt-5">Daftar Lahan</h3>
    <div class="list-group">
        @if($location->lands && $location->lands->count() > 0)
            @foreach($location->lands as $land)
                <div class="list-group-item d-flex justify-content-between align-items-center" onclick="window.location='{{ route('lands.show', $land->id) }}'" style="cursor: pointer;">
                    <div>
                        <strong>{{ $land->name }}</strong> - Luas: {{ $land->area }} m²
                    </div>
                    <div>
                        <button class="btn btn-warning btn-sm" onclick="event.stopPropagation(); editLand('{{ $land->id }}', '{{ $land->name }}', '{{ $land->area }}')">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="event.stopPropagation(); deleteLand('{{ $land->id }}')">Hapus</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item">Tidak ada lahan yang tersedia.</div>
        @endif
    </div>

    <!-- Tombol untuk Menambah Lahan -->
    <button class="btn btn-primary" onclick="showAddLandForm()" style="position: fixed; bottom: 20px; right: 20px;">Tambah Lahan</button>
</div>

<!-- Modal untuk Menambah Lahan -->
<div id="addLandModal" class="modal">
    <div class="modal-content" style="width: 300px; max-width: 90%; margin: auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <span class="close" onclick="closeAddLandModal()" style="cursor: pointer; float: right; font-size: 20px;">&times;</span>
        <h3 class="text-center">Tambah Lahan</h3>
        <form id="addLandForm" method="POST" action="{{ route('lands.store') }}">
            @csrf
            <input type="hidden" name="location_id" value="{{ $location->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lahan</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Luas Lahan (m²)</label>
                <input type="number" class="form-control" id="area" name="area" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Lahan</button>
        </form>
    </div>
</div>

<!-- Modal untuk Edit Lahan -->
<div id="editLandModal" class="modal">
    <div class="modal-content" style="width: 300px; max-width: 90%; margin: auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <span class="close" onclick="closeEditLandModal()" style="cursor: pointer; float: right; font-size: 20px;">&times;</span>
        <h3 class="text-center">Edit Lahan</h3>
        <form id="editLandForm" method="POST" action="{{ route('lands.update', 'land_id') }}">
            @csrf
            @method('PUT')
            <input type="hidden" id="editLandId" name="land_id">
            <div class="mb-3">
                <label for="editName" class="form-label">Nama Lahan</label>
                <input type="text" class="form-control" id="editName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="editArea" class="form-label">Luas Lahan (m²)</label>
                <input type="number" class="form-control" id="editArea" name="area" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Lahan</button>
        </form>
    </div>
</div>

<script>
    function showAddLandForm() {
        document.getElementById('addLandModal').style.display = "block"; // Tampilkan modal
    }

    function closeAddLandModal() {
        document.getElementById('addLandModal').style.display = "none"; // Sembunyikan modal
    }

    function editLand(id, name, area) {
        document.getElementById('editLandId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editArea').value = area;
        document.getElementById('editLandModal').style.display = "block"; // Tampilkan modal
    }

    function closeEditLandModal() {
        document.getElementById('editLandModal').style.display = "none"; // Sembunyikan modal
    }

    function deleteLand(landId) {
        if (confirm('Apakah Anda yakin ingin menghapus lahan ini?')) {
            // Panggil rute untuk menghapus lahan
            window.location.href = '/lands/delete/' + landId;
        }
    }
</script>
@endsection 