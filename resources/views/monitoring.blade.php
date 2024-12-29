@extends('layouts.app')

@section('content')
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: calc(25% - 20px);
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        transition: transform 0.2s;
        background-color: #f9f9f9;
        text-decoration: none;
        color: inherit;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-header {
        font-size: 1.5em;
        margin-bottom: 10px;
        text-align: center;
        color: #333;
        font-weight: bold;
    }
    .card-description {
        font-size: 1em;
        color: #555;
        text-align: center;
        margin-bottom: 15px;
    }
    .card-actions {
        display: flex;
        justify-content: space-between;
        width: 90%;
    }
    .btn {
        padding: 10px 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        flex: 1;
        margin: 0 5px;
    }
    .btn-add {
        background-color: #28a745;
        color: white;
    }
    .btn-edit {
        background-color: #ffc107;
        color: white;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
        width: 400px;
        max-width: 90%;
        margin: auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Tombol Tambah Lokasi di Kanan Bawah Halaman */
    .add-location-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 10;
    }
</style>

<div class="container py-2">
    <h1 class="text-center mb-5">Monitoring Lokasi</h1>

    <div class="card-container">
        @foreach ($locations as $location)
            <a href="{{ route('locations.show', $location->id) }}" class="card">
                <div class="card-header">
                    {{ $location->name }}
                </div>
                <div class="card-description">
                    <p>Lokasi ini memiliki berbagai fitur menarik dan aksesibilitas yang baik.</p>
                </div>
                <div class="card-actions">
                    <button class="btn btn-edit" onclick="event.stopPropagation(); event.preventDefault(); editLocation('{{ $location->id }}')">Edit</button>
                    <button class="btn btn-delete" onclick="event.stopPropagation(); event.preventDefault(); deleteLocation('{{ $location->id }}')">Hapus</button>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- Tombol Tambah Lokasi -->
<button class="btn btn-add add-location-btn" onclick="showAddLocationForm()">Tambah Lokasi</button>

<!-- Modal untuk Form Tambah Lokasi -->
<div id="locationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 id="formTitle">Tambah Lokasi</h3>
        <form id="locationFormElement" method="POST" action="{{ route('locations.store') }}">
            @csrf
            <input type="hidden" id="locationId" name="locationId">
            <div class="mb-3">
                <label for="locationName" class="form-label">Nama Lokasi:</label>
                <input type="text" class="form-control" id="locationName" name="locationName" required>
            </div>
            <button type="submit" class="btn btn-add">Simpan</button>
        </form>
    </div>
</div>

<script>
    function showAddLocationForm() {
        document.getElementById('formTitle').innerText = 'Tambah Lokasi';
        document.getElementById('locationId').value = '';
        document.getElementById('locationName').value = '';
        document.getElementById('locationModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('locationModal').style.display = "none";
    }

    function editLocation(locationId) {
        // Ambil data lokasi berdasarkan ID dan isi form
        document.getElementById('formTitle').innerText = 'Edit Lokasi';
        document.getElementById('locationId').value = locationId;
        document.getElementById('locationName').value = 'Nama Lokasi'; // Ganti dengan data lokasi sebenarnya
        document.getElementById('locationModal').style.display = "block";
    }

    function deleteLocation(locationId) {
        if (confirm('Apakah Anda yakin ingin menghapus lokasi ini?')) {
            // Panggil rute untuk menghapus lokasi
            window.location.href = '/locations/delete/' + locationId;
        }
    }

    // Tutup modal jika pengguna mengklik di luar modal
    window.onclick = function(event) {
        var modal = document.getElementById('locationModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
@endsection