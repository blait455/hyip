<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="align-item-sm-center flex-sm-nowrap text-center">
                            <form id="paymentForm">
                                <input type="hidden" id="email-address"  value="<?php echo e($user->email); ?>" required />
                                <input type="hidden" id="amount"  value="<?php echo e($paystack['amount']); ?>" required />
                                <input type="hidden" id="first-name"  value="<?php echo e($user->first_name); ?>"/>
                                <input type="hidden" id="last-name" value="<?php echo e($user->last_name); ?>"/>
                                <button type="submit" class="btn btn-success my-4" onclick="payWithPaystack()"> Pay with Paystack</button>
                            </form>
                        </div>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <script>
                        const paymentForm = document.getElementById('paymentForm');
                        paymentForm.addEventListener("submit", payWithPaystack, false);
                        function payWithPaystack(e) {
                        e.preventDefault();

                        let handler = PaystackPop.setup({
                            key: '<?php echo e($paystack['value1']); ?>', // Replace with your public key
                            email: document.getElementById("email-address").value,
                            amount: document.getElementById("amount").value * 100,
                            firstname: document.getElementById("first-name").value,
                            lastname: document.getElementById("first-name").value, 
                            currency: '<?php echo e($currency->name); ?>', 
                            onClose: function(){
                            alert('Window closed.');
                            },
                            callback: function(response){
                                window.location.href="<?php echo e(route('ipn.paystack')); ?>";
                            }
                        });
                        handler.openIframe();
                        }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/paystack.blade.php ENDPATH**/ ?>