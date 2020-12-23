
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-white">
        <div class="card-body">
          <div class="align-item-sm-center flex-sm-nowrap text-center">
            <div class="">
              <h4 class="mb-0 text-primary">
              <?php echo e(__('PLEASE SEND EXACTLY')); ?> <span class="text-dark"> <?php echo e($bcoin); ?></span> <?php echo e(__('BTC')); ?>

              </h4>              
              <h4 class="mb-0 text-primary">
              <?php echo e(__('TO')); ?> <span class="text-dark"> <?php echo e($wallet); ?></span>
              </h4>
              <?php echo $qrurl; ?>

              <br><br>
              <h4 class="text-white" ><?php echo e(__('SCAN TO SEND')); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/coinpaybtc.blade.php ENDPATH**/ ?>