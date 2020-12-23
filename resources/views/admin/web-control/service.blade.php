@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                <div class="card-body">
                <a data-toggle="modal" data-target="#create" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Create service')}}</a>
                </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Services')}}</h3>
                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush" id="datatable-buttons">
                                <thead>
                                    <tr>
                                        <th>{{__('S/N')}}</th>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Code')}}</th>
                                        <th>{{__('Icon')}}</th>
                                        <th>{{__('Created')}}</th>
                                        <th>{{__('Updated')}}</th>
                                        <th class="text-center">{{__('Action')}}</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $k=>$val)
                                    <tr>
                                        <td>{{++$k}}.</td>
                                        <td>{{$val->title}}</td>
                                        <td><code>{{$val->icon}}</code></td>
                                        <td><i class="fa fa-{{$val->icon}}"></i></td>
                                        <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                        <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                        <td class="text-center">
                                            <div class="text-right">
                                                <div class="dropdown">
                                                    <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a data-toggle="modal" data-target="#delete{{$val->id}}" href="" class="dropdown-item">{{ __('Delete')}}</a>
                                                        <a data-toggle="modal" data-target="#update{{$val->id}}" href="" class="dropdown-item">{{ __('Edit')}}</a>
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
                                                            <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal">{{ __('Close')}}</button>
                                                            <a  href="{{route('service.delete', ['id' => $val->id])}}" class="btn btn-danger btn-sm">{{ __('Proceed')}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="update{{$val->id}}" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">   
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="{{route('service.update')}}" method="post">
                                                @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-2">{{__('Title')}}</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="title" class="form-control" value="{{$val->title}}">
                                                                <input type="hidden" name="id" value="{{$val->id}}">
                                                            </div>
                                                        </div>       
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-2">{{__('Icon')}}</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" name="icon" class="form-control" value="{{$val->icon}}">
                                                            </div>
                                                        </div>  
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-2">{{__('Details')}}</label>
                                                            <div class="col-lg-10">
                                                                <textarea type="text" name="details" class="form-control">{{$val->details}}</textarea>
                                                            </div>
                                                        </div>               
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal">{{__('Close')}}</button>
                                                        <button type="submit" class="btn btn-success btn-sm">{{__('Update')}}</button>
                                                    </div>
                                                </form>
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
    <div id="create" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">   
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('admin/createservice')}}" method="post">
                @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Title')}}</label>
                            <div class="col-lg-10">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Icon')}}</label>
                            <div class="col-lg-10">
                                <input type="text" name="icon" class="form-control" required>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{__('Details')}}</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="details" class="form-control"></textarea>
                            </div>
                        </div>               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-neutral btn-sm" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop