@extends('layouts.app')

@section('title', 'Daftar Peserta')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-users"></i> Daftar Peserta</h2>
            <a href="{{ route('participants.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Daftar Peserta
            </a>
        </div>

        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('participants.index') }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari peserta..." 
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

        <!-- Participants Table -->
        <div class="card">
            <div class="card-body">
                @if($participants->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Seminar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($participants as $participant)
                                <tr>
                                    <td>{{ $loop->iteration + ($participants->currentPage() - 1) * $participants->perPage() }}</td>
                                    <td>{{ $participant->name }}</td>
                                    <td>{{ $participant->email }}</td>
                                    <td>{{ $participant->phone }}</td>
                                    <td>{{ $participant->seminar->title }}</td>
                                    <td>
                                        <span class="badge bg-{{ $participant->status == 'confirmed' ? 'success' : ($participant->status == 'cancelled' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($participant->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('participants.show', $participant) }}" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('participants.edit', $participant) }}" 
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('participants.destroy', $participant) }}" 
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
                    {{ $participants->links() }}
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-user-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada peserta yang ditemukan</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection