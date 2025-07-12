

<?php $__env->startSection('content'); ?>
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
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row mb-4">
                        <div class="col-12">
                            <a href="<?php echo e(route('participants.index')); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali ke Daftar Peserta
                            </a>
                            <a href="<?php echo e(route('participants.edit', $participant->id)); ?>" class="btn btn-warning">
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
                            <p><strong>Nama Lengkap:</strong> <?php echo e($participant->name); ?></p> 
                            <p><strong>Email:</strong> <?php echo e($participant->email); ?></p>
                            <p><strong>Nomor Telepon:</strong> <?php echo e($participant->phone); ?></p> 
                            <p><strong>Alamat:</strong> <?php echo e($participant->address); ?></p> 
                            <p><strong>Institusi:</strong> <?php echo e($participant->institution ?? '-'); ?></p>
                            <p><strong>Status Pendaftaran:</strong> 
                                <span class="badge 
                                    <?php if($participant->status == 'registered'): ?> bg-info 
                                    <?php elseif($participant->status == 'confirmed'): ?> bg-success 
                                    <?php elseif($participant->status == 'cancelled'): ?> bg-danger 
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($participant->status)); ?>

                                </span>
                            </p>
                            <p><strong>Catatan:</strong> <?php echo e($participant->catatan ?? '-'); ?></p>
                        </div>

                        <div class="col-md-6">
                            <h5 class="card-title text-primary">Detail Seminar</h5>
                            <hr>
                            <?php if($participant->seminar): ?>
                                <p><strong>Nama Seminar:</strong> <?php echo e($participant->seminar->title); ?></p> 
                                <p><strong>Tanggal:</strong> <?php echo e(\Carbon\Carbon::parse($participant->seminar->date)->format('d F Y')); ?></p> 
                                <p><strong>Waktu:</strong> <?php echo e($participant->seminar->time); ?></p> 
                                <p><strong>Lokasi:</strong> <?php echo e($participant->seminar->location); ?></p> 
                                <p><strong>Harga:</strong> Rp <?php echo e(number_format($participant->seminar->price, 0, ',', '.')); ?></p> 
                                <p><strong>Deskripsi:</strong> <?php echo e($participant->seminar->description); ?></p> 
                                <p><strong>Slot Tersedia:</strong> <?php echo e($participant->seminar->available_slots); ?></p> 
                            <?php else: ?>
                                <p class="text-muted">Seminar tidak ditemukan atau sudah dihapus.</p>
                            <?php endif; ?>
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
                <p>Apakah Anda yakin ingin menghapus data peserta <strong><?php echo e($participant->name); ?></strong>?</p> 
                <p class="text-danger"><small>Data yang dihapus tidak dapat dikembalikan!</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="<?php echo e(route('participants.destroy', $participant->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pendaftaran-seminar\resources\views/participants/show.blade.php ENDPATH**/ ?>