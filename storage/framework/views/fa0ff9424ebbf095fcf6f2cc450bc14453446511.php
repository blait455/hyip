<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><?php echo e(__('Currency')); ?></h3>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                    <thead>
                        <tr>
                            <th><?php echo e(__('S/N')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Country')); ?></th>
                            <th><?php echo e(__('Currency')); ?></th>
                            <th><?php echo e(__('Symbol')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th class="text-center"></th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $cur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$k); ?>.</td>
                            <td><?php echo e($val->name); ?></td>
                            <td><?php echo e($val->country); ?></td>
                            <td><?php echo e($val->currency); ?></td>
                            <td><?php echo e($val->symbol); ?></td>
                            <td>                                    
                                <?php if($val->status==1): ?>
                                    <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-danger"><?php echo e(__('Pending')); ?></span>
                                <?php endif; ?>
                            </td>                               
                            <td class="text-center">
                            <?php if($val->status==0): ?>
                                <div class="text-right">
                                    <div class="dropdown">
                                        <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <?php if($val->status==0): ?>
                                            <a class='dropdown-item' href="<?php echo e(route('change.currency', ['id' => $val->id])); ?>"><?php echo e(__('Set as default')); ?></a>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>  
                            </td>                 
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
                    </tbody>                    
                </table>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/web-control/currency.blade.php ENDPATH**/ ?>