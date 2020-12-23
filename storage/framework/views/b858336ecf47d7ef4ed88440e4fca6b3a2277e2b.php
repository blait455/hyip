

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body text-dark">
            <div class="">
              <h3 class="text-dark"><?php echo e($gate->gateway['name']); ?></h3>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Amount')); ?>:<?php echo e($currency->symbol.number_format($gate->amount)); ?></span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Charge')); ?>:<?php echo e($currency->symbol.round($gate->charge, 2)); ?></span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Total')); ?>:<?php echo e($currency->symbol.number_format($gate->amount)); ?></span><br><br>
                  <a href="<?php echo e(route('osit.confirm')); ?>" class="btn btn-success btn-sm"><?php echo e(__('Confirm')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/fund/preview.blade.php ENDPATH**/ ?>