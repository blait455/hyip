<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><?php echo e(__('Light Mode')); ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(url('admin/updatelogo')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="logo" lang="en" required>
                                <label class="custom-file-label" for="customFileLang" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Choose Media')); ?></label>
                            </div>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Upload')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Favicon')); ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(url('admin/updatefavicon')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang1" name="favicon" lang="en" required>
                                <label class="custom-file-label sdsd" for="customFileLang1" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Choose Media')); ?></label>
                            </div>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Upload')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/admin/web-control/logo.blade.php ENDPATH**/ ?>