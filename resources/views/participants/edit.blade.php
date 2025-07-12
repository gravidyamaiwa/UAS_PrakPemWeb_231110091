@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="card-title mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Edit Data Peserta Seminar
                    </h4>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali ke Detail
                            </a>
                            <a href="{{ route('participants.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-list me-1"></i>
                                Daftar Peserta
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('participants.update', $participant->id) }}" method="POST" id="editParticipantForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-user me-2"></i>
                                            Informasi Peserta
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> {{-- Diubah: nama_lengkap menjadi name --}}
                                                <strong>Nama Lengkap <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('name') is-invalid @enderror" {{-- Diubah: nama_lengkap menjadi name --}}
                                                   id="name" {{-- Diubah: nama_lengkap menjadi name --}}
                                                   name="name" {{-- Diubah: nama_lengkap menjadi name --}}
                                                   value="{{ old('name', $participant->name) }}" {{-- Diubah: nama_lengkap menjadi name --}}
                                                   placeholder="Masukkan nama lengkap"
                                                   required>
                                            @error('name') {{-- Diubah: nama_lengkap menjadi name --}}
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">
                                                <strong>Email <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email', $participant->email) }}"
                                                   placeholder="contoh@email.com"
                                                   required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label"> {{-- Diubah: nomor_telepon menjadi phone --}}
                                                <strong>Nomor Telepon <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="tel" 
                                                   class="form-control @error('phone') is-invalid @enderror" {{-- Diubah: nomor_telepon menjadi phone --}}
                                                   id="phone" {{-- Diubah: nomor_telepon menjadi phone --}}
                                                   name="phone" {{-- Diubah: nomor_telepon menjadi phone --}}
                                                   value="{{ old('phone', $participant->phone) }}" {{-- Diubah: nomor_telepon menjadi phone --}}
                                                   placeholder="08xxxxxxxxxx"
                                                   required>
                                            @error('phone') {{-- Diubah: nomor_telepon menjadi phone --}}
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label"> {{-- Diubah: alamat menjadi address --}}
                                                <strong>Alamat <span class="text-danger">*</span></strong>
                                            </label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" {{-- Diubah: alamat menjadi address --}}
                                                      id="address" {{-- Diubah: alamat menjadi address --}}
                                                      name="address" {{-- Diubah: alamat menjadi address --}}
                                                      rows="3"
                                                      placeholder="Masukkan alamat lengkap"
                                                      required>{{ old('address', $participant->address) }}</textarea> {{-- Diubah: alamat menjadi address --}}
                                            @error('address') {{-- Diubah: alamat menjadi address --}}
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            Informasi Seminar
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="seminar_id" class="form-label">
                                                <strong>Pilih Seminar <span class="text-danger">*</span></strong>
                                            </label>
                                            <select class="form-select @error('seminar_id') is-invalid @enderror" 
                                                    id="seminar_id" 
                                                    name="seminar_id" 
                                                    required>
                                                <option value="">-- Pilih Seminar --</option>
                                                @foreach($seminars as $seminar)
                                                    <option value="{{ $seminar->id }}" 
                                                            {{ old('seminar_id', $participant->seminar_id) == $seminar->id ? 'selected' : '' }}
                                                            data-tanggal="{{ $seminar->tanggal }}"
                                                            data-waktu="{{ $seminar->waktu }}"
                                                            data-lokasi="{{ $seminar->lokasi }}"
                                                            data-harga="{{ $seminar->harga }}"
                                                            data-kuota="{{ $seminar->kuota }}">
                                                        {{ $seminar->nama_seminar }} - {{ \Carbon\Carbon::parse($seminar->tanggal)->format('d/m/Y') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('seminar_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div id="seminarDetails" class="mt-3">
                                            @if($participant->seminar)
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Tanggal:</strong></div>
                                                    <div class="col-8" id="seminarTanggal">{{ \Carbon\Carbon::parse($participant->seminar->tanggal)->format('d F Y') }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Waktu:</strong></div>
                                                    <div class="col-8" id="seminarWaktu">{{ $participant->seminar->waktu }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Lokasi:</strong></div>
                                                    <div class="col-8" id="seminarLokasi">{{ $participant->seminar->lokasi }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Harga:</strong></div>
                                                    <div class="col-8" id="seminarHarga">Rp {{ number_format($participant->seminar->harga, 0, ',', '.') }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Kuota:</strong></div>
                                                    <div class="col-8" id="seminarKuota">{{ $participant->seminar->kuota }} peserta</div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">
                                                <strong>Status Pendaftaran</strong>
                                            </label>
                                            <select class="form-select @error('status') is-invalid @enderror" 
                                                    id="status" 
                                                    name="status">
                                                <option value="registered" {{ old('status', $participant->status) == 'registered' ? 'selected' : '' }}> {{-- Pastikan nilai status sesuai dengan yang ada di validasi controller ('registered', 'confirmed', 'cancelled') --}}
                                                    Terdaftar
                                                </option>
                                                <option value="confirmed" {{ old('status', $participant->status) == 'confirmed' ? 'selected' : '' }}>
                                                    Terkonfirmasi
                                                </option>
                                                <option value="cancelled" {{ old('status', $participant->status) == 'cancelled' ? 'selected' : '' }}>
                                                    Dibatalkan
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="catatan" class="form-label">
                                                <strong>Catatan</strong>
                                            </label>
                                            <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                                      id="catatan" 
                                                      name="catatan" 
                                                      rows="3"
                                                      placeholder="Catatan tambahan (opsional)">{{ old('catatan', $participant->catatan) }}</textarea>
                                            @error('catatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-1"></i>
                                        Batal
                                    </a>
                                    <button type="button" class="btn btn-outline-primary" id="previewBtn">
                                        <i class="fas fa-eye me-1"></i>
                                        Preview
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="saveBtn">
                                        <i class="fas fa-save me-1"></i>
                                        Simpan Perubahan
                                    </button>
                                }
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">
                    <i class="fas fa-eye me-2"></i>
                    Preview Data Peserta
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="previewContent">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="$('#editParticipantForm').submit()">
                    <i class="fas fa-save me-1"></i>
                    Simpan Data
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Auto-populate seminar details when seminar is selected
    $('#seminar_id').change(function() {
        var selectedOption = $(this).find('option:selected');
        var tanggal = selectedOption.data('tanggal');
        var waktu = selectedOption.data('waktu');
        var lokasi = selectedOption.data('lokasi');
        var harga = selectedOption.data('harga');
        var kuota = selectedOption.data('kuota');
        
        if (tanggal) {
            var formattedDate = new Date(tanggal).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            $('#seminarDetails').html(`
                <div class="row mb-2">
                    <div class="col-4"><strong>Tanggal:</strong></div>
                    <div class="col-8">${formattedDate}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Waktu:</strong></div>
                    <div class="col-8">${waktu || 'Tidak tersedia'}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Lokasi:</strong></div>
                    <div class="col-8">${lokasi || 'Tidak tersedia'}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Harga:</strong></div>
                    <div class="col-8">Rp ${new Intl.NumberFormat('id-ID').format(harga || 0)}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Kuota:</strong></div>
                    <div class="col-8">${kuota || 0} peserta</div>
                </div>
            `);
        } else {
            $('#seminarDetails').html('');
        }
    });

    // Preview functionality
    $('#previewBtn').click(function() {
        var name = $('#name').val(); {{-- Diubah: namaLengkap menjadi name --}}
        var email = $('#email').val();
        var phone = $('#phone').val(); {{-- Diubah: nomorTelepon menjadi phone --}}
        var address = $('#address').val(); {{-- Diubah: alamat menjadi address --}}
        var seminarText = $('#seminar_id option:selected').text();
        var status = $('#status option:selected').text();
        var catatan = $('#catatan').val();
        
        var previewContent = `
            <div class="row">
                <div class="col-md-6">
                    <h6>Informasi Peserta:</h6>
                    <p><strong>Nama:</strong> ${name}</p> {{-- Diubah: namaLengkap menjadi name --}}
                    <p><strong>Email:</strong> ${email}</p>
                    <p><strong>Telepon:</strong> ${phone}</p> {{-- Diubah: nomorTelepon menjadi phone --}}
                    <p><strong>Alamat:</strong> ${address}</p> {{-- Diubah: alamat menjadi address --}}
                </div>
                <div class="col-md-6">
                    <h6>Informasi Seminar:</h6>
                    <p><strong>Seminar:</strong> ${seminarText}</p>
                    <p><strong>Status:</strong> ${status}</p>
                    ${catatan ? `<p><strong>Catatan:</strong> ${catatan}</p>` : ''}
                </div>
            </div>
        `;
        
        $('#previewContent').html(previewContent);
        $('#previewModal').modal('show');
    });

    // Form validation
    $('#editParticipantForm').submit(function(e) {
        var isValid = true;
        
        // Check required fields
        $(this).find('input[required], select[required], textarea[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        
        // Email validation
        var email = $('#email').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            $('#email').addClass('is-invalid');
        }
        
        // Phone validation
        var phone = $('#phone').val(); {{-- Diubah: nomor_telepon menjadi phone --}}
        var phoneRegex = /^[0-9+\-\s]+$/;
        if (phone && !phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').addClass('is-invalid'); {{-- Diubah: nomor_telepon menjadi phone --}}
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Mohon periksa kembali data yang Anda masukkan!');
        }
    });

    // Auto hide alerts
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});
</script>
@endsection