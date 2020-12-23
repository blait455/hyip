@extends('master')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Users')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Active users:')}} <span class="font-weight-semibold text-default">#{{$activeusers}}</span></li>
                  <li>{{__('Blocked users:')}} <span class="font-weight-semibold text-default">#{{$blockedusers}}</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Support Ticket')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Open tickets:')}} <span class="font-weight-semibold text-default">
                    #{{$openticket}}</span></li>
                  <li>{{__('Closed tickets:')}} <span class="font-weight-semibold text-default">
                    #{{$closedticket}}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Platform Reviews')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Published reviews:')}} <span class="font-weight-semibold text-default">
                    #{{$pubreview}}</span></li>
                  <li>{{__('Pending reviews:')}} <span class="font-weight-semibold text-default">
                    #{{$unpubreview}}</span>
                  </li>
                </ul>
              </div> 
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Other Deposits')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Pending:')}} <span class="font-weight-semibold text-default">
                    #{{$pendingdep}}</span></li>
                  <li>{{__('Approved:')}} <span class="font-weight-semibold text-default">
                    #{{$approveddep}}</span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Withdrawal')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Pending:')}} <span class="font-weight-semibold text-default">
                    #{{$pendingwd}}</span></li>
                  <li>{{__('Approved:')}} <span class="font-weight-semibold text-default">
                    #{{$approvedwd}}</span>
                  </li>              
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>   
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Investment plans')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Active:')}} <span class="font-weight-semibold text-default">
                    #{{$appplan}}</span></li>
                  <li>{{__('Disabled:')}} <span class="font-weight-semibold text-default">
                    #{{$penplan}}</span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
              <div>
                <h3 class="card-title">{{__('Investment')}}</h3>
                <ul class="list list-unstyled mb-0 text-sm">
                  <li>{{__('Active:')}} <span class="font-weight-semibold text-default">
                    #{{$appprofit}}</span></li>
                  <li>{{__('Completed:')}} <span class="font-weight-semibold text-default">
                    #{{$penprofit}}</span>
                  </li>              
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  @stop