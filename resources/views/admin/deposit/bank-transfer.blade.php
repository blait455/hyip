@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Update Bank Details')}}</h3>
                        <p class="card-text text-sm">{{__('Last updated')}}: {{date("Y/m/d h:i:A", strtotime($bank->updated_at))}}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/bankdetails')}}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Name')}}</label>
                                <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" value="{{$bank->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Bank name')}}</label>
                                <div class="col-lg-10">
                                <input type="text" name="bank_name" class="form-control" value="{{$bank->bank_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Bank address')}}</label>
                                <div class="col-lg-10">
                                <input type="text" name="address" class="form-control" value="{{$bank->address}}">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('IBAN code')}}</label>
                                <div class="col-lg-10">
                                <input type="text" name="iban" class="form-control" value="{{$bank->iban}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('SWIFT code')}}</label>
                                <div class="col-lg-10">
                                <input type="text" name="swift" class="form-control" value="{{$bank->swift}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">{{__('Account number')}}</label>
                                <div class="col-lg-10">
                                <input type="number" name="acct_no" class="form-control" value="{{$bank->acct_no}}">
                                </div>
                            </div>  
                            <div class="form-group row">
                                <div class="col-lg-5"> 
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        @if($bank->status==1)
                                            <input type="checkbox" name="status" id="customCheckLogin" class="custom-control-input" value="1" checked>
                                        @else
                                            <input type="checkbox" name="status" id="customCheckLogin"  class="custom-control-input" value="1">
                                        @endif
                                        <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">{{__('Status')}}</span>     
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Bank transfer')}}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>{{__('S/N')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Amount')}}</th>                                                                       
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Created')}}</th>
                                    <th>{{__('Updated')}}</th>
                                    <th class="text-center">{{__('Action')}}</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($deposit as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user['id']}}">{{$val->user['first_name'].' '.$val->user['last_name']}}</a></td>
                                    <td>{{$currency->symbol.number_format($val->amount)}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">{{__('Pending')}}</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">{{__('Approved')}}</span>
                                        @elseif($val->status==2)
                                            <span class="badge badge-info">{{__('Declined')}}</span> 
                                        @endif
                                    </td>  
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                    <td class="text-center">
                                        <div class="text-right">
                                            <div class="dropdown">
                                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a data-toggle="modal" data-target="#delete{{$val->id}}" href="" class="dropdown-item">{{__('Delete')}}</a>
                                                    <a data-toggle="modal" data-target="#screenshot{{$val->id}}" href="" class="dropdown-item">{{__('Screenshot')}}</a>
                                                    <a data-toggle="modal" data-target="#details{{$val->id}}" href="" class="dropdown-item">{{__('Transfer details')}}</a>
                                                    @if($val->status==0)
                                                        <a class='dropdown-item' href="{{route('deposit.declinebk', ['id' => $val->id])}}">{{__('Decline')}}</a>
                                                        <a class='dropdown-item' href="{{route('deposit.approvebk', ['id' => $val->id])}}">{{__('Approve')}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> 
                                    </td>                  
                                </tr>
                                <div class="modal fade" id="delete{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-white border-0 mb-0">
                                                    <div class="card-header">
                                                        <h3 class="mb-0">{{__('Are you sure you want to delete this?')}}</h3>
                                                    </div>
                                                    <div class="card-body px-lg-5 py-lg-5 text-right">
                                                        <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal">{{__('Close')}}</button>
                                                        <a  href="{{route('banktransfer.delete', ['id' => $val->id])}}" class="btn btn-danger btn-sm">{{__('Proceed')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="details{{$val->id}}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">   
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p class="text-sm text-dark">{{$val->details}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal">{{__('Close')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="modal fade" id="screenshot{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                                        <div class="castro-fade">
                                            <div class="modal-body p-0" >
                                                <div class=" border-0 mb-0 text-center">
                                                    <div class="px-lg-5 py-lg-5">
                                                        <img src="{{url('/')}}/asset/screenshot/{{$val->image}}" class="mb-3 user-profile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach               
                            </tbody>                    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop