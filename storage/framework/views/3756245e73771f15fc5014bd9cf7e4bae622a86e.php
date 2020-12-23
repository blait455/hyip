<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0"><?php echo e(__('Send email')); ?></h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('user.email.send')); ?>" method="post">
            <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('To')); ?>:</label>
                    <div class="col-lg-10">
                        <input type="text" name="to" maxlength="200" value="<?php echo e($email); ?>" class="form-control readonly" required>
                    </div>
                </div>                        
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Name')); ?>:</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" maxlength="200" value="<?php echo e($name); ?>" class="form-control readonly" required>
                    </div>
                </div>                        
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Subject')); ?>:</label>
                    <div class="col-lg-10">
                        <input type="text" name="subject" maxlength="200" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2"><?php echo e(__('Message')); ?>:</label>
                    <div class="col-lg-10">
                        <textarea type="text" name="message" rows="4" class="form-control" required></textarea>
                    </div>
                </div>          
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Send')); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/user/email.blade.php ENDPATH**/ ?>