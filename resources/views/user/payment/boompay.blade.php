<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$gnl->title}}</title>
</head>

<body>
<form method='POST' action='http://localhost/boompay/ext_transfer' id="payment_form">
    <input type='hidden' name='merchant_key' value='ABRgVASTvWO7G60r' />
    <input type='hidden' name='success_url' value="{{route('user.fund')}}" />
    <input type='hidden' name='fail_url' value="{{route('user.fund')}}" />
    <input type='hidden' name='notify_url' value="{{route('ipn.perfect')}}" />
    <input type='hidden' name='amount' value="{{$boompay['amount']}}" />
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

