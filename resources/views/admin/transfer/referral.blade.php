@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Earnings')}}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>{{__('S/N')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Username')}}</th>
                                    <th>{{__('From')}}</th>
                                    <th>{{__('Plan')}}</th>
                                    <th>{{__('Created')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($earning as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$currency->symbol.number_format($val->amount)}}</td>
                                    <td>{{$val->user['first_name']}} {{$val->user['last_name']}}</td>
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user['id']}}">{{$val->shared['username']}}</a></td>
                                    <td>{{$val->plan['name']}}</td>
                                    <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
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