<!doctype html>
<html class="no-js" lang="en">
    <head>
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link href="{{url('/')}}/asset/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
         @yield('css')
    </head>
<!-- header begin-->
  <body style="background-color: {{$set->m_c}};">
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{url('/')}}/asset/{{$logo->image_link}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{url('/')}}">
                  <img src="{{url('/')}}/asset/{{$logo->image_link}}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a href="{{route('about')}}" class="nav-link">
              <span class="nav-link-inner--text text-dark">{{__('About us')}}</span>
              </a>
            </li>                                 
            <li class="nav-item">
              <a href="{{route('faq')}}" class="nav-link">
              <span class="nav-link-inner--text text-dark">{{__('FAQs')}}</span>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="{{route('login')}}" class="btn btn-neutral text-dark">
                <span class="nav-link-inner--text font-weight-500">{{__('Login')}}</span>
              </a>
            </li>
          </ul>
          @if($set->language==1)
            <ul class="navbar-nav align-items-center ">
              <li class="nav-item dropdown">
              @php $locale = session()->get('locale'); @endphp
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <div class="media-body ml-2 d-lg-block">
                      @switch($locale)
                        @case('fr')
                        <span class="mb-0 text-sm text-dark"><span class="icon-country france"></span>French</span>
                        @break
                        @case('ge')
                        <span class="mb-0 text-sm text-dark"><span class="icon-country germany"></span>German</span>
                        @break
                        @case('es')
                        <span class="mb-0 text-sm text-dark"><span class="icon-country spain"></span>Spanish</span>
                        @break
                        @case('in')
                        <span class="mb-0 text-sm text-dark"><span class="icon-country hindi"></span>Hindi</span>
                        @break                        
                        @case('ch')
                        <span class="mb-0 text-sm text-dark"><span class="icon-country china"></span>China</span>
                        @break
                        @default
                        <span class="mb-0 text-sm text-dark"><span class="icon-country usa"></span>English</span>
                      @endswitch
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-left">
                  <a href="{{url('/')}}/lang/en" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country usa"></span>English</span>
                  </a>
                  <a href="{{url('/')}}/lang/fr" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country france"></span>France</span>
                  </a>                  
                  <a href="{{url('/')}}/lang/ge" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country germany"></span>Germany</span>
                  </a>        
                  <a href="{{url('/')}}/lang/ch" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country china"></span>China</span>
                  </a>            
                  <a href="{{url('/')}}/lang/in" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country hindi"></span>Hindi</span>
                  </a>                  
                  <a href="{{url('/')}}/lang/es" class="dropdown-item">
                    <span class="mb-0 text-sm text-dark"><span class="icon-country spain"></span>Spanish</span>
                  </a>
                </div>
              </li>
            </ul>
          @endif
        </div>
      </div>
    </nav>
<!-- header end -->

@yield('content')


<!-- footer begin -->
<footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-dark">
          <a href="{{url('/')}}" class="ml-1" style="color:{{$set->s_c}};">{{$set->site_name}}</a>  &copy; {{date('Y')}}. {{__('All Rights Reserved.')}} 
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            @foreach($social as $socials)
              @if(!empty($socials->value))
                <li class="nav-item">
                  <a class="nav-link nav-link-icon" href="{{$socials->value}}" target="_blank" data-toggle="tooltip">
                    <i class="fab fa-{{$socials->type}} text-dark"></i>
                    <span class="nav-link-inner--text d-lg-none">{{$socials->type}}</span>
                  </a>
                </li>
              @endif
            @endforeach
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{route('faq')}}">{{__('FAQs')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{route('contact')}}">{{__('Contact us')}}</a>
            </li>   
                     
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{route('privacy')}}">{{__('Privacy Policy')}}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
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
  <!-- Argon Scripts -->
  <!-- Core -->
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
@if($set->recaptcha==1)
  {!! NoCaptcha::renderJs() !!}
@endif