@extends('layout.menu2')

@section('konten2')
    <style>
        ::selection {
            background-color: #D9EAFD;
            color: #000000;
        }

        ::-webkit-selection {
            background-color: #D9EAFD;
            color: #000000;
        }

        .modal-dialog {
            max-width: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100% - 3.5rem);
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
                        <td class="text-center">
                            <a href="{{ Storage::url('pdf/' . $d->file_pdf) }}" target="_blank" class="btn btn-sm btn-info">
                                Lihat PDF
                            </a>
                        </td>
                        <td class="text-center">{{ $d->tanggal_upload }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('digitalsk2.destroy', $d->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#editModal{{ $d->id }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm mb-2">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <form method="POST" action="{{ route('digitalsk2.update', $d->id) }}" enctype="multipart/form-data">
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
                                        <div class="form-group">
                                            <label for="nama_file">Nama File</label>
                                            <input type="text" class="form-control" id="nama_file" name="nama_file" value="{{ old('nama_file', $d->nama_file) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="file_pdf">File PDF</label>
                                            <input type="file" class="form-control" id="file_pdf" name="file_pdf">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_upload">Tanggal Upload</label>
                                            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="{{ old('tanggal_upload', $d->tanggal_upload) }}">
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

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
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
                        </div>
                        <div class="form-group">
                            <label for="file_pdf">File PDF</label>
                            <input type="file" class="form-control" id="file_pdf" name="file_pdf" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_upload">Tanggal Upload</label>
                            <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
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

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
@endsection
