@extends('layouts.app')

@section('content')
<style>
        .btn-primary {
        background-color: #28a745;
        color: white;
        margin-top:15px;
    }
</style>
<div class="container">
    <h1>Feedback</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Tulis feedback..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Feedback</button>
    </form>

    <!-- Modal untuk Edit Feedback -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="position: relative;">
                    <h5 class="modal-title" id="editModalLabel">Edit Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 10px; top: 10px; border: none; background: none; color: #000;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editFeedbackForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" placeholder="Tulis feedback..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="position: relative;">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 10px; top: 10px; border: none; background: none; color: #000;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus feedback ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteFeedbackForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk mengisi modal edit
        function openEditModal(feedbackId, content) {
            $('#editFeedbackForm').attr('action', '/feedback/' + feedbackId);
            $('#editFeedbackForm textarea[name="content"]').val(content);
            $('#editModal').modal('show');
        }

        // Script untuk mengisi modal delete
        function openDeleteModal(feedbackId) {
            $('#deleteFeedbackForm').attr('action', '/feedback/' + feedbackId);
            $('#deleteModal').modal('show');
        }
    </script>

    <div class="mt-4">
        @foreach($feedbacks as $feedback)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $feedback->user->name }}</h5>
                    <p class="card-text">{{ $feedback->content }}</p>

                    @if(Auth::id() === $feedback->user_id)
                        <button class="btn btn-warning" onclick="openEditModal({{ $feedback->id }}, '{{ $feedback->content }}')">Edit</button>
                        <button class="btn btn-danger" onclick="openDeleteModal({{ $feedback->id }})">Hapus</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 