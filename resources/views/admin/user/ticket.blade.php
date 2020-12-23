@extends('master')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">{{__('Ticket')}}</h3>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                <thead>
                    <tr>
                        <th>{{__('S/N')}}</th>
                        <th>{{__('Username')}}</th>
                        <th>{{__('Priority')}}</th>
                        <th>{{__('Ticket ID')}}</th>                                                                      
                        <th>{{__('Status')}}</th>
                        <th>{{__('Subject')}}</th>
                        <th>{{__('Created')}}</th>
                        <th>{{__('Updated')}}</th>
                        <th class="scope"></th>    
                    </tr>
                </thead>
                <tbody>
                @foreach($ticket as $k=>$val)
                    <tr>
                        <td>{{++$k}}.</td>
                        <td><a href="{{url('admin/manage-user')}}/{{$val->user->id}}">{{$val->user->username}}</a></td>
                        <td>{{$val->priority}}</td>
                        <td>{{$val->ticket_id}}</td>
                        <td>
                            @if($val->status==0)
                                <span class="badge badge-info">{{__('Open')}}</span>
                            @elseif($val->status==1)
                                <span class="badge badge-danger">{{__('Closed')}}</span>                                        
                            @elseif($val->status==2)
                                <span class="badge badge-success">{{__('Resolved')}}</span> 
                            @endif
                        </td>   
                        <td>{{$val->subject}}</td> 
                        <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
                        <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="{{route('ticket.manage', ['id' => $val->id])}}" class="dropdown-item">{{__('Manage ticket')}}</a>
                                    @if($val->status==0)
                                    <a href="{{route('ticket.close', ['id' => $val->id])}}" class="dropdown-item">{{__('Close ticket')}}</a>
                                    @endif
                                    <a data-toggle="modal" data-target="#delete{{$val->id}}" href="" class="dropdown-item">{{__('Delete')}}</a>
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
                                            <a  href="{{route('ticket.delete', ['id' => $val->id])}}" class="btn btn-danger btn-sm">{{__('Proceed')}}</a>
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

@stop