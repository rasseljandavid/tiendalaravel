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




          @include('admin._ordertable', ['orders'=>$onProcess, 'new'=>$ctrOnProcess, 'title'=>'On Process', 'class'=>'success'])

          @include('admin._ordertable', ['orders'=>$onTransit, 'new'=>$ctrOnTransit, 'title'=>'On Transit', 'class'=>'info'])

          @include('admin._ordertable', ['orders'=>$shipped, 'new'=>$ctrShipped, 'title'=>'Shipped', 'class'=>'default'])

          {{-- @include('admin._ordertable', ['orders'=>$cancelled, 'title'=>'Cancelled', 'class'=>'danger']) --}}

          @include('admin._ordertable', ['orders'=>$cbc, 'new'=>$ctrCbc, 'title'=>'Cancelled By Customer', 'class'=>'danger'])

          {{-- @include('admin._ordertable', ['orders'=>$cba, 'new'=>$ctrCba, 'title'=>'Cancelled By Administrator', 'class'=>'danger']) --}}


      </div>
    </div>

  </div>

@endsection

@section('script')
 <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#order_status_1, #order_status_2, #order_status_3', function(e) {
              var sel = $(this).find('option:selected');
              var status = sel.val();
              // console.log(status[0] + '_' + status[1]);
              if( sel.text() != "Select") {
                if(confirm('Are you sure you want to update this order status to '+ sel.text() + '?')) {
                  var f = document.createElement('form');
                  f.action = '/order/statuschange';
                  f.method = 'post';
                  var i=document.createElement('input');
                  var t=document.createElement('input');
                  var id=document.createElement('input');
                  id.type='hidden';
                  id.name='status_id';
                  id.value= status[0];
                  t.type='hidden';
                  t.name='_token';
                  t.value= $('#logout-form input:hidden[name=_token]').val();
                  i.type='hidden';
                  i.name='id';
                  i.value= $(this).data('order-id');
                  f.appendChild(i);
                  f.appendChild(t);
                  f.appendChild(id);
                  document.body.appendChild(f);
                  f.submit();
                }
              }
        });
    });
 </script>
@endsection