<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$gnl->site_name}}</title>
</head>

<body>
<form action="https://voguepay.com/pay/" method="POST" id="payment_form">
    <input type="hidden" name="v_merchant_id" value="{{$vogue['value2']}}" />
    <input type="hidden" name="memo" value="{{$gnl->site_name}}" />
    <input type="hidden" name="success_url" value="{{route('ipn.vogue')}}" />
    <input type="hidden" name="fail_url" value="{{route('user.fund')}}" />
    <input type="hidden" name="cur" value="{{$currency->name}}" />
    <input type="hidden" name="item_1" value="Add Money To {{$gnl->site_name}}" />
    <input type="hidden" name="price_1" value="{{$vogue['amount']}}" />
    <input type="hidden" name="description_1" value="Account funding" />
</form>
<script>
    document.getElementById("payment_form").submit();
</script>
</body>

</html>

