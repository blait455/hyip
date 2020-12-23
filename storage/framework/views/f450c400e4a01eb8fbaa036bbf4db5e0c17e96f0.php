<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e($gnl->title); ?></title>
</head>

<body>
<form method='POST' action='http://localhost/boompay/ext_transfer' id="payment_form">
    <input type='hidden' name='merchant_key' value='ABRgVASTvWO7G60r' />
    <input type='hidden' name='success_url' value="<?php echo e(route('user.fund')); ?>" />
    <input type='hidden' name='fail_url' value="<?php echo e(route('user.fund')); ?>" />
    <input type='hidden' name='notify_url' value="<?php echo e(route('ipn.perfect')); ?>" />
    <input type='hidden' name='amount' value="<?php echo e($boompay['amount']); ?>" />
    <input type="hidden" name="email" value="user@test.com" />
    <input type="hidden" name="first_name" value="Finn" />
    <input type="hidden" name="last_name" value="Marshal" />
    <input type="hidden" name="title" value="Payment For Item" />
    <input type="hidden" name="description" value="Payment For Item" />
    <input type="hidden" name="quantity" value="10" />
    <input type="hidden" name="currency" value="NGN" />
    <input type='submit' value='submit' />
</form>

</body>

</html>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/kingsmen/core/resources/views/user/payment/boompay.blade.php ENDPATH**/ ?>