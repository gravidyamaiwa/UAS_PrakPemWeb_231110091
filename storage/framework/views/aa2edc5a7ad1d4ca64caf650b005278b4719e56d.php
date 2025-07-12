

<?php $__env->startSection('content'); ?>
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
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="<?php echo e(route('participants.show', $participant->id)); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali ke Detail
                            </a>
                            <a href="<?php echo e(route('participants.index')); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-list me-1"></i>
                                Daftar Peserta
                            </a>
                        </div>
                    </div>

                    <form action="<?php echo e(route('participants.update', $participant->id)); ?>" method="POST" id="editParticipantForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
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
                                            <label for="name" class="form-label"> 
                                                <strong>Nama Lengkap <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="text" 
                                                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="name" 
                                                   name="name" 
                                                   value="<?php echo e(old('name', $participant->name)); ?>" 
                                                   placeholder="Masukkan nama lengkap"
                                                   required>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">
                                                <strong>Email <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="email" 
                                                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="email" 
                                                   name="email" 
                                                   value="<?php echo e(old('email', $participant->email)); ?>"
                                                   placeholder="contoh@email.com"
                                                   required>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label"> 
                                                <strong>Nomor Telepon <span class="text-danger">*</span></strong>
                                            </label>
                                            <input type="tel" 
                                                   class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="phone" 
                                                   name="phone" 
                                                   value="<?php echo e(old('phone', $participant->phone)); ?>" 
                                                   placeholder="08xxxxxxxxxx"
                                                   required>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label"> 
                                                <strong>Alamat <span class="text-danger">*</span></strong>
                                            </label>
                                            <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                      id="address" 
                                                      name="address" 
                                                      rows="3"
                                                      placeholder="Masukkan alamat lengkap"
                                                      required><?php echo e(old('address', $participant->address)); ?></textarea> 
                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                            <select class="form-select <?php $__errorArgs = ['seminar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="seminar_id" 
                                                    name="seminar_id" 
                                                    required>
                                                <option value="">-- Pilih Seminar --</option>
                                                <?php $__currentLoopData = $seminars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seminar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($seminar->id); ?>" 
                                                            <?php echo e(old('seminar_id', $participant->seminar_id) == $seminar->id ? 'selected' : ''); ?>

                                                            data-tanggal="<?php echo e($seminar->tanggal); ?>"
                                                            data-waktu="<?php echo e($seminar->waktu); ?>"
                                                            data-lokasi="<?php echo e($seminar->lokasi); ?>"
                                                            data-harga="<?php echo e($seminar->harga); ?>"
                                                            data-kuota="<?php echo e($seminar->kuota); ?>">
                                                        <?php echo e($seminar->nama_seminar); ?> - <?php echo e(\Carbon\Carbon::parse($seminar->tanggal)->format('d/m/Y')); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['seminar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div id="seminarDetails" class="mt-3">
                                            <?php if($participant->seminar): ?>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Tanggal:</strong></div>
                                                    <div class="col-8" id="seminarTanggal"><?php echo e(\Carbon\Carbon::parse($participant->seminar->tanggal)->format('d F Y')); ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Waktu:</strong></div>
                                                    <div class="col-8" id="seminarWaktu"><?php echo e($participant->seminar->waktu); ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Lokasi:</strong></div>
                                                    <div class="col-8" id="seminarLokasi"><?php echo e($participant->seminar->lokasi); ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Harga:</strong></div>
                                                    <div class="col-8" id="seminarHarga">Rp <?php echo e(number_format($participant->seminar->harga, 0, ',', '.')); ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4"><strong>Kuota:</strong></div>
                                                    <div class="col-8" id="seminarKuota"><?php echo e($participant->seminar->kuota); ?> peserta</div>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="status" class="form-label">
                                                <strong>Status Pendaftaran</strong>
                                            </label>
                                            <select class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="status" 
                                                    name="status">
                                                <option value="registered" <?php echo e(old('status', $participant->status) == 'registered' ? 'selected' : ''); ?>> 
                                                    Terdaftar
                                                </option>
                                                <option value="confirmed" <?php echo e(old('status', $participant->status) == 'confirmed' ? 'selected' : ''); ?>>
                                                    Terkonfirmasi
                                                </option>
                                                <option value="cancelled" <?php echo e(old('status', $participant->status) == 'cancelled' ? 'selected' : ''); ?>>
                                                    Dibatalkan
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="catatan" class="form-label">
                                                <strong>Catatan</strong>
                                            </label>
                                            <textarea class="form-control <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                      id="catatan" 
                                                      name="catatan" 
                                                      rows="3"
                                                      placeholder="Catatan tambahan (opsional)"><?php echo e(old('catatan', $participant->catatan)); ?></textarea>
                                            <?php $__errorArgs = ['catatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="<?php echo e(route('participants.show', $participant->id)); ?>" class="btn btn-secondary">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
        var name = $('#name').val(); 
        var email = $('#email').val();
        var phone = $('#phone').val(); 
        var address = $('#address').val(); 
        var seminarText = $('#seminar_id option:selected').text();
        var status = $('#status option:selected').text();
        var catatan = $('#catatan').val();
        
        var previewContent = `
            <div class="row">
                <div class="col-md-6">
                    <h6>Informasi Peserta:</h6>
                    <p><strong>Nama:</strong> ${name}</p> 
                    <p><strong>Email:</strong> ${email}</p>
                    <p><strong>Telepon:</strong> ${phone}</p> 
                    <p><strong>Alamat:</strong> ${address}</p> 
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
        var phone = $('#phone').val(); 
        var phoneRegex = /^[0-9+\-\s]+$/;
        if (phone && !phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').addClass('is-invalid'); 
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pendaftaran-seminar\resources\views/participants/edit.blade.php ENDPATH**/ ?>