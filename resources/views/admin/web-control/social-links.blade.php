@extends('master')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">{{__('Social links')}}</h3>
            </div>
            <table class="table datatable-show-all">
                <thead>
                    <tr>
                        <th>{{__('S/N')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Link')}}</th>
                        <th class="scope"></th>    
                    </tr>
                </thead>
                <tbody>
                @foreach($links as $k=>$val)
                    <tr>
                        <td>{{++$k}}.</td>
                        <td>{{$val->type}}</td>
                        <td>{{$val->value}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class='dropdown-item' data-toggle="modal" data-target="#update{{$val->id}}" href="">{{__('Edit')}}</a>
                                </div>
                            </div>
                        </td>                   
                    </tr>                              
                    <div id="update{{$val->id}}" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-white border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <form action="{{route('social-links.update')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="url" name="link" class="form-control" placeholder="link" value="{{$val->value}}">
                                                <input type="hidden" name="id" value="{{$val->id}}">
                                            </div>
                                        </div>             
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success btn-sm">{{__('Update')}}</button>
                                        </div>
                                        </form>
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
@stop