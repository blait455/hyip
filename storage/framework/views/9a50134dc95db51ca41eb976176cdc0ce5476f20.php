

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-future">
        <div class="card-body">
          <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
              <ul class="list list-unstyled mb-0 text-dark text-xs">
                <li><?php echo e(__('Amount')); ?>: <span class="font-weight-semibold"><?php echo e($currency->symbol.number_format($amount)); ?></span></li>
                <li><?php echo e(__('Email')); ?>: <span class="font-weight-semibold"><?php echo e($email); ?></span></li>
                <li><?php echo e(__('Transfer fee')); ?>: <span class="font-weight-semibold"><?php echo e($currency->symbol.number_format($amount*$set->transfer_charge/100)); ?></span></li>
                <li><?php echo e(__('Total')); ?>: <span class="font-weight-semibold"><?php echo e($currency->symbol.number_format($amount+($amount*$set->transfer_charge/100))); ?></span></li>
              </ul>
            </div>
          </div><br>
          <form action="<?php echo e(route('submit.localpreview')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="email" value="<?php echo e($email); ?>">
            <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
            <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Send Money')); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/transfer/preview.blade.php ENDPATH**/ ?>