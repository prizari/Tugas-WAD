
@extends('layouts.app')

@section('title', 'Master Event')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')

<div class="header-master">

    <h1>Master Event</h1>

    <a href="{{ route('events.create') }}"class="btn-tambah">+ Tambah Event</a>

</div>

@if(session('success'))
    <p style="margin-left:30vh; color:green;">{{ session('success') }}</p>
@endif

<div class="wrapper" id="event-list">

    @forelse($events as $event)

        <div class="card">

            <div class="event-image-placeholder">EVENT</div>

            <h2 class="card-title">{{ $event->judul_event }}</h2>

            <div class="event-info">

                <p class="event-description">{{ $event->deskripsi }}</p>

                <p>Kategori: {{ $event->kategori }}</p>

                <p>Silabus: {{ $event->silabus }}</p>

                <p>Durasi: {{ $event->durasi_sesi }} menit</p>

            </div>

            <div class="card-action">

                <a href="{{ route('events.edit', $event) }}"class="btn-edit">Edit</a>

                <form
                    action="{{ route('events.destroy', $event) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus event ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn-delete">Hapus</button>

                </form>

            </div>

        </div>

    @empty

        <p>Belum ada event yang tersedia.</p>

    @endforelse

</div>

@endsection
