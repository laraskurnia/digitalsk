@extends('layout.menu2')
@section('konten2')

<div class="container mt-5 position-relative">
    <h2>Edit Kenaikan Pangkat</h2>
    <a href="{{ route('pangkat.index') }}" title="Kembali" class="btn-back">
        <i class="fas fa-arrow-left"></i>
    </a>
    <form method="POST" action="{{ route('pangkat.update', $pangkat->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pangkat->nama) }}">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="periode">Periode</label>
            <input type="text" class="form-control" id="periode" name="periode">
            @error('periode')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="[pangkat_lama]">Pangkat Lama</label>
            <input type="text" class="form-control" id="pangkat_lama" name="pangkat_lama" value="{{ old('pangkat_lama', $pangkat->pangkat_lama) }}">
            @error('pangkat_lama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="[pangkat_baru]">Pangkat Baru</label>
            <input type="text" class="form-control" id="pangkat_baru" name="pangkat_baru" value="{{ old('pangkat_baru', $pangkat->pangkat_baru) }}">
            @error('pangkat_baru')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="[jabatan]">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $pangkat->jabatan) }}">
            @error('jabatan')
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
