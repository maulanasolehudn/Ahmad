@extends('layouts.app')

@section('content')
<div class="main-wrapper">
    <div class="main-content">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header bg-primary text-light">
                    <h3>List Foto</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <p>
                        <a class="btn btn-primary" href="{{ route('foto.create') }}">
                            <i class="bi bi-plus"></i> Tambah Foto
                        </a>
                    </p>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ID FOTO</th>
                                <th>JUDUL FOTO</th>
                                <th>PICTURES</th>
                                <th>DESKRIPSI</th>
                                <th>TANGGAL UNGGAH</th>
                                <th>LOKASI FILE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($foto as $item)
                                <tr>
                                    <td>{{ $item->id_foto }}</td>
                                    <td>
                                        @if ($item->picture)
                                            <img src="{{ asset('storage/' . $item->picture) }}" class="img-thumbnail" style="max-width: 200px; max-height: 150px;" alt="Foto {{ $item->id_foto }}">
                                        @else
                                            <span>No Picture</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->judul_foto }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->tanggal_unggah }}</td>
                                    <td>{{ $item->lokasi_file }}</td>
                                    <td class="text-center">
                                        <form action="{{route('foto.destroy', $item->id_foto)}}" method="POST">
                                            <a class="btn btn-primary btn-sm" href="{{ route('foto.edit',$item->id_foto) }}"><i class="bi bi-pencil-fill"></i></a>
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Tidak ada foto!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection