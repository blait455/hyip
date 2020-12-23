@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-body text-dark">
            <div class="">
              <h3 class="text-dark">{{$title}}</h3>
                @php
                    $interest=$currency->symbol.(($plan->min_deposit*($plan->percent/100)*castrotime($plan->duration.' '.$plan->period))-$plan->min_deposit);
                    $compound=$currency->symbol.$plan->min_deposit*($plan->percent/100)*castrotime($plan->duration.' '.$plan->period);
                @endphp
              <span class="mt-0 mb-5 text-sm">{{__('Name')}}:{{$plan->name}}</span><br>
              <span class="mt-0 mb-5 text-sm">{{__('Duration')}}:{{$plan->duration.' '.$plan->period}}(s)</span><br>
              <span class="mt-0 mb-5 text-sm">{{__('Amount')}}:{{$currency->symbol.number_format($amount)}}</span><br>
              <span class="mt-0 mb-5 text-sm">{{__('Interest')}}:{{$interest}}</span><br>
              <span class="mt-0 mb-5 text-sm">{{__('Compound Interest')}}:{{$compound}}</span>
              @if(isset($coupon))
                <hr>
                <span class="mt-0 mb-5 text-sm">{{__('Coupon code')}}:{{$coupon->code}}</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Percent off')}}:{{$coupon->percent}}%</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Total')}}:{{$currency->symbol}}{{$amount-($amount*$coupon->percent/100)}}</span>
                <form action="{{url('user/buy')}}" method="post">
                    @csrf
                    <br>
                    <input type="hidden" name="coupon" value="1">
                    <input type="hidden" name="code" value="{{$coupon->code}}">
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <input type="hidden" name="plan" value="{{$plan->id}}">
                    <button type="submit" class="btn btn-success btn-sm">{{__('Confirm')}}</button>
                </form>
            @else
                <form action="{{url('user/buy')}}" method="post">
                  @csrf
                  <br>
                  <input type="hidden" name="coupon" value="0">
                  <input type="hidden" name="code" value="">
                  <input type="hidden" name="amount" value="{{$amount}}">
                  <input type="hidden" name="plan" value="{{$plan->id}}">
                  <button type="submit" class="btn btn-success btn-sm">{{__('Confirm')}}</button>
                </form>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@stop