
@extends('layouts.app')

@section('title', 'Edit Event')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/stylingButton.css') }}">
@endpush

@section('content')

<div class="form-container">

    <h1>Edit Event</h1>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('events.update', $event->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label for="judul_event">Judul Event</label>
        <input
            type="text"
            id="judul_event"
            name="judul_event"
            maxlength="100"
            value="{{ old('judul_event', $event->judul_event) }}"
            required>

        <label for="deskripsi">Deskripsi</label>
        <textarea
            id="deskripsi"
            name="deskripsi"
            maxlength="180"
            required>{{ old('deskripsi', $event->deskripsi) }}</textarea>

        <label for="kategori">Kategori</label>
        <select id="kategori"
                name="kategori"
                required>

            <option value="">Pilih Kategori</option>

            <option value="Teknologi"
                @selected(old('kategori', $event->kategori) == 'Teknologi')>
                Teknologi
            </option>

            <option value="Bisnis"
                @selected(old('kategori', $event->kategori) == 'Bisnis')>
                Bisnis
            </option>

        </select>

        <label for="silabus">Silabus</label>
        <textarea
            id="silabus"
            name="silabus"
            required>{{ old('silabus', $event->silabus) }}</textarea>

        <label for="durasi_sesi">
            Durasi Sesi (menit)
        </label>
        <input
            type="number"
            id="durasi_sesi"
            name="durasi_sesi"
            min="1"
            value="{{ old('durasi_sesi', $event->durasi_sesi) }}"
            required>

        <button type="submit">
            Simpan Perubahan
        </button>

        <a href="{{ route('events.index') }}"
           class="btn-kembali">
            Kembali
        </a>

    </form>

</div>

@endsection

