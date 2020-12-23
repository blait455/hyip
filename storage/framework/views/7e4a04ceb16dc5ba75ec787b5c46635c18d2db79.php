<?php $__env->startSection('content'); ?>
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold"><?php echo e(__('Congifure Twilio sms')); ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.sms.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Twilio sid')); ?></label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_sid" value="<?php echo e($val->twilio_sid); ?>" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Twilio auth token')); ?></label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_auth" value="<?php echo e($val->twilio_auth); ?>" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Twilio number')); ?></label>
                            <div class="col-lg-10">
                                <input type="text" name="twilio_number" value="<?php echo e($val->twilio_number); ?>" class="form-control">
                            </div>
                        </div>          
                    <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/settings/sms.blade.php ENDPATH**/ ?>