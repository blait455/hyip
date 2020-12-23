@extends('loginlayout')

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-9" style="background-color: {{$set->m_c}};">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-dark">{{__('Reset password')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-3">
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-dark mb-5">
                <small>{{__('Still cant Remember')}}</small>
              </div>
              <form role="form" action="{{route('user.password.email')}}" method="post">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="color:{{$set->s_c}};"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-neutral  text-dark my-4" >{{__('Reset')}}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{route('login')}}" class="text-dark"><small>{{__('Login')}}</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{route('register')}}" class="text-dark"><small>{{__('Create an account')}}</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop