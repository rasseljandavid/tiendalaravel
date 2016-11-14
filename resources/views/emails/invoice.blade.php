<div id="invoice" style="color:#000000; font-size:100%; position:relative; text-align: left; margin: 0px; padding: 0px;">   
    <div id="invoice-data">
        <table style="border:0 none; width:100%; color:#000000; margin-bottom: 1em; " border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr style="background:none repeat scroll 0 0 #CDCDCD;">
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top;">
                       Source Site
                    </th>
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top;">
                       Order #
                    </th>
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top;">
                       Order Date
                    </th>
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top;">
                       Order Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:1px solid #DEDEDE;">
                        
                         <div><img alt="logo" src="http://tienda.ph/image/logo.png"></div>
                    </td>
                    <td style="border:1px solid #DEDEDE;">
                         {{$order->id}}
                    </td>
                    <td style="border:1px solid #DEDEDE;">
                        {{$order->purchased_at}}
                    </td>
                    <td style="border:1px solid #DEDEDE;">
                        
                        {{ ucfirst($order->status) }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="payment-info" style="margin-bottom:1em;" width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr style="background:none repeat scroll 0 0 #CDCDCD;">
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top; width: 30%;">
                        Billing Address
                    </th>
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top; width: 30%">
                        Shipping Address
                    </th>
                    <th style="border:1px solid #DEDEDE; text-align: left; vertical-align: top; width: 39%">
                       Payment Info
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:1px solid #DEDEDE; text-align:left; vertical-align:top; padding:0.5em;">
                        <address>
                         {{ $order->user->firstname }} {{ $order->user->lastname }}<br>
                          {{ $order->user->contact }}<br><br>
                          {{ $order->billingAddress->address_one }}<br>
                          {{ $order->billingAddress->city }} {{ $order->billingAddress->zipcode }},<br>
                          {{ $order->billingAddress->country }}<br>
                          </address>
                    </td>
                    <td style="border:1px solid #DEDEDE; text-align:left; vertical-align:top; padding:0.5em;">
                        <address>
                             {{ $order->user->firstname }} {{ $order->user->lastname }}<br>
                            {{ $order->user->contact }}<br><br>
                            {{ $order->shippingAddress->address_one }}<br>
                            {{ $order->shippingAddress->city }} {{ $order->shippingAddress->zipcode }},<br>
                            {{ $order->shippingAddress->country }}
                        </address>
                    </td>
                    <td class="div-rows" style="border:1px solid #DEDEDE; text-align:left; vertical-align:top; padding:0.5em;">
                        Cash on Delivery
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

  <div id="store-footer">
      <p>This is an order from <a href="http://tienda.ph/" target="blank">tienda</a>. If you did not make this purchase please contact us immediately on the address stated above.</p>
      <h3>View your <a href="http://tienda.ph/order/{{$order->id}}" target="blank">order</a></h3>
  </div>
</div>