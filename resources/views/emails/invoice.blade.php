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
                          <p>TIENDA ENTERPRISES</p>
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
    </div>

  <div id="store-footer">
      <p>This is an order from <a href="http://tienda.ph/" target="blank">tienda</a>. If you did not make this purchase please contact us immediately on the address stated above.</p>
      <h3>View your <a href="http://tienda.ph/order/{{$order->id}}" target="blank">order</a></h3>
  </div>
</div>