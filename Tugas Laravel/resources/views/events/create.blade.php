@extends('layouts.app')

@section('title', 'Tambah Event')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/stylingButton.css') }}">
@endpush

@section('content')

<div class="form-container">

    <h1>Tambah Event</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <label for="judul_event">Judul Event:</label>
        <input type="text" name="judul_event" maxlength="100" id="judul_event" value="{{ old('judul_event') }}" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" maxlength="180" required>{{ old('deskripsi') }}</textarea>

        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Teknologi" @selected(old('kategori') == 'Teknologi')>Teknologi</option>
            <option value="Bisnis" @selected(old('kategori') == 'Bisnis')>Bisnis</option>
        </select>

        <label for="silabus">Silabus</label>
        <textarea name="silabus" id="silabus" required>{{ old('silabus') }}</textarea>

        <label for="durasi_sesi">Durasi Sesi (menit)</label>
        <input type="number" name="durasi_sesi" min="1" id="durasi_sesi" value="{{ old('durasi_sesi') }}" required>

        <button type="submit" class="btn-submit">Simpan</button>

        <a href="{{ route('events.index') }}" class="btn-kembali">Kembali</a>

    </form>

</div>
@endsection