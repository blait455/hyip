@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="">
          <div class="card-body">
            <div class="">
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Send money')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card border-0 mb-0">
                  <div class="card-header">
                    <h3 class="mb-0">{{__('Transfer money')}}</h3>
                    <span class="form-text text-sm text-dark">{{__('Transfer charge is')}} {{$set->transfer_charge}}% {{__('per transaction, If user is not a member of')}} {{$set->site_name}}, {{__('registration will be required to claim money. Money will be refunded within 5 days if user does not claim money.')}}</span>
                  </div>
                  <div class="card-body">
                    <form action="{{route('submit.ownbank')}}" method="post" id="modal-details">
                      @csrf
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Email')}}</label>
                          <div class="col-lg-10">
                              <input type="email" name="email" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-form-label col-lg-2">{{__('Amount')}}</label>
                          <div class="col-lg-10">
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">{{$currency->symbol}}</span>
                              </span>
                              <input type="number" class="form-control" name="amount" id="amount" required>
                              <span class="input-group-append">
                                <span class="input-group-text">.00</span>
                              </span>
                            </div>
                          </div>
                        </div>                   
                        <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm" form="modal-details">{{__('Transfer money')}}</button>
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
    <div class="row">
      <div class="col-md-8">
        <div class="row">  
          @if(count($transfer)>0)
            @foreach($transfer as $k=>$val)
              <div class="col-md-6">
              <div class="card" style="background-color:{{$set->d_c}};">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <!-- Title -->
                        <h5 class="h4 mb-0 text-dark">#{{$val->ref_id}}</h5>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <p class="text-sm text-dark mb-0">{{__('Amount')}}: {{$currency->symbol.number_format($val->amount)}}</p>
                          <p class="text-sm text-dark mb-0">{{__('Charge')}}: {{$currency->symbol.number_format($val->charge)}}</p>
                          @if($val->receiver['email']!=null)
                          <p class="text-sm text-dark mb-0">{{__('Email')}}: {{$val->receiver['email']}}</p>
                          @else
                          <p class="text-sm text-dark mb-0">{{__('Email')}}: {{$val->temp}}</p>
                          @endif
                          <p class="text-sm text-dark mb-0">{{__('Status')}}: @if($val->status==1)Confirmed @elseif($val->status==0)Pending @elseif($val->status==2)Returned @endif</p>
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
              <p class="text-center text-muted card-text mt-8">No Transfer Request found</p>
            </div>
          @endif
        </div> 
        <div class="row">
          <div class="col-md-12">
          {{ $transfer->links() }}
          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col text-center">
                <h4 class="mb-4" style="color:{{$set->s_c}};">
                {{__('Statistics')}}
                </h4>
                <span class="text-sm text-dark mb-0"><i class="fa fa-google-wallet"></i> {{__('Sent')}}</span><br>
                <span class="text-xl text-dark mb-0">{{$currency->name}} {{number_format($sent)}}.00</span><br>
                <hr>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col">
                <div class="my-4">
                  <span class="surtitle">{{__('Pending')}}</span><br>
                  <span class="surtitle">{{__('Returned')}}</span><br>
                  <span class="surtitle ">{{__('Total')}}</span>
                </div>
              </div>
              <div class="col-auto">
                <div class="my-4">
                  <span class="surtitle ">{{$currency->name}} {{number_format($pending)}}.00</span><br>
                  <span class="surtitle ">{{$currency->name}} {{number_format($rebursed)}}.00</span><br>
                  <span class="surtitle" style="color:{{$set->s_c}};">{{$currency->name}} {{number_format($total)}}.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @foreach($received as $k=>$val)
          <div class="card" style="background-color:{{$set->d_c}};">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <h5 class="h4 mb-0 text-dark">#{{$val->ref_id}}</h5>
                </div>
                <div class="col-4 text-right">
                  @if($val->status==0)
                  <a href="{{url('/')}}/user/received/{{$val->id}}" class="btn btn-sm btn-success" title="Mark as received"><i class="fa fa-check"></i> {{__('Confirm')}}</a>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p class="text-sm text-dark mb-0">{{__('Email')}}: {{$val->sender['email']}}</p>
                  <p class="text-sm text-dark mb-0">{{__('Total')}}: {{$currency->symbol.number_format($val->amount)}}</p>
                  <p class="text-sm text-dark mb-0">{{__('Date')}}: {{date("h:i:A j, M Y", strtotime($val->created_at))}}</p>
                  @if($val->status==1)
                    <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> {{__('Received')}}</span>
                  @elseif($val->status==0)
                    <span class="badge badge-pill badge-danger"><i class="fa fa-spinner"></i> {{__('Pending')}}</span>                       
                  @elseif($val->status==2)
                    <span class="badge badge-pill badge-info"><i class="fa fa-spinner"></i> {{__('Returned')}}</span>                    
                  @endif

                </div>
              </div>
            </div>
          </div>
        @endforeach 
      </div>
    </div>
@stop