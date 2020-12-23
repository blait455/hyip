
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="header" class="backg backg-one"  style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, <?php echo e($set->m_c); ?> 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp"  style="background-color: <?php echo e($set->s_c); ?>;" data-wosw-delay="0.3s"><?php echo e($set->title); ?></span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s"><?php echo e($title); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="<?php echo e(url('/')); ?>/asset/images/shape-bg.png">
    </div>
</section>
<div class="blog-post-archive pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper post-wrapper-v2">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="post wow soneFadeUp" data-wow-delay="0.3s">
                        <div class="feature-image">
                            <a href="<?php echo e(url('/')); ?>/single/<?php echo e($vblog->id); ?>/<?php echo e(str_slug($vblog->title)); ?>"><img src="<?php echo e(url('/')); ?>/asset/thumbnails/<?php echo e($vblog->image); ?>" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <ul class="post-meta">
                                <li><a href="javascript:void;"><?php echo e(date("M j, Y", strtotime($vblog->created_at))); ?></a></li>
                            </ul>
                            <span class="entry-title">
                                <a href="<?php echo e(url('/')); ?>/single/<?php echo e($vblog->id); ?>/<?php echo e(str_slug($vblog->title)); ?>"><?php echo e($vblog->title); ?></a>
                            </span>
                            <p><?php echo str_limit($vblog->content, 60);; ?></p>
                            <a href="<?php echo e(url('/')); ?>/single/<?php echo e($vblog->id); ?>/<?php echo e(str_slug($vblog->title)); ?>" class="read-more"><?php echo e(__('Read More')); ?> <i class="ei ei-arrow_right"></i></a>
                        </div>
                    </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center margin-50px-top margin-50px-bottom sm-margin-50px-top wow fadeInUp">
                        <?php echo e($posts->render()); ?>

                    </div>
                </div>
            </div>
            <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/front/cat.blade.php ENDPATH**/ ?>