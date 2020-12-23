@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card" style="background-color:{{$set->d_c}};">
        <div class="card-body">
          <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
            <div>
              <ul class="list list-unstyled mb-0 text-dark text-sm">
                <li>{{__('Amount')}}: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount)}}</span></li>
                <li>{{__('Email')}}: <span class="font-weight-semibold">{{$email}}</span></li>
                <li>{{__('Transfer fee')}}: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount*$set->transfer_charge/100)}}</span></li>
                <li>{{__('Total')}}: <span class="font-weight-semibold">{{$currency->symbol.number_format($amount+($amount*$set->transfer_charge/100))}}</span></li>
              </ul>
            </div>
          </div><br>
          <form action="{{route('submit.localpreview')}}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="amount" value="{{$amount}}">
            <button type="submit" class="btn btn-success btn-sm">{{__('Send Money')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop