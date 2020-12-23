@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">  
      <div class="col-lg-8">
        <div class="row">
          @if(count($earning)>0)
            @foreach($earning as $k=>$val)
              <div class="col-md-6">
                <div class="card" style="background-color:{{$set->d_c}};">
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-12">
                          <!-- Title -->
                          <h5 class="h4 mb-0">#{{$val->ref_id}}</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <p class="text-sm text-dark mb-0">{{__('Amount')}}: {{$currency->symbol.number_format($val->amount)}}</p>
                          <p class="text-sm text-dark mb-0">{{__('From')}}: {{$val->shared['first_name']}} {{$val->shared['last_name']}}</p>
                          <p class="text-sm text-dark mb-0">{{__('Plan')}}: {{$val->plan['name']}}</p>
                          <p class="text-sm text-dark mb-0">{{__('Created')}}: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                          <p class="text-sm text-dark mb-0">{{__('Updated')}}: {{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            @endforeach
          @else
            <div class="col-md-12">
              <p class="text-center text-muted card-text mt-8">No Referral Earnings</p>
            </div>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12">
          {{ $earning->links() }}
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        @if($set->referral==1)
        <div class="card" style="background-color:{{$set->m_c}};">
          <div class="card-body">
            <h3 class="card-title mb-3">{{__('Referral link')}}</h3>
            <p class="card-text text-xs text-dark">{{__('Automatically Top up your Balance by Sharing your Referral Link, Earn a percentage of whatever Plan your Referred user Buys.')}}</p>
            <span class="form-text text-xs">{{url('/')}}/referral/{{$user->username}}</span>
            <button type="button" class="btn-icon-clipboard" data-clipboard-text="{{url('/')}}/referral/{{$user->username}}" title="Copy">{{__('Copy')}}</button>
          </div>
        </div>
        @endif
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Referrals</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <tbody>
                  @foreach($referral as $k=>$val)
                    <tr>
                      <td class="table-user">
                        <img src="{{url('/')}}/asset/profile/{{$val->user['image']}}" class="avatar rounded-circle mr-3">
                      </td>                      
                      <td>
                        {{$val->user['first_name']}} {{$val->user['last_name']}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
      </div> 
    </div>
@stop