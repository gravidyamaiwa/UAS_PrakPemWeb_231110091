@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Peserta Seminar</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('participants.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- START: Tambahan untuk field Alamat --}}
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- END: Tambahan untuk field Alamat --}}

                        <div class="mb-3">
                            <label for="seminar_id" class="form-label">Pilih Seminar</label>
                            <select class="form-select @error('seminar_id') is-invalid @enderror" 
                                    id="seminar_id" name="seminar_id" required>
                                <option value="">-- Pilih Seminar --</option>
                                @foreach($seminars as $seminar)
                                    <option value="{{ $seminar->id }}" {{ old('seminar_id') == $seminar->id ? 'selected' : '' }}>
                                        {{ $seminar->title }} - {{ $seminar->date->format('d/m/Y') }} - 
                                        Rp {{ number_format($seminar->price, 0, ',', '.') }}
                                        (Sisa: {{ $seminar->available_slots }} slot)
                                    </option>
                                @endforeach
                            </select>
                            @error('seminar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('participants.index') }}" class="btn btn-secondary me-md-2">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection