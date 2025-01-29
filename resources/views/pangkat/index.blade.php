@extends('layout.menu2')

@section('konten2')
    <style>
        ::selection {
            background-color: #D9EAFD;
            color: #212121;
        }

        ::-webkit-selection {
            background-color: #D9EAFD;
            color: #212121;
        }
    </style>

    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm" title="Home">
        <i class="fa fa-home mr-2"></i>Home
    </a>

    <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info btn-sm"
        title="Tambah Data Kenaikan Pangkat">
        <i class="fa fa-plus"></i> &nbsp; Tambah Data
    </button>
    <br />

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example">
            <thead style="background-color: #037294; color: white;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Periode</th>
                    <th class="text-center">Pangkat Lama</th>
                    <th class="text-center">Pangkat Baru</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pangkat as $d)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $d->nama }}</td>
                        <td class="text-center">{{ $d->periode }}</td>
                        <td class="text-center">{{ $d->pangkat_lama }}</td>
                        <td class="text-center">{{ $d->pangkat_baru }}</td>
                        <td class="text-center">{{ $d->jabatan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST"
                                action="{{ route('pangkat.destroy', $d->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="btn btn-success btn-sm mb-2" data-toggle="modal"
                                    data-target="#editModal">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm mb-2">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form method="POST" action="{{ route('pangkat.update', $d->id) }}"
                                enctype="multipart/form-data">
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
                                                value="{{ old('nama', $d->nama) }}">
                                            @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="periode">Periode</label>
                                            <input type="text" class="form-control" id="periode" name="periode"
                                                value="{{ old('periode', $d->periode) }}">
                                            @error('periode')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pangkat_lama">Pangkat Lama</label>
                                            <input type="text" class="form-control" id="pangkat_lama" name="pangkat_lama"
                                                value="{{ old('pangkat_lama', $d->pangkat_lama) }}">
                                            @error('pangkat_lama')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pangkat_baru">Pangkat Baru</label>
                                            <input type="text" class="form-control" id="pangkat_baru" name="pangkat_baru"
                                                value="{{ old('pangkat_baru', $d->pangkat_baru) }}">
                                            @error('pangkat_baru')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                value="{{ old('jabatan', $d->jabatan) }}">
                                            @error('jabatan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (session('status'))
        <script>
            Swal.fire({
                title: "{{ session('status')['judul'] }}",
                text: "{{ session('status')['pesan'] }}",
                icon: "{{ session('status')['icon'] }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Ada Kesalahan!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <style>
        /* Menggunakan flexbox untuk memastikan modal di tengah */
        .modal-dialog {
            display: flex;
            /* Aktifkan flexbox */
            justify-content: center;
            /* Pastikan modal tetap berada di tengah */
            align-items: center;
            /* Vertikal center */

            /* Mengatur transformasi untuk geser kanan */
            transform: translateX(20%);
            /* Geser modal 20% ke kanan */

            /* Ukuran maksimum modal */
            max-width: 80%;
        }
    </style>
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('pangkat.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Tambah Data</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" class="form-control" id="periode" name="periode" required>
                            @error('periode')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pangkat_lama">Pangkat Lama</label>
                            <input type="text" class="form-control" id="pangkat_lama" name="pangkat_lama" required>
                            @error('pangkat_lama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pangkat_baru">Pangkat Baru</label>
                            <input type="text" class="form-control" id="pangkat_baru" name="pangkat_baru" required>
                            @error('pangkat_baru')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            @error('jabatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-times"></i> Tutup
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
