<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h3 class="card-title"><?php echo e(__('Edit team')); ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="<?php echo e(route('team.update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Name')); ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="<?php echo e($val->name); ?>">
                                    <input type="hidden" name="id" value="<?php echo e($val->id); ?>">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Position')); ?></label>
                                <div class="col-lg-10">
                                    <input type="text" name="position" class="form-control" value="<?php echo e($val->position); ?>">
                                </div>
                            </div>                         
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Facebook')); ?>:</label>
                                <div class="col-lg-10">
                                <input type="url" name="facebook" class="form-control" value="<?php echo e($val->facebook); ?>">
                                </div>
                            </div>                      
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Twitter')); ?>:</label>
                                <div class="col-lg-10">
                                <input type="url" name="twitter" class="form-control" value="<?php echo e($val->twitter); ?>">
                                </div>
                            </div>                      
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Linkedin')); ?>:</label>
                                <div class="col-lg-10">
                                <input type="url" name="linkedin" class="form-control" value="<?php echo e($val->linkedin); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"><?php echo e(__('Image')); ?>:</label>
                                <div class="col-lg-10">
                                    <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="en">
                                    <label class="custom-file-label" for="customFileLang" style="border-color: <?php echo e($set->s_c); ?>;"><?php echo e(__('Choose Media')); ?></label>
                                </div>
                            </div>             
                            <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="<?php echo e(url('/')); ?>/asset/review/<?php echo e($val->image); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/admin/web-control/team-edit.blade.php ENDPATH**/ ?>