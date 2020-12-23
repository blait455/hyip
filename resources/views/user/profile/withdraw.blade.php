@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="">
          <div class="card-body">
            <div class="">
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Withdraw request')}}</a>
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
                    <h3 class="mb-0">{{__('Withdraw Request')}}</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('withdraw.submit')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Amount')}}</label>
                        <div class="col-lg-10">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">{{$currency->symbol}}</span>
                            </div>
                            <input type="number" step="any" name="amount" maxlength="10" class="form-control" required="">
                          </div>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Type')}}</label>
                        <div class="col-lg-10">
                          <select class="form-control select" name="type" required>
                            <option value="1">{{__('Trading profit')}}</option>
                            <option value="2">{{__('Account balance')}}</option>
                            <option value="3">{{__('Referral earnings')}}</option>
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Method')}}</label>
                        <div class="col-lg-10">
                          <select class="form-control select" name="coin" data-dropdown-css-class="bg-primary" data-fouc required>
                          @foreach($method as $val)
                            <option value='{{$val->id}}'>{{$val->method}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Details')}}</label>
                        <div class="col-lg-10">
                        <textarea type="text" name="details" rows="10" class="form-control" required=""></textarea>
                        </div>
                      </div>                
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
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
          @if(count($withdraw)>0)
            @foreach($withdraw as $k=>$val)
              <div class="col-md-6">
                <div class="card" style="background-color:{{$set->d_c}};">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <!-- Title -->
                        <h4 class="mb-0 text-dark">#{{$val->reference}}</h4>
                      </div>
                      <div class="col-4 text-right">
                        @if($val->status==0)
                          <a data-toggle="modal" data-target="#modal-forma{{$val->id}}" href="" class="btn btn-sm btn-success">{{__('Update')}}</a>
                        @endif
                      </div>
                      <div class="col">
                        <p class="text-sm text-dark mb-0">{{__('Amount')}}: {{$currency->symbol}}{{number_format($val->amount)}}</p>
                        <p class="text-sm text-dark mb-0">{{__('Charge')}}: {{$currency->symbol.number_format($val->charge)}}</p>
                        <p class="text-sm text-dark mb-0">{{__('Method')}}: {{$val->wallet['method']}}</p>
                        <p class="text-sm text-dark mb-0">{{__('Details')}}: {{$val->details}}</p>
                        <p class="text-sm text-dark mb-0">{{__('Status')}}: @if($val->status==1){{__('Paid Out')}} @else {{__('Pending')}} @endif</p>
                        <p class="text-sm text-dark mb-0">{{__('Type')}}: @if($val->type==1) {{__('Trading profit')}} @elseif($val->type==2) {{__('Account balance')}} @elseif($val->type==3) {{__('Referral bonus')}} @endif</p>
                        <p class="text-sm text-dark mb-0">{{__('Created')}}: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                        <p class="text-sm text-dark mb-0">{{__('Updated')}}: {{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="modal fade" id="modal-forma{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card border-0 mb-0">
                        <div class="card-header">
                          <h3 class="mb-0">{{__('Withdraw Request')}}</h3>
                        </div>
                        <div class="card-body">
                          <form action="{{url('user/withdraw-update')}}" method="post">
                            @csrf
                            <div class="form-group row">
                              <label class="col-form-label col-lg-2">{{__('Method')}}</label>
                              <div class="col-lg-10">
                                <select class="form-control select" name="coin" data-fouc>
                                @foreach($method as $valx)
                                  <option value='{{$valx->id}}'
                                    @if($valx->id==$val->wallet->id)
                                    {{__('selected')}}
                                    @endif
                                    >{{$valx->method}}</option>
                                @endforeach
                                </select>
                              </div>
                            </div> 
                            <div class="form-group row">
                              <label class="col-form-label col-lg-2">{{__('Details')}}</label>
                              <div class="col-lg-10">
                                <textarea name="details" class="form-control" rows="4">{{$val->details}}</textarea>
                                <input name="withdraw_id" type="hidden" value="{{$val->id}}">
                              </div>
                            </div>                
                            <div class="text-right">
                              <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            @endforeach
          @else
          <div class="col-md-12">
            <p class="text-center text-muted card-text mt-8">No Withdrawal Request Found</p>
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-md-12">
          {{ $withdraw->links() }}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col text-center">
                <h4 class="mb-4" style="color: {{$set->s_c}};">
                {{__('Statistics')}}
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
@stop