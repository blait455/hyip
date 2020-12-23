@extends('master')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="card shadow">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">{{__('Log')}}</h3>
          </div>
          <div class="card-body">
            <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
              <div class="timeline-block">
                  <span class="timeline-step badge-primary">
                      <i class="ni ni-like-2"></i>
                  </span>
                  <div class="timeline-content">
                      <small class="font-weight-bold">{{date("Y/m/d h:i:A", strtotime($ticket->created_at))}}</small>
                      <h5 class="mt-3 mb-0">{{$ticket->message}}</h5>
                      <p class="text-sm mt-1 mb-0">{{__('User')}}</p>
                  </div>
              </div>
            @foreach($reply as $df)
              @if($df->status==1)
                <div class="timeline-block">
                  <span class="timeline-step badge-primary">
                    <i class="ni ni-like-2"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="font-weight-bold">{{date("Y/m/d h:i:A", strtotime($df->created_at))}}</small>
                    <h5 class="mt-3 mb-0">{{$df->reply}}</h5>
                    <p class="text-sm mt-1 mb-0">{{__('User')}}</p>
                  </div>
                </div>
                @elseif($df->status==0)
                  <div class="timeline-block">
                      <span class="timeline-step badge-primary">
                      <i class="ni ni-like-2"></i>
                      </span>
                      <div class="timeline-content">
                      <small class="font-weight-bold">{{date("Y/m/d h:i:A", strtotime($df->created_at))}}</small>
                      <h5 class="mt-3 mb-0">{{$df->reply}}</h5>
                      <p class="text-sm mt-1 mb-0">{{__('Admin')}}</p>
                      </div>
                  </div>
                @endif
            @endforeach
            </div>
          </div>
        </div>
		<div class="card">
          	<div class="card-header header-elements-inline">
            	<h3 class="mb-0">{{__('Reply')}}</h3>
          	</div>
          	<div class="card-body">
				<form method="post" action="{{route('ticket.reply')}}">
					@csrf
					<textarea class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."  name="reply" required></textarea>
					<input type="hidden"  name="ticket_id" value="{{$ticket->ticket_id}}">			
					<div class="d-flex align-items-center">
						<button type="submit" class="btn btn-success btn-sm">Send</button>
					</div>	
				</form>
		  	</div>
        </div>
	</div>
@stop