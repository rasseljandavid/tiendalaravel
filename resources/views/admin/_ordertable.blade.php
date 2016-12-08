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
          <th>Order Number</th>
          <th>Date</th>
          <th>From</th>
          <th># of Items</th>
          <th>Total</th>
          <th>Shipping Fee</th>
          <th>Grand Total</th>
          <th>Action</th>
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
                @if($o->status == 0)
                <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"">
                  <option value="9" selected="">Select</option>
                  <option value="1_{{ $o->salesOrderNo }}">Processing</option>
                  <option value="2_{{ $o->salesOrderNo }}">Transit</option>
                  <option value="3_{{ $o->salesOrderNo }}">Shipped</option>
                  <option value="4_{{ $o->salesOrderNo }}">Canceled</option>
                </select>
                @elseif ($o->status == 1)
                 <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"">
                 <option value="9" selected>Select</option>
                  <option value="0_{{ $o->salesOrderNo }}">Received</option>
                  <option value="2_{{ $o->salesOrderNo }}">Transit</option>
                  <option value="3_{{ $o->salesOrderNo }}">Shipped</option>
                  <option value="4_{{ $o->salesOrderNo }}">Canceled</option>
                </select>
                @elseif ($o->status == 2)
                 <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"">
                 <option value="9" selected>Select</option>
                  <option value="0_{{ $o->salesOrderNo }}">Received</option>
                  <option value="1_{{ $o->salesOrderNo }}">Processing</option>
                  <option value="3_{{ $o->salesOrderNo }}">Shipped</option>
                  <option value="4_{{ $o->salesOrderNo }}">Canceled</option>
                </select>
                @elseif ($o->status == 3)
                <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"">
                <option value="9" selected>Select</option>
                  <option value="0_{{ $o->salesOrderNo }}">Received</option>
                  <option value="1_{{ $o->salesOrderNo }}">Processing</option>
                  <option value="2_{{ $o->salesOrderNo }}">Transit</option>
                </select>
                @elseif ($o->status == 4)
                <!-- <select id="order_status_{{ $o->status }}" class="form-control col-sm-3"">
                <option value="9" selected>Select</option>
                  <option value="0_{{ $o->salesOrderNo }}">Received</option>
                  <option value="1_{{ $o->salesOrderNo }}">Processing</option>
                </select> -->
                @endif
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>