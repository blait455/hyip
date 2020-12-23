<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Users')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Active users:')); ?> <span class="font-weight-semibold text-default">#<?php echo e($activeusers); ?></span></li>
                  <li><?php echo e(__('Blocked users:')); ?> <span class="font-weight-semibold text-default">#<?php echo e($blockedusers); ?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Support Ticket')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Open tickets:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($openticket); ?></span></li>
                  <li><?php echo e(__('Closed tickets:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($closedticket); ?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Platform Reviews')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Published reviews:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($pubreview); ?></span></li>
                  <li><?php echo e(__('Pending reviews:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($unpubreview); ?></span>
                  </li>
                </ul>
              </div> 
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Other Deposits')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Pending:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($pendingdep); ?></span></li>
                  <li><?php echo e(__('Approved:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($approveddep); ?></span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Withdrawal')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Pending:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($pendingwd); ?></span></li>
                  <li><?php echo e(__('Approved:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($approvedwd); ?></span>
                  </li>              
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>   
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Investment plans')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Active:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($appplan); ?></span></li>
                  <li><?php echo e(__('Disabled:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($penplan); ?></span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title"><?php echo e(__('Investment')); ?></h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li><?php echo e(__('Active:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($appprofit); ?></span></li>
                  <li><?php echo e(__('Completed:')); ?> <span class="font-weight-semibold text-default">
                    #<?php echo e($penprofit); ?></span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>