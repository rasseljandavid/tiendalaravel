<span class="input-group-btn">
<form method="POST" action="{{ url('/cart/addItem') }}" class="update-cart-item">
	{{ csrf_field() }}
	<input type="text" id="cart-item-quantity" name="cart_item_quantity" value="{{$oi->quantity}}" size="1" class="form-control" style="width:50% !important;">
	<input type="hidden" name="product_id" value="{{ $oi->product_id }}">
	<input type="hidden" name="update">
	<input type="hidden" name="cartpage" value="{{$cartpage}}">
	<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
</form>
@include('cart._deleteitem', ['btnclass'=>'','iclass'=>'fa-times-circle'])
</span>


<!-- <input type="text" name="quantity" value="1" size="1" class="form-control" />
<span class="input-group-btn">
<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
button
</span> -->