<div class="col-lg-4 col-md-6 col-sm-8 right-blog-d">
    <div class="sidebar">
        <div id="gp-posts-widget-2" class="widget gp-posts-widget">
            <h2 class="widget-title">{{__('Latest Posts')}}</h2>
            <div class="gp-posts-widget-wrapper">
            @foreach($trending as $vtrending)
                @php $vslug=str_slug($vtrending->title); @endphp
                <div class="post-item">
                    <div class="post-widget-thumbnail"><a href="{{url('/')}}/single/{{$vtrending->id}}/{{$vslug}}"><img src="{{url('/')}}/asset/thumbnails/{{$vtrending->image}}" alt="thumb"></a></div>
                    <div class="post-widget-info">
                        <span class="post-widget-title"><a href="{{url('/')}}/single/{{$vtrending->id}}/{{$vslug}}" title="{{$vtrending->title}}">{{$vtrending->title}}</a></span></div>
                </div>
            @endforeach
            </div>
        </div>
        <div id="categories" class="widget widget_categories">
            <h2 class="widget-title">{{__('Categories')}}</h2>
            <ul>
            @foreach($cat as $vcat)  
                @php
                    $rate=count(App\Models\Blog::wherecat_id($vcat->id)->wherestatus(1)->get());
                @endphp 
                <li><a href="{{url('/')}}/cat/{{$vcat->id}}/{{str_slug($vcat->categories)}}">{{$vcat->categories}}<span class="count">({{$rate}})</span></a></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>