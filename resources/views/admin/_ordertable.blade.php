<div class="col-md-12">
  <div class="panel panel-{{$class}}">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ $title }} @if(count($orders)) <span class="badge">{{count($orders)}}</span> @endif</div>
    <div class="panel-body">
      <!-- <p>Currently processing orders</p> -->
    </div>

    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>From</th>
          <th># of Items</th>
          <th>Total</th>
          <th>Shipping Fee</th>
          <th>Grand Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $o)
          @if($o)
            <tr>
              <td>{{ $o->id }}</td>
              <td>{{ $o->user->getFullname() }}</td>
              <td>{{ count($o->orderitems) }}</td>
              <td>₱{{ $o->total }}</td>
              <td>₱{{ $o->shipping_fee }}</td>
              <td>₱{{ $o->grand_total }}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>