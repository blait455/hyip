@extends('master')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">{{__('Send email')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('user.email.send')}}" method="post">
            @csrf
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">{{__('To')}}:</label>
                    <div class="col-lg-10">
                        <input type="text" name="to" maxlength="200" value="{{$email}}" class="form-control readonly" required>
                    </div>
                </div>                        
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">{{__('Name')}}:</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" maxlength="200" value="{{$name}}" class="form-control readonly" required>
                    </div>
                </div>                        
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">{{__('Subject')}}:</label>
                    <div class="col-lg-10">
                        <input type="text" name="subject" maxlength="200" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">{{__('Message')}}:</label>
                    <div class="col-lg-10">
                        <textarea type="text" name="message" rows="4" class="form-control" required></textarea>
                    </div>
                </div>          
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-sm">{{__('Send')}}</button>
                </div>
            </form>
        </div>
    </div>
@stop