@extends('layout.menu2')
@section('konten2')

<style>
    /* Mengubah warna highlight teks */
    ::selection {
        background-color: #D9EAFD; /* Warna highlight */
        color: #000000; /* Warna teks saat disorot */
    }

    /* Dukungan untuk Webkit */
    ::-webkit-selection {
        background-color: #D9EAFD; /* Warna highlight */
        color: #000000; /* Warna teks saat disorot */
    }
</style>

<a href="{{ route('home') }}" class="btn btn-secondary btn-sm" title="Home">
    <i class="fa fa-home mr-2"></i>Home
</a>

<button type="button" data-toggle="modal" data-target="#tambah" 
class="btn btn-info btn-sm" title="Tambah Data Digitalsk">
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
                    <a href="{{ Storage::url('pdf/'. $d->file_pdf) }}" target="_blank" class="btn btn-sm btn-info">
                        Lihat PDF
                    </a>
                </td>
                <td class="text-center">{{ $d->tanggal_upload }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('digitalsk2.destroy', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('digitalsk2.edit', $d->id) }}" class="btn btn-success btn-sm mb-2">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm mb-2">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(session('status'))
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
        display: flex; /* Aktifkan flexbox */
        justify-content: center; /* Pastikan modal tetap berada di tengah */
        align-items: center; /* Vertikal center */
        
        /* Mengatur transformasi untuk geser kanan */
        transform: translateX(20%); /* Geser modal 20% ke kanan */
        
        /* Ukuran maksimum modal */
        max-width: 80%;
    }
</style>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{route('digitalsk2.store')}}" enctype="multipart/form-data">
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
