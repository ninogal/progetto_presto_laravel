<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    @livewireStyles

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>
<body id="start">

    <x-navbar/>
    @if(session()->has('access.denied'))
    <div class="alert alert-danger">
        {{ session('access.denied') }}
    </div>
    @endif

    <div class="slot mb-5">
        {{ $slot }}
    </div>

    <a class="d-none text-center" href="#start" id="btntop"><i class="bi bi-capslock"></i></a>

    <x-footer/>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
