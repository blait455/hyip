@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                <div class="card-body">
                    <a  href="{{route('admin.plan.create')}}" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Create Plan')}}</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Plans')}}</h3>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>{{__('S/N')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Daily')}} %</th>                                                                       
                                    <th>{{__('Min')}}</th>
                                    <th>{{__('Max')}}</th>
                                    <th>{{__('Duration')}}</th>
                                    <th>{{__('Referral')}}</th>
                                    <th>{{__('Bonus')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th class="text-center">{{__('Action')}}</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($plan as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->percent}}%</td>
                                    <td>{{$currency->symbol.number_format($val->min_deposit)}}</td>
                                    <td>{{$currency->symbol.number_format($val->amount)}}</td>
                                    <td>{{$val->duration.$val->period}}(s)</td>
                                    <td>{{$val->ref_percent}}%</td>
                                    <td>{{$val->bonus}}%</td>
                                    <td>
                                        @if($val->status==1)
                                            <span class="badge badge-success">{{__('Active')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('Disabled')}}</span>
                                        @endif
                                    </td>  
                                    <td class="text-center">
                                        <div class="text-right">
                                            <div class="dropdown">
                                                <a class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a href="{{route('admin.plan.edit', ['id' => $val->id])}}" class="dropdown-item">{{__('Edit')}}</a>
                                                </div>
                                            </div>
                                        </div> 
                                    </td>                  
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