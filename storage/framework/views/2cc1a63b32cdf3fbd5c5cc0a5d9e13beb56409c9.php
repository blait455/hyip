<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">  
      <div class="col-lg-8">
        <div class="row">
          <?php if(count($earning)>0): ?>
            <?php $__currentLoopData = $earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6">
                <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-12">
                          <!-- Title -->
                          <h5 class="h4 mb-0">#<?php echo e($val->ref_id); ?></h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Amount')); ?>: <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('From')); ?>: <?php echo e($val->shared['first_name']); ?> <?php echo e($val->shared['last_name']); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Plan')); ?>: <?php echo e($val->plan['name']); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Created')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></p>
                          <p class="text-sm text-dark mb-0"><?php echo e(__('Updated')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <div class="col-md-12">
              <p class="text-center text-muted card-text mt-8">No Referral Earnings</p>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-12">
          <?php echo e($earning->links()); ?>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <?php if($set->referral==1): ?>
        <div class="card" style="background-color:<?php echo e($set->m_c); ?>;">
          <div class="card-body">
            <h3 class="card-title mb-3"><?php echo e(__('Referral link')); ?></h3>
            <p class="card-text text-xs text-dark"><?php echo e(__('Automatically Top up your Balance by Sharing your Referral Link, Earn a percentage of whatever Plan your Referred user Buys.')); ?></p>
            <span class="form-text text-xs"><?php echo e(url('/')); ?>/referral/<?php echo e($user->username); ?></span>
            <button type="button" class="btn-icon-clipboard" data-clipboard-text="<?php echo e(url('/')); ?>/referral/<?php echo e($user->username); ?>" title="Copy"><?php echo e(__('Copy')); ?></button>
          </div>
        </div>
        <?php endif; ?>
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Referrals</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <tbody>
                  <?php $__currentLoopData = $referral; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="table-user">
                        <img src="<?php echo e(url('/')); ?>/asset/profile/<?php echo e($val->user['image']); ?>" class="avatar rounded-circle mr-3">
                      </td>                      
                      <td>
                        <?php echo e($val->user['first_name']); ?> <?php echo e($val->user['last_name']); ?>

                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      </div> 
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/profile/referral.blade.php ENDPATH**/ ?>