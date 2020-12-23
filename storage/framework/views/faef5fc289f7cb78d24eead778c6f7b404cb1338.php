<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body text-dark">
            <div class="">
              <h3 class="text-dark"><?php echo e($title); ?></h3>
                <?php
                    $interest=$currency->symbol.(($plan->min_deposit*($plan->percent/100)*castrotime($plan->duration.' '.$plan->period))-$plan->min_deposit);
                    $compound=$currency->symbol.$plan->min_deposit*($plan->percent/100)*castrotime($plan->duration.' '.$plan->period);
                ?>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Name')); ?>:<?php echo e($plan->name); ?></span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Duration')); ?>:<?php echo e($plan->duration.' '.$plan->period); ?>(s)</span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Amount')); ?>:<?php echo e($currency->symbol.number_format($amount)); ?></span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Interest')); ?>:<?php echo e($interest); ?></span><br>
              <span class="mt-0 mb-5 text-sm"><?php echo e(__('Compound Interest')); ?>:<?php echo e($compound); ?></span>
              <?php if(isset($coupon)): ?>
                <hr>
                <span class="mt-0 mb-5 text-sm"><?php echo e(__('Coupon code')); ?>:<?php echo e($coupon->code); ?></span><br>
                <span class="mt-0 mb-5 text-sm"><?php echo e(__('Percent off')); ?>:<?php echo e($coupon->percent); ?>%</span><br>
                <span class="mt-0 mb-5 text-sm"><?php echo e(__('Total')); ?>:<?php echo e($currency->symbol); ?><?php echo e($amount-($amount*$coupon->percent/100)); ?></span>
                <form action="<?php echo e(url('user/buy')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <br>
                    <input type="hidden" name="coupon" value="1">
                    <input type="hidden" name="code" value="<?php echo e($coupon->code); ?>">
                    <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                    <input type="hidden" name="plan" value="<?php echo e($plan->id); ?>">
                    <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Confirm')); ?></button>
                </form>
            <?php else: ?>
                <form action="<?php echo e(url('user/buy')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <br>
                  <input type="hidden" name="coupon" value="0">
                  <input type="hidden" name="code" value="">
                  <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                  <input type="hidden" name="plan" value="<?php echo e($plan->id); ?>">
                  <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Confirm')); ?></button>
                </form>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/trading/preview.blade.php ENDPATH**/ ?>