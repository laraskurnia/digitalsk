@extends('layout.menu2')
@section('konten2')

<a href="{{ route('home') }}" class="btn btn-secondary btn-sm" title="Home">
    <i class="fa fa-home mr-2"></i>Home
</a>

<button type="button" data-toggle="modal" data-target="#tambah" 
class="btn btn-info btn-sm" title="Tambah Data Kenaikan Pangkat"><i class="fa fa-plus"></i> &nbsp; Tambah Data</button>
<br />

<div class="table-responsive">
    <table class="table table-bordered table-hover" id="example">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>Pangkat Lama</th>
                <th>Pangkat baru</th>
                <th>Jabatan</th>
                <th>Tindakan</th>
            </tr>
        </thead>        
        <tbody>
            @foreach ($pangkat as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->periode }}</td>
                <td>{{ $d->pangkat_lama }}</td>
                <td>{{ $d->pangkat_baru }}</td>
                <td>{{ $d->jabatan }}</td>
                <td>
                    <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('pangkat.destroy', $d->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('pangkat.edit', $d->id) }}" class="btn btn-success btn-sm mb-2">
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
            icon: "{{ session('status')['icon'] }}"
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

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{route('pangkat.store')}}" enctype="multipart/form-data">
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
                        <label for="nama_file">Nama</label>
                        <input type="text" class="form-control" id="nama_file" name="nama_file" required>
                        @error('nama_file') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" class="form-control" id="periode" name="periode" required>
                        @error('periode') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_upload">Pangkat Lama</label>
                        <input type="text" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                        @error('tanggal_upload') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_upload">Pangkat Baru</label>
                        <input type="text" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                        @error('tanggal_upload') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_upload">Jabatan</label>
                        <input type="text" class="form-control" id="tanggal_upload" name="tanggal_upload" required>
                        @error('tanggal_upload') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times"></i> Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection