@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="backg backg-one" style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, {{$set->m_c}} 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp" style="background-color: {{$set->s_c}};" data-wosw-delay="0.3s">{{$set->title}}</span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        {{__('Plans that gives assured profits')}}
                        </span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="{{url('/')}}/asset/images/shape-bg.png">
    </div>
</section>
<section class="pricing-two pt-100 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: {{$set->s_c}};">{{__('Pricing Packages')}}</span>
            <p class="title">
            {{__('Choose your package')}}
            </p>
        </div>
        <div class="row advanced-pricing-table no-gutters">
            @foreach($plan as $val)
            <div class="col-lg-3">
                <div class="pricing-table" style="background-color: {{$set->m_c}};">
                    <div class="pricing-header pricing-amount">
                        <h2 class="price-title">{{$val->name}}</h2>
                        <br>
                        <p class="text-secondary">Category: <span class="badge">{{ $val->category }}</span></p>
                        @if ($val->sub_cat)
                            <p class="text-secondary">Sub-category: <span class="badge">{{ $val->sub_cat }}</span></p>
                        @endif
                        {{-- <p>{{__('Payouts wont be available till end of plan duration')}}</p> --}}
                        <div class="monthly_price">
                            <h2 class="price" style="color: {{$set->s_c}};">{{$currency->symbol.number_format($val->min_deposit)}}</h2>
                        </div>
                        <div class="small_desc text-center">
                            {{-- <span class="castrooo">{{__('Profit Topup is Automated')}}</span><br> --}}
                            {{-- <span class="castrooo">{{__('For')}} {{$val->duration}} {{$val->period}}(s)</span><br> --}}
                            @if ($val->percent)
                                <span class="castrooo">{{$val->percent}}% intrest rate Weekly</span><br>                                
                            @endif
                            @if ($val->amount)
                                <span class="castrooo">{{$currency->symbol.number_format($val->amount)}} {{__('Maximum')}}</span><br>
                            @endif
                            @if($val->ref_percent!=null)
                            <span class="castrooo">{{$val->ref_percent}}% {{__('Referral Bonus')}}</span><br>
                            @endif
                            @if($val->bonus!=null)
                            <span class="castrooo">{{$val->bonus}}% {{__('Compondment Bonus')}}</span><br>
                            @endif
                        </div><br>
                        <p><strong>{{ $val->description }}</strong></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop