@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-lg-6">
          <div class="card" style="background-color:{{$set->d_c}};">
            <!-- Card header -->
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Surtitle -->
                  <h5 class="surtitle" style="color: {{$set->s_c}};">{{__('Recent trades')}}</h5>
                  <!-- Title -->
                  <h5 class="h3 mb-0 text-dark">{{__('Progress track')}}</h5>
                </div>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
                @foreach($profit as $k=>$val)
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col">
                    @php $pp=($val->plan->percent*$val->amount)/100 * castrotime($val->plan->duration.' '.$val->plan->period); @endphp
                      <span class="card-text text-sm text-dark">#{{$val->trx}} @ {{$val->plan->name}} [{{number_format($val->profit)}}/{{number_format($pp).$currency->name}}]</span>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{($val->profit*100)/$pp}}%;background-color:{{$set->s_c}};"></div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title mb-0">{{__('Available Profit')}}</h4>
                      <span class="mb-0 text-dark">{{$currency->symbol.number_format($user->profit)}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>             
            <div class="col-md-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title mb-0">{{__('Total Profit')}}</h4>
                      <span class="mb-0 text-dark">{{$currency->symbol.number_format($user->total_profit)}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>           
            <div class="col-md-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title mb-0">{{__('Referral')}}</h4>
                      <span class="mb-0 text-dark">{{$currency->symbol.number_format($user->ref_bonus)}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>           
            <div class="col-md-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title mb-0">{{__('Total Bonus')}}</h4>
                      <span class="mb-0 text-dark">{{$currency->symbol.number_format($user->trade_bonus)}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          @if($set->upgrade_status==1)
            @if($user->upgrade==0)
            <div class="card" style="background-color:{{$set->s_c}};">
              <!-- Card header -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-8">
                    <!-- Title -->
                    <h4 class="mb-0 text-white">Start receiving bonuses</h4>
                  </div>
                </div>
                <p class="card-text text-sm mb-4 text-white">You can now receive certain bonus of total profit after investment ends.</p>
                <a href="#" data-toggle="modal" data-target="#modal-formx" class="btn btn-sm btn-neutral">Upgrade account</a>
                <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <div class="card border-0 mb-0">
                          <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-left mt-2 mb-3 text-dark text-sm">Don't let your money sit there, upgrade your account & start receiving bonuses</div> 
                            <div class="text-left mt-2 mb-3 text-dark text-sm">Upgrade fee costs {{$currency->symbol.$set->upgrade_fee}}</div> 
                              <div class="text-left">
                              <a href="{{route('user.upgrade')}}" class="btn btn-success btn-sm">Upgrade</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
            @endif 
          @endif 
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-body">
              <div class="row">
                <div class="col-auto">
                  <div class="icon icon-shape text-white rounded-circle" style="background-color:{{$set->s_c}};">
                    <i class="ni ni-lock-circle-open"></i>
                  </div>
                </div>
                <div class="col">
                  <h3 class="card-title mb-1">{{__('Two Factor Authentication')}}</h3>
                  
                    @if($user->fa_status==0)
                    <span class="badge badge-pill badge-danger">
                    {{__('Disabled')}}
                    </span>
                    @else
                    <span class="badge badge-pill badge-success">
                    {{__('Active')}}
                    </span>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col text-center">
                  <h4 class="mb-4" style="color: {{$set->s_c}};">
                  {{__('Total Statistics')}}
                  </h4>
                  <span class="text-sm text-dark mb-0"><i class="fa fa-google-wallet"></i> {{__('Received')}}</span><br>
                  <span class="text-xl text-dark mb-0">{{$currency->name}} {{number_format($received)}}.00</span><br>
                  <hr>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col">
                  <div class="my-4">
                    <span class="surtitle">{{__('Pending')}}</span><br>
                    <span class="surtitle ">{{__('Total')}}</span>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="my-4">
                    <span class="surtitle ">{{$currency->name}} {{number_format($pending)}}.00</span><br>
                    <span class="surtitle" style="color: {{$set->s_c}};">{{$currency->name}} {{number_format($total)}}.00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card" style="background-color:{{$set->d_c}};">
        <!-- Card header -->
        <div class="card-header">
          <!-- Title -->
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
    </div>  
  </div>
@stop