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
            ::selection {
                background-color: #D9EAFD;
                color: #212121;
            }
    
            ::-webkit-selection {
                background-color: #D9EAFD;
                color: #212121;
            }
    
            /* Menggunakan flexbox untuk memastikan modal di tengah */
            .modal-dialog {
                display: flex;
                justify-content: center;
                align-items: center;
                transform: translateX(20%);
                max-width: 80%;
            }
        </style>
        <!-- Modal untuk Edit Data -->
        
    </div>

    <!-- Script yang diperlukan -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
@endsection
