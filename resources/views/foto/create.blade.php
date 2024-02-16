@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>MEMBUAT FOTO</h2>
                <a class="btn btn-secondary" href="{{ route('foto.index') }}">Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Input gagal.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_foto" class="form-label">ID FOTO:</label>
                        <input type="text" id="id_foto" name="id_foto" class="form-control" placeholder="ID FOTO">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul_foto" class="form-label">JUDUL FOTO:</label>
                            <input type="text" id="judul_foto" name="judul_foto" class="form-control" placeholder="JUDUL FOTO">
                        </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Picture</label>
                        <input type="file" class="form-control" name="picture" accept="image/*">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">DESKRIPSI:</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control" placeholder="DESKRIPSI"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_unggah" class="form-label">TANGGAL UNGGAH:</label>
                        <input type="date" id="tanggal_unggah" name="tanggal_unggah" class="form-control" placeholder="TANGGAL UNGGAH">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lokasi_file" class="form-label">LOKASI FILE:</label>
                        <input type="text" id="lokasi_file" name="lokasi_file" class="form-control" placeholder="LOKASI FILE">
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection