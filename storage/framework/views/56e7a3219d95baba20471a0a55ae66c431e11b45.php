

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row" id="earnings">
      <div class="col-lg-8">
        <?php $__currentLoopData = $profit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card bg-future">
              <!-- Card body -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-9">
                    <h4 class="mb-0 text-dark">#<?php echo e($val->trx); ?></h4>
                  </div>                 
                  <div class="col-3">
                    <?php if($val->recurring==1): ?>
                    <a href="<?php echo e(url('/')); ?>/user/cancel-recurring/<?php echo e($val->id); ?>" class="btn btn-sm btn-neutral"><?php echo e(__('Cancel Recurring')); ?></a>
                    <?php elseif($val->recurring==0): ?>
                    <a href="<?php echo e(url('/')); ?>/user/start-recurring/<?php echo e($val->id); ?>" class="btn btn-sm btn-neutral"><?php echo e(__('Start Recurring')); ?></a>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col">
                    <p class="text-xs text-dark mb-0"><?php echo e(__('Plan')); ?>: <?php echo e($val->plan->name); ?></p>
                    <p class="text-xs text-dark mb-0"><?php echo e(__('Started')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->date))); ?></p>
                    <p class="text-xs text-dark mb-0"><?php echo e(__('Deposit')); ?>: <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
                    <p class="text-xs text-dark mb-0"><?php echo e(__('Percent')); ?>: <?php echo e($val->plan->percent); ?>%</p>
                    <p class="text-xs text-dark mb-0"><?php echo e(__('Duration')); ?>: <?php echo e($val->plan->duration.' '.$val->plan->period); ?>(s)</p>
                    <ul class="list-group list-group-flush list my--1 mb-3">
                      <li class="list-group-item px-0">
                        <div class="row align-items-center">
                          <div class="col">
                            <span class="text-xs text-dark mb-0"><?php echo e($currency->symbol.number_format($val->profit)); ?> / <?php echo e($currency->symbol); ?><?php echo e(($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period)); ?> <?php if($val->plan->bonus!=null): ?>+ <?php echo e(__('Trading Bonus')); ?> <?php echo e($currency->symbol.number_format($val->amount*$val->plan->bonus/100)); ?> <?php endif; ?></span>
                            <div class="progress progress-xs mb-0">
                            <?php $pp=($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period); ?>
                              <div class="progress-bar bg-progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(($val->profit*100)/$pp); ?>%;"></div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="col-lg-4">
        <div class="card bg-future">
          <div class="card-body">
            <p class="card-text text-xs text-dark"><?php echo e(__('Payouts wont be available till end of plan duration. Interest means profit and compound is sum of money invested plus profit. Trading bonus is a certain percent of your compound interest. If interest reads minus, dont invest, you will lose money')); ?></p>
          </div>
        </div>
        <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="">
            <div class="pricing card-group flex-column flex-md-row mb-3">
              <div class="card card-pricing border-0 bg-future text-center mb-2">
                <div class="card-header bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-lg-12 text-right">
                      <a href="#" data-toggle="modal" data-target="#calculate<?php echo e($val->id); ?>" class="btn btn-sm btn-neutral"><?php echo e(__('Calculate')); ?></a>
                      <div class="modal fade" id="calculate<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card bg-future border-0 mb-0">
                                <div class="card-header bg-transparent pb-5">
                                  <div class="text-dark text-center mt-2 mb-3"><small><?php echo e(__('Calculate profit')); ?></small></div>
                                  <div class="btn-wrapper text-center">
                                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0"><?php echo e($val->name); ?></h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <form role="form" action="<?php echo e(url('user/calculate')); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                                        </div>
                                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                        <input type="hidden" name="plan_id" value="<?php echo e($val->id); ?>"> 
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-success btn-sm my-4"><?php echo e(__('Calculate')); ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>
                      <div class="modal fade" id="buy<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card bg-future border-0 mb-0">
                                <div class="card-header bg-transparent pb-5">
                                  <div class="text-dark text-center mt-2 mb-3"><small><?php echo e(__('Purchase plan')); ?></small></div>
                                  <div class="btn-wrapper text-center">
                                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0"><?php echo e($val->name); ?></h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <form role="form" action="<?php echo e(url('user/buy')); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                                        </div>
                                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                        <input type="hidden" name="plan" value="<?php echo e($val->id); ?>">
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-success btn-sm my-4"><?php echo e(__('Purchase')); ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="card-body px-lg-7">
                  <h4 class="card-title mb-0"><?php echo e($val->name); ?></h4>
                  <div class="text-xl text-dark"><?php echo e($currency->symbol.$val->min_deposit); ?> - <?php echo e($currency->symbol.$val->amount); ?></div>
                  <p class="card-text text-sm text-dark text-uppercase"><?php echo e(__('For')); ?>  <?php echo e($val->duration.' '.$val->period); ?>(s)</p>
                  <p class="text-xs text-dark mb-0"><?php echo e($val->percent); ?>% <?php echo e(__('Daily Top Up')); ?></p>
                  <p class="text-xs text-dark mb-0"><?php echo e(__('Maximum Price')); ?> - <?php echo e($currency->symbol.number_format($val->amount)); ?> </p>
                  <p class="text-xs text-dark mb-0"><?php echo e(__('Interest')); ?> <?php echo e(($val->percent*castrotime($val->duration.' '.$val->period))-100); ?>%</p>
                  <p class="text-xs text-dark mb-0"><?php echo e(__('Compound Interest')); ?>  <?php echo e($val->percent*castrotime($val->duration.' '.$val->period)); ?>%</p>
                  <?php if($val->ref_percent!=null): ?>
                    <p class="text-xs text-dark mb-0"><?php echo e($val->ref_percent); ?>% <?php echo e(__('Referral Percent')); ?></p>
                  <?php endif; ?>                  
                  <?php if($val->bonus!=null): ?>
                    <p class="text-xs text-dark mb-0"><?php echo e($val->bonus); ?>% <?php echo e(__('Trading Bonus')); ?></p>
                  <?php endif; ?>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#buy<?php echo e($val->id); ?>"  class="btn btn-sm btn-success"><?php echo e(__('Purchase plan')); ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/plans.blade.php ENDPATH**/ ?>