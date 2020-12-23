@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Transfer logs')}}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>{{__('S/N')}}</th>
                                    <th>{{__('Ref')}}</th>
                                    <th>{{__('Sender')}}</th>
                                    <th>{{__('Receiver')}}</th>
                                    <th>{{__('Amount')}}</th>                                                                       
                                    <th>{{__('Charge')}}</th>                                                                       
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Created')}}</th>
                                    <th>{{__('Updated')}}</th> 
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($transfer as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->ref_id}}</td>
                                    <td>{{$val->sender['email']}}</td>
                                    <td>
                                    @if($val->receiver_id==null)  
                                        {{$val->temp}}
                                    @else
                                        {{$val->receiver['email']}}
                                    @endif
                                   </td>
                                    <td>{{$currency->symbol.number_format($val->amount)}}</td>
                                    <td>{{$currency->symbol.number_format($val->charge)}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">{{__('Pending')}}</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">{{__('Successful')}}</span>                                        
                                        @elseif($val->status==2)
                                            <span class="badge badge-info">{{__('Returned')}}</span> 
                                        @endif
                                    </td>     
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>  
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>                
                                </tr>
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