@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Hapus Seminar</h2>
    <p>Apakah Anda yakin ingin menghapus seminar berikut?</p>

    <ul>
        <li><strong>Judul:</strong> {{ $seminar->judul }}</li>
        <li><strong>Tanggal:</strong> {{ $seminar->tanggal }}</li>
        <li><strong>Lokasi:</strong> {{ $seminar->lokasi }}</li>
    </ul>

    <form action="{{ route('seminars.destroy', $seminar->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('seminars.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
