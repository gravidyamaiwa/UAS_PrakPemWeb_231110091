

<?php $__env->startSection('title', 'Daftar Peserta'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-users"></i> Daftar Peserta</h2>
            <a href="<?php echo e(route('participants.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Daftar Peserta
            </a>
        </div>

        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('participants.index')); ?>">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Cari peserta..." 
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

        <!-- Participants Table -->
        <div class="card">
            <div class="card-body">
                <?php if($participants->count() > 0): ?>
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
                                <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration + ($participants->currentPage() - 1) * $participants->perPage()); ?></td>
                                    <td><?php echo e($participant->name); ?></td>
                                    <td><?php echo e($participant->email); ?></td>
                                    <td><?php echo e($participant->phone); ?></td>
                                    <td><?php echo e($participant->seminar->title); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($participant->status == 'confirmed' ? 'success' : ($participant->status == 'cancelled' ? 'danger' : 'warning')); ?>">
                                            <?php echo e(ucfirst($participant->status)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('participants.show', $participant)); ?>" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('participants.edit', $participant)); ?>" 
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('participants.destroy', $participant)); ?>" 
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
                    <?php echo e($participants->links()); ?>

                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-user-times fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada peserta yang ditemukan</h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pendaftaran-seminar\resources\views/participants/index.blade.php ENDPATH**/ ?>