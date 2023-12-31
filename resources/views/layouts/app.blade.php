<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Binary Models</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @vite('resources/sass/app.scss')
</head>
<body>
@include('layouts.header')
<div id="app" class="py-5">
    <main id="content-app" class="d-flex flex-column">
        <div id="content">
            <div class="container py-6">
                @include('layouts.alerts')
                @yield('content')
            </div>
        </div>
    </main>
</div>
@include('layouts.footer')

</body>
<script type="module">
    window.base_url = "{{ url('/') }}";
</script>
@vite('resources/js/app.js')
</html>
