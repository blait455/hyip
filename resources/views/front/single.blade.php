@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="page-backg blog-details-backg"  style="background-color: transparent; background-image: linear-gradient(to top, #ffffff 0%, {{$set->m_c}} 60%);"> 
    <div class="container">
        <div class="page-title-wrapper">
            <ul class="post-meta color-theme">
                <li><a href="javascript:void;">{{date("M j, Y", strtotime($post->created_at))}}</a></li>
            </ul>
            <h1 class="page-title">{{$post->title}}</h1>
            <ul class="post-meta">
                <li><span>{{__('By')}}</span> <a href="javascript:void;">{{__('Admin')}}</a></li>
                <li><a href="cat/{{$xcat->id}}">{{$xcat->categories}}</a></li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="feature-image"><a href="javascript:void;"><img src="{{url('/')}}/asset/thumbnails/{{$post->image}}" alt=""></a></div>
                        <div class="blog-content">
                            <p>{!!$post->details!!}</p>                           
                            <div class="single-blog-bottom-content">
                                <div class="blog-share">
                                    @include('partials.share')
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
        <!-- NAV -->
    </div>
</section>
@stop