<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>document</title>
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">tambah foto</h2>
        @foreach ($images as $image)
        <div class="position-relative d-inline-block">
            @if (Str::endsWith($image->image, ['.png', '.jpg', '.jpeg', '.gif']))
                <img src="{{ asset('/image/'.$image->image) }}" width="640" height="360" class="card-img-top" alt="Image">
            @elseif (Str::endsWith($image->image, ['.mp4', '.avi', '.mov', '.wmv']))
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/storage/'.$image->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                Unsupported file format.
            @endif
        </div>
        
                <div>{{ $image->caption }}</div>
                <div>{{ $image->created_at->format('d F Y') }}</div>
                <form action="{{ route('images.destroy',$image->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin foto ini?')">Hapus</button>
                </form>
            <br>
        @endforeach
        <a class="btn btn-warning" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a class="btn btn-success" href="{{ route('images.create') }}">Tambah</a>
        
            </td>
        </tr>
    </div>
    {!! $images->withQueryString()->Links('pagination::bootstrap-4') !!}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>