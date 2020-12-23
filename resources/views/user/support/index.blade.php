@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="">
          <div class="card-body">
            <div class="">
              <a data-toggle="modal" data-target="#modal-formx" href="" class="btn btn-sm btn-neutral"><i class="fa fa-plus"></i> {{__('Open Ticket')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card border-0 mb-0">
                  <div class="card-header">
                    <h3 class="mb-0">{{__('Open Ticket')}}</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('submit-ticket')}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Subject')}}</label>
                        <div class="col-lg-10">
                          <div class="input-group input-group-merge">
                            <input type="text" name="subject" class="form-control" required="">
                          </div>
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Priority')}}</label>
                        <div class="col-lg-10">
                        <select class="form-control select" name="category" required>
                          <option  value="Low">{{__('Low')}}</option>
                          <option  value="Medium">{{__('Medium')}}</option> 
                          <option  value="High">{{__('High')}}</option>  
                        </select>
                      </div>
                      </div> 
                      <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Details')}}</label>
                        <div class="col-lg-10">
                          <textarea name="details" class="form-control" rows="4" required></textarea>
                        </div>
                      </div>                
                      <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Save')}}</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>  
    <div class="row">
      @if(count($ticket)>0)
        @foreach($ticket as $k=>$val)
          <div class="col-md-6">
            <div class="card" style="background-color:{{$set->d_c}};">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-7">
                      <!-- Title -->
                      <h5 class="h4 mb-0">#{{$val->ticket_id}}</h5>
                    </div>
                    <div class="col-5 text-right">
                      <a href="{{url('/')}}/user/reply-ticket/{{$val->id}}" class="btn btn-sm btn-neutral">{{__('Reply')}}</a>
                      <a href="{{url('/')}}/user/ticket/delete/{{$val->id}}" class="btn btn-sm btn-danger">{{__('Delete')}}</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <p class="text-sm text-dark mb-0">{{__('Subject')}}: {{$val->subject}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Priority')}}: {{$val->priority}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Status')}}: @if($val->status==0){{__('Open')}} @elseif($val->status==1){{__('Closed')}} @elseif($val->status==2){{__('Resolved')}} @endif</p>
                      <p class="text-sm text-dark mb-0">{{__('Created')}}: {{date("Y/m/d h:i:A", strtotime($val->created_at))}}</p>
                      <p class="text-sm text-dark mb-0">{{__('Updated')}}: {{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        @endforeach
      @else
      <div class="col-md-12">
        <p class="text-center text-muted card-text mt-8">No Support Ticket Found</p>
      </div>
      @endif
    </div>
    <div class="row">
      <div class="col-md-12">
      {{ $ticket->links() }}
      </div>
    </div>
@stop