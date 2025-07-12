

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Edit Seminar</h2>
    <form action="<?php echo e(route('seminars.update', $seminar->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo e(old('judul', $seminar->judul)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo e(old('tanggal', $seminar->tanggal)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="time" class="form-control" name="waktu" id="waktu" value="<?php echo e(old('waktu', $seminar->waktu)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?php echo e(old('lokasi', $seminar->lokasi)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" value="<?php echo e(old('harga', $seminar->harga)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" class="form-control" name="kuota" id="kuota" value="<?php echo e(old('kuota', $seminar->kuota)); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Seminar</button>
        <a href="<?php echo e(route('seminars.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pendaftaran-seminar\resources\views/seminars/edit.blade.php ENDPATH**/ ?>