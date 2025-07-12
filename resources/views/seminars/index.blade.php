@extends('layouts.app')

@section('title', 'Daftar Seminar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-calendar"></i> Daftar Seminar</h2>
            <a href="{{ route('seminars.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Seminar
            </a>
        </div>

        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('seminars.index') }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari seminar..." 
                                   value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-outline-primary w-100">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Seminars Table -->
        <div class="card">
            <div class="card-body">
                @if($seminars->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>Harga</th>
                                    <th>Slot Tersedia</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seminars as $seminar)
                                <tr>
                                    <td>{{ $loop->iteration + ($seminars->currentPage() - 1) * $seminars->perPage() }}</td>
                                    <td>{{ $seminar->title }}</td>
                                    <td>{{ $seminar->date->format('d/m/Y') }}</td>
                                    <td>{{ $seminar->time->format('H:i') }}</td>
                                    <td>{{ $seminar->location }}</td>
                                    <td>Rp {{ number_format($seminar->price, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $seminar->available_slots > 0 ? 'success' : 'danger' }}">
                                            {{ $seminar->available_slots }} / {{ $seminar->max_participants }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('seminars.show', $seminar) }}" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('seminars.edit', $seminar) }}" 
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('seminars.destroy', $seminar) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $seminars->links() }}
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada seminar yang ditemukan</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection