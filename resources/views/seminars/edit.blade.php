@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Seminar</h2>
    <form action="{{ route('seminars.update', $seminar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $seminar->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal', $seminar->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="time" class="form-control" name="waktu" id="waktu" value="{{ old('waktu', $seminar->waktu) }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ old('lokasi', $seminar->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $seminar->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" class="form-control" name="kuota" id="kuota" value="{{ old('kuota', $seminar->kuota) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Seminar</button>
        <a href="{{ route('seminars.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection