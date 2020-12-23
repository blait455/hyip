@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="backg backg-one"  style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, {{$set->m_c}} 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp"  style="background-color: {{$set->s_c}};" data-wosw-delay="0.3s">{{$set->title}}</span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">{{$title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="{{url('/')}}/asset/images/shape-bg.png">
    </div>
</section>
<div class="blog-post-archive pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper post-wrapper-v2">
                    @foreach($posts as $vblog)
                    <article class="post wow soneFadeUp" data-wow-delay="0.3s">
                        <div class="feature-image">
                            <a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}"><img src="{{url('/')}}/asset/thumbnails/{{$vblog->image}}" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <ul class="post-meta">
                                <li><a href="javascript:void;">{{date("M j, Y", strtotime($vblog->created_at))}}</a></li>
                            </ul>
                            <span class="entry-title">
                                <a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}">{{$vblog->title}}</a>
                            </span>
                            <p>{!!  str_limit($vblog->content, 60);!!}</p>
                            <a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}" class="read-more">{{__('Read More')}} <i class="ei ei-arrow_right"></i></a>
                        </div>
                    </article>
                    @endforeach
                    <div class="text-center margin-50px-top margin-50px-bottom sm-margin-50px-top wow fadeInUp">
                        {{$posts->render()}}
                    </div>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
    </div>
</div>
@stop