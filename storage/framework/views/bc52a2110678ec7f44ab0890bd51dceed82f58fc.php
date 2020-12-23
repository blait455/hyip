<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e($gnl->site_name); ?></title>
</head>

<body>
<form action="https://secure.paypal.com/cgi-bin/webscr" method="post" id="payment_form">
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="business" value="<?php echo e($paypal['sendto']); ?>"/>
    <input type="hidden" name="cbt" value="<?php echo e($gnl->site_name); ?>"/>
    <input type="hidden" name="currency_code" value="<?php echo e($currency->name); ?>"/>
    <input type="hidden" name="quantity" value="1"/>
    <input type="hidden" name="item_name" value="Add Money To <?php echo e($gnl->site_name); ?> Account"/>
    <input type="hidden" name="custom" value="<?php echo e($paypal['track']); ?>"/>
    <input type="hidden" name="amount" value="<?php echo e($paypal['amount']); ?>"/>
    <input type="hidden" name="return" value="<?php echo e(route('user.fund')); ?>"/>
    <input type="hidden" name="cancel_return" value="<?php echo e(route('user.fund')); ?>"/>
    <input type="hidden" name="notify_url" value="<?php echo e(route('ipn.paypal')); ?>"/>

</form>

<script>
    document.getElementById("payment_form").submit();
</script>
</body>

</html>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/paypal.blade.php ENDPATH**/ ?>