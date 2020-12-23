 @php $slug  = str_slug($post->title); @endphp
<ul class="share-link flex-center">
    <li><a class="facebook " href="https://www.facebook.com/sharer.php?u={{url('/')}}/single/{{$post->id}}/{{$slug}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li><a class="twitter " href="https://twitter.com/intent/tweet?url={{url('/')}}/single/{{$post->id}}/{{$slug}}&text={{$post->title}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li><a class="google " href="https://plus.google.com/share?url={{url('/')}}/single/{{$post->id}}/{{$slug}}&text={{$post->title}}&hl=english" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    <li><a class="pinterest " href="https://pinterest.com/pin/create/button/?url={{url('/')}}/single/{{$post->id}}/{{$slug}}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
</ul>