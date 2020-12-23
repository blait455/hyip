<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold"><?php echo e(__('Logs')); ?></h6>
                    </div>
                    <div class="">
                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('S/N')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>                                                                       
                                    <th><?php echo e(__('Details')); ?></th>
                                    <th><?php echo e(__('Method')); ?></th>
                                    <th><?php echo e(__('Type')); ?></th>
                                    <th><?php echo e(__('Created')); ?></th>
                                    <th><?php echo e(__('Updated')); ?></th>
                                    <th class="text-center"><?php echo e(__('Action')); ?></th>    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$k); ?>.</td>
                                    <td><a href="<?php echo e(url('admin/manage-user')); ?>/<?php echo e($val->user['id']); ?>"><?php echo e($val->user['username']); ?></a></td>
                                    <td><?php echo e($currency->symbol.number_format($val->amount)); ?></td>
                                    <td><?php echo e($val->details); ?></td>
                                    <td><?php echo e($val->wallet->method); ?></td>
                                    <td>          
                                        <?php if($val->type==1): ?>
                                            <span class="badge badge-info"><?php echo e(__('Trading profit')); ?></span>
                                        <?php elseif($val->type==2): ?>
                                            <span class="badge badge-info"><?php echo e(__('Account balance')); ?></span>                  
                                        <?php elseif($val->type==3): ?>
                                            <span class="badge badge-info"><?php echo e(__('Referral bonus')); ?></span>
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
                                                    <a class='dropdown-item' href="<?php echo e(url('/')); ?>/admin/approvewithdraw/<?php echo e($val->id); ?>"><i class="icon-thumbs-up3 mr-2"></i><?php echo e(__('Approve')); ?></a>
                                                    <a class='dropdown-item' href="<?php echo e(url('/')); ?>/admin/declinewithdraw/<?php echo e($val->id); ?>"><i class="icon-thumbs-down3 mr-2"></i><?php echo e(__('Decline')); ?></a>
                                                    <a data-toggle="modal" data-target="#<?php echo e($val->id); ?>delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i><?php echo e(__('Delete')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>                   
                                </tr>
                                <div id="<?php echo e($val->id); ?>delete" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="font-weight-semibold"><?php echo e(__('Are you sure you want to delete this?')); ?></h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                <a  href="<?php echo e(url('/')); ?>/admin/withdraw/delete/<?php echo e($val->id); ?>" class="btn bg-danger"><?php echo e(__('Proceed')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
                            </tbody>                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/withdrawal/unpaid.blade.php ENDPATH**/ ?>