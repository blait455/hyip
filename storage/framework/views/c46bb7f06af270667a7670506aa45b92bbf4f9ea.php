

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row" id="earnings">
      <div class="col-lg-8">
        <div class="row">
          <?php if(count($profit)>0): ?>
            <?php $__currentLoopData = $profit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $dt = Carbon\Carbon::create($val->date);
                $dt->add($val->plan->duration.' '.$val->plan->period); 
              ?>
            <div class="col-lg-6">
              <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <h4 class="mb-0 text-dark">#<?php echo e($val->trx); ?></h4>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Plan')); ?>: <?php echo e($val->plan->name); ?></p>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Started')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($val->date))); ?></p>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Deposit')); ?>: <?php echo e($currency->symbol.number_format($val->amount)); ?></p>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Percent')); ?>: <?php echo e($val->plan->percent); ?>%</p>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Duration')); ?>: <?php echo e($val->plan->duration.' '.$val->plan->period); ?>(s)</p>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('End')); ?>: <?php echo e(date("Y/m/d h:i:A", strtotime($dt))); ?></p>
                      <?php if($val->coupon==1): ?>
                      <p class="text-sm text-dark mb-0"><?php echo e(__('Coupon')); ?>: <?php echo e($currency->symbol); ?><?php echo e($val->amount-($val->amount*$val->c_percent/100)); ?> - #<?php echo e($val->c_code); ?>  [<?php echo e($val->c_percent); ?>%off]</p>
                      <?php endif; ?>
                      <ul class="list-group list-group-flush list my--1 mb-3">
                        <li class="list-group-item px-0">
                          <div class="row align-items-center">
                            <div class="col">
                              <span class="text-sm text-dark mb-0"><?php echo e($currency->symbol.number_format($val->profit)); ?> / <?php echo e($currency->symbol); ?><?php echo e(($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period)); ?> <?php if($val->plan->bonus!=null): ?>+ <?php echo e(__('Trading Bonus')); ?> <?php echo e($currency->symbol.number_format($val->amount*$val->plan->bonus/100)); ?> <?php endif; ?></span>
                              <div class="progress progress-xs mb-0">
                              <?php $pp=($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period); ?>
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(($val->profit*100)/$pp); ?>%;background-color:<?php echo e($set->s_c); ?>;"></div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row align-items-center mb-1">              
                    <div class="col">
                      <?php if($val->recurring==1): ?>
                      <a href="<?php echo e(url('/')); ?>/user/cancel-recurring/<?php echo e($val->id); ?>" class="btn btn-sm btn-danger"><?php echo e(__('Cancel Recurring')); ?></a>
                      <?php elseif($val->recurring==0): ?>
                      <a href="<?php echo e(url('/')); ?>/user/start-recurring/<?php echo e($val->id); ?>" class="btn btn-sm btn-success"><?php echo e(__('Start Recurring')); ?></a>
                      <?php endif; ?>
                      <a href="#" data-toggle="modal" data-target="#top<?php echo e($val->id); ?>" title="Share trading activity" class="btn btn-sm btn-neutral">Share</a>
                    </div>                  
                  </div>
                </div>
              </div>
              <div class="modal fade" id="top<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card border-0 mb-0">
                        <div class="card-header bg-transparent pb-1">
                          <div class="text-dark text-center mt-2 mb-3"><small><?php echo e(__('Share Trading Activity')); ?></small></div>
                        </div>
                        <div class="card-body">
                          <form role="form" action="" method="post">
                            <div class="form-group mb-3">
                              <textarea type="text"rows="5" name="address" class="form-control" readonly>I have currently earned <?php echo e($currency->symbol.number_format($val->profit)); ?> with <?php echo e($set->site_name); ?>. Click on link to register, <?php echo e(url('/')); ?>/referral/<?php echo e($user->username); ?> </textarea>
                            </div>
                            <div class="text-right">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="I have currently earned <?php echo e($currency->symbol.number_format($val->profit)); ?> with <?php echo e($set->site_name); ?>. Click on link to register, <?php echo e(url('/')); ?>/referral/<?php echo e($user->username); ?>" title="Copy"><?php echo e(__('Copy')); ?></button>
                            </div>
                            <hr>
                            <div class="text-center">
                              <a  href="https://facebook.com" class="btn btn-facebook btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                              </a>                          
                              <a href="https://twitter.com" class="btn btn-twitter btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                              </a>                          
                              <a href="https://api.whatsapp.com/" class="btn btn-whatsapp btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-whatsapp"></i></span>
                              </a>                          
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <div class="col-md-12">
              <p class="text-center text-muted card-text mt-8">No Active Subscription Found</p>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-md-12">
          <?php echo e($profit->links()); ?>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <?php if(count($top)>0): ?>
          <div class="card">
            <div class="card-header">
              <h5 class="h4 mb-0 text-dark">Top Earners</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item px-0">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <a  class="avatar rounded-circle">
                            <?php
                            if(empty($val->image)){
                              $cast="react.jpg";
                            }else{
                                $cast=$val->image;
                            }
                            ?>
                            <img alt="Image placeholder" src="<?php echo e(url('/')); ?>/asset/profile/<?php echo e($cast); ?>">
                          </a>
                        </div>
                        <div class="col ml--2">
                          <h5 class="mb-0">
                            <a href="javascript:void;"><?php echo e($val->first_name); ?> <?php echo e($val->last_name); ?></a>
                          </h5>
                          <small class="text-sm text-dark mb-0"><?php echo e($currency->symbol.number_format($val->total_profit)); ?></small>
                        </div>
                      </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
        <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h5 class="h4 mb-0 text-dark">Your Statistics</h5>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p class="text-sm text-dark mb-0"><?php echo e(__('Highest Amount')); ?>: <?php echo e($currency->symbol.number_format($h_amount['amount'])); ?> - #<?php echo e($h_amount['trx']); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Lowest Amount')); ?>: <?php echo e($currency->symbol.number_format($l_amount['amount'])); ?> - #<?php echo e($l_amount['trx']); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Total Amount')); ?>: <?php echo e($currency->symbol.number_format($t_amount)); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Highest Profit')); ?>: <?php echo e($currency->symbol.number_format($h_profit['profit'])); ?> - #<?php echo e($h_profit['trx']); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Lowest Profit')); ?>: <?php echo e($currency->symbol.number_format($l_profit['profit'])); ?> - #<?php echo e($l_profit['trx']); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Total Profit')); ?>: <?php echo e($currency->symbol.number_format($user->total_profit)); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Highest Bonus')); ?>: <?php echo e($currency->symbol.number_format($h_bonus['bonus'])); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Lowest Bonus')); ?>: <?php echo e($currency->symbol.number_format($h_bonus['bonus'])); ?></p>
                <p class="text-sm text-dark mb-0"><?php echo e(__('Total Bonus')); ?>: <?php echo e($currency->symbol.number_format($user->trade_bonus)); ?></p>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/trading/trades.blade.php ENDPATH**/ ?>