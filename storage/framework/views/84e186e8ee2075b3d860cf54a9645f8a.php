

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-body p-4">

            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-3" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            
            <h1 class="h2 fw-bold mb-3" style="color: #4b3b43;">Halaman Users</h1>

            
            <div class="mb-3">
                <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-cream fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i> Tambah User
                </a>
            </div>

            
            <form action="<?php echo e(route('admin.users')); ?>" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text"
                           name="search"
                           value="<?php echo e(request('search')); ?>"
                           class="form-control"
                           placeholder="Cari nama user...">

                    <button class="btn btn-outline-secondary" type="submit">
                        Cari
                    </button>
                </div>
            </form>

            
            <div class="table-responsive">
                <table class="table align-middle border-0 mb-0 w-100" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th scope="col" style="color: #4b3b43; width: 5%;">#</th>
                            <th scope="col" style="color: #4b3b43; width: 25%;">Name</th>
                            <th scope="col" style="color: #4b3b43; width: 30%;">Email</th>
                            <th scope="col" style="color: #4b3b43; width: 20%;">Role</th>
                            <th scope="col" style="color: #4b3b43; width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-0">
                            <td><?php echo e($users->firstItem() + $loop->index); ?></td>
                            <td class="fw-medium"><?php echo e($user->name); ?></td>
                            <td class="text-muted"><?php echo e($user->email); ?></td>
                            <td>
                                <span class="badge bg-light text-dark border px-2 py-1 rounded-pill">
                                    <?php echo e($user->role->name ?? $user->role); ?>

                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center justify-content-center gap-1">
                                    
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-sm btn-warning fw-bold text-white px-2 py-1" style="font-size: 12px;">
                                        Edit Akun
                                    </a>

                                    <span class="text-muted mx-1">|</span>

                                    
                                    <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus user ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit" class="btn btn-sm btn-danger fw-bold px-2 py-1" style="font-size: 12px;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="border-0">
                            <td colspan="5" class="text-center py-4 text-muted">
                                Belum ada data user
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="mt-3 d-flex flex-column flex-sm-row justify-content-end align-items-center gap-3 border-0 pt-0">
                <div class="text-muted small mb-0">
                    Menampilkan <strong><?php echo e($users->firstItem() ?? 0); ?></strong> - <strong><?php echo e($users->lastItem() ?? 0); ?></strong> dari <strong><?php echo e($users->total()); ?></strong> hasil
                </div>
                <div class="pagination-clean">
                    <?php echo e($users->links()); ?>

                </div>
            </div>

        </div>
    </div>

</div>


<style>
    .btn-cream {
        background-color: #f5e6d3;
        color: #4b3b43;
        border: 1px solid #ebd4b9;
        transition: all 0.2s ease-in-out;
    }
    .btn-cream:hover {
        background-color: #ebd4b9;
        color: #35282e;
    }

    .table > :not(caption) > * > * {
        border-bottom-width: 0 !important;
        padding: 0.6rem 0.4rem !important;
    }

    /* Menyembunyikan teks keterangan Bahasa Inggris bawaan dari Laravel $users->links() */
    .pagination-clean nav div:first-child p.text-sm,
    .pagination-clean nav .small.text-muted {
        display: none !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POSKEYLA3\resources\views/users/index.blade.php ENDPATH**/ ?>