@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-user-graduate me-2"></i>
                        Detail Peserta Seminar
                    </h4>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="{{ route('participants.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali ke Daftar Peserta
                            </a>
                            <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>
                                Edit Peserta
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-1"></i>
                                Hapus Peserta
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title text-primary">Informasi Pribadi</h5>
                            <hr>
                            <p><strong>Nama Lengkap:</strong> {{ $participant->name }}</p> {{-- Diperbaiki: nama_lengkap menjadi name --}}
                            <p><strong>Email:</strong> {{ $participant->email }}</p>
                            <p><strong>Nomor Telepon:</strong> {{ $participant->phone }}</p> {{-- Diperbaiki: nomor_telepon menjadi phone --}}
                            <p><strong>Alamat:</strong> {{ $participant->address }}</p> {{-- Diperbaiki: alamat menjadi address --}}
                            <p><strong>Institusi:</strong> {{ $participant->institution ?? '-' }}</p>
                            <p><strong>Status Pendaftaran:</strong> 
                                <span class="badge 
                                    @if($participant->status == 'registered') bg-info 
                                    @elseif($participant->status == 'confirmed') bg-success 
                                    @elseif($participant->status == 'cancelled') bg-danger 
                                    @endif">
                                    {{ ucfirst($participant->status) }}
                                </span>
                            </p>
                            <p><strong>Catatan:</strong> {{ $participant->catatan ?? '-' }}</p>
                        </div>

                        <div class="col-md-6">
                            <h5 class="card-title text-primary">Detail Seminar</h5>
                            <hr>
                            @if($participant->seminar)
                                <p><strong>Nama Seminar:</strong> {{ $participant->seminar->title }}</p> {{-- Diperbaiki: nama_seminar menjadi title --}}
                                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($participant->seminar->date)->format('d F Y') }}</p> {{-- Diperbaiki: tanggal menjadi date --}}
                                <p><strong>Waktu:</strong> {{ $participant->seminar->time }}</p> {{-- Diperbaiki: waktu menjadi time --}}
                                <p><strong>Lokasi:</strong> {{ $participant->seminar->location }}</p> {{-- Diperbaiki: lokasi menjadi location --}}
                                <p><strong>Harga:</strong> Rp {{ number_format($participant->seminar->price, 0, ',', '.') }}</p> {{-- Diperbaiki: harga menjadi price --}}
                                <p><strong>Deskripsi:</strong> {{ $participant->seminar->description }}</p> {{-- Diperbaiki: deskripsi menjadi description --}}
                                <p><strong>Slot Tersedia:</strong> {{ $participant->seminar->available_slots }}</p> {{-- Diperbaiki: kuota menjadi available_slots --}}
                            @else
                                <p class="text-muted">Seminar tidak ditemukan atau sudah dihapus.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Konfirmasi Hapus Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data peserta <strong>{{ $participant->name }}</strong>?</p> {{-- Diperbaiki: nama_lengkap menjadi name --}}
                <p class="text-danger"><small>Data yang dihapus tidak dapat dikembalikan!</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
@endsection