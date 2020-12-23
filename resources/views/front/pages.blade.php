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
                        <span class="discount wow soneFadeUp" data-wosw-delay="0.3s">{{$set->title}}</span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">{{$page->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="{{url('/')}}/asset/images/shape-bg.png">
    </div>
</section>
<section class="about genera-informes wow soneFadeUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="section-title">
                        <p>{!!$page->content!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop