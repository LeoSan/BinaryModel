
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="BinaryModel.mx">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="description" content="BinaryModel" />
    <meta name="keywords" content="BinaryModel, Model, Skill, art" />
    <title>Binary Models </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @vite('resources/sass/app.scss')
</head>
<body>

<div class="container ">
    {{-- Buscador --}}
    <div class="row sticky-top">
        @include('components.search')
    </div>
    {{-- Card Binary --}}
    <div class="row ">
        @if (isset($tipo))
            @forelse ($perfiles as $item )
                @include('components.card', ['item'=>$item])
            @empty
                @include('components.data_not_found')
            @endforelse
        @else
            @foreach ( $perfiles as $item )
                @include('components.card', ['item'=>$item])
            @endforeach
        @endif
    </div>
    {{-- Modal Filter --}}
    @include('components.filters', ['filtros'=>$filtros])
</div>



</body>
</html>
