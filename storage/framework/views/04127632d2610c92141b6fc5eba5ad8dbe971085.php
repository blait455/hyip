
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="card">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0"><?php echo e(__('Stripe payment')); ?></h3>
          </div>

          <div class="card-body">
			<form accept-charset="UTF-8" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo e($stripe['value1']); ?>"
			 action="<?php echo e(route('ipn.stripe')); ?>" method="post" id="payment-form">
              <?php echo csrf_field(); ?>
			  <input type="hidden" value="<?php echo e($stripe['track']); ?>" name="track">
              <div class="form-group row">
                <label class="col-form-label col-lg-2"><?php echo e(__('Card name')); ?></label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="text"
					class="form-control input-lg custom-input"
					name="name"
					placeholder="Card Name"
					autocomplete="off" autofocus
					/>
                  </div>
                </div>
              </div>              
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2"><?php echo e(__('Card number')); ?></label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg custom-input card-number"
					name="cardNumber"
					placeholder="Valid Card Number"
					autocomplete="off"
					required autofocus
					/>
                  </div>
                </div>
              </div> 			  
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2"><?php echo e(__('Expiration date')); ?></label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg input-sz custom-input "
					name="cardExpiry"
					placeholder="MM / YYYY"
					autocomplete="off"
					required
					/>
                  </div>
                </div>
              </div>			  
			  
			   <div class="form-group row">
                <label class="col-form-label col-lg-2"><?php echo e(__('Cvc')); ?></label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
				  <input
					type="tel"
					class="form-control input-lg input-sz custom-input card-cvc"
					name="cardCVC"
					placeholder="CVC"
					autocomplete="off"
					required
					/>
                  </div>
                </div>
              </div>                
              <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm"><?php echo e(__('Pay now')); ?></button>
              </div>
            </form>
          </div>
        </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
<script>
(function ($) {
	$(document).ready(function () {
		var card = new Card({
			form: '#payment-form',
			container: '.card-wrapper',
			formSelectors: {
				numberInput: 'input[name="cardNumber"]',
				expiryInput: 'input[name="cardExpiry"]',
				cvcInput: 'input[name="cardCVC"]',
				nameInput: 'input[name="name"]'
			}
		});
	});
})(jQuery);
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('userlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/stripe.blade.php ENDPATH**/ ?>