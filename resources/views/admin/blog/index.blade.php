@extends('master')
    @section('content')
        <div class="container-fluid mt--6">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                        <div class="card-body">
                        <a href="{{route('blog.create')}}" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Create Article')}}</a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{__('Posts')}}</h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-buttons">
                                    <thead>
                                        <tr>
                                            <th>{{__('S/N')}}</th>
                                            <th>{{__('Title')}}</th>
                                            <th>{{__('Category')}}</th>
                                            <th>{{__('Views')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Created')}}</th>
                                            <th>{{__('Updated')}}</th>
                                            <th class="text-center">{{__('Action')}}</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blog as $k=>$val)
                                        <tr>
                                            <td>{{++$k}}.</td>                                   
                                            <td>{{$val->title}}</td>
                                            <td>{{$val->category['categories']}}</td>
                                            <td>{{$val->views}}</td>
                                            <td>
                                                @if($val->status==1)
                                                    <span class="badge badge-success">{{__('Published')}}</span>
                                                @else
                                                    <span class="badge badge-danger">{{__('Pending')}}</span>
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
                                                            @if($val->status==1)
                                                                <a class='dropdown-item' href="{{route('blog.unpublish', ['id' => $val->id])}}">{{__('Unpublish')}}</a>
                                                            @else
                                                                <a class='dropdown-item' href="{{route('blog.publish', ['id' => $val->id])}}">{{__('Publish')}}</a>
                                                            @endif
                                                            <a href="{{route('blog.edit', ['id' => $val->id])}}" class="dropdown-item">{{__('Edit')}}</a>
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
                                                                <a  href="{{route('blog.delete', ['id' => $val->id])}}" class="btn btn-danger btn-sm">{{__('Proceed')}}</a>
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