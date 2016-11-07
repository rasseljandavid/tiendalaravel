@extends('layouts.app')

@section('metainfo')
	<title>Shopping Cart : Tienda -Your First Online Grocery in the Philippines</title>
  <meta name="description" content="Shopping Cart : Tienda - Your First Online Grocery in the Philippines">
@endsection

@section('content')
    <div class="container">
      <div class="panel-body" style="padding:40px;">
        <div class="pull-right text-right">
          <h3 class="font-semibold mgbt-xs-20">INVOICE</h3>
          <table class="table table-bordered">
            <tbody><tr>
              <th>Invoice No.</th>
              <th>Date</th>
            </tr>
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->purchased_at}}</td>
            </tr>
          </tbody></table>
        </div>
        <div class="mgbt-xs-20"><img alt="logo" src="/image/logo.png"></div>
        <address>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890<br>
        <br>
        info@venmond.com
        </address>
        <hr>
        <br>
        <div class="pd-25">
          <div class="row">
            <div class="col-xs-3">
              <address>
              <strong>Bill To:</strong><br>
              {{ $order->billingAddress->address_one }}<br>
              {{ $order->billingAddress->city }} {{ $order->billingAddress->zipcode }},<br>
              {{ $order->billingAddress->country }}<br>
              Sample - (123) 456-7890
              </address>
            </div>
            <div class="col-xs-4">
              <address>
              <strong>Ship To:</strong><br>
              {{ $order->shippingAddress->address_one }}<br>
              {{ $order->shippingAddress->city }} {{ $order->shippingAddress->zipcode }},<br>
              {{ $order->shippingAddress->country }}<br>
              </address>
            </div>
            <!-- <div class="col-xs-2">
              <address>
              <strong>Due Date:</strong><br>
              24 July 2013
              </address>
            </div> -->
            <div class="col-xs-2">
              <address>
              <strong>Status:</strong><br>
              {{ ucfirst($order->status) }}
              </address>
            </div>
            <div class="col-xs-3">
              <div class="text-right">
              <strong>Due Balance:</strong><br>
              <span class="mgtp-5 vd_green font-md">₱{{ $order->grand_total }}</span>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-condensed table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width:20px;">QTY</th>
              <th>DESCRIPTION</th>
              <th class="text-right" style="width:120px;">UNIT PRICE</th>
              <th class="text-right" style="width:120px;">TOTAL</th>
            </tr>
          </thead>
          <tbody>
          	@foreach( $order->orderitems as $oi )
            <tr>
              <td class="text-center">{{ $oi->quantity }}</td>
              <td>{{ $oi->getProduct()->title }}</td>
              <td class="text-right">₱{{ $oi->price }}</td>
              <td class="text-right">₱{{ ($oi->quantity * $oi->price) }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="2" rowspan="3" class="bdr">Note:
                <p class="font-normal">{{ $order->comment }}</p></th>
              <th class="text-right pd-10">Sub Total</th>
              <th class="text-right pd-10">₱{{ $order->total }}</th>
            </tr>
            <tr>
              <th class="text-right  pd-10 no-bd">Discount</th>
              <th class="text-right  pd-10 vd_red no-bd">₱0.00</th>
            </tr>
            <tr>
              <th class="text-right  pd-10 no-bd">Shipping Cost</th>
              <th class="text-right  pd-10 no-bd">₱{{ $order->shipping_fee }}</th>
            </tr>
            <tr>
              <th colspan="2">Thank you for your business. Please remit the total amount due within 30 days.</th>
              <th class="text-right  pd-10">Total</th>
              <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal">₱{{ $order->grand_total }}</span></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
@endsection






