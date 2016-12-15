@extends('layouts.admin')


@section('content')
  <div class="row">
    

    <div class="container-fluid">
      <div class="row">
        @include('admin._sidebar')

        <div class="col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <h1 class="page-header">Dashboard</h1>
          @include('helpers.flasher')
          @include('errors.validation')
          
          
          @include('admin._ordertable', ['orders'=>$received, 'all'=>$ctr->received, 'olink'=>'received', 'title'=>'New Orders', 'class'=>'primary'])

          @include('admin._ordertable', ['orders'=>$cbu, 'all'=>$ctr->cbu, 'olink'=>'cancelled-by-user', 'title'=>'Cancelled By User', 'class'=>'danger'])

          @include('admin._ordertable', ['orders'=>$cba, 'all'=>$ctr->cba, 'olink'=>'cancelled-by-admin', 'title'=>'Cancelled By Admin', 'class'=>'default'])

          {{--
          @include('admin._companyOrders', ['orders'=>$companyOrders, 'new'=>$ctrCompany, 'title'=>'Company Orders', 'class'=>'default'])
          --}}

          <!-- modals -->
          <div class="modal fade" id="EstimatedDelivery" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Estimated Date and Time Delivery</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <div class="input-group ">
                          <input type="text" class="form-control" name="daterange" id="daterange" value="{{ $now }} - {{ $tom }}">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirm</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

           <div class="modal fade" id="delivered-at" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Date and Time Delivery of Shipment</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <div class="input-group ">
                          <input type="text" class="form-control" name="datetime" id="datetime" value="{{ $now }}">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirm</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

  </div>

@endsection