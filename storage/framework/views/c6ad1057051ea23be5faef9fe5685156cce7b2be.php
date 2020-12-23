
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <h4 class="display-2 text-default">
      <?php if(Auth::guard('user')->user()->status == 1 ): ?>
      <?php echo e(__('Account has been blocked')); ?>

      <?php endif; ?>
    </h4>
    <?php if(Auth::guard('user')->user()->email_verify == 0 ): ?>
      <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
        <div class="card-header header-elements-inline">
          <div class="row justify-content-between align-items-center">
              <div class="col">
                <h3 class="mb-0"><?php echo e(__('Verify Email address')); ?></h3>
              </div>
              <div class="col-auto">
                <form action="<?php echo e(route('user.send-emailVcode')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e(Auth::guard('user')->user()->id); ?>">
                  <input type="hidden" class="form-control" value="<?php echo e(Auth::guard('user')->user()->email); ?>" readonly required>              
                  <button type="submit" class="btn btn-neutral btn-sm"><i class="fa fa-spinner"></i><?php echo e(__(' Resend code')); ?></button>
                </form>
              </div>
          </div>
        </div>      
        <div class="card-body">
          <form action="<?php echo e(route('user.email-verify')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
              <label class="col-form-label col-lg-12"><?php echo e(__('Enter Code')); ?></label>
              <div class="col-lg-6">
                <input type="hidden"  name="id" value="<?php echo e(Auth::guard('user')->user()->id); ?>">
                <input type="text" name="email_code" class="form-control" placeholder="Verification Code" required>
              </div>
            </div>               
            <div class="text-left">
              <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Verify Code')); ?></button>
            </div>
          </form>
        </div>
      </div>    
      <?php elseif(Auth::guard('user')->user()->phone_verify == 0 ): ?>
      <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
        <div class="card-header header-elements-inline">
          <div class="row justify-content-between align-items-center">
              <div class="col">
                <h3 class="mb-0"><?php echo e(__('Verify Mobile number')); ?></h3>
              </div>
              <div class="col-auto">
                <form action="<?php echo e(route('user.sms-verify')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e(Auth::guard('user')->user()->id); ?>">
                  <input type="hidden" class="form-control" value="<?php echo e(Auth::guard('user')->user()->phone); ?>" readonly required>              
                  <button type="submit" class="btn btn-neutral btn-sm"><i class="fa fa-spinner"></i><?php echo e(__(' Resend code')); ?></button>
                </form>
              </div>
          </div>
        </div>      
        <div class="card-body">
          <form action="<?php echo e(route('user.sms-verify')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
              <label class="col-form-label col-lg-12"><?php echo e(__('Enter Code')); ?></label>
              <div class="col-lg-6">
                <input type="hidden"  name="id" value="<?php echo e(Auth::guard('user')->user()->id); ?>">
                <input type="text" name="sms_code" class="form-control" placeholder="Verification Code" required>
              </div>
            </div>               
            <div class="text-left">
              <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Verify Code')); ?></button>
            </div>
          </form>
        </div>
      </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/profile/verify.blade.php ENDPATH**/ ?>