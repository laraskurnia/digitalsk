@extends('layout.menu2')
@section('konten2')

<div class="container mt-5 position-relative">
    <h2>Tambah Data Digital SK</h2>
    <a href="{{ route('digitalsk2.index') }}" title="Kembali" class="btn-back">
      <i class="fas fa-arrow-left"></i>
    </a>
    <form method="POST" action="{{ route('digitalsk2.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_file">Nama File</label>
            <input type="text" class="form-control" id="nama_file" name="nama_file" required>
            @error('nama_file') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="file_pdf">File PDF</label>
            <input type="file" class="form-control" id="file_pdf" name="file_pdf" required>
            @error('file_pdf') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        
        <div class="form-group">
            <label for="tanggal_upload">Tanggal Upload</label>
            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
            @error('tanggal_upload') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="btn-container">
            <button type="submit" title="Simpan Data" class="btn btn-custom-save">
                <i class='fas fa-save' style='color:#000000'></i> Simpan
            </button>
            <button type="reset" title="Reset Data" class="btn btn-custom-reset">
                <i class="fa fa-undo" aria-hidden="true"></i> Reset
            </button>
        </div>
    </form>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

@endsection
