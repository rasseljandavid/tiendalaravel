@extends('layouts.admin')


@section('content')
  <div class="row">
    

    <div class="container-fluid">
      <div class="row">
        @include('admin._sidebar', ['current'=>'dashboard'])

        <div class="col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <h1 class="page-header">Dashboard</h1>
          @include('helpers.flasher')
          @include('errors.validation')
          
          @include('admin._ordertable', ['orders'=>$received, 'new'=>$ctrReceived, 'title'=>'New Received Orders', 'class'=>'primary'])


          @include('admin._companyOrders', ['orders'=>$companyOrders, 'new'=>$ctrCompany, 'title'=>'Company Orders', 'class'=>'default'])

          @include('admin._ordertable', ['orders'=>$onProcess, 'new'=>$ctrOnProcess, 'title'=>'On Process', 'class'=>'success'])

          @include('admin._ordertable', ['orders'=>$onTransit, 'new'=>$ctrOnTransit, 'title'=>'On Transit', 'class'=>'info'])

          @include('admin._ordertable', ['orders'=>$shipped, 'new'=>$ctrShipped, 'title'=>'Shipped', 'class'=>'default'])

          {{-- @include('admin._ordertable', ['orders'=>$cancelled, 'title'=>'Cancelled', 'class'=>'danger']) --}}

          @include('admin._ordertable', ['orders'=>$cbc, 'new'=>$ctrCbc, 'title'=>'Cancelled By Customer', 'class'=>'danger'])

          @include('admin._ordertable', ['orders'=>$cba, 'new'=>$ctrCba, 'title'=>'Cancelled By Administrator', 'class'=>'danger'])

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

@section('script')
 <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#order_status_1, #order_status_2, #order_status_3, #order_status_4', function(e) {
              var sel = $(this).find('option:selected');
              var status = sel.val();
              var order_id = $(this).data('order-id');
              // console.log(status[0] + '_' + status[1]);
              if( sel.text() != "Select") {
                if(sel.text() == 'Transit') {
                  $('#EstimatedDelivery').modal('show');
                  $('#EstimatedDelivery').modal().one('click','#confirm', function() {
                    //console.log(sel.text(), status[0], order_id, $('#daterange').val());
                    submitForm(sel.text(), status[0], order_id, $('#daterange').val());
                  });
                } else if(sel.text() == 'Shipped') {
                  $('#delivered-at').modal('show');
                  $('#delivered-at').modal().one('click','#confirm', function() {
                    //console.log(sel.text(), status[0], order_id, $('#daterange').val());
                    submitForm(sel.text(), status[0], order_id, $('#datetime').val());
                  });
                } else {
                  //console.log(sel.text(), status[0], order_id);
                  submitForm(sel.text(), status[0], order_id);
                }
              }
        });
        function submitForm(selected, status_id, order_id, estimateddelivery) {
          var msg='';
          if(selected == 'Transit') {
            msg += ' and set estimated date and time delivery to ' + estimateddelivery;
          }

          if(selected == 'Shipped') {
            msg += ' and set shipment date at ' + estimateddelivery;
          }

          if(confirm('Are you sure you want to update this order status to '+ selected + '?' + msg)) {
                  var f = document.createElement('form');
                  f.action = '/order/statuschange';
                  f.method = 'post';
                  var i=document.createElement('input');
                  var t=document.createElement('input');
                  var id=document.createElement('input');
                  var date=document.createElement('input');
                  id.type='hidden';
                  id.name='status_id';
                  id.value= status_id;
                  t.type='hidden';
                  t.name='_token';
                  t.value= $('#logout-form input:hidden[name=_token]').val();
                  i.type='hidden';
                  i.name='id';
                  i.value= order_id;
                  f.appendChild(i);
                  f.appendChild(t);
                  f.appendChild(id);
                  if(selected == 'Transit') {
                    date.type='hidden';
                    date.name='estimateddelivery';
                    date.value= estimateddelivery;
                    f.appendChild(date);
                  }
                  if(selected == 'Shipped') {
                    date.type='hidden';
                    date.name='shipment';
                    date.value= estimateddelivery;
                    f.appendChild(date);
                  }
                  document.body.appendChild(f);
                  f.submit();
                }
        }

        $('input[name="daterange"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 1,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });

        $('input[name="datetime"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: 1,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    });
 </script>
@endsection