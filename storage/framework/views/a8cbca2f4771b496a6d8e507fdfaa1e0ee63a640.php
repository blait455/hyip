<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="align-item-sm-center flex-sm-nowrap text-center">
                    <form>
                        <script src="https://checkout.flutterwave.com/v3.js"></script>
                        <button type="button" class="btn btn-success btn-sm my-4" onClick="makePayment()">Pay Now</button>
                    </form>
                    <script>
                        function makePayment() {
                            FlutterwaveCheckout({
                            public_key: "<?php echo e($gatewayData->val1); ?>",
                            tx_ref: "<?php echo e($flutter['track']); ?>",
                            amount: "<?php echo e($flutter['amount']); ?>",
                            currency: "<?php echo e($currency->name); ?>",
                            payment_options: "card,mobilemoney,ussd",
                            redirect_url: // specified redirect URL
                                "<?php echo e(route('ipn.flutter')); ?>",
                            meta: {
                                consumer_id: "<?php echo e($user->id); ?>",
                                consumer_mac: "92a3-912ba-1192a",
                            },
                            customer: {
                                email: "<?php echo e($user->email); ?>",
                                phone_number: "<?php echo e($user->mobile); ?>",
                                name: "<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>",
                            },
                            callback: function (data) {
                                console.log(data);
                            },
                            customizations: {
                                title: "<?php echo e($gnl->site_name); ?>",
                                description: "<?php echo e($gnl->site_name); ?> funding",
                                logo: "<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>",
                            },
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/flutter.blade.php ENDPATH**/ ?>