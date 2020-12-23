@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row" id="earnings">
      <div class="col-lg-8">
        <div class="row">
          @if(count($profit)>0)
            @foreach($profit as $k=>$val)
              @php
                $dt = Carbon\Carbon::create($val->date);
                $dt->add($val->plan->duration.' '.$val->plan->period); 
              @endphp
            <div class="col-lg-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <h4 class="mb-0 text-dark">#{{$val->trx}}</h4>
                      <p class="text-sm text-dark mb-0">{{__('Plan')}}: {{$val->plan->name}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Started')}}: {{date("Y/m/d h:i:A", strtotime($val->date))}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Deposit')}}: {{$currency->symbol.number_format($val->amount)}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Percent')}}: {{$val->plan->percent}}%</p>
                      <p class="text-sm text-dark mb-0">{{__('Duration')}}: {{$val->plan->duration.' '.$val->plan->period}}(s)</p>
                      <p class="text-sm text-dark mb-0">{{__('End')}}: {{date("Y/m/d h:i:A", strtotime($dt))}}</p>
                      @if($val->coupon==1)
                      <p class="text-sm text-dark mb-0">{{__('Coupon')}}: {{$currency->symbol}}{{$val->amount-($val->amount*$val->c_percent/100)}} - #{{$val->c_code}}  [{{$val->c_percent}}%off]</p>
                      @endif
                      <ul class="list-group list-group-flush list my--1 mb-3">
                        <li class="list-group-item px-0">
                          <div class="row align-items-center">
                            <div class="col">
                              <span class="text-sm text-dark mb-0">{{$currency->symbol.number_format($val->profit)}} / {{$currency->symbol}}{{($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period)}} @if($val->plan->bonus!=null)+ {{__('Trading Bonus')}} {{$currency->symbol.number_format($val->amount*$val->plan->bonus/100)}} @endif</span>
                              <div class="progress progress-xs mb-0">
                              @php $pp=($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period); @endphp
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{($val->profit*100)/$pp}}%;background-color:{{$set->s_c}};"></div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row align-items-center mb-1">              
                    <div class="col">
                      @if($val->recurring==1)
                      <a href="{{url('/')}}/user/cancel-recurring/{{$val->id}}" class="btn btn-sm btn-danger">{{__('Cancel Recurring')}}</a>
                      @elseif($val->recurring==0)
                      <a href="{{url('/')}}/user/start-recurring/{{$val->id}}" class="btn btn-sm btn-success">{{__('Start Recurring')}}</a>
                      @endif
                      <a href="#" data-toggle="modal" data-target="#top{{$val->id}}" title="Share trading activity" class="btn btn-sm btn-neutral">Share</a>
                    </div>                  
                  </div>
                </div>
              </div>
              <div class="modal fade" id="top{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card border-0 mb-0">
                        <div class="card-header bg-transparent pb-1">
                          <div class="text-dark text-center mt-2 mb-3"><small>{{__('Share Trading Activity')}}</small></div>
                        </div>
                        <div class="card-body">
                          <form role="form" action="" method="post">
                            <div class="form-group mb-3">
                              <textarea type="text"rows="5" name="address" class="form-control" readonly>I have currently earned {{$currency->symbol.number_format($val->profit)}} with {{$set->site_name}}. Click on link to register, {{url('/')}}/referral/{{$user->username}} </textarea>
                            </div>
                            <div class="text-right">
                            <button type="button" class="btn-icon-clipboard" data-clipboard-text="I have currently earned {{$currency->symbol.number_format($val->profit)}} with {{$set->site_name}}. Click on link to register, {{url('/')}}/referral/{{$user->username}}" title="Copy">{{__('Copy')}}</button>
                            </div>
                            <hr>
                            <div class="text-center">
                              <a  href="https://facebook.com" class="btn btn-facebook btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
                              </a>                          
                              <a href="https://twitter.com" class="btn btn-twitter btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-twitter"></i></span>
                              </a>                          
                              <a href="https://api.whatsapp.com/" class="btn btn-whatsapp btn-icon-only">
                                <span class="btn-inner--icon"><i class="fab fa-whatsapp"></i></span>
                              </a>                          
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @else
            <div class="col-md-12">
              <p class="text-center text-muted card-text mt-8">No Active Subscription Found</p>
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12">
          {{ $profit->links() }}
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        @if(count($top)>0)
          <div class="card">
            <div class="card-header">
              <h5 class="h4 mb-0 text-dark">Top Earners</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                @foreach($top as $k=>$val)
                    <li class="list-group-item px-0">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <a  class="avatar rounded-circle">
                            @php
                            if(empty($val->image)){
                              $cast="react.jpg";
                            }else{
                                $cast=$val->image;
                            }
                            @endphp
                            <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$cast}}">
                          </a>
                        </div>
                        <div class="col ml--2">
                          <h5 class="mb-0">
                            <a href="javascript:void;">{{$val->first_name}} {{$val->last_name}}</a>
                          </h5>
                          <small class="text-sm text-dark mb-0">{{$currency->symbol.number_format($val->total_profit)}}</small>
                        </div>
                      </div>
                    </li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <h5 class="h4 mb-0 text-dark">Your Statistics</h5>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p class="text-sm text-dark mb-0">{{__('Highest Amount')}}: {{$currency->symbol.number_format($h_amount['amount'])}} - #{{$h_amount['trx']}}</p>
                <p class="text-sm text-dark mb-0">{{__('Lowest Amount')}}: {{$currency->symbol.number_format($l_amount['amount'])}} - #{{$l_amount['trx']}}</p>
                <p class="text-sm text-dark mb-0">{{__('Total Amount')}}: {{$currency->symbol.number_format($t_amount)}}</p>
                <p class="text-sm text-dark mb-0">{{__('Highest Profit')}}: {{$currency->symbol.number_format($h_profit['profit'])}} - #{{$h_profit['trx']}}</p>
                <p class="text-sm text-dark mb-0">{{__('Lowest Profit')}}: {{$currency->symbol.number_format($l_profit['profit'])}} - #{{$l_profit['trx']}}</p>
                <p class="text-sm text-dark mb-0">{{__('Total Profit')}}: {{$currency->symbol.number_format($user->total_profit)}}</p>
                <p class="text-sm text-dark mb-0">{{__('Highest Bonus')}}: {{$currency->symbol.number_format($h_bonus['bonus'])}}</p>
                <p class="text-sm text-dark mb-0">{{__('Lowest Bonus')}}: {{$currency->symbol.number_format($h_bonus['bonus'])}}</p>
                <p class="text-sm text-dark mb-0">{{__('Total Bonus')}}: {{$currency->symbol.number_format($user->trade_bonus)}}</p>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
@stop