<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold"><?php echo e(__('Plans')); ?></h6>
                    </div>
                    <div class="">
                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('S/N')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Daily')); ?> %</th>                                                                       
                                    <th><?php echo e(__('Min')); ?></th>
                                    <th><?php echo e(__('Max')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                    <th><?php echo e(__('Referral')); ?></th>
                                    <th><?php echo e(__('Bonus')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Created')); ?></th>
                                    <th><?php echo e(__('Updated')); ?></th>
                                    <th class="text-center"><?php echo e(__('Action')); ?></th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$k); ?>.</td>
                                    <td><?php echo e($val->name); ?></td>
                                    <td><?php echo e($val->percent); ?>%</td>
                                    <td><?php echo e($currency->symbol.number_format($val->min_deposit)); ?></td>
                                    <td><?php echo e($currency->symbol.number_format($val->amount)); ?></td>
                                    <td><?php echo e($val->duration.$val->period); ?>(s)</td>
                                    <td><?php echo e($val->ref_percent); ?>%</td>
                                    <td><?php echo e($val->bonus); ?>%</td>
                                    <td>
                                        <?php if($val->status==0): ?>
                                        <?php echo e(__('Disabled')); ?>

                                        <?php elseif($val->status==1): ?>
                                        <?php echo e(__('Active ')); ?>

                                        <?php endif; ?>
                                    </td>  
                                    <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->created_at))); ?></td>
                                    <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item' href="<?php echo e(url('/')); ?>/admin/py-plan/<?php echo e($val->id); ?>"><i class="icon-pencil7 mr-2"></i><?php echo e(__('Edit')); ?></a>
                                                </div>
                                            </div>
                                        </div>
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
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/py-scheme/plans.blade.php ENDPATH**/ ?>