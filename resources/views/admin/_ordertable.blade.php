<div class="col-md-12">
  <div class="panel panel-{{$class}}">
    <!-- Default panel contents -->
    <div class="panel-heading">{{ $title }} <span class="badge">@if($new) {{$new}} @endif</span></div>
    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Date</th>
          <th>From</th>
          <th># of Items</th>
          <th>Total</th>
          <th>Shipping Fee</th>
          <th>Grand Total</th>
          <th>Action</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $o)
          @if($o)
            <tr>
              <td><a href="/order/{{$o->id}}">{{ $o->salesOrderNo }}</a></td>
              <td>{{ $o->created_at->format('M d, Y') }}</td>
              <td>{{ $o->user->getFullname() }}</td>
              <td>{{ count($o->orderitems) }}</td>
              <td>₱{{ $o->total }}</td>
              <td>₱{{ $o->shipping_fee }}</td>
              <td>₱{{ $o->grand_total }}</td>
              <td>
                <!-- Remove this if you need to, just make sure that no one can cancel a canceled order. -->
                <!-- the only order that we can cancel are the RECEIVE and ON PROCESS -->
                <!-- added ON TRANSIT on order that can be cancelled -->
                @if($o->status == 1 || $o->status == 2 || $o->status == 3)
                <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"" data-order-id="{{$o->id}}">
                  <option selected="">Select</option>
                  @if($o->status != 2 )<option value="2">Processing</option>@endif
                  @if($o->status != 3 )<option value="3">Transit</option>@endif
                  <option value="4">Shipped</option>
                  <option value="5">Cancelled</option>
                </select>
                @endif
              </td>
              <td><a href="/order/email/{{$o->id}}">View Email</a></td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>