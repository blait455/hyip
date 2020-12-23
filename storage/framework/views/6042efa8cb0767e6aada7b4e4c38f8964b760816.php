

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <div class="card-body">
              <p class="card-text text-sm text-dark"><?php echo e(__('Payouts wont be available till end of plan duration. Interest means profit and compound is sum of money invested plus profit. Trading bonus is a certain percent of your compound interest. If interest reads minus, dont invest, you will lose money')); ?></p>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
        <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4">
            <div class="pricing card-group flex-column flex-md-row mb-3">
              <div class="card card-pricing border-0 text-center mb-2" style="background-color:<?php echo e($set->d_c); ?>;">
                <div class="card-header bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-lg-12 text-right">
                      <a href="#" data-toggle="modal" data-target="#calculate<?php echo e($val->id); ?>" class="btn btn-sm btn-neutral"><?php echo e(__('Calculate')); ?></a>
                      <div class="modal fade" id="calculate<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card border-0 mb-0">
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
                              <div class="card border-0 mb-0">
                                <div class="card-header bg-transparent pb-5">
                                  <div class="text-dark text-center mt-2 mb-3"><small><?php echo e(__('Purchase plan')); ?></small></div>
                                  <div class="btn-wrapper text-center">
                                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0"><?php echo e($val->name); ?></h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <form role="form" action="<?php echo e(url('user/preview-buy')); ?>" method="post">
                                  <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                                        </div>
                                        <input type="number" step="any" class="form-control" placeholder="<?php echo e(__('Amount')); ?>" name="amount" required>
                                        <input type="hidden" name="plan" value="<?php echo e($val->id); ?>">
                                      </div>
                                    </div>                                    
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">#</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="<?php echo e(__('Coupon code Optional')); ?>" maxlength="8" name="coupon">
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
                  <?php if($val->image!=null): ?>
                  <a href="javascript:void;" class="mb-2">
                    <img src="<?php echo e(url('/')); ?>/asset/images/<?php echo e($val->image); ?>" class="rounded-circle img-center img-fluid mb-2" style="width: 100px;">
                  </a>
                  <?php endif; ?>
                  <h4 class="card-title mb-0"><?php echo e($val->name); ?></h4>
                  <div class="text-xl text-dark"><?php echo e($currency->symbol.$val->min_deposit); ?> - <?php echo e($currency->symbol.$val->amount); ?></div>
                  <p class="card-text text-sm text-dark text-uppercase"><?php echo e(__('For')); ?>  <?php echo e($val->duration.' '.$val->period); ?>(s)</p>
                  <p class="text-sm text-dark mb-0"><?php echo e($val->percent); ?>% <?php echo e(__('Daily Top Up')); ?></p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Maximum Price')); ?> - <?php echo e($currency->symbol.number_format($val->amount)); ?> </p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Interest')); ?> <?php echo e(($val->percent*castrotime($val->duration.' '.$val->period))-100); ?>%</p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Compound Interest')); ?>  <?php echo e($val->percent*castrotime($val->duration.' '.$val->period)); ?>%</p>
                  <?php if($val->ref_percent!=null): ?>
                    <p class="text-sm text-dark mb-0"><?php echo e($val->ref_percent); ?>% <?php echo e(__('Referral Percent')); ?></p>
                  <?php endif; ?>                  
                  <?php if($val->bonus!=null): ?>
                    <p class="text-sm text-dark mb-0"><?php echo e($val->bonus); ?>% <?php echo e(__('Trading Bonus')); ?></p>
                  <?php endif; ?>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#buy<?php echo e($val->id); ?>"  class="btn btn-sm btn-success"><?php echo e(__('Purchase plan')); ?></a>
                  <hr>
                  <?php
                  $amount=$currency->symbol.$val->min_deposit;
                  $interest=$currency->symbol.(($val->min_deposit*($val->percent/100)*castrotime($val->duration.' '.$val->period))-$val->min_deposit);
                  $compound=$currency->symbol.$val->min_deposit*($val->percent/100)*castrotime($val->duration.' '.$val->period);
                  ?>
                  <p class="card-text text-sm text-dark"><?php echo e(__('Here a quick summary; Money invested')); ?> <?php echo e($amount); ?>, <?php echo e(__('Interest will be')); ?> <?php echo e($interest); ?>, <?php echo e(__('Compounded Interest will amount to')); ?> 
                  <?php echo e($compound); ?> <?php echo e(__('after')); ?> <?php echo e($val->duration.' '.$val->period); ?>(s). <?php if($val->bonus!==null): ?> <?php echo e(__('You will receive')); ?> <?php echo e($val->bonus); ?>% <?php echo e(__('of Compound Interest as Trading bonus')); ?> <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
          <div class="col-md-12">
          <?php echo e($plan->links()); ?>

          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/trading/plans.blade.php ENDPATH**/ ?>