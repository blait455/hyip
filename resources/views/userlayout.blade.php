<!doctype html>
  <html class="no-js" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link href="{{url('/')}}/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
         @yield('css')
    </head>
  <body>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" style="background-color:{{$set->m_c}};" id="sidenav-main">
      <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('/')}}/asset/{{$logo->image_link}}" class="navbar-brand-img" alt="...">
          </a>
          <div class="ml-auto">
            <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar-inner">
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @if(route('user.dashboard')==url()->current()) active @endif text-dark" href="{{route('user.dashboard')}}">
                  <i class="fa fa-television"></i>
                  <span class="nav-link-text">{{__('Overview')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.fund')==url()->current()) active @endif text-dark" href="{{route('user.fund')}}">
                  <i class="fa fa-bookmark-o"></i>
                  <span class="nav-link-text">{{__('Fund account')}}</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link @if(route('user.withdraw')==url()->current()) active @endif text-dark" href="{{route('user.withdraw')}}">
                  <i class="fa fa-calendar-check-o"></i>
                  <span class="nav-link-text">{{__('Payouts')}}</span>
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link @if(route('user.plans')==url()->current() || route('user.trades')==url()->current()) active @endif text-dark" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                  <i class="fa fa-bar-chart-o"></i>
                  <span class="nav-link-text">{{__('Trades & Plans')}}</span>
                </a>
                <div class="collapse @if(route('user.plans')==url()->current() || route('user.trades')==url()->current()) show @endif" id="navbar-examples3">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if(route('user.plans')==url()->current()) active @endif text-dark">
                      <a href="{{route('user.plans')}}" class="nav-link">{{__('Subscription Plans')}}</a>
                    </li>                                 
                    <li class="nav-item  @if(route('user.trades')==url()->current()) active @endif text-dark">
                      <a href="{{route('user.trades')}}" class="nav-link">{{__('Trade Activity')}}</a>
                    </li>                                  
                  </ul>
                </div>
              </li>    
              @if($set->transfer==1)   
              <li class="nav-item">
                <a class="nav-link @if(route('user.ownbank')==url()->current()) active @endif text-dark" href="{{route('user.ownbank')}}">
                  <i class="fa fa-send-o"></i>
                  <span class="nav-link-text">{{__('Send Money')}}</span>
                </a>
              </li> 
              @endif                              
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading p-0 text-muted">{{__('Account')}}</h6>
            <ul class="navbar-nav mb-md-3">  
              <li class="nav-item">
                <a class="nav-link @if(route('user.ticket')==url()->current()) active @endif text-dark" href="{{route('user.ticket')}}">
                  <i class="fa fa-bullseye"></i>
                  <span class="nav-link-text">{{__('Disputes')}}</span>
                </a>
              </li>             
              <li class="nav-item">
                <a class="nav-link @if(route('user.profile')==url()->current()) active @endif text-dark" href="{{route('user.profile')}}">
                  <i class="fa fa-cogs"></i>
                  <span class="nav-link-text">{{__('Settings')}}</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link @if(route('user.audit')==url()->current()) active @endif text-dark" href="{{route('user.audit')}}">
                  <i class="fa fa-refresh"></i>
                  <span class="nav-link-text">{{__('Audit Logs')}}</span>
                </a>
              </li>  
              @if($set->referral==1)
              <li class="nav-item">
                <a class="nav-link @if(route('user.referral')==url()->current()) active @endif text-dark" href="{{route('user.referral')}}">
                  <i class="fa fa-braille"></i>
                  <span class="nav-link-text">{{__('Referral')}}</span>
                </a>
              </li> 
              @endif   
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading p-0 text-muted">{{__('More')}}</h6>
            <ul class="navbar-nav mb-md-3">  
              <li class="nav-item">
                <a class="nav-link @if(route('privacy')==url()->current()) active @endif text-dark" href="{{route('privacy')}}">
                  <i class="fa fa-quote-left"></i>
                  <span class="nav-link-text">{{__('Privacy Policy')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('terms')==url()->current()) active @endif text-dark" href="{{route('terms')}}">
                  <i class="fa fa-legal"></i>
                  <span class="nav-link-text">{{__('Terms & Conditions')}}</span>
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{route('user.logout')}}">
                  <i class="fa fa-power-off"></i>
                  <span class="nav-link-text">{{__('Sign out')}}</span>
                </a>
              </li>            
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="main-content" id="panel">
      <nav class="navbar navbar-top navbar-expand navbar-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center ml-md-auto">
              <li class="nav-item d-xl-none">
                <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
            </ul>
            <div class="">
              <h6 class="h2 mb-0" style="color: {{$set->s_c}};">
                  {{$currency->symbol.number_format($user->balance)}}
              </h6>
            </div>
            @if($set->language==1)
            <ul class="navbar-nav align-items-center ">
              <li class="nav-item dropdown">
              @php $locale = session()->get('locale'); @endphp
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <div class="media-body ml-2 d-lg-block">
                      @switch($locale)
                        @case('fr')
                        <span class="mb-0 text-sm"><span class="france"></span>French</span>
                        @break
                        @case('ge')
                        <span class="mb-0 text-sm"><span class="germany"></span>German</span>
                        @break
                        @case('es')
                        <span class="mb-0 text-sm"><span class="spain"></span>Spanish</span>
                        @break
                        @case('in')
                        <span class="mb-0 text-sm"><span class="hindi"></span>Hindi</span>
                        @break                        
                        @case('ch')
                        <span class="mb-0 text-sm"><span class="china"></span>China</span>
                        @break
                        @default
                        <span class="mb-0 text-sm"><span class="usa"></span>English</span>
                      @endswitch
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-left">
                  <a href="{{url('/')}}/lang/en" class="dropdown-item">
                    <span  class="mb-0 text-sm"><span class="usa"></span>English</span>
                  </a>
                  <a href="{{url('/')}}/lang/fr" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="france"></span>France</span>
                  </a>                  
                  <a href="{{url('/')}}/lang/ge" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="germany"></span>Germany</span>
                  </a>        
                  <a href="{{url('/')}}/lang/ch" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="china"></span>China</span>
                  </a>            
                  <a href="{{url('/')}}/lang/in" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="hindi"></span>Hindi</span>
                  </a>                  
                  <a href="{{url('/')}}/lang/es" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="spain"></span>Spanish</span>
                  </a>
                </div>
              </li>
            </ul>
            @endif
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$cast}}">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm text-default">{{$user->first_name}} {{$user->last_name}}</span>
                    </div>
                  </div>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.logout')}}" class="nav-link pr-0">
                  <i class="ni ni-button-power text-danger"></i>
                </a>
              </li>   
            </ul>
          </div>
        </div>
      </nav>
      <div class="header pb-6">
        <div class="container-fluid">
          <div class="header-body">
          </div>
        </div>
      </div>
        @yield('content')
      </div>
    </div>
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/{{$set->tawk_id }}/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/quill/dist/quill.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/js/argon.js?v=1.1.0"></script>
    <script src="{{url('/')}}/asset/dashboard/js/demo.min.js"></script>
    <script src="{{url('/')}}/asset/js/sweetalert.js"></script>
  </body>
</html>
@include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
    <script>
    @if(Session::has('message'))
    "use strict";
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
@if($set->recaptcha==1)
  {!! NoCaptcha::renderJs() !!}
@endif