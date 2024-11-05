@extends('layout.menu2')
@section('konten2')

<div class="container mt-5 position-relative">
    <h2>Edit Data Digital SK</h2>
    <a href="{{ route('digitalsk2.index') }}" title="Kembali" class="btn-back">
        <i class="fas fa-arrow-left"></i>
    </a>
    <form method="POST" action="{{ route('digitalsk2.update', $digitalsk->id) }}">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="nama_file">Nama File</label>
            <input type="text" class="form-control" id="nama_file" name="nama_file" value="{{ old('nama_file', $digitalsk->nama_file) }}">
            @error('nama_file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="file_pdf">File PDF</label>
            <input type="number" class="form-control" id="file_pdf" name="file_pdf" value="{{ old('file_pdf', $digitalsk->file_pdf) }}">
            @error('file_pdf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_upload">Tanggal Upload</label>
            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ old('tanggal_upload', $digitalsk->tanggal_upload) }}">
            @error('tanggal_upload')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-container">
            <button type="submit" title="Simpan Data" class="btn btn-custom-save">
                <i class='fas fa-save' style='color:#010101'></i> Simpan
            </button>
        </div>
    </form>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

@endsection
