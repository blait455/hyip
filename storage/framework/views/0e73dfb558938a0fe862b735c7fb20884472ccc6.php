<?php $__env->startSection('content'); ?>
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold"><?php echo e(__('Email Template')); ?></h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo e(__('S/N')); ?></th>
                                <th><?php echo e(__('CODE')); ?></th>
                                <th><?php echo e(__('DESCRIPTION')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <?php echo e(__('1')); ?> </td>
                            <td> &#123;&#123;message&#125;&#125;</td>
                            <td> <?php echo e(__('Details Text From the Script')); ?></td>
                        </tr>
                        <tr>
                            <td> <?php echo e(__('2')); ?> </td>
                            <td> &#123;&#123;name&#125;&#125;</td>
                            <td> <?php echo e(__('Users Name. Will be Pulled From Database')); ?></td>
                        </tr>
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold"><?php echo e(__('Congifure template')); ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.email.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Email sent from')); ?></label>
                            <div class="col-lg-10">
                                <input type="text" name="sender" maxlength="200" value="<?php echo e($val->esender); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2"><?php echo e(__('Email message')); ?></label>
                            <div class="col-lg-10">
                                <textarea type="text" name="message" rows="4" class="form-control tinymce"><?php echo e($val->emessage); ?></textarea>
                            </div>
                        </div>          
                    <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/settings/email.blade.php ENDPATH**/ ?>