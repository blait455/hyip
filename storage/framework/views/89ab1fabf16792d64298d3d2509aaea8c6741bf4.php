


<?php $__env->startSection('content'); ?>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">  
      <?php if($adminbank->status==1): ?>
       <div class="col-md-3">
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="mb-1 text-dark">
                    <a href="<?php echo e(route('user.bank_transfer')); ?>"><?php echo e(__('Bank Transfer')); ?></a>
                  </h4>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Swift code')); ?>: <?php echo e($adminbank->swift); ?></p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Account number')); ?>: <?php echo e($adminbank->acct_no); ?></p>
                </div>
              </div>
            </div>
          </div>
      </div> 
      <?php endif; ?>
      <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
       <div class="col-md-3">
          <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
            <!-- Card body -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="mb-1 text-dark">
                    <a href="#" data-toggle="modal" data-target="#modal-form<?php echo e($val->id); ?>"><?php echo e($val->name); ?></a>
                  </h4>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Limit')); ?>: <?php echo e($currency->symbol.number_format($val->minamo).' - '.$currency->symbol.number_format($val->maxamo)); ?></p>
                  <p class="text-sm text-dark mb-0"><?php echo e(__('Charge')); ?>: <?php echo e($currency->symbol.$val->fixed_charge); ?> + <?php echo e($val->percent_charge); ?>%</p>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="modal-form<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card border-0 mb-0">
                <div class="card-header bg-transparent pb-5">
                  <div class="btn-wrapper text-center">
                    <a href="javascript:void;" class="btn btn-neutral btn-icon">
                      <span class="btn-inner--icon"><img src="<?php echo e(url('/')); ?>/asset/payment_gateways/<?php echo e($val->gateimg); ?>"></span>
                    </a>
                  </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                  <form role="form" action="<?php echo e(route('fund.submit')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><?php echo e($currency->symbol); ?></span>
                        </div>
                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                        <input type="hidden" name="gateway" value="<?php echo e($val->id); ?>">  
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-sm my-4"><?php echo e(__('Preview')); ?></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
      <div class="card-header header-elements-inline">
        <h3 class="mb-0"><?php echo e(__('Deposit logs')); ?></h3>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-basic">
          <thead class="">
            <tr>
              <th><?php echo e(__('S / N')); ?></th>
              <th><?php echo e(__('Reference ID')); ?></th>
              <th><?php echo e(__('Amount')); ?></th>
              <th><?php echo e(__('Method')); ?></th>
              <th><?php echo e(__('Status')); ?></th>
              <th><?php echo e(__('Charge')); ?></th>
              <th><?php echo e(__('Created')); ?></th>
              <th><?php echo e(__('Updated')); ?></th>
            </tr>
          </thead>
          <tbody>  
            <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$k); ?>.</td>
                <td>#<?php echo e($val->trx); ?></td>
                <td><?php echo e($currency->symbol.number_format($val->amount)); ?></td>
                <td><?php echo e($val->gateway->name); ?></td>
                <td>
                <?php if($val->status==1): ?>
                <?php echo e(__('Approved')); ?>

                <?php elseif($val->status==0): ?>
                <?php echo e(__('Pending')); ?>               
                <?php elseif($val->status==2): ?>
                <?php echo e(__('Declined')); ?>

                <?php endif; ?>
                </td>
                <td><?php echo e($currency->symbol.number_format($val->charge)); ?></td>
                <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></td>
                <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card" style="background-color:<?php echo e($set->d_c); ?>;">
      <div class="card-header header-elements-inline">
        <h3 class="mb-0"><?php echo e(__('Bank transfer logs')); ?></h3>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-basic2">
          <thead class="">
              <tr>
                <th><?php echo e(__('S / N')); ?></th>
                <th><?php echo e(__('Reference ID')); ?></th>
                <th><?php echo e(__('Amount')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th><?php echo e(__('Created')); ?></th>
                <th><?php echo e(__('Updated')); ?></th>
              </tr>
            </thead>
            <tbody>  
            <?php $__currentLoopData = $bank_transfer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$k); ?>.</td>
                <td>#<?php echo e($val->trx); ?></td>
                <td><?php echo e($currency->symbol.number_format($val->amount)); ?></td>
                <td>
                  <?php if($val->status==1): ?>
                  <?php echo e(__('Approved')); ?>

                  <?php elseif($val->status==0): ?>
                  <?php echo e(__('Pending   ')); ?>            
                  <?php elseif($val->status==2): ?>
                  <?php echo e(__('Declined')); ?>

                  <?php endif; ?>
                </td>
                <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></td>
                <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/toor/Documents/core/resources/views/user/fund/index.blade.php ENDPATH**/ ?>