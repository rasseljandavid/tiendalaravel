<form method="POST" action="{{ url('/cart/addItem') }}" class="form form-addtocart">
	{{ csrf_field() }}
	@if( $quantifier )
	<div class="qty">
		<label class="control-label" for="input-quantity">Qty</label>
		<input type="text" name="cart_item_quantity" value="1" size="2" id="input-quantity" class="form-control" />
		<a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
		<a class="qtyBtn mines" href="javascript:void(0);">-</a>
		<div class="clear"></div>
	</div>
	@else
		<input type="hidden" id="cart-item-quantity" name="cart_item_quantity" value="1">
	@endif
	<input type="hidden" name="product_id" value="{{ $id }}">
	<button type="submit" class="{{ $btnclass }}" ><span>Add to Cart</span></button>
</form>
