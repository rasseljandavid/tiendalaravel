<!-- Mini Cart Start-->
<div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <div id="cart">
    <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
    
    <span id="cart-total">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    @if($minicart){{count($minicart->orderitems)}} item(s) - {{$minicart->total}}
    @else 0 item(s) - ₱00.00
    @endif
    </span></button>
    <ul class="dropdown-menu">
      <li>
        <table class="table">
          <tbody>
            @if($minicart && count($minicart->orderitems))
              @foreach($minicart->orderitems as $oi)
                <?php $oiProd =  $oi->getProduct(); ?>
                <tr>
                    <td class="text-center"><a href="{{$oiProd->slugLink()}}"><img style="max-width:50px;max-height:75px;width:100%;height:auto;" class="img-thumbnail" title="{{ $oiProd->title }}" alt="{{ $oiProd->title }}" src="/image/product/{{ $oiProd->id.'.jpg' }}"></a></td>
                    <td class="text-left"><a href="{{$oiProd->slugLink()}}">{{ $oiProd->title }}</a></td>
                    <td class="text-right">x{{ $oi->quantity }}</td>
                    <td class="text-right">₱{{ ($oi->quantity * $oi->price) }}</td>
                    <td class="text-center">
                    <form method="POST" action="/cart/removeItem" class="form">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="item-id" value="{{$oi->id}}">
                      <button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="submit"><i class="fa fa-times"></i></button></td>
                    </form>
                </tr>
              @endforeach
            @else
              <tr>
                <td>
                  Your cart is empty
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </li>
      <li>
        <div>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="text-right"><strong>Sub-Total</strong></td>
                <td class="text-right">₱@if($minicart){{$minicart->total}}@else 0 @endif</td>
              </tr>
              <tr>
                <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                <td class="text-right">₱N/A</td>
              </tr>
              <tr>
                <td class="text-right"><strong>VAT (20%)</strong></td>
                <td class="text-right">₱N/A</td>
              </tr>
              <tr>
                <td class="text-right"><strong>Total</strong></td>
                <td class="text-right">₱N/A</td>
              </tr>
            </tbody>
          </table>
          <p class="checkout"><a href="/cart/show" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="/cart/checkout" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Mini Cart End-->