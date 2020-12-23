<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>{{ $title }} - {{$set->site_name}}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="{{$set->m_c}}"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/swiper/css/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/wow/css/animate.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/magnific-popup/css/magnific-popup.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/app.css" type="text/css">
        <link href="{{url('/')}}/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/asset/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
         @yield('css')
    </head>
<body data-style="default">
    <div class="boompay">
        <header class="navbar-header navbar-trans-fixed">
            <div class="container">
                <div class="header-inner">
                    <div class="toggle-menu">
                        <span class="bar bg-dark"></span>
                        <span class="bar bg-dark"></span>
                        <span class="bar bg-dark"></span>
                    </div>
                    <div class="navbar-mobile-logo">
                        <a href="{{route('home')}}" class="logo">
                        <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo"> 
                        <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="sticky-logo">
                        </a>
                    </div>
                    <nav class="navbar-nav nav-dark">
                        <div class="close-menu">
                            <i class="fa fa-close"></i>
                        </div>
                        <div class="navbar-logo">
                            <a href="{{route('home')}}" class="logo">
                                <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo"> 
                                <img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="sticky-logo">
                            </a>
                        </div>
                        <div class="menu-wrapper" data-top="992">
                            <ul class="navbar-main-menu">  
                                @if($set->plan==1)       
                                <li><a href="{{route('plans')}}">{{__('Subscription')}}</a></li>
                                @endif                  
                                <li class="menu-item-has-children">
                                    <a href="javascript:void;">{{__('Help')}}</a>
                                    <ul class="sub-menu">
                                        @if($set->faq==1)
                                        <li><a href="{{route('faq')}}">{{__('FAQs')}}</a></li>
                                        @endif
                                        @if($set->blog==1)
                                        <li><a href="{{route('blog')}}">{{__('Supporting articles')}}</a></li>
                                        @endif
                                        <li><a href="{{route('terms')}}">{{__('Terms & Conditions')}}</a></li>
                                        <li><a href="{{route('privacy')}}">{{__('Privacy Policy')}}</a></li>
                                        @if($set->contact==1)
                                        <li><a href="{{route('contact')}}">{{__('Contact us')}}</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void;">{{__('More')}}</a>
                                    <ul class="sub-menu">
                                        @foreach($pages as $vpages)
                                            @if(!empty($vpages))
                                                <li><a href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('about')}}">{{__('About us')}}</a></li>
                                @if (Auth::guard('user')->check())
                                @else
                                <li><a href="{{route('login')}}">{{__('Login')}}</a></li>
                                @endif
                                @if($set->language==1)
                                    <li class="menu-item-has-children">
                                        @php $locale = session()->get('locale'); @endphp
                                        <a href="javascript:void;">
                                        @switch($locale)
                                            @case('fr')
                                            <span class="mb-0 text-sm"><span class="france"></span> French</span>
                                            @break
                                            @case('ge')
                                            <span class="mb-0 text-sm"><span class="germany"></span> German</span>
                                            @break
                                            @case('es')
                                            <span class="mb-0 text-sm"><span class="spain"></span> Spanish</span>
                                            @break
                                            @case('in')
                                            <span class="mb-0 text-sm"><span class="hindi"></span> Hindi</span>
                                            @break                        
                                            @case('ch')
                                            <span class="mb-0 text-sm"><span class="china"></span> China</span>
                                            @break
                                            @default
                                            <span class="mb-0 text-sm"><span class="usa"></span> English</span>
                                        @endswitch
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/')}}/lang/en">English</a></li>
                                            <li><a href="{{url('/')}}/lang/fr">France</a></li>
                                            <li><a href="{{url('/')}}/lang/ge">Germany</a></li>
                                            <li><a href="{{url('/')}}/lang/ch">China</a></li>
                                            <li><a href="{{url('/')}}/lang/in">Hindi</a></li>
                                            <li><a href="{{url('/')}}/lang/es">Spanish</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                            <div class="nav-right">
                                @if (Auth::guard('user')->check())
                                <a href="{{route('user.dashboard')}}" class="nav-btn">{{__('Dashboard')}}</a>
                                @else
                                <a href="{{route('register')}}" class="nav-btn">{{__('Join us')}}</a>
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
@yield('content')
        <footer id="footer" class="wow soneFadeUp">
            <div class="container">
                <div class="footer-nner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget footer-widget style_logo">
                                        <p>{{$set->site_desc}}</p>
                                        @if($set->contact==1)
                                            <p>{{$set->email}}<br>{{$set->mobile}}</p>
                                            <p>{{$set->address}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('Quick links')}}</span>
                                        <ul class="footer-menu">
                                            <li><a href="{{route('user.plans')}}">{{__('Plans')}}</a></li>
                                            <li><a href="{{route('user.ticket')}}">{{__('Disputes')}}</a></li>
                                            <li><a href="{{route('user.fund')}}">{{__('Fund account')}}</a></li>
                                            @if(count($faq)>0)
                                                <li><a href="{{route('user.ownbank')}}">{{__('Send money')}}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>                         
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('Company')}}</span>
                                        <ul class="footer-menu">
                                            <li><a href="{{route('about')}}">{{__('About us')}}</a></li>
                                            <li><a href="{{route('terms')}}">{{__('Terms & Conditions')}}</a></li>
                                            <li><a href="{{route('privacy')}}">{{__('Privacy Policy')}}</a></li>
                                            @if(count($faq)>0)
                                                <li><a href="{{route('faq')}}">{{__('FAQs')}}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>                
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('More')}}</span>
                                        <ul class="footer-menu">
                                            @foreach($pages as $vpages)
                                                @if(!empty($vpages))
                                                    <li><a href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-info">
                    <div class="copyright">
                        <p>{{$set->site_name}}  &copy; {{date('Y')}}. {{__('All Rights Reserved.')}}</p>
                    </div>
                    <ul class="footer-social-link">
                        @foreach($social as $socials)
                            @if(!empty($socials->value))
                                <li><a href="{{$socials->value}}" class="icon-{{$socials->type}}"><i class="fab fa-{{$socials->type}}"></i></a></li>
                            @endif
                        @endforeach 
                    </ul>
                </div>
            </div>
        </footer>
        @if(isset($set->tawk_id))
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/{{$set->tawk_id}}/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
        @endif
        <a href="#header" data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="{{url('/')}}/asset/vendor/popper.js/popper.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/asset/js/particles.js"></script>
        <script src="{{url('/')}}/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/swiper/js/swiper.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery.appear/jquery.appear.js"></script>
        <script src="{{url('/')}}/asset/vendor/wow/js/wow.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/countUp.js/countUp.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
        <script src="{{url('/')}}/asset/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
        <!-- Site Scripts -->
        <script src="{{url('/')}}/asset/js/header.js"></script>
        <script src="{{url('/')}}/asset/js/app.js"></script>
        <script src="{{url('/')}}/asset/js/sweetalert.js"></script>

        @include('sweetalert::alert')
        @yield('script')
        @if (session('success'))
            <script>
                $(document).ready(function () {
                    swal("Success!", "{{ session('success') }}", "success");
                });
            </script>
        @endif
        @if (session('alert'))
            <script>
                $(document).ready(function () {
                    swal("Sorry!", "{{ session('alert') }}", "error");
                });
            </script>
        @endif
        <script>
                    @if(Session::has('message'))
            var type = "{{Session::get('alert-type','info')}}";
            switch (type) {
                case 'info':
                    toastr.info("{{Session::get('message')}}");
                    break;
                case 'warning':
                    toastr.warning("{{Session::get('message')}}");
                    break;
                case 'success':
                    toastr.success("{{Session::get('message')}}");
                    break;
                case 'error':
                    toastr.error("{{Session::get('message')}}");
                    break;
            }
            @endif
        </script>
        </div>
    </body>
</html>