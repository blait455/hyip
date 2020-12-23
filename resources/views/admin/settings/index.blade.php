@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">{{__('Congifure website')}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.settings.update')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Website name:')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="site_name" maxlength="200" value="{{$set->site_name}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Tawk ID:')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="tawk_id" value="{{$set->tawk_id}}" maxlength="25" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Company email:')}}</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" value="{{$set->email}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Mobile:')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group">
                                <input type="text" name="mobile" max-length="14" value="{{$set->mobile}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Website title:')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" max-length="200" value="{{$set->title}}" class="form-control">
                        </div>
                    </div>                       
                    <div class="form-group row">
                                            
                        <label class="col-form-label col-lg-2">{{__('Balance on signup')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">{{$currency->symbol}}</span>
                                </span>
                                <input type="number" name="bal" step="any" max-length="10" value="{{convertFloat($set->balance_reg)}}" class="form-control">
                            </div>
                        </div>    
                        <label class="col-form-label col-lg-2">{{__('Upgrade_fee')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-append">
                                    <span class="input-group-text">{{$currency->symbol}}</span>
                                </span>
                                <input type="number" name="upgrade_fee" max-length="10" value="{{$set->upgrade_fee}}" class="form-control">
                            </div>
                        </div>                                                                                 
                        <label class="col-form-label col-lg-2">{{__('Withdraw charge')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="number" name="withdraw_charge" max-length="10" value="{{$set->withdraw_charge}}" class="form-control">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">%</span>
                                </span>
                            </div>
                        </div>                              
                        <label class="col-form-label col-lg-2">{{__('Transfer charge')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="number" name="transfer_charge" max-length="10" value="{{$set->transfer_charge}}" class="form-control">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">%</span>
                                </span>
                            </div>
                        </div>                                                      
                        </div>           
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Status')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-5">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->kyc==1)
                                        <input type="checkbox" name="kyc" id="customCheckLogin1" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="kyc" id="customCheckLogin1"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin1">
                                    <span class="text-muted">{{__('Kyc')}}</span>     
                                    </label>
                                </div>                        
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->email_verification==1)
                                        <input type="checkbox" name="email_activation" id="customCheckLogin2" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="email_activation"id="customCheckLogin2"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin2">
                                    <span class="text-muted">{{__('Email verification')}}</span>     
                                    </label>
                                </div>                       
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->email_notify==1)
                                        <input type="checkbox" name="email_notify" id="customCheckLogin3" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="email_notify"id="customCheckLogin3"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin3">
                                    <span class="text-muted">{{__('Email notify')}}</span>     
                                    </label>
                                </div>                        
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->registration==1)
                                        <input type="checkbox" name="registration" id="customCheckLogin4" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="registration"id="customCheckLogin4"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin4">
                                    <span class="text-muted">{{__('Registration')}}</span>     
                                    </label>
                                </div> 
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->referral==1)
                                        <input type="checkbox" name="referral" id="customCheckLogin5" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="referral"id="customCheckLogin5"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin5">
                                    <span class="text-muted">{{__('Referral')}}</span>     
                                    </label>
                                </div>                                 
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->recaptcha==1)
                                        <input type="checkbox" name="recaptcha" id="customCheckLogin6" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="recaptcha"id="customCheckLogin6"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin6">
                                    <span class="text-muted">{{__('Recaptcha')}}</span>     
                                    </label>
                                </div>                                
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->language==1)
                                        <input type="checkbox" name="language" id="customCheckLogin7" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="language"id="customCheckLogin7"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin7">
                                    <span class="text-muted">{{__('Language')}}</span>     
                                    </label>
                                </div>                                
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->blog==1)
                                        <input type="checkbox" name="blog" id="customCheckLogin8" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="blog"id="customCheckLogin8"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin8">
                                    <span class="text-muted">{{__('Blog')}}</span>     
                                    </label>
                                </div>                                
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->transfer==1)
                                        <input type="checkbox" name="transfer" id="customCheckLogin17" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="transfer" id="customCheckLogin17"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin17">
                                    <span class="text-muted">{{__('Transfer')}}</span>     
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-5">      
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->services==1)
                                        <input type="checkbox" name="services" id="customCheckLogin9" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="services"id="customCheckLogin9"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin9">
                                    <span class="text-muted">{{__('Services')}}</span>     
                                    </label>
                                </div>  
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->review==1)
                                        <input type="checkbox" name="review" id="customCheckLogin10" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="review"id="customCheckLogin10"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin10">
                                    <span class="text-muted">{{__('Review')}}</span>     
                                    </label>
                                </div>                                 
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->plan==1)
                                        <input type="checkbox" name="plan" id="customCheckLogin11" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="plan"id="customCheckLogin11"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin11">
                                    <span class="text-muted">{{__('Plan')}}</span>     
                                    </label>
                                </div>                                 
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->team==1)
                                        <input type="checkbox" name="team" id="customCheckLogin12" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="team"id="customCheckLogin12"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin12">
                                    <span class="text-muted">{{__('Team')}}</span>     
                                    </label>
                                </div>                                  
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->stat==1)
                                        <input type="checkbox" name="stat" id="customCheckLogin13" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="stat"id="customCheckLogin13"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin13">
                                    <span class="text-muted">{{__('Stat')}}</span>     
                                    </label>
                                </div>                                  
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->contact==1)
                                        <input type="checkbox" name="contact" id="customCheckLogin14" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="contact"id="customCheckLogin14"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin14">
                                    <span class="text-muted">{{__('Contact')}}</span>     
                                    </label>
                                </div>                                 
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->faq==1)
                                        <input type="checkbox" name="faq" id="customCheckLogin15" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="faq"id="customCheckLogin15"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin15">
                                    <span class="text-muted">{{__('Faq')}}</span>     
                                    </label>
                                </div>                                  
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    @if($set->upgrade_status==1)
                                        <input type="checkbox" name="upgrade_status" id="customCheckLogin16" class="custom-control-input" value="1" checked>
                                    @else
                                        <input type="checkbox" name="upgrade_status" id="customCheckLogin16"  class="custom-control-input" value="1">
                                    @endif
                                    <label class="custom-control-label" for="customCheckLogin16">
                                    <span class="text-muted">{{__('Upgrade status')}}</span>     
                                    </label>
                                </div>                                                                                                                                                                                                                                                    
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" for="example-color-input">{{__('Dashboard color')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="">
                                    <input type="color" class="form-control" id="example-color-input" name="d_c" value="{{$set->d_c}}">
                                </div>
                            </div>                              
                            
                            <label class="col-form-label col-lg-2" for="example-color-input1">{{__('Main color')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="">
                                    <input type="color" name="m_c" value="{{$set->m_c}}" class="form-control" id="example-color-input1">
                                </div>
                            </div>                             
                            
                            <label class="col-form-label col-lg-2" for="example-color-input2">{{__('Secondary')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-2">
                                <div class="">
                                    <input type="color" name="s_c" value="{{$set->s_c}}" class="form-control" id="example-color-input2">
                                </div>
                            </div>  
                        </div>  
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Short description:')}}</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="site_desc" rows="4" class="form-control">{{$set->site_desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Address:')}}</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="address" rows="4" class="form-control">{{$set->address}}</textarea>
                            </div>
                        </div>            
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="mb-0">{{__('Security')}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.account.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Username')}}:</label>
                            <div class="col-lg-10">
                                <input type="text" name="username" value="{{$val->username}}" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Password')}}:</label>
                            <div class="col-lg-10">
                                <input type="password" name="password"  class="form-control" required>
                            </div>
                        </div>          
                    <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>    
@stop