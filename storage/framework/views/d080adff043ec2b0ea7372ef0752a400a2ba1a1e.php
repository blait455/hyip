
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="header" class="page-backg blog-details-backg bg-banner-gradient">
    <div class="container">
        <div class="page-title-wrapper">
            <ul class="post-meta color-theme">
                <li><a href="javascript:void;"><?php echo e(date("M j, Y", strtotime($post->created_at))); ?></a></li>
            </ul>
            <h1 class="page-title"><?php echo e($post->title); ?></h1>
            <ul class="post-meta">
                <li><span><?php echo e(__('By')); ?></span> <a href="javascript:void;"><?php echo e(__('Admin')); ?></a></li>
                <li><a href="cat/<?php echo e($xcat->id); ?>"><?php echo e($xcat->categories); ?></a></li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="feature-image"><a href="javascript:void;"><img src="<?php echo e(url('/')); ?>/asset/thumbnails/<?php echo e($post->image); ?>" alt=""></a></div>
                        <div class="blog-content">
                            <p><?php echo $post->details; ?></p>                           
                            <div class="single-blog-bottom-content">
                                <div class="blog-share">
                                    <?php echo $__env->make('partials.share', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- NAV -->
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/single.blade.php ENDPATH**/ ?>