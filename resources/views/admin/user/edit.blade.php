@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h3 class="mb-0">{{__('Update account information')}}</h3>
                    </div>
                    <div class="card-body">
                            <form action="{{url('admin/profile-update')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Username')}}:</label>
                                <div class="col-lg-10">
                                    <input type=""hidden value="{{$client->id}}" name="id">
                                    <input type="text" name="username" class="form-control" value="{{$client->username}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Full Name')}}</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-6">
                                        <input type="text" name="first_name" class="form-control" placeholder="{{__('First Name')}}" value="{{$client->first_name}}">
                                        </div>      
                                        <div class="col-6">
                                        <input type="text" name="last_name" class="form-control" placeholder="{{__('Last Name')}}" value="{{$client->last_name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Email')}}:</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" class="form-control" readonly value="{{$client->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Mobile')}}:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="mobile" class="form-control" value="{{$client->phone}}">
                                </div>
                            </div>                                              
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Address')}}:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="address" class="form-control" value="{{$client->address}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Balance:')}}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">{{$currency->symbol}}</span>
                                        </span>
                                        <input type="number" name="balance"step="any" max-length="10" value="{{convertFloat($client->balance)}}" class="form-control">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Status')}}<span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        @if($client->email_verify==1)
                                            <input type="checkbox" name="email_verify" id=" customCheckLogin5" class="custom-control-input" value="1" checked>
                                        @else
                                            <input type="checkbox" name="email_verify"id=" customCheckLogin5"  class="custom-control-input" value="1">
                                        @endif
                                        <label class="custom-control-label" for=" customCheckLogin5">
                                        <span class="text-muted">{{__('Email verification')}}</span>     
                                        </label>
                                    </div>                                     
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        @if($client->fa_status==1)
                                            <input type="checkbox" name="fa_status" id=" customCheckLogin6" class="custom-control-input" value="1" checked>
                                        @else
                                            <input type="checkbox" name="fa_status" id=" customCheckLogin6"  class="custom-control-input" value="1">
                                        @endif
                                        <label class="custom-control-label" for=" customCheckLogin6">
                                        <span class="text-muted">{{__('2fa security')}}</span>     
                                        </label>
                                    </div>                                                              
                                </div>
                            </div>                
                            <div class="text-right">
                                <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="{{url('/')}}/asset/profile/{{$client->image}}" width="120" height="120" alt="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                            <div>
                                <ul class="list list-unstyled mb-0">
                                    <li><span class="text-sm">{{__('Joined')}}: {{date("Y/m/d h:i:A", strtotime($client->created_at))}}</span></li>
                                    <li><span class="text-sm">{{__('Last Login')}}: {{date("Y/m/d h:i:A", strtotime($client->last_login))}}</span></li>
                                    <li><span class="text-sm">{{__('Last Updated')}}: {{date("Y/m/d h:i:A", strtotime($client->updated_at))}}</span></li>
                                    <li><span class="text-sm">{{__('IP Address')}}: {{$client->ip_address}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>  
                @if($set->kyc==1)
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h3 class="mb-0">{{__('Kyc verification')}}</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th class="text-center">{{__('Status')}}</th>
                                <th class="text-center">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        @if($client->kyc_status==1 || $client->kyc_status==0)
                                        {{__('Unverified')}}
                                        @else
                                        {{__('Verified')}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(!empty($client->kyc_link))
                                            <a href="{{url('/')}}/asset/profile/{{$client->kyc_link}}">{{__('View')}}</a>
                                        @else
                                        {{__('No file')}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    @if($client->kyc_status!=2)
                                        @if(!empty($client->kyc_link)) 
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item' href ="{{url('/')}}/admin/approve-kyc/{{$client->id}}">{{__('Approve')}}</a>
                                                    <a class='dropdown-item' href ="{{url('/')}}/admin/reject-kyc/{{$client->id}}">{{__('Reject')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    </td>             
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
@stop