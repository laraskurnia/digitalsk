@extends('layout.menu2')
@section('konten2')
    <style>
        /* Mengubah warna highlight teks */
        ::selection {
            background-color: #D9EAFD;
            /* Warna highlight */
            color: #000000;
            /* Warna teks saat disorot */
        }

        /* Dukungan untuk Webkit */
        ::-webkit-selection {
            background-color: #D9EAFD;
            /* Warna highlight */
            color: #000000;
            /* Warna teks saat disorot */
        }

        .modal-dialog {
            display: flex;
            justify-content: center;
            align-items: center;

            transform: translateX(20%);
            max-width: 80%;
        }
    </style>

    <a href="{{ route('home') }}" class="btn btn-secondary btn-sm" title="Home">
        <i class="fa fa-home mr-2"></i>Home
    </a>

    <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info btn-sm" title="Tambah Data Digitalsk">
        <i class="fa fa-plus"></i> &nbsp; Tambah Data
    </button>
    <br />

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example">
            <thead style="background-color: #037294; color: white;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">File PDF</th>
                    <th class="text-center">Tanggal Upload</th>
                    <th class="text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($digitalsk as $d)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $d->nama_file }}</td>
                        <td class="text-center">{{ $d->file_pdf }}
                            <a href="{{ Storage::url('pdf/' . $d->file_pdf) }}" target="_blank" class="btn btn-sm btn-info">
                                Lihat PDF
                            </a>
                        </td>
                        <td class="text-center">{{ $d->tanggal_upload }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST"
                                action="{{ route('digitalsk2.destroy', $d->id) }}">
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
                            <form method="POST" action="{{ route('digitalsk2.update', $d->id) }}"
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
                                                value="{{ old('nama_file', $d->nama_file) }}">
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
                                            <input type="date" class="form-control" id="tanggal_upload"
                                                name="tanggal_upload"
                                                value="{{ old('tanggal_upload', $d->tanggal_upload) }}">
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

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('digitalsk2.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_file">Nama File</label>
                            <input type="text" class="form-control" id="nama_file" name="nama_file" required>
                            @error('nama_file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file_pdf">File PDF</label>
                            <input type="file" class="form-control" id="file_pdf" name="file_pdf" required>
                            @error('file_pdf')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_upload">Tanggal Upload</label>
                            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload"
                                required>
                            @error('tanggal_upload')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-times"></i> Close
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-save"></i> Save changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
