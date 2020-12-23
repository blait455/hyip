@extends('master')

@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">{{ __('Light Mode')}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/updatelogo')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="logo" lang="en" required>
                                <label class="custom-file-label" for="customFileLang" style="border-color: {{$set->s_c}};">{{__('Choose Media')}}</label>
                            </div>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Upload')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/{{$logo->image_link}}">
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Favicon')}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/updatefavicon')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang1" name="favicon" lang="en" required>
                                <label class="custom-file-label sdsd" for="customFileLang1" style="border-color: {{$set->s_c}};">{{__('Choose Media')}}</label>
                            </div>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Upload')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/{{$logo->image_link2}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@stop