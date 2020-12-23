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
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">{{__('Frequently asked questions')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="{{url('/')}}/asset/images/shape-bg.png">
    </div>
</section>
<section class="revolutionize revolutionize-two wow soneFadeUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-title text-left">
                    <p class="title">
                    {{$ui->s5_title}}
</p>

                    <p>
                    {{$ui->s5_body}}
                    </p>
                </div>
            </div>
            <div id="accordion" class="col-lg-8 faq">
                @foreach($faq as $vfaq)
                <div class="card">
                    <div class="card-header" style="background-color: {{$set->m_c}};" id="heading{{$vfaq->id}}">
                        <span><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$vfaq->id}}" aria-expanded="false" aria-controls="collapse{{$vfaq->id}}">{{$vfaq->question}}</button></span>
                    </div>
                    <div id="collapse{{$vfaq->id}}" class="collapse" aria-labelledby="heading{{$vfaq->id}}" data-parent="#accordion" style="">
                        <div class="card-body">
                            <p>{!! $vfaq->answer!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@stop