

<?php $__env->startSection('title', 'Daftar Seminar'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-calendar"></i> Daftar Seminar</h2>
            <a href="<?php echo e(route('seminars.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Seminar
            </a>
        </div>

        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('seminars.index')); ?>">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari seminar..." 
                                   value="<?php echo e(request('search')); ?>">
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
                <?php if($seminars->count() > 0): ?>
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
                                <?php $__currentLoopData = $seminars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seminar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration + ($seminars->currentPage() - 1) * $seminars->perPage()); ?></td>
                                    <td><?php echo e($seminar->title); ?></td>
                                    <td><?php echo e($seminar->date->format('d/m/Y')); ?></td>
                                    <td><?php echo e($seminar->time->format('H:i')); ?></td>
                                    <td><?php echo e($seminar->location); ?></td>
                                    <td>Rp <?php echo e(number_format($seminar->price, 0, ',', '.')); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($seminar->available_slots > 0 ? 'success' : 'danger'); ?>">
                                            <?php echo e($seminar->available_slots); ?> / <?php echo e($seminar->max_participants); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('seminars.show', $seminar)); ?>" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('seminars.edit', $seminar)); ?>" 
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('seminars.destroy', $seminar)); ?>" 
                                                  method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($seminars->links()); ?>

                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada seminar yang ditemukan</h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pendaftaran-seminar\resources\views/seminars/index.blade.php ENDPATH**/ ?>