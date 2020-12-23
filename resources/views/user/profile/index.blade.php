@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-header">
            <h3 class="mb-0">{{__('Your Profile')}}</h3>
          </div>
          <div class="card-body">
            <form action="{{url('user/account')}}" method="post">
              @csrf
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">{{__('Full Name')}}</label>
                  <div class="col-lg-9">
                    <div class="row">
                        <div class="col-6">
                          <input type="text" name="first_name" class="form-control" placeholder="{{__('First Name')}}" value="{{$user->first_name}}">
                        </div>      
                        <div class="col-6">
                          <input type="text" name="last_name" class="form-control" placeholder="{{__('Last Name')}}" value="{{$user->last_name}}">
                        </div>
                    </div>
                  </div>
                </div>  
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">{{__('Username')}}</label>
                  <div class="col-lg-9">
                    <input type="text" name="business_name" class="form-control" placeholder="{{__('Your Username')}}" value="{{$user->username}}" required>
                  </div>
                </div>   
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">{{__('Phone Number')}}</label>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">+</span>
                      </div>
                      <input type="number" inputmode="numeric" name="phone" placeholder="{{__('Phone Number')}}" maxlength="14" class="form-control" value="{{$user->phone}}">
                    </div>
                  </div>
                </div>                 
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">{{__('Email Address')}}</label>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="{{__('Email Address')}}" value="{{$user->email}}">
                    </div>
                  </div>
                </div>               
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">{{__('Address')}}</label>
                  <div class="col-lg-9">
                    <input type="text" name="address" class="form-control" placeholder="{{__('Address')}}" value="{{$user->address}}">
                  </div>
                </div>                      
                <div class="form-group row">
                  <label class="col-form-label-castro col-lg-2">{{__('Password')}}</label>
                  <div class="col-lg-10">
                    <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-white btn-sm">{{__('Change Password')}}</a>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="custom-control custom-checkbox mb-3">
                        <input class="custom-control-input" name="trade_share" id="customCheck1" type="checkbox" @if($user->trade_share=="on") checked="" @endif>
                        <label class="custom-control-label" for="customCheck1">{{__('Trading Earning being shared on Platform')}}</label>
                      </div>
                    </div>
                  </div>                  
              <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">{{__('Save Changes')}}</button>
              </div>
            </form>
          </div>
        </div>
        
        <div class="card bg-white" id="2fa">
          <div class="card-body">
            <h3 class="mb-0">{{__('Two-Factor Security Option')}}</h3>
            <div class="align-item-sm-center flex-sm-nowrap text-left">
                <span class="form-text text-sm">
                {{__('Two-factor authentication is a method for protection your web account. 
                  When it is activated you need to enter not only your password, but also a special code. 
                  You can receive this code by in mobile app. 
                  Even if third person will find your password, then cant access with that code.')}}
                </span>
                <span class="badge badge-pill badge-primary mb-3">
                  @if($user->fa_status==0)
                  {{__('Disabled')}}
                  @else
                  {{__('Active')}}
                  @endif
                </span>
                <span class="form-text text-sm text-default">
                {{__('1. Install an authentication app on your device. Any app that supports the Time-based One-Time Password (TOTP) protocol should work.')}}
                </span>
                <span class="form-text text-sm text-default">
                {{__('2. Use the authenticator app to scan the barcode below.')}}
                </span>
                <span class="form-text text-sm text-default">
                {{__('3. Enter the code generated by the authenticator app.')}}
                </span>
                <a data-toggle="modal" data-target="#modal-form2fa" href="" class="btn btn-success btn-sm">
                @if($user->fa_status==0)
                  {{__('Enable 2fa')}}
                @elseif($user->fa_status==1)
                  {{__('Disable 2fa')}}
                @endif
                </a>
                <div class="modal fade" id="modal-form2fa" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <div class="card bg-white border-0 mb-0 text-center">
                          <div class="card-body px-lg-5 py-lg-5">
                          @if($user->fa_status==0)
                            <img src="{{$image}}" class="mb-3 user-profile">
                          @endif
                            <form action="{{route('change.2fa')}}" method="post">
                              @csrf
                              <div class="form-group row">
                                <div class="col-lg-12">
                                  <input type="number" name="code" class="form-control" minlength="6" placeholder="Six digit code" required>
                                    <input type="hidden"  name="vv" value="{{$secret}}">
                                  @if($user->fa_status==0)
                                    <input type="hidden"  name="type" value="1">
                                  @elseif($user->fa_status==1)
                                    <input type="hidden"  name="type" value="0">
                                  @endif
                                </div>
                              </div>            
                              <div class="text-right">
                                <button type="submit" class="btn btn-success btn-sm">
                                @if($user->fa_status==0)
                                  {{__('Enable 2fa')}}
                                @elseif($user->fa_status==1)
                                  {{__('Disable 2fa')}}
                                @endif
                                </button>
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
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-color:{{$set->d_c}};">
          <div class="card-body text-center">
            <h3 class="card-title mb-3">{{__('Account Photo')}}</h3>
            <p class="card-text text-sm text-dark">{{__('We recommend you use a square logo with dimensions 70px by 70px for best results on the checkout form.')}}</p>
            <a href="#" class="avatar text-center mb-3">
              <img src="{{url('/')}}/asset/profile/{{$cast}}"/>
            </a>
            <form action="{{url('user/avatar')}}" enctype="multipart/form-data" method="post">
            @csrf
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" name="image" accept="image/*" required>
                    <label class="custom-file-label" for="customFileLang" style="border-color: {{$set->s_c}};">{{__('Choose Media')}}</label>
                  </div> 
                </div>              
              <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">{{__('Change Photo')}}</button>
              </div>
            </form>
          </div>
        </div>
        @if($set->kyc)
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-body text-center">
              <h3 class="card-title mb-3">{{__('Identity verification')}}</h3>
              <p class="card-text text-sm text-dark">{{__('Upload an Identity Document, for example, Driver Licence, Voters Card, International Passport, National ID.')}}</p>
                @if($user->kyc_status==1)
                <span class="badge badge-pill badge-primary mb-3">
                {{__('Under Review')}}
                </span>
                @elseif($user->kyc_status==2)
                <span class="badge badge-pill badge-success mb-3">
                {{__('Verified')}}
                </span>
                @endif
              @if(empty($user->kyc_link))
                  <form method="post" action="{{url('user/kyc')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileLang1" name="image" lang="en">
                          <label class="custom-file-label sdsd" for="customFileLang1" style="border-color: {{$set->s_c}};">{{__('Select document')}}</label>
                        </div>
                      </div>
                    <div class="text-right">
                      <input type="submit" class="btn btn-success btn-sm" value="Upload">
                    </div>
                  </form>
              @endif
            </div>
          </div>
        @endif
          <div class="card" style="background-color:{{$set->d_c}};">
            <div class="card-body text-center">
              <h3 class="card-title mb-3">{{__('Delete Account')}}</h3>
              <p class="card-text text-sm text-dark">{{__('Closing this account means you will no longer be able to access this account on')}} {{$set->site_name}}</p>
              <div class="text-right">
                  <a data-toggle="modal" data-target="#modal-formp" href="" class="btn btn-neutral btn-sm"><i class="fa fa-trash"></i> {{__('Delete Account')}}</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formp" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{route('delaccount')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <div class="col-lg-12">
                          <textarea type="text" name="reason" class="form-control" rows="5" placeholder="{{__('Sorry to see you leave, Please tell us why you are leaving')}}" required></textarea>
                        </div>
                      </div>             
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Delete account')}}</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>         
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card bg-white border-0 mb-0">
                  <div class="card-header header-elements-inline">
                    <h3 class="mb-0">{{__('Change Password')}}</h3>
                  </div>
                  <div class="card-body px-lg-5 py-lg-5">
                    <form action="{{route('change.password')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-4">{{__('New Password')}}</label>
                        <div class="col-lg-8">
                          <input type="password" name="password" class="form-control" minlength="6" placeholder="{{__('Your New Password')}}" required>
                        </div>
                      </div>             
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Change Password')}}</button>
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
  </div> 
@stop