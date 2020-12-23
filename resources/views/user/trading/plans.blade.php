@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-body">
              <p class="card-text text-sm text-dark">{{__('Payouts wont be available till end of plan duration. Interest means profit and compound is sum of money invested plus profit. Trading bonus is a certain percent of your compound interest. If interest reads minus, dont invest, you will lose money')}}</p>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
        @foreach($plan as $val)
          <div class="col-lg-4">
            <div class="pricing card-group flex-column flex-md-row mb-3">
              <div class="card card-pricing border-0 text-center mb-2" style="background-color:{{$set->d_c}};">
                <div class="card-header bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-lg-12 text-right">
                      <a href="#" data-toggle="modal" data-target="#calculate{{$val->id}}" class="btn btn-sm btn-neutral">{{__('Calculate')}}</a>
                      <div class="modal fade" id="calculate{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card border-0 mb-0">
                                <div class="card-header bg-transparent pb-5">
                                  <div class="text-dark text-center mt-2 mb-3"><small>{{__('Calculate profit')}}</small></div>
                                  <div class="btn-wrapper text-center">
                                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0">{{$val->name}}</h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <form role="form" action="{{url('user/calculate')}}" method="post">
                                  @csrf
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">{{$currency->symbol}}</span>
                                        </div>
                                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                                        <input type="hidden" name="plan_id" value="{{$val->id}}"> 
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-success btn-sm my-4">{{__('Calculate')}}</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>
                      <div class="modal fade" id="buy{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card border-0 mb-0">
                                <div class="card-header bg-transparent pb-5">
                                  <div class="text-dark text-center mt-2 mb-3"><small>{{__('Purchase plan')}}</small></div>
                                  <div class="btn-wrapper text-center">
                                    <h4 class="text-uppercase ls-1 text-dark py-3 mb-0">{{$val->name}}</h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <form role="form" action="{{url('user/preview-buy')}}" method="post">
                                  @csrf
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">{{$currency->symbol}}</span>
                                        </div>
                                        <input type="number" step="any" class="form-control" placeholder="{{__('Amount')}}" name="amount" required>
                                        <input type="hidden" name="plan" value="{{$val->id}}">
                                      </div>
                                    </div>                                    
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">#</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="{{__('Coupon code Optional')}}" maxlength="8" name="coupon">
                                      </div>
                                    </div>
                                    <div class="text-center">
                                      <button type="submit" class="btn btn-success btn-sm my-4">{{__('Purchase')}}</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="card-body px-lg-7">
                  @if($val->image!=null)
                  <a href="javascript:void;" class="mb-2">
                    <img src="{{url('/')}}/asset/images/{{$val->image}}" class="rounded-circle img-center img-fluid mb-2" style="width: 100px;">
                  </a>
                  @endif
                  <h4 class="card-title mb-0">{{$val->name}}</h4>
                  <div class="text-xl text-dark">{{$currency->symbol.$val->min_deposit}} - {{$currency->symbol.$val->amount}}</div>
                  <p class="card-text text-sm text-dark text-uppercase">{{__('For')}}  {{$val->duration.' '.$val->period}}(s)</p>
                  <p class="text-sm text-dark mb-0">{{$val->percent}}% {{__('Daily Top Up')}}</p>
                  <p class="text-sm text-dark mb-0">{{__('Maximum Price')}} - {{$currency->symbol.number_format($val->amount)}} </p>
                  <p class="text-sm text-dark mb-0">{{__('Interest')}} {{($val->percent*castrotime($val->duration.' '.$val->period))-100}}%</p>
                  <p class="text-sm text-dark mb-0">{{__('Compound Interest')}}  {{$val->percent*castrotime($val->duration.' '.$val->period)}}%</p>
                  @if($val->ref_percent!=null)
                    <p class="text-sm text-dark mb-0">{{$val->ref_percent}}% {{__('Referral Percent')}}</p>
                  @endif                  
                  @if($val->bonus!=null)
                    <p class="text-sm text-dark mb-0">{{$val->bonus}}% {{__('Trading Bonus')}}</p>
                  @endif
                  <br>
                  <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"  class="btn btn-sm btn-success">{{__('Purchase plan')}}</a>
                  <hr>
                  @php
                  $amount=$currency->symbol.$val->min_deposit;
                  $interest=$currency->symbol.(($val->min_deposit*($val->percent/100)*castrotime($val->duration.' '.$val->period))-$val->min_deposit);
                  $compound=$currency->symbol.$val->min_deposit*($val->percent/100)*castrotime($val->duration.' '.$val->period);
                  @endphp
                  <p class="card-text text-sm text-dark">{{__('Here a quick summary; Money invested')}} {{$amount}}, {{__('Interest will be')}} {{$interest}}, {{__('Compounded Interest will amount to')}} 
                  {{$compound}} {{__('after')}} {{$val->duration.' '.$val->period}}(s). @if($val->bonus!==null) {{__('You will receive')}} {{$val->bonus}}% {{__('of Compound Interest as Trading bonus')}} @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        <div class="row">
          <div class="col-md-12">
          {{ $plan->links() }}
          </div>
        </div>
      </div>
    </div>
@stop