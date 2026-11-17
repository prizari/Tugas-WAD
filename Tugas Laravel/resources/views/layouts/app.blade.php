<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Hub')</title>
    <link rel="stylesheet" href="{{ asset('css/styling.css') }}">
    @stack('styles')
</head>
<body>
    <div class="container">

        <a id="event-hub" href="{{ route('home') }}">Event Hub</a>

        <a href="{{ route('events.index') }}">Master Event</a>

        <a href="{{ route('home') }}">Pembicara/Speaker</a>

        <a href="{{ route('home') }}">Tiket & Kategori</a>

        <a href="{{ route('home') }}">Peserta & Biodata</a>

    </div>

    @yield('content')
    
</body>
</html>