@extends('layout.menu2')
@section('konten2')
    <div class="container mt-5 position-relative">
        <h2>Edit Kenaikan Pangkat</h2>
        <a href="{{ route('pangkat.index') }}" title="Kembali" class="btn-back">
            <i class="fas fa-arrow-left"></i>
        </a>

        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#editModal">
            <i class="fas fa-edit"></i> Edit Data
        </button>

        <style>
            .modal-dialog {
                display: flex;
                justify-content: center;
                align-items: center;

                transform: translateX(20%);
                max-width: 80%;
            }
        </style>
        <!-- Modal untuk Edit Data -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('pangkat.update', $pangkat->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Kenaikan Pangkat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Input fields -->
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ old('nama', $pangkat->nama) }}">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <input type="text" class="form-control" id="periode" name="periode"
                                    value="{{ old('periode', $pangkat->periode) }}">
                                @error('periode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pangkat_lama">Pangkat Lama</label>
                                <input type="text" class="form-control" id="pangkat_lama" name="pangkat_lama"
                                    value="{{ old('pangkat_lama', $pangkat->pangkat_lama) }}">
                                @error('pangkat_lama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pangkat_baru">Pangkat Baru</label>
                                <input type="text" class="form-control" id="pangkat_baru" name="pangkat_baru"
                                    value="{{ old('pangkat_baru', $pangkat->pangkat_baru) }}">
                                @error('pangkat_baru')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    value="{{ old('jabatan', $pangkat->jabatan) }}">
                                @error('jabatan')
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
