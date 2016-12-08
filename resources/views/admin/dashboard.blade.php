@extends('layouts.admin')


@section('content')
  <div class="row">
    

    <div class="container-fluid">
      <div class="row">
        <!-- @include('admin._sidebar', ['current'=>'dashboard']) -->

        <div class="col-sm-12"> <!-- col-sm-offset-3 col-md-10 col-md-offset-2 main"> -->
          <h1 class="page-header">Dashboard</h1>

          @include('admin._ordertable', ['orders'=>$received, 'title'=>'New Orders', 'class'=>'success'])

          @include('admin._ordertable', ['orders'=>$onProcess, 'title'=>'On Process', 'class'=>'primary'])

          @include('admin._ordertable', ['orders'=>$onTransit, 'title'=>'On Transit', 'class'=>'info'])

          @include('admin._ordertable', ['orders'=>$shipped, 'title'=>'Shipped', 'class'=>'default'])

          @include('admin._ordertable', ['orders'=>$cancelled, 'title'=>'Cancelled', 'class'=>'danger'])

      </div>
    </div>

  </div>

@endsection

@section('script')
 <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#order_status_0, #order_status_1, #order_status_2, #order_status_3, #order_status_4', function(e) {
            var status = $(this).val().split('_');
              console.log(status[0] + '_' + status[1]);
              if( status[0] != 9) {
                if(confirm('Are you sure you want to update this order status to '+ $(this).find('option:selected').text() + '?')) {
                  var f = document.createElement('form');
                  f.action = '/order/cancelorder/';
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
                  i.name='ordernumber';
                  i.value= status[1];
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