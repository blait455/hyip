<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0"><?php echo e(__('Ticket')); ?></h3>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                <thead>
                    <tr>
                        <th><?php echo e(__('S/N')); ?></th>
                        <th><?php echo e(__('Username')); ?></th>
                        <th><?php echo e(__('Priority')); ?></th>
                        <th><?php echo e(__('Ticket ID')); ?></th>                                                                      
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Subject')); ?></th>
                        <th><?php echo e(__('Created')); ?></th>
                        <th><?php echo e(__('Updated')); ?></th>
                        <th class="scope"></th>    
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$k); ?>.</td>
                        <td><a href="<?php echo e(url('admin/manage-user')); ?>/<?php echo e($val->user->id); ?>"><?php echo e($val->user->username); ?></a></td>
                        <td><?php echo e($val->priority); ?></td>
                        <td><?php echo e($val->ticket_id); ?></td>
                        <td>
                            <?php if($val->status==0): ?>
                                <span class="badge badge-info"><?php echo e(__('Open')); ?></span>
                            <?php elseif($val->status==1): ?>
                                <span class="badge badge-danger"><?php echo e(__('Closed')); ?></span>                                        
                            <?php elseif($val->status==2): ?>
                                <span class="badge badge-success"><?php echo e(__('Resolved')); ?></span> 
                            <?php endif; ?>
                        </td>   
                        <td><?php echo e($val->subject); ?></td> 
                        <td><?php echo e(date("Y/m/d", strtotime($val->created_at))); ?></td>  
                        <td><?php echo e(date("Y/m/d h:i:A", strtotime($val->updated_at))); ?></td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="<?php echo e(route('ticket.manage', ['id' => $val->id])); ?>" class="dropdown-item"><?php echo e(__('Manage ticket')); ?></a>
                                    <?php if($val->status==0): ?>
                                    <a href="<?php echo e(route('ticket.close', ['id' => $val->id])); ?>" class="dropdown-item"><?php echo e(__('Close ticket')); ?></a>
                                    <?php endif; ?>
                                    <a data-toggle="modal" data-target="#delete<?php echo e($val->id); ?>" href="" class="dropdown-item"><?php echo e(__('Delete')); ?></a>
                                </div>
                            </div>
                        </td>                   
                    </tr>
                    <div class="modal fade" id="delete<?php echo e($val->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-white border-0 mb-0">
                                        <div class="card-header">
                                            <h3 class="mb-0"><?php echo e(__('Are you sure you want to delete this?')); ?></h3>
                                        </div>
                                        <div class="card-body px-lg-5 py-lg-5 text-right">
                                            <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                            <a  href="<?php echo e(route('ticket.delete', ['id' => $val->id])); ?>" class="btn btn-danger btn-sm"><?php echo e(__('Proceed')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>               
                </tbody>                    
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/user/ticket.blade.php ENDPATH**/ ?>