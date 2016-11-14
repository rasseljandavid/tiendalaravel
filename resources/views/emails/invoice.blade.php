<html>
<style type="text/css">
#order-table{
	border: 1px solid #dedede;
	padding: 3px;
	border-collapse: collapse;
	width: 100%;
}
#order-table tr {
	border: 1px solid #eee;
	text-align: center;
}

#order-table tr th{
	background-color: #eee;
}
.address{
	float:left;
	margin-left:5px;
}
</style>
<body>
<div style="padding:5px;">
        <div ><img alt="logo" src="/image/logo.png"></div>
        <address>
         <address style="margin-top: 10px;">
        <strong>TIENDA ENTERPRISES</strong><br>
        Lot 2 Blk 20 18th Street<br>
        Mauaque Resettlement,<br>
        Mabalacat Pampanga,<br>
        Philippines<br>
        <br>
       
        <hr>

        <div >
          <h3 >INVOICE</h3>
        
          <table id="order-table">
            <tbody>
	            <tr>
	              <th>Invoice No.</th>
	              <th>Date</th>
	              <th>Status</th>
	              <th>Due Balance</th>
	            </tr>
	            <tr>
	              <td>{{$order->id}}</td>
	              <td>{{$order->purchased_at}}</td>
	              <td>{{ ucfirst($order->status) }}</td>
	              <td>₱{{ $order->grand_total }}</td>
	            </tr>
	          </tbody>
          </table>
        </div>
        <br>
        <table id="order-table">
        	<thead>
        		<tr>
        			<th>Bill To:</th>
        			<th>Ship To:</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td>
                {{ $order->user->firstname }} {{ $order->user->lastname }}<br>
                {{ $order->user->contact }}<br><br>
      					{{ $order->billingAddress->address_one }}<br>
	              {{ $order->billingAddress->city }} {{ $order->billingAddress->zipcode }},<br>
	              {{ $order->billingAddress->country }}<br>
		              Contact - {{ Auth::user()->contact }}
		          </td>
        			<td>
                {{ $order->user->firstname }} {{ $order->user->lastname }}<br>
                {{ $order->user->contact }}<br><br>
        				{{ $order->shippingAddress->address_one }}<br>
	              {{ $order->shippingAddress->city }} {{ $order->shippingAddress->zipcode }},<br>
	              {{ $order->shippingAddress->country }}
        			</td>
        		</tr>
        	</tbody>
        </table>
        <br>
        <table id="order-table" >
          <thead >
            <tr>
              <th >QTY</th>
              <th style="text-align:left;">DESCRIPTION</th>
              <th >UNIT PRICE</th>
              <th >TOTAL</th>
            </tr>
          </thead>
          <tbody>
          	@foreach( $order->orderitems as $oi )
            <tr>
              <td >{{ $oi->quantity }}</td>
              <td style="text-align:left;">{{ $oi->getProduct()->title }}</td>
              <td >₱{{ $oi->price }}</td>
              <td >₱{{ ($oi->quantity * $oi->price) }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr style="text-align:left;">
              <td colspan="2" rowspan="3" class="bdr"><b>Note:</b>
                <p >{{ $order->comment }}</p></td>
              <td style="text-align:left;"><b>Sub Total</b></td>
              <td ><b>₱{{ $order->total }}</b></td>
            </tr>
            <tr>
              <td style="text-align:left;"><b>Discount<b></td>
              <td ><b>₱0.00</b></td>
            </tr>
            <tr>
              <td style="text-align:left;"><b>Shipping Cost</b></td>
              <td ><b>₱{{ $order->shipping_fee }}</b></td>
            </tr>
            <tr>
              <th colspan="2">Thank you for your business. Please expect a call from us confirming your order.</th>
              <th style="text-align:left;">Total</th>
              <th ><span>₱{{ $order->grand_total }}</span></th>
            </tr>
          </tfoot>
        </table>
        <br>
        <p>This is an order from <a href="http://tienda.ph" target="blank">tienda</a>. If you did not make this purchase please contact us immediately on the address stated above.</p>
        <h3>View your <a href="http://tienda.dev/order/{{$order->id}}" target="blank">order</a></h3>
      </div>
</body>
</html>