@extends('layout.menu2')
@section('konten2')
    <div class="container mt-5 position-relative">
        <h2>Edit Data Digital SK</h2>
        <a href="{{ route('digitalsk2.index') }}" title="Kembali" class="btn-back">
            <i class="fas fa-arrow-left"></i>
        </a>

        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#editModal">
            <i class="fas fa-edit"></i> Edit Data
        </button>

        <style>
            .modal-dialog {
                max-width: 350px !important;
                width: 100%;
                margin: auto;
            }

            .modal-content {
                width: 100%;
            }

            @media (min-width: 576px) {
                .modal-dialog {
                    max-width: 350px !important;
                }
            }
        </style>

        <!-- Modal untuk Edit Data -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('digitalsk2.update', $digitalsk->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Digital SK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Input fields -->
                            <div class="form-group">
                                <label for="nama_file">Nama File</label>
                                <input type="text" class="form-control" id="nama_file" name="nama_file"
                                    value="{{ old('nama_file', $digitalsk->nama_file) }}">
                                @error('nama_file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file_pdf">File PDF</label>
                                <input type="file" class="form-control" id="file_pdf" name="file_pdf">
                                @error('file_pdf')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_upload">Tanggal Upload</label>
                                <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload"
                                    value="{{ old('tanggal_upload', $digitalsk->tanggal_upload) }}">
                                @error('tanggal_upload')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script yang diperlukan -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
@endsection
